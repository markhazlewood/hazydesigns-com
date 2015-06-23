<?php
	include '../lib/funcs.php';
	
	startPage("HazyDesigns - Other Work");
	
	echoMainContent('
						<p>
							Here are just some other projects of note that I\'ve worked on
							that didn\'t quite fit into the academic sections.
						</p>
						<br />
						<h3>Keep True Design - Main Site</h3>
						<p>
							<a href="http://www.keeptruedesign.com/" target="_blank">www.keeptruedesign.com</a>
						</p>
						<p>
							Keep True Design is a small business I recently began which
							offers design and user experience consulting services. I have
							a couple clients right now and do work for them on a part-time 
							basis as needed.
						</p>
						<p>
							But this isn\'t an ad! Of note on the main site is the use of
							a <strong>responsive design</strong>. This basically
							means the layout and content of the site are designed to fluidly
							and seamlessly transition across various devices and screen
							resolutions. On Keep True\'s main page, this simply means 
							transitioning between 2-column and 1-column layouts dynamically. 
							Check out the gallery below to see what I mean.
						</p>
						<p>
							To accomplish this under the hood I\'m using an amazing framework
							called <a href="http://unsemantic.com/" target="_blank">Unsemantic</a>
							(created by the same guys that did the <a href="http://960.gs/" target="_blank">960 Grid System</a>
							which I\'ve also used). It uses a combination of CSS and Javascript
							(for media, device, and window size recognition) to produce
							fluid responsive layouts.
						</p>
						
						<p>
							<ul id="myGallery">
								<li>
									<img 	src="/otherWork/img/responsive_large.png" 
											title="Responsive Layout - Large" 
											data-description="This is the \'large\' layout, a 2-column grid. This layout will 
												be used when device and screen resolution allow the window to be expanded 
												greater than 960 pixels wide." />
								</li>
								<li>
									<img 	src="/otherWork/img/responsive_small.png" 
											title="Responsive Layout - Large" 
											data-description="This is the \'smaller\' layout, a 1-column grid. This will 
																be used when the screen must be smaller." />
								</li>
								<li>
									<img 	src="/otherWork/img/KT_FrontPage.png" 
											title="Keep True Layout - Wireframe" 
											data-description="Initial wireframe mockups for the site\'s layout. No 
																content is entered, only grid positions blocked out." />
								</li>
								<li>
									<img 	src="/otherWork/img/00_KT_FrontPage.png" 
											title="Keep True Layout - Wireframe With Content" 
											data-description="Similar to the previous wireframe, but this is the next
																stage of a design showing some placeholder content." />
								</li>
								
							</ul>
						</p>
						
						<hr /><br />', 
						
						'');
						
	echoFooterContent();
	
	addScripts();
	activateGalleryView('#myGallery', 590, 500);
	
	endPage();
?>