		<?php get_header(); ?>
		
		<?php $detect = new Mobile_Detect(); /* Mobiel Detect */ ?>	
		<?php $options = get_option('scapegoat_theme_options'); /* load the Theme Options */ ?>

		<div id="title-outside">
			<div id="title-inside" class="inside">
				<div class="content<?php if (!is_active_sidebar('Main-Sidebar')) : ?> nosidebar<?php endif; ?>">
					<header class="title-header">
						<h2 class="post-title">
							<?php if (is_category()) : ?>
								<i class="fa fa-folder-open"></i>
								<span class="label"><?php _e('Category','scapegoat'); ?></span>
								<span class="value"><?php single_cat_title(); ?></span>
							<?php elseif (is_tag()) : ?>
								<i class="fa fa-tag"></i>
								<span class="label"><?php _e('Tag','scapegoat'); ?></span>
								<span class="value"><?php single_tag_title(); ?></span>
							<?php elseif (is_author()) : ?>
								<i class="fa fa-user"></i>
								<span class="label"><?php _e('Author','scapegoat'); ?></span>
								<span class="value"><?php
									$userInfo = get_user_by('slug', get_query_var('author_name'));
									echo $userInfo->display_name;
								?></span>
							<?php elseif (is_day()) : ?>
								<i class="fa fa-calendar"></i>
								<span class="label"><?php _e('Day','scapegoat'); ?></span>
								<span class="value"><?php the_time('j. F Y'); ?></span>
							<?php elseif (is_month()) : ?>
								<i class="fa fa-calendar"></i>
								<span class="label"><?php _e('Month','scapegoat'); ?></span>
								<span class="value"><?php the_time('F Y'); ?></span>
							<?php elseif (is_year()) : ?>
								<i class="fa fa-calendar"></i>
								<span class="label"><?php _e('Year','scapegoat'); ?></span>
								<span class="value"><?php the_time('Y'); ?></span>
							<?php else : ?>
								<span class="value"><?php _e('Archive','scapegoat'); ?></span>
							<?php endif; ?>
						</h2>
						<?php if (is_category() && category_description()) : ?>
							<aside class="post-description">
								<?php echo category_description(); ?>
							</aside>
						<?php elseif (is_author()) : ?>
							<aside class="post-description">
								<?php $userInfo = get_user_by('slug', get_query_var('author_name')); ?>
								<?php if($userInfo->twitter) : ?>
								<span class="author-twitter">
									<span class="label">
										<i class="fa fa-twitter"></i>
										<?php _e('Twitter: ','scapegoat') ?>
									</span>
									<span class="value">
										<a target="_blank" href="https://twitter.com/<?php echo $userInfo->twitter; ?>">@<?php echo $userInfo->twitter; ?></a>
									</span>
								</span>
								<?php endif; ?>
				
								<?php if($userInfo->wiki) : ?>
								<span class="author-wiki">
									<span class="label">
										<i class="fa fa-book"></i>
										<?php _e('Wiki: ','scapegoat') ?>
									</span>
									<span class="value">
										<a target="_blank" href="https://wiki.piratenpartei.de/Benutzer:<?php echo $userInfo->wiki; ?>"><?php echo $userInfo->wiki; ?></a>
									</span>
								</span>
								<?php endif; ?>
								
								<?php if($userInfo->user_url) : ?>
								<span class="author-website">
									<span class="label">
										<i class="fa fa-globe"></i>
										<?php _e('Website: ','scapegoat') ?>
									</span>
									<span class="value">
										<a target="_blank" href="<?php echo $userInfo->user_url; ?>"><?php echo $userInfo->user_url; ?></a>
									</span>
								</span>
								<?php endif; ?>
								<?php if($userInfo->description) : ?>
								<span class="author-biography">
									<!--<span class="label">
										<?php _e('Biography: ','scapegoat') ?>
									</span>-->
									<span class="value">
										<?php echo $userInfo->description; ?>
									</span>
								</span>
								<?php endif; ?>
								<div class="clear"></div>
							</aside>		
						<?php endif; ?>
					</header>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		
		<div id="wrapper-outside">
			<div id="wrapper-inside" class="inside">

		<div id="container">

			<div id="content" class="content<?php if (!is_active_sidebar('Main-Sidebar')) : ?> nosidebar<?php endif; ?>" role="main">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<section id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
				<header class="header">
					<h2 class="post-title">
						<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
						<?php edit_post_link(__('Edit','scapegoat'),'<span class="edit-link">','</span>'); ?>
					</h2>
					<aside class="info post-meta">
						<span class="post-date">
							<i class="fa fa-calendar"></i>
							<?php the_time('j.m.y'); ?>
						</span>
						<span class="post-categories">
							<i class="fa fa-folder-open"></i>
							<?php _e('Category: ','scapegoat'); ?>
							<?php the_category(', '); ?>
						</span>
					</aside>
					
					<?php if(get_post_meta($post->ID, 'video', true) && $options['custom-excerpt']) : ?>
						<figure class="post-video">
							<?php echo get_post_meta($post->ID, 'video', true); ?>
						</figure>
					<?php elseif(has_post_thumbnail()) : ?>
						<?php if(!$detect->isMobile() || $detect->isTablet()) : ?>
							<figure class="post-image">
								<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">								
									<?php the_post_thumbnail('featured-medium'); ?>
								</a>
								<?php if(get_post(get_post_thumbnail_id())->post_excerpt) : ?>
									<span class="post-image-caption">
										<?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?>
									</span>
								<?php endif; ?>
							</figure>
						<?php else : ?>
							<figure class="post-image post-image-mobile">
								<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">								
									<?php the_post_thumbnail('featured-small'); ?>
								</a>
								<?php if(get_post(get_post_thumbnail_id())->post_excerpt) : ?>
									<span class="post-image-caption">
										<?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?>
									</span>
								<?php endif; ?>
							</figure>
						<?php endif; ?>
					<?php endif; ?>
				</header>

				<article class="article">
					<?php if(!$options['custom-excerpt']) : ?>
						<?php the_content(); ?>
					<?php else : ?>
						<?php the_excerpt(); ?>
						<a href="<?php the_permalink(); ?>" class="post-more"><?php _e('more','scapegoat'); ?> &#x9b;</a>
					<?php endif; ?>
					<div class="clear"></div>
				</article>				

				<footer class="footer post-meta">
					<span class="post-tags">
						<?php the_tags(__('<i class="fa fa-tag"></i> Tags: ','scapegoat'),', ',''); ?>
					</span>
				</footer>
				
			</section>
			
			<?php endwhile; ?>
			
				<nav id="pagination">
					<h2 id="pagination-title" class="visuallyhidden"><?php _e('Article Navigation','scapegoat'); ?></h2>
					<?php if( function_exists('wp_pagination_navi') ) : ?>
						<?php wp_pagination_navi(); ?>
					<?php else : ?>
						<div class="alignleft"><?php previous_posts_link('&laquo; prev', 0); ?></div>
						<div class="alignright"><?php next_posts_link('next &raquo;', 0) ?></div>
					<?php endif; ?>
				</nav>

			<?php endif; ?>
			</div>
			
			<?php get_sidebar(); ?>
			<div class="clear"></div>
		</div>
		
			</div><!-- wrapper-inside -->
		</div><!-- wrapper-outside -->

		<?php get_footer(); ?>