			<footer class="footer" role="contentinfo">
				
				<div id="outer-footer">

				<div id="inner-footer" class="wrap clearfix">



						<div id="footer-column-left" class="fourcol first clearfix">
						
							<div id="broadcecilad" class="ttn-network-banner">
										<a href="http://broadandcecil.temple-news.com/" title="Broad &amp; Cecil"><img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/banners/broadcecil-logo-black.png" alt="broadcecil-logo" /></a>
							</div>
							
							<div id="thecherryad" class="ttn-network-banner" title="The Cherry">
										<a href="http://thecherry.temple-news.com/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/banners/thecherry-logo-black.png" alt="thecherry-logo" /></a>
							</div>
							
														
						</div>



						<div id="footer-column-center" class="fourcol clearfix">
							
							<a href="<?php echo home_url(); ?>" rel="nofollow"><img alt="The Temple News" title="The Temple News Home" src="<?php echo get_template_directory_uri(); ?>/library/images/logo-500-emboss-tr.png" /></a>
							
							<nav id="footer-links-sections" class="footer-links" role="navigation">
								
								<?php zombie_footer_links_sections(); // Adjust using Menus in Wordpress Admin ?>
								
							</nav>
							
							<div class="hoz-rule-third"></div>
							
							<nav id="footer-links-misc" class="footer-links" role="navigation">
								
								<?php zombie_footer_links_misc(); // Adjust using Menus in Wordpress Admin ?>
								
							</nav>
							
							<div class="footer-social-container">
								<div class="footer-social">
								
									<a class="social-icon-large" href="https://www.facebook.com/thetemplenews" title="The Temple News on Facebook"><i class="icon-facebook"></i></a>
									<a class="social-icon-large" href="https://twitter.com/thetemplenews" title="The Temple News on Twitter"><i class="icon-twitter"></i></a>
									<a class="social-icon-large" href="<?php bloginfo('rss2_url'); ?>" title="The Temple News RSS feed"><i class="icon-rss"></i></a>
								
								</div>
							</div>
							
							<nav id="footer-links-meta" class="footer-links" role="navigation">
								
		    					<?php zombie_footer_links_meta(); // Adjust using Menus in Wordpress Admin ?>
								
			                </nav>

							
						</div>



						<div id="footer-column-right" class="fourcol last clearfix">
							
	    					<p class="footer-about">The Temple News has been the paper of record for the Temple University community since it first printed as Temple University Weekly on Sept. 19, 1921. The award-winning student publication, editorially independent of Temple, now publishes every Tuesday and daily online. The Temple News distributes 5,000 printed copies, free of charge, to the university’s primary locations in the Delaware Valley.</p>
	
							<p class="attribution">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.<br />
								Powered by <a href="http://www.wordpress.org/" rel="nofollow">WordPress</a>.<br />
								Built from <a href="http://themble.com/bones/" rel="nofollow">Bones</a>.</p>
						
						</div>


				</div> <!-- end #inner-footer -->
				
				</div> <!-- end #outer-footer -->
				
			</footer> <!-- end footer -->
		
		</div> <!-- end #container -->
		
		<?php wp_footer(); // js scripts are inserted using this function ?>

	</body>

</html> <!-- end page. what a ride! -->