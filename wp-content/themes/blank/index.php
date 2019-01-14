<?php 
/*
 * 	Template Name: Blog
*/
get_header(); ?>

<!--Page-->
<div id="page">
		
	<div id="banner" class="blog page bg" style="background-image:url(https://davidpottrell.co.uk/library/~projects/hedgehog/wp-content/uploads/2018/11/animal-animal-world-autumn-206862-1200x575.jpg);">
		<div class="container medium clear">
			<div class="col1 padLeft padRight bb clear">
				<div id="caption">
					<h1 class="txtWhite"><span>Latest News</span></h1>
					<p>
						Find all of our latest news, events and updates right here
					</p>
				</div>
			</div>
		</div>
	</div>		
	
	<div id="content" class="bgWhite">
		<div class="container medium padTop padBottom bb">
			<div class="padLeft padRight bb clear">

				<div id="categories" class="marBottom alignCenter">
					<?php $categories = get_categories();
					foreach($categories as $category) {
						echo '<div class="cat"><a class="button bgOrange" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></div>';
					}
					?>
				</div>

				<?php if ( have_posts() ) : ?>

				<ul id="blog" class="grid">

					<?php while ( have_posts() ) : the_post(); ?>

					<li class="clear wow fadeInUp" data-wow-duration="1s" data-wow-offset="10">
						
						<div class="thumb oneThird left">
							<a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
								<?php if ( has_post_thumbnail() ) { ?>
								<?php the_post_thumbnail('large_landscape_rectangle'); ?>
								<?php } else { ?>
								<img src="<?php bloginfo('template_url');?>/images/placeholder.png">
								<?php } ?>
							</a>
							<div class="meta col1 clear">
								<div class="category"><?php echo the_category();?></div><div class="post_date"><?php the_time('d F, Y') ?></div>
							</div>
						</div>
						
						<div class="meta twoThirds padLeft right bb">
							<h2>
								<a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
									<?php the_title(); ?>
								</a>
							</h2>
							<p><?php echo excerpt(45);?></p>						
						</div>					
					</li>

					<?php endwhile; ?>

				</ul>

				<div id="pagination" class="marTop clear">
					<div class="left"><?php echo get_next_posts_link('Older', $latest_posts->max_num_pages);?></div>
					<div class="right"><?php echo get_previous_posts_link('Newer', $latest_posts->max_num_pages);?></div>
				</div>				

				<?php endif; ?>

			</div>
		</div>
	</div>	
</div>
			
<?php get_footer(); ?>