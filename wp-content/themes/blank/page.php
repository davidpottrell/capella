<?php 
/*
 * 	Template Name: Generic
*/
get_header(); ?>

<!--Page-->
<div id="page">
	<?php $banner = rwmb_meta( 'meta_box_global_background_image', 'size=banner_image' );
	if ( !empty( $banner ) ) {
		foreach ( $banner as $banner ) {
			$image = $banner['url'];
		}
	}
	elseif ( has_post_thumbnail() ) {
		$image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'banner_image' );
		$image = $image ['0'];
	} ?>

	<div id="banner" class="page bg" style="background-image:url(<?=$image; ?>);">
		<div class="container medium clear">
			<div class="col1 padLeft padRight bb clear">
				<div id="caption">
					<?php $title = rwmb_meta( 'meta_box_global_title'); if ( !empty( $title ) ) { ?><h1 class="txtWhite"><span><?=$title ;?></span></h1><?php } ?>
					<?php $content = rwmb_meta( 'meta_box_global_content'); if ( !empty( $content ) ) { ?><?=$content ;?><?php } ?>
				</div>
			</div>
		</div>
	</div>	
	
	<div id="content" class="bgWhite">
		<div class="container small padTop padBottom bb">
			<div class="padLeft padRight bb clear">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
	
<?php get_footer(); ?>