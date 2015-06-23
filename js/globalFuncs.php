<?php
	function echoHead($pageTitle, $stylePath, $ie_stylePath, $activeTabID)
	{
		echo '
				<link rel="Shortcut Icon" href="/favicon.ico" />				

				<title>' . $pageTitle . '</title>	

				<meta http-equiv="Expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
				<meta http-equiv="Pragma" content="no-cache" /> 
				<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
				<meta http-equiv="Content-Language" content="en-us" />
				<meta name="description" content="Computer repair and web development serving the Syracuse, NY area." />
				<meta name="keywords" content="web page development,web page design,web programming,web consultation,pc repair,computer repair,pc upgrades,computer upgrades,East Syracuse, New York" />

				<link rel="stylesheet" type="text/css" href="' . $stylePath . '" />
				<!--[if IE]>
	 				<link rel="stylesheet" type="text/css" href="' . $ie_stylePath . '" />
				<![endif]-->
            
				';
      if (isset($activeTabID) && $activeTabID != "")
      {
         echo '
            <style type="text/css">
		      <!--            
			      #' . $activeTabID . '
			      {
				      border: 1px solid #555555;
				      border-top: 2px solid #ffa500;
				      border-bottom: none;
				      z-index: 500;
			      }					

			      #' . $activeTabID . ' a, #' . $activeTabID . ' a:hover
			      {
				      border: none;
			      }
		      -->
		      </style>';
      }
      echo '
				<script language="JavaScript" type="text/javascript" src="/scripts/globalFuncs.js"></script>
		';
	}	

	function echoPageTabs()
	{
		echo '	<div id="menu">
					<ul>
						<li id="index-link"><a href="index.php">Home</a></li>
						<li id="webdev-link"><a href="webdev.php">Web Development</a></li>
						<li id="pcrepair-link"><a href="pcrepair.php">PC Repair</a></li>
                  		<li id="sample-link"><a href="sampleWork.php">Sample Work</a></li>
						<li id="tools-link"><a href="tools.php">Free Tools</a></li>						
						<li id="contact-link"><a href="contact.php">Contact</a></li>
					</ul>
				</div>	<!-- End \'menu\' -->
		';
	}	

	function echoFooter()
	{
		echo '
				<div id="footer">		

					<div class="info">
						Page Design by: <a href="#" onclick="ChangeTab(\'Home\');">Hazy Designs</a> |' . 
						# <a href="http://jigsaw.w3.org/css-validator/validator?uri=' . $_SERVER['PHP_SELF'] . '" target="_blank">CSS</a> 
						# and <a href="http://validator.w3.org/check?uri=referer" target="_blank">XHTML</a>
					'</div>	<!-- End \'info\' -->
				</div>	<!-- End \'footer\' -->
				<br /><br />
			</div>	<!-- End \'content\' -->
			<script type="text/javascript">
				var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
				document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));
			</script>
			<script type="text/javascript">
				var pageTracker = _gat._getTracker("UA-3606444-1");
				pageTracker._initData();
				pageTracker._trackPageview();
			</script>
		</body>
		</html> ';
	}  

  /*
   * Returns an image object of the correct type given a file path
   */
  function open_image ($file) 
  {
    # JPEG:
    $im = @imagecreatefromjpeg($file);
    if ($im !== false) { return $im; }

    # GIF:
    $im = @imagecreatefromgif($file);
    if ($im !== false) { return $im; }

    # PNG:
    $im = @imagecreatefrompng($file);
    if ($im !== false) { return $im; }

    # GD File:
    $im = @imagecreatefromgd($file);
    if ($im !== false) { return $im; }

    # GD2 File:
    $im = @imagecreatefromgd2($file);
    if ($im !== false) { return $im; }

    # WBMP:
    $im = @imagecreatefromwbmp($file);
    if ($im !== false) { return $im; }

    # XBM:
    $im = @imagecreatefromxbm($file);
    if ($im !== false) { return $im; }

    # XPM:
    $im = @imagecreatefromxpm($file);
    if ($im !== false) { return $im; }

    # Try and load from string:
    $im = @imagecreatefromstring(file_get_contents($file));
    if ($im !== false) { return $im; }

    return false;
  }  

  /*
   * Converts the given image object to the specified type
   * and displays it with the appropriate content header.
   */
  function ConvertImageTo($image, $strType)
  {
    if ($image == false)
    {
      die('<strong>Invalid image specified for ConvertImageTo() function</strong>');
    }
  
    switch ($strType)
    {
      case 'jpeg':
      case 'jpg':
      {
        header('Content-type: image/jpeg');
        imagejpeg($image);
        break;
      }
      case 'gif':
      {
        header('Content-type: image/gif');
        imagegif($image);
        break;
      }
      case 'png':
      {
        header('Content-type: image/png');
        imagepng($image);
        break;
      }
      case 'wbmp':
      {
        header('Content-type: image/vnd.wap.wbmp');
        imagewbmp($image);
        break;
      }
      default:
      {
        die('<strong>Image conversion failed</strong>');
      }
    }
  }
  
  /* 
   * Returns a resized image using a given image resource and percentage.
   */
  function ResizeImageQuick($image, $percent)
  {
    $width = imagesx($image);
    $height = imagesy($image);
    
    $newWidth = $width * $percent;
    $newHeight = $height * $percent;
    
    $resizedImage = imagecreatetruecolor($newWidth,$newHeight);
    imagecopyresized($resizedImage,$image,0,0,0,0,$newWidth,$newHeight,$width,$height);
    
    return $resizedImage;
  }
  
  /*
   * Returns a resized and resampled image using a given image resource and percentage.
   */
  function ResizeImageNice($image, $percent)
  {
    $width = imagesx($image);
    $height = imagesy($image);
    
    $newWidth = $width * $percent;
    $newHeight = $height * $percent;
    
    $resampledImage = imagecreatetruecolor($newWidth,$newHeight);
    imagecopyresampled($resampledImage,$image,0,0,0,0,$newWidth,$newHeight,$width,$height);
    
    return $resampledImage;
  }
  
  /*
   * Adds a simple string watermark to the given image resource in the given color.
   */
  // $color = imagecolorallocate($image, R, G, B);
  function AddWatermarkToImage($image, $watermark, $color)
  {
    imagestring($image,3,5,imagesy($image)-20,'Image by HazyDesigns.com',$color);
  }  
  
   function Anchor($strLink,$strText)
   {
      return '<a href="' . $strLink . '" target="newWindow" onclick="window.open(this.href,this.target);">' . $strText . '</a>';
   }
?>