<?php 
	$banner = rwmb_meta( 'meta_box_global_background_image', 'size=banner_image' );
	if ( !empty( $banner ) )
	{
		foreach ( $banner as $banner ) {
			$image = $banner['url'];
		}
	}
	elseif ( has_post_thumbnail() )
	{
		$image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'banner_image' );
		$image = $image ['0'];
	} 
?>

<div id="banner" class="bg" style="background-image:url(<?=$image; ?>);">
	<div class="container large clear">
		<div class="col1 padLeft padRight bb clear">
			<div id="caption">
				<?php $title = rwmb_meta( 'meta_box_global_title'); if ( !empty( $title ) ) { ?><h1><?=$title ;?></h1><?php } ?>
				<?php $content = rwmb_meta( 'meta_box_global_content'); if ( !empty( $content ) ) { ?><?=$content ;?><?php } ?>
			</div>
		</div>
	</div>
</div>	