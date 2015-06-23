<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang="en"> <!--<![endif]-->

	<head>
		
		<base href="http://www.hazydesigns.com/" />
		<meta charset="utf-8">

		<!-- Use the .htaccess and remove these lines to avoid edge case issues.
				More info: h5bp.com/i/378 -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>HazyDesigns - Mark Hazlewood's Online Portfolio</title>
		<meta name="description" content="">

		<!-- Mobile viewport optimized: h5bp.com/viewport -->
		<meta name="viewport" content="width=device-width">

		<!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->

		<link rel="stylesheet" href="/css/template.css" type="text/css" media="screen, projection" />
		<link rel="stylesheet" type="text/css" href="/css/jquery.galleryview-3.0-dev.css" media="screen" />

		<!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

		<!-- All JavaScript at the bottom, except this Modernizr build.
			Modernizr enables HTML5 elements & feature detects for optimal performance.
			Create your own custom Modernizr build: www.modernizr.com/download/ -->
		<script src="/js/libs/modernizr-2.5.3.min.js"></script>

	</head>

	<body>
		<?php include_once("lib/analyticstracking.php") ?>
	  
		<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6.
			chromium.org/developers/how-tos/chrome-frame-getting-started -->
		<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
	  
		<header>

		</header>

		<a name="top" />
		<div class="content">
			
			<div id="top">
				<div class="rightlinks">
					<a href="#" style="visibility:hidden;">CONTACT</a>
					
					<!-- LinkedIn -->					
					<a href="http://www.linkedin.com/in/mhazlewood">
						<img src="/img/linkedin.png" height="32px" width="32px" />
					</a>
					
					<!-- Twitter -->
					<a href="https://twitter.com/MHazlewood" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false">
						<img src="/img/twitter.png" height="32px" width="32px" />
					</a>
					
				</div>
			</div>  <!-- End 'top' -->

			<div id="header">
				<div class="info">
					<h1>HazyDesigns</h1>
					<h2 style="margin-left:100px;">Academic Portfolio</h2>
				</div>
			</div>  <!-- End 'header' -->

			<div id="subheader">
			
				<div id="menu">
					<div class="custom" >
						<ul>
							<li><a href="/">Home</a></li>
							<li><a href="/gradWork/index.php">Grad Work</a></li>
							<li><a href="/undergradWork/index.php">Undergrad Work</a></li>
							<li><a href="/otherWork/index.php">Other Work</a></li>
							<li><a href="/aboutMe.php">About Me</a></li>
							<li><a href="http://hcizen.wordpress.com" target="_blank">Blog</a></li>
						</ul>
					</div>

				</div>  <!-- End 'menu' -->
			</div>  <!-- End 'subheader' -->

			<div id="main">

				<div class="right_side">

				</div>  <!-- End 'right_side' -->

				<div class="left_side">
					
					<p>
						Thanks for visiting! This page is under construction, until I enter some content in here
						feel free to check me out on LinkedIn.
					</p>
					
					<script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
					<script type="IN/MemberProfile" data-id="http://www.linkedin.com/in/mhazlewood" data-format="inline" data-related="false"></script>
					
					<p class="date">
						<?php echo "Last modified: " . date ("F d Y H:i:s.", getlastmod()); ?>
					</p>

				</div>  <!-- End 'left_side' -->
			</div>  <!-- End 'main' -->

			<div id="footer">
				<div class="info">
					Content and Design by 
					<script type='text/javascript'>
					<!--
						var prefix = '&#109;a' + 'i&#108;' + '&#116;o';
						var path = 'hr' + 'ef' + '=';
						var addy85594 = 'm&#97;rk.h&#97;zl&#101;w&#111;&#111;d' + '&#64;';
						addy85594 = addy85594 + 'h&#97;zyd&#101;s&#105;gns' + '&#46;' + 'c&#111;m';
						var addy_text85594 = 'Mark';
						document.write('<a ' + path + '\'' + prefix + ':' + addy85594 + '\'>');
						document.write(addy_text85594);
						document.write('<\/a>');
					//-->\n
					</script>
					<span style="display: none;">
						This email address is being protected from spambots. You need JavaScript enabled to view it.
					</span>
					<br />
					Image support with much thanks to the <a href="http://spaceforaname.com/galleryview/" target="_blank">GalleryView</a> and <a href="http://leandrovieira.com/projects/jquery/lightbox/" target="_blank">lightBox</a> plugins for <a href="http://jquery.com/" target="_blank">jQuery</a>.
					
				</div>  <!-- End 'info' -->

			</div>  <!-- End 'footer' -->
			
			<br /><br />

		</div>  <!-- End 'content' -->

		<footer>

		</footer>

		<!-- JavaScript at the bottom for fast page loading -->

		<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.2.min.js"><\/script>')</script>

		<!-- scripts concatenated and minified via build script -->
		<script src="js/plugins.js"></script>
		<script src="js/script.js"></script>
		<script src="/js/libs/jquery.timers-1.2.js"></script>
		<script src="/js/libs/jquery.easing-1.3.js"></script>
		<script src="/js/libs/jquery.galleryview-3.0-dev.js"></script>
		<!-- end scripts -->

		<!-- 	Asynchronous Google Analytics snippet. Change UA-XXXXX-X to be your site's ID.
				mathiasbynens.be/notes/async-analytics-snippet -->
		<script>
			var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>
		
		<!-- Activate GalleryView -->
		<script>
			$(function()
			{
				$('#myGallery').galleryView(
				{
					panel_width:		590,
					panel_height:		500,
					enable_overlays:	true,
					frame_gap: 			15,
					pan_images:			true,
					show_filmstrip:		true,
					show_filmstrip_nav:	false,
					enable_slideshow:	false,
					show_captions:		false,
					panel_scale:		"fit"
				});
			});
		</script>
		
	</body>

</html>