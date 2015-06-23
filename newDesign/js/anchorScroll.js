function scrollToAnchor(anchorName)
{
	$('html,body').animate({scrollTop: $(anchorName).offset.top}, 1000);
}