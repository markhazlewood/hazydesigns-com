<?php

if (isset($_POST["formSubmit"]))
{
	/* Pre-define connection to the MySQL database, please specify these fields.*/
	$dbhost = "hazylayardb.db.5378719.hostedresource.com";
	$dbdata = "hazylayardb";
	$dbuser = "hazylayardb";
	$dbpass = "HazyL@y@r4";
	
	$poi_tableName = "Halloween_Test_POI";
	
	/* Connect to MySQL server. We use PDO which is a PHP extension to formalise database connection.
       For more information regarding PDO, please see http://php.net/manual/en/book.pdo.php. 
	*/
		
	// Connect to predefined MySQl database.  
	$db = new PDO( "mysql:host=$dbhost; dbname=$dbdata", $dbuser, $dbpass, array(PDO::MYSQL_ATTR_INIT_COMMAND =>  "SET NAMES utf8") );

	// set the error reporting attribute to Exception.
	$db->setAttribute( PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION );
	
	// Build SQL query
	$sql = $db->prepare( " INSERT INTO `" . $poi_tableName . "`	
							( 
								`title`,
								`description`,
								`footnote`,
								`lat`, 
								`lon`, 
								`imageURL`,
								`iconID`,
								`poiType`, 
								`alt`, 
								`doNotIndex`,
								`showSmallBiw`, 
								`showBiwOnClick`,
								`biwStyle`
							)
							VALUES
							(
								'" . $_POST['locationName'] . "', 
								'" . $_POST['locationName'] . "', 
								'" . $_POST['locationName'] . "', 
								'" . $_POST['locationLat'] . "', 
								'" . $_POST['locationLon'] . "', 
								'" . $_POST['imageUrl'] . "',
								'" . $_POST['iconID'] . "',								
								'geo', 
								NULL, 
								0, 
								1, 
								1,
								'classic'
							)");
	
	// Use PDO::execute() to execute the prepared statement $sql. 
	$sql->execute();
}

echo '
<html>
	<body>
	
		<h1>Halloween Test Layar - Add a new home</h1>
		<h2>This is just a test</h2>
		
		<form action=' . $_SERVER["PHP_SELF"] . ' method="post">
			Name:  <input type="text" name="locationName" /> <br />
			Lat:  <input type="text" name="locationLat" /> <br />
			Lon:  <input type="text" name="locationLon" /> <br />
			Image URL:  <input type="url" name="imageUrl" /><br />
			Icon ID:  <input type="text" name="iconID" /><br />
			<input type="submit" value="Submit" name="formSubmit" />
		</form>
	</body>
</html>
';

?>