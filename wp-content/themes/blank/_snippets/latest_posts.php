<?php $args = array('posts_per_page' => 3,);
$latest_posts = new WP_Query( $args ); 
if ( $latest_posts->have_posts() ) { ?>

<ul id="latest_blog" class="grid x3 marTop clear">
	<?php while ( $latest_posts->have_posts() ) {
	$latest_posts->the_post(); ?>

	<li class="item left clear">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="padAll sml bb">

			<div class="thumb col1">
				<?php the_post_thumbnail('large_landscape_rectangle');?>
			</div>
			<div class="meta col1 marTop">
				<h4 class="txtBlack"><?php the_title(); ?></h4>
				<div class="post_date txtBlack">
					<?php the_time('d F, Y') ?>
				</div>
			</div>

		</a>
	</li>
	<?php } ?>
</ul>
<?php } ?>
<?php wp_reset_postdata(); ?>