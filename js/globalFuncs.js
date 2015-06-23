var imagesLoaded = false;
function Init()
{	
	PreloadImages();
}
function PreloadImages()
{
    if (document.images && !imagesLoaded)
    {	
		preload_image_object = new Image();      	
		// set image url      	
		image_url = new Array();      	
		image_url[0] = "http://www.hazydesigns.com/images/USE_THIS.png";      	
		image_url[1] = "http://www.hazydesigns.com/images/uc_new17.gif";      	
		image_url[2] = "http://www.hazydesigns.com/images/tab_bg.gif";      	
		image_url[3] = "http://www.hazydesigns.com/images/loading.gif";		
		image_url[4] = "http://www.hazydesigns.com/images/banner.jpg";      	
		image_url[5] = "http://www.hazydesigns.com/images/blogImg.jpg";      	
		image_url[6] = "http://www.hazydesigns.com/images/slowImg.jpg";	
		image_url[7] = "http://www.hazydesigns.com/images/ajax-loader.gif";  	
		
		var i = 0;       	
		for (i = 0; i <= 7; i++) 		
		{			
			preload_image_object.src = image_url[i];
		}		
		imagesLoaded = true;
    }
}

function trim(str) 
{
	var whitespace = ' \n\r\t\f\x0b\xa0\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200a\u200b\u2028\u2029\u3000';
	for (var i = 0; i < str.length; i++) 
	{
		if (whitespace.indexOf(str.charAt(i)) === -1) 
		{
			str = str.substring(i);
			break;
		}
	}
	for (i = str.length - 1; i >= 0; i--) 
	{
		if (whitespace.indexOf(str.charAt(i)) === -1) 
		{
			str = str.substring(0, i + 1);
			break;
		}
	}
	return whitespace.indexOf(str.charAt(0)) === -1 ? str : '';
}
			
function IsValidCurrency(str)
{
	bIsValidCurrency = RegExp(/^\$?[0-9\,]+(\.\d{2})?$/).test(String(str).replace(/^\s+|\s+$/g, ""));
	return bIsValidCurrency;
}