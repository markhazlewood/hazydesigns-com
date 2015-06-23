$(document).ready(function()
{
	$('section[data-type="background"]').each(function()
	{
		var $bgObj = $(this);
		
		$(window).scroll(function()
		{
			var yPos = -($(window).scrollTop() / $bgObj.data('speed'));
			var xPos = -($(window).scrollLeft() / $bgObj.data('speed'));
			
			// Put together our final background position
			var coords = xPos + 'px ' + yPos + 'px';
			
			// Move the background
			$bgObj.css({ backgroundPosition: coords});
		});
	});
});