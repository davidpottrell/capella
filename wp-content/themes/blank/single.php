<?php 
/*
 * 	Template Name: Single
*/
get_header(); ?>

<!--Page-->
<div id="page">
	<div id="content" class="bgWhite">
		<div class="container padTop padBottom large bb">
			<div class="col1 padLeft padRight sml bb clear">
				<div class="twoThirds left padRight bb">
					
						<h1><span><?php the_title(); ?></span></h1>
						<ul id="post_meta" class="clear">
							<li class="post-date"><?php the_time('d F, Y') ?></li>
							<li class="category"><?php $categories = get_the_category(); foreach($categories as $category) { $cat_name = $category->name; if($cat_name != 'featured') echo '<a href="'.get_category_link($category->term_id).'">'.$cat_name . '</a> '; } ?></li>
							<li class="read-time"><?php echo reading_time();?> reading time <em>(ish)</em></li>
							<li class="word-count"><?php echo word_count();?> words</li>
						</ul>
					
						<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
						<?php endwhile; ?>
						<?php endif; ?>
					
				<hr>

				<div id="shareBtn-container">
					<a class="shareBtn shareBtn-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" title="Share on Facebook">
						<span class="shareBtn-icon"><i class="fab fa-facebook"></i></span>
						<span class="shareBtn-text-sr">Facebook</span>
					</a>
					
					<a class="shareBtn shareBtn-twitter" href="https://twitter.com/share?url=<?php the_permalink();?>&text=<?php the_title();?>" title="Share on Twitter">
						<span class="shareBtn-icon"><i class="fab fa-twitter"></i></span>
						<span class="shareBtn-text-sr">Twitter</span>
					</a>

					<a class="shareBtn shareBtn-googleplus" href="https://plus.google.com/share?url=<?php the_permalink();?>"  title="Share on Google+">
						<span class="shareBtn-icon"><i class="fab fa-google-plus"></i></span>
						<span class="shareBtn-text-sr">Google+</span>
					</a>

					<a class="shareBtn shareBtn-reddit" href="http://www.reddit.com/submit?url=<?php the_permalink();?>" title="Share on Reddit">
						<span class="shareBtn-icon"><i class="fab fa-reddit"></i></span>
						<span class="shareBtn-text-sr">Reddit</span>
					</a>

					<a class="shareBtn shareBtn-linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>" title="Share on LinkedIn">
						<span class="shareBtn-icon"><i class="fab fa-linkedin"></i></span>
						<span class="shareBtn-text-sr">LinkedIn</span>
					</a>

					<a class="shareBtn shareBtn-email" href="mailto:?subject=<?php the_title();?>&body=<?php the_permalink();?>" title="Share via Email">
						<span class="shareBtn-icon"><i class="fas fa-envelope"></i></span>
						<span class="shareBtn-text-sr">Email</span>
					</a>
				</div>
					
				</div>
				<div id="sidebar" class="oneThird right padLeft bb">
					<?php get_sidebar('sidebar-menu'); ?>
					
					<div class="block padAll bb clear">
					<h3>Latest News</h3>
					<?php $orig_post = $post;
					global $post;
				
					$args = array(
					'post_type' 		=> array('post'),
					'posts_per_page'	=> 3
					);

					$my_query = new WP_Query($args);
					if( $my_query->have_posts() ) { ?>
					
					<ul class="grid x1 clear">
						<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
							<li class="left clear">
								<div class="thumb oneThird left">
									<?php if ( has_post_thumbnail() ) { ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('small_square'); ?></a>
									<?php } else { ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php bloginfo('template_url');?>/images/placeholder.png"></a>
									<?php } ?>
								</div>
								<div class="twoThirds right">
									<h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
									<div class="post_date"><?php the_time('d F, Y') ?></div>
								</div>
							</li>
						<?php endwhile; } ?>
					</ul>
					<?php wp_reset_query(); ?>
				</div>					
					
				</div>
				
			</div>
		</div>
	</div>
	
</div>
	
<?php get_footer(); ?>