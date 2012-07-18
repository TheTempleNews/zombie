<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">
					
						<div id="media-container" class="section-container first last clearfix" role="featured">
							
							<!-- FEATURED CONTENT -->
							<section id="section-box-featured" class="section-box sixcol first">

								<h2 class="section-box-title">Featured Content</h2>

									<!-- featured content stuff goes here -->
									<?php ttx_slider(); ?>

							</section> <!-- end #section-box-featured -->
							
							<!-- FEATURED MULTIMEDIA -->
							<section id="section-box-featured-multimedia" class="section-box threecol">
								<h2 class="section-box-title">Featured Multimedia</h2>
							
									<?php ttn_display_featured_media('multimedia') ?>
							
							</section> <!-- end #section-box-multimedia -->
					
							<!-- PRINT EDITION -->
							<section id="section-box-print" class="section-box threecol last">
								<h2 class="section-box-title">Print Edition</h2>
							
									<!-- print edition stuff goes here -->
							
							</section> <!-- end #section-box-print -->

						</div> <!-- end #media-container -->


						<div class="sixcol first clearfix">
						
							<!-- NEWS SECTION -->
							<section id="section-box-news" class="section-container section-box twelvecol first last clearfix">
									
									<?php the_zombie_loop(news); ?>
									
									<div id="broadcecilad" class="blog-link-banner">
										<a><!-- put the banner image for broad and cecil here --></a>
									</div>
									
							</section> <!-- end #section-box-news -->
							
							<!-- LIVING SECTION -->
						<section id="section-box-living" class="section-container section-box twelvecol first last clearfix">
							
							<?php the_zombie_loop(living); ?>
							
						</section> <!-- end #section-box-living -->
							
							
						
						</div> <!-- news and stff container -->


						<div class="sixcol last clearfix">
						
							<!-- SPORTS SECTION -->
							<section id="section-box-sports" class="section-container section-box twelvecol first last clearfix">
								
									<?php the_zombie_loop(sports); ?>
									
									<div id="sportsblogad" class="blog-link-banner">
										<a><!-- put the banner image for sports blog here --></a>
									</div>
									
							</section> <!-- end #section-box-sports -->
	
							<!-- DESKTOP-ONLY ADS -->
							<?php if ( !is_handheld() ) : ?>
							<div class="ad-container sixcol last clearfix">
								<div class="ad adsense rectangle-ad sixcol first">
									
									<!-- MediumRectangle2 -->
									<div style="width: 300px; height: 250px;" id="div-gpt-ad-1334976460364-2">
									<script type="text/javascript">
									googletag.cmd.push(function() { googletag.display('div-gpt-ad-1334976460364-2'); });
									</script>
									<iframe width="300" scrolling="no" height="250" frameborder="0" id="google_ads_iframe_/4602070/MediumRectangle2_0" name="google_ads_iframe_/4602070/MediumRectangle2_0" marginwidth="0" marginheight="0" style="border: 0px none;"></iframe></div>		<ha style="text-align:center;color:red;size:4px;">ADVERTISEMENT</ha>	
	
								</div>
								
								<div class="ad rectangle-ad sixcol last">
									<!-- put a dumb ad here -->&nbsp;
								</div>
							</div>
							<?php endif; ?>
							
							<!-- A&E SECTION -->
							<section id="section-box-ae" class="section-container section-box sixcol first clearfix">
								
								<?php the_zombie_loop(ae); ?>
								
							</section> <!-- end #section-box-ae -->


						</div> <!-- sports and stuff -->

						



						


						<!-- DESKTOP-ONLY ADS -->
						<?php if ( !is_handheld() ) : ?>
						<div class="advert-container sixcol last clearfix">
							<div class="advert banner-ad twelvecol first last">
								<!-- put a dumb ad here -->
							</div>
						</div>

						<div class="advert-container sixcol first clearfix">
							<div class="advert banner-ad twelvecol first last">
								<!-- put a dumb ad here -->
							</div>
						</div>
						<?php endif; ?>



						<!-- OPINION SECTION -->
						<section id="section-box-opinion" class="section-container section-box twelvecol first last clearfix">
							
							<?php the_zombie_loop(opinion); ?>
							
						</section> <!-- end #section-box-opinion -->



						<!-- MULTIMEDIA SECTION -->
						<section id="section-box-multimedia" class="section-box section-container twelvecol first last clearfix">
							<h2 class="section-box-title"><a href="<?php get_site_url(); ?>/multimedia/">Multimedia</a></h2>
						
								<!-- multimedia stuff goes here -->
						
						</section> <!-- end #section-box-multimedia -->
						
						
						
						<!-- PRINT EDITION CAROUSEL -->
						<section id="section-box-print-carousel" class="clearfix section-box section-container first last clearfix">
							<h2 class="section-box-title">Print Edition</h2>
						
								<div id="carousel" class="es-carousel-wrapper">
									<div class="es-carousel">
										<ul>
											<li>
												<a href="#">
													<img src="images/medium/1.jpg" alt="image01" />
												</a>
											</li>
										</ul>
									</div>
								</div> <!-- end elastislide carousel -->
						
						</section> <!-- end #section-box-print-carousel -->
				
				
				
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
