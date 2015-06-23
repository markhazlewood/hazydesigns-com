function addYear(layer, startX, startY, year)
{
	var line = new Kinetic.Line(
	{
		points:			[startX, startY, startX, startY-15],
		stroke:			"white",
		strokeWidth:	1
	});
	
	var text = new Kinetic.Text(
	{
		text:		year,
		fontSize:	8,
		fontFamily:	"Helvetica",
		fontStyle:	"italic",
		textFill:	"white",
		x:			startX - 10,
		y:			startY - 30
	});
	
	layer.add(line);
	layer.add(text)
	
	layer.draw();
}
			
function addTimelinePoint(layer, pointX, pointY, text, target, hasPage)
{
	var circle = new Kinetic.Circle(
	{
		x:				pointX,
		y:				pointY,
		radius:			10,
		fill: 
		{
			start: 
			{
				x: 0,
				y: 0,
				radius: 0
			},
			end: 
			{
				x: 0,
				y: 0,
				radius: 10
			},
			colorStops: [0, '#bbbbff', 1, '#5555ff']
	  }					
	});
	
	if (hasPage == false)
	{
		circle.setFill("black");
		circle.setStroke("white");
		circle.setStrokeWidth(2);
	}
	
	var text = new Kinetic.Text(
	{
		text:			text,
		fontSize:		8,
		fontFamily:		"Helvetica",
		textFill:		"white",
		x:				pointX,
		y:				pointY + 20,
		rotationDeg:	45,
		visible:		true
	});
	
	circle.on("mouseover", function()
	{
		if (hasPage == true)
		{
			timelineItemHover(true, circle, text, layer);
		}
	});
	text.on("mouseover", function()
	{
		if (hasPage == true)
		{
			timelineItemHover(true, circle, text, layer);
		}
	});
	
	circle.on("mouseout", function()
	{
		if (hasPage == true)
		{
			timelineItemHover(false, circle, text, layer);
		}
	});
	text.on("mouseout", function()
	{
		if (hasPage == true)
		{
			timelineItemHover(false, circle, text, layer);
		}
	});
	
	circle.on("click", function()
	{
		if (hasPage == true)
		{
			window.location.href = target;
		}
	});
	text.on("click", function()
	{
		if (hasPage == true)
		{
			window.location.href = target;
		}
	});
	
	layer.add(circle);
	layer.add(text);
	
	layer.draw();
}

function timelineItemHover(isHovering, circle, text, layer)
{
	if (isHovering == false)
	{
		document.body.style.cursor = "default";
		text.setFontStyle("normal");
		
		circle.setFill(
		{
			start: 
			{
				x: 0,
				y: 0,
				radius: 0
			},
			end: 
			{
				x: 0,
				y: 0,
				radius: 10
			},
			colorStops: [0, '#bbbbff', 1, '#5555ff']
		});
	}
	else
	{
		document.body.style.cursor = "pointer";
		text.setFontStyle("bold");
		
		circle.setFill(
		{	
			start: 
			{
				x: 0,
				y: 0,
				radius: 0
			},
			end: 
			{
				x: 0,
				y: 0,
				radius: 10
			},
			colorStops: [0, '#5555ff', 1, '#bbbbff']
		});
	}
	layer.draw();
}