<?php

/*
http://layar.pbworks.com/w/page/30832324/First%20Layar%20Tutorial%20-%20Create%20a%20simple%20layer
*/

/* Pre-define connection to the MySQL database, please specify these fields.*/
$dbhost = "hazylayardb.db.5378719.hostedresource.com";
$dbdata = "hazylayardb";
$dbuser = "hazylayardb";
$dbpass = "HazyL@y@r4";
$poi_tableName = "Halloween_Test_POI";
$icon_tableName = "Halloween_Test_Icon";


/* Put parameters from GetPOI request into an associative array named $value */

// Put needed parameter names from GetPOI request in an array called $keys. 
$keys = array( "layerName", "lat", "lon", "radius" );

// Initialize an empty associative array.
$value = array(); 
 
try 
{
  // Retrieve parameter values using $_GET and put them in $value array with parameter name as key. 
	foreach( $keys as $key ) 
	{	  
		if ( isset($_GET[$key]) )
		{
			$value[$key] = $_GET[$key]; 
		}
		else 
		{
			throw new Exception($key ." parameter is not passed in GetPOI request.");
		}
	
	}//foreach
}//try
catch(Exception $e) 
{
	echo 'Message: ' .$e->getMessage();
}//catch


/* Connect to MySQL server. We use PDO which is a PHP extension to formalise database connection.
       For more information regarding PDO, please see http://php.net/manual/en/book.pdo.php. 
*/
    
// Connect to predefined MySQl database.  
$db = new PDO( "mysql:host=$dbhost; dbname=$dbdata", $dbuser, $dbpass, array(PDO::MYSQL_ATTR_INIT_COMMAND =>  "SET NAMES utf8") );

// set the error reporting attribute to Exception.
$db->setAttribute( PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION );


/* Construct the response into an associative array.*/

// Create an empty array named response.
$response = array();

// Assign cooresponding values to mandatory JSON response keys.
$response["layer"] = $value["layerName"];

// Use Gethotspots() function to retrieve POIs with in the search range.  
$response["hotspots"] = Gethotspots($db, $value, $poi_tableName, $icon_tableName);

// if there is no POI found, return a custom error message.
if ( empty( $response["hotspots"] ) ) 
{
	$response["errorCode"] = 20;
	$response["errorString"] = "No POI found. Please adjust the range.";
}//if
else 
{
	$response["errorCode"] = 0;
	$response["errorString"] = "ok";
}//else


/* All data is in $response, print it into JSON format.*/
    
// Put the JSON representation of $response into $jsonresponse.
$jsonresponse = json_encode( $response );

// Declare the correct content type in HTTP response header.
header( "Content-type: application/json; charset=utf-8" );

// Print out Json response.
echo $jsonresponse;

/* Close the MySQL connection.*/

// Set $db to NULL to close the database connection.
$db=null;

///////////////////////////////////////////////////////////////////////////////

function Gethotspots($db, $value, $poi_tableName, $icon_tableName)
{
	/* Create the SQL query to retrieve POIs within the "radius" returned from GetPOI request. 
       Returned POIs are sorted by distance and the first 50 POIs are selected. 
       The distance is caculated based on the Haversine formula. 
       Note: this way of calculation is not scalable for querying large database.
	*/
	
	// Use PDO::prepare() to prepare SQL statement.
  	// This statement is used due to security reasons and will help prevent general SQL injection attacks.
  	// ":lat1", ":lat2", ":long" and ":radius" are named parameter markers for which real values
  	// will be substituted when the statement is executed.
  	// $sql is returned as a PDO statement object.
  	$sql = $db->prepare( '
              SELECT id,
                     imageURL,
                     title,
                     description,
                     footnote,
                     lat,
                     lon,
                     iconID,
                     (((acos(sin((:lat1 * pi() / 180)) * sin((lat * pi() / 180)) +
                        cos((:lat2 * pi() / 180)) * cos((lat * pi() / 180)) *
                        cos((:long  - lon) * pi() / 180))
                       ) * 180 / pi()
                      )* 60 * 1.1515 * 1.609344 * 1000
                     ) as distance
               FROM ' . $poi_tableName . '
              WHERE poiType = "geo"
             HAVING distance < :radius
           ORDER BY distance ASC
              LIMIT 0, 50 ' );
						
	// PDOStatement::bindParam() binds the named parameter markers to the specified parameter values. 
	$sql->bindParam( ':lat1', $value['lat'], PDO::PARAM_STR );
	$sql->bindParam( ':lat2', $value['lat'], PDO::PARAM_STR );
	$sql->bindParam( ':long', $value['lon'], PDO::PARAM_STR );
	$sql->bindParam( ':radius', $value['radius'], PDO::PARAM_INT );
	
	// Use PDO::execute() to execute the prepared statement $sql. 
	$sql->execute();
    
	// Iterator for the response array.
	$i = 0; 
  
  	// Use fetchAll to return an array containing all of the remaining rows in
  	// the result set.
  	// Use PDO::FETCH_ASSOC to fetch $sql query results and return each row as an
  	// array indexed by column name.
  	$rawPois = $sql->fetchAll(PDO::FETCH_ASSOC);
 
  	/* Process the $rawPois result */
  	// if $rawPois array is not  empty
  	if ($rawPois) 
  	{
    	// Put each POI information into $hotspots array.
    	foreach ( $rawPois as $rawPoi ) 
    	{
      		$poi = array();
      		$poi['id'] = $rawPoi['id'];
      		$poi['imageURL'] = $rawPoi['imageURL'];
      
      		// get anchor object information, note that changetoFloat is a custom function used to covert a string variable to float.
      		$poi['anchor']['geolocation']['lat'] = ChangetoFloat($rawPoi['lat']);
      		$poi['anchor']['geolocation']['lon'] = ChangetoFloat($rawPoi['lon']);
      
      		// get text object information
      		$poi['text']['title'] = $rawPoi['title'];
      		
      		// Get object object information if iconID is not null
	  		if(count($rawPoi['iconID']) != 0)
    		{
    			$poi['icon'] = GetIcon($db , $rawPoi['iconID'], $icon_tableName);
    		}
     		
     		// Put the poi into the $hotspots array.
     		$hotspots[$i] = $poi;
     
     		$i++;
    	}//foreach
  	}//if
  
  	return $hotspots;
	
}//Gethotspots

// Put fetched icon dictionary for each POI into an associative array.
//
// Arguments:
//  db ; The database connection handler.
//  iconID, integer ; The iconID value  which is stored in this POI.
//
// Return:
//  array ; An associative array of retrieved icon dictionary for this POI.
//  Otherwise, return NULL.
function GetIcon($db, $iconID, $tableName) 
{
	// If no icon object is found, return NULL.
	$icon = NULL;
    
    // Run the query to retrieve icon information for this POI.  
    $sql_icon = $db->prepare( 'SELECT url, type
                  				FROM ' . $tableName . '
                 				WHERE id = :iconID' );
                 				
    $sql_icon->bindParam(':iconID', $iconID, PDO::PARAM_INT);
    $sql_icon->execute();
    
    $rawIcon = $sql_icon->fetch(PDO::FETCH_ASSOC);

    // Assign returned values to $icon array.
    if($rawIcon)
    {
    	$rawIcon['type'] = 0;
		//ChangetoInt($rawIcon['type']);
        $icon = $rawIcon;
    }
    
    return $icon;
} //getIcon


///////////////////////////////////////////////////////////
// UNIT CONVERSION FUNCTIONS
///////////////////////////////////////////////////////////

// Convert a decimal GPS latitude or longitude value to an integer by multiplying by 1000000.
// 
// Arguments:
//   value_Dec ; The decimal latitude or longitude GPS value.
//
// Returns:
//   int ; The integer value of the latitude or longitude.
//
function ChangetoIntLoc( $value_Dec ) 
{
	return $value_Dec * 1000000;  
}//ChangetoIntLoc


// Change a string value to integer. 
//
// Arguments:
//   string ; A string value.
// 
// Returns:
//   Int ; If the string is empty, return NULL.
//
function ChangetoInt( $string ) 
{
	if ( strlen( trim( $string ) ) != 0 ) 
	{  
		return (int)$string;
	}
	else 
	{
		return NULL;
	}
}//ChangetoInt


// Change a string value to float
//
// Arguments:
//   string ; A string value.
// 
// Returns:
//   float ; If the string is empty, return NULL.
//
function ChangetoFloat( $string ) 
{
	if ( strlen( trim( $string ) ) != 0 ) 
	{  
		return (float)$string;
	}
	else 
	{
		return NULL;
	}
}//ChangetoFloat

?>