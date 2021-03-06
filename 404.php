		<?php get_header(); ?>

		<?php $detect = new Mobile_Detect(); ?>

				<div id="title-images-wrapper">
					<div id="title-outside">
						<div id="title-inside" class="inside">
							<header class="title-header">
								<h2 class="post-title">
									<?php _e('404','scapegoat'); ?>
								</h2>
							</header>
						</div>
					</div>
					<figure class="title-image parallax">
						<?php if(!$detect->isMobile() || $detect->isTablet()) : ?>
							<a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/404-large.jpg" alt="" /></a>
						<?php else : ?>
							<a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/404-small.jpg" alt="" /></a>
						<?php endif; ?>
					</figure>
				</div>
			
				<div id="wrapper-outside">
					<div id="wrapper-inside" class="inside">
		
						<div id="container">
				
							<div id="content" class="full" role="main">
								
								<section id="post-404" class="post-404 post type-post status-publish format-standard" role="article">

									<article class="article">
										<p><?php _e('All that glittered was not gold. But it was still nice.','scapegoat'); ?></p>
										<p><?php _e('<strong>Krasse Herde</strong> – <a target="_blank" href="http://kaklotter.de/" rel="nofollow">Fred Bordfeld</a>, <a target="_blank" href="http://zombietetris.de/" rel="nofollow">Lotte Steenbrink</a>, <a target="_blank" href="http://bendebiel.com/" rel="nofollow">Ben de Biel</a>, <a target="_blank" href="http://zutrinken.com/" rel="nofollow">Peter Amende</a>.','scapegoat'); ?></p>
									</article>
									
								</section>
								
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						</div>
		
					</div><!-- wrapper-inside -->
				</div><!-- wrapper-outside -->

			<div class="clear"></div>
		</div><!-- container -->

		<?php get_footer(); ?>