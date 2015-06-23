<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap 101 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	
  </head>
  
  <body id="index" class="home">
	
	<section id="home" data-type="background" data-speed="5">
		<div style="position:fixed;left:10px;top:100px;">
			<button class="homeScroll">Home</button>
		</div>
		
		<article>
			<h1>Mark Hazlewood</h1>
			<p>
				<button id="scrollDown">My work ...</button>
			</p>
			<p>
				<button id="scrollRight">More about me ...</button>
			</p>
		</article>
	</section>
	
	<section id="workTop" data-type="" data-speed="5">
		<div style="position:fixed;left:10px;top:100px;">
			<button class="homeScroll">Home</button>
		</div>
	</section>
	
	<section id="about" data-type="background" data-speed="10">
		<div style="position:fixed;left:10px;top:100px;">
			<button class="homeScroll">Home</button>
		</div>
		
		<article>
			Now we're on the right
		</article>
	</section>
	
	
	<!-- JavaScript plugins (requires jQuery) -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>

    <!-- Enable responsive features in IE8 with Respond.js (https://github.com/scottjehl/Respond) -->
    <script src="js/respond.min.js"></script>
	
	<!-- Parallax scrolling script -->
	<script src="js/pl.js"></script>
	
	<script>
	
		$("#scrollDown").click(function()
		{
			$("html,body").animate({scrollTop: $("#workTop").offset().top}, {duration: 1000, queue: false});
			
			$("html,body").animate({scrollLeft: $("#workTop").offset().left}, {duration: 1000, queue: false});
		});
		
		$(".homeScroll").click(function()
		{
			$("html,body").animate({scrollTop: $("#home").offset().top},  {duration: 1000, queue: false});
			$("html,body").animate({scrollLeft: $("#home").offset().left},  {duration: 1000, queue: false});
		});
		
		$("#scrollRight").click(function()
		{	
			$("html,body").animate({scrollTop: $("#about").offset().top},  {duration: 1000, queue: false});
			$("html,body").animate({scrollLeft: $("#about").offset().left},  {duration: 1000, queue: false});
		});
		
	</script>
	
  </body>
</html>