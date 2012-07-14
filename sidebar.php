				<div id="sidebar1" class="sidebar fourcol last clearfix" role="complementary">

					<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar1' ); ?>

					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->
						
						<div class="alert help">
							<p>Please activate some Widgets.</p>
						</div>

					<?php endif; ?>

				</div>
				
				<!-- DESKTOP-ONLY ADS -->
				<?php if ( !is_handheld() ) : ?>
				<div class="ad-container fourcol last clearfix">
					<div class="ad rectangle-ad twelvecol first last">
						<!-- put a dumb ad here -->&nbsp;
					</div>
				</div>
				<?php endif; ?>
				
				<div id="sidebar2" class="sidebar fourcol last clearfix" role="complementary">

					<?php if ( is_active_sidebar( 'sidebar2' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar2' ); ?>

					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->
						
						<div class="alert help">
							<p>Please activate some Widgets.</p>
						</div>

					<?php endif; ?>

				</div>