<?php
	include 'lib/funcs.php';
	
	startPage("HazyDesigns - Mark Hazlewood's Online Portfolio");
	
	echoMainContent('	<h3>Capstone Project In Progress</h3>
						<p>
							I haven\'t had a chance to update this site with progress from
							my capstone. I am working on a project involving <strong>gaze-based steering of a 
							3D virtual globe</strong>. I\'m posting video updates to my YouTube channel, so 
							<a href="https://www.youtube.com/watch?v=mCg-usavp8I" target="_blank">check it out</a>!
						</p>
						
						<h2>Welcome</h2>
						<hr />
						<p>
							This is the personal portfolio site for Mark Hazlewood. If you\'re reading this you 
							probably got here via a link I explicitly provided  (through LinkedIn, my resume, etc.). 
							Welcome!
						</p>
						
						<p>
							A bit about me: I received my undergraduate degree from <a href="http://www.rit.edu" target="_blank">RIT</a> in <strong>Information Technology</strong> 
							with concentrations in <strong>multimedia development</strong> and <strong>game programming</strong>, and a minor in <strong>psychology</strong>.  
							I am currently working on a Master\'s degree in <strong>Human-Computer Interaction</strong>, also through RIT.</p>
						</p>
						
						<p>					
							This portfolio is something of a perpetual work in progress. Please browse around, check out the 
							highlights and other links below.
							Here are the pages that have most recently been updated:
							
							<ul>
								<li><a href="/gradWork/geux.php">Grad Work - Graphical Elements of the User Experience</a></li>
								<li><a href="/otherWork/index.php">Other Work - Keep True Design (responsive layout)</a></li>
								<li><a href="/gradWork/index.php">Grad Work - Home (interactive timeline)</a></li>
								<li><a href="/gradWork/usabilityEngineering.php">Grad Work - Usability Engineering</a></li>
							</ul>
						</p>
						<br />
						<h2>Quick Highlights</h2>
						<hr />
						<p>
							<ul id="myGallery">
								<li>
									<img src="/otherWork/img/responsive_small.png" title="Keep True Design - Responsive Layout" data-description="An example of a simple small business site I designed which uses a responsive grid layout (<a href=\'http://unsemantic.com/\' target=\'_blank\'>Unsemantic</a>)." />
								</li>
								<li>
									<img src="/img/gradWork/geux/AE_screenshot.png" title="Infographic Video In Production" data-description="A view of the production process and some of the content of my infographic video. This is a screenshot from After Effects showing the layers of one comp." />
								</li>
								<li>
									<img src="/img/gradWork/usabilityEngineering/candyTrackerPrototype_thumb.jpg" title="Grad Work - Usability Engineering" data-description="The prototype I built for the CandyTracker project (see Grad Work - Usability Engineering). This is a mobile augmented reality device meant to be used by children. We won the \'Best Prototype\' award at the final design competition for the course. This pic is just showing Google Maps, but the actual software running for our service was the Layar Reality Browser." />
								</li>
								<li>
									<img src="/img/gradWork/usabilityEngineering/garminPOI_3_small.png" title="Grad Work - Usability Engineering" data-description="Part of an assignment to sketch the design and interaction flows of an existing product or service (see Grad Work - Usability Engineering). This is a frame for the sketch of the Garmin Nuvi 265w interface. I used Balsamiq Mockups to produce these and there were 6 frames total." />
								</li>
								<li>
									<img src="/img/gradWork/geux/logo_sketches.jpg" title="Themed Logo Sketches" data-description="Some quick sketches on the \'Picture the Impossible\' logo project. We were tasked with coming up with as many sketches as possible in a short amount of time." />
								</li>
								<li>
									<img src="/img/gradWork/ucd/ContextualDesign_ConsolidatedPhysicalModel.png" title="Grad Work - User Centered Design" data-description="Diagram representing the physical space for a redesigned coffee shop ordering experience. Physical models are one of the five primary models prescribed in the formal Contextual Design process." />
								</li>
								<li>
									<img src="/img/gradWork/usabilityTesting/utLab_frontRoom_med.png" title="Grad Work - Usability Testing" data-description="Usability testing lab at RIT. Used to conduct usability testing of Carnival Cruise Lines web-based cruise booking." />
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