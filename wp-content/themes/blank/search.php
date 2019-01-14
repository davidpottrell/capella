<?php 
/*
 * 	Template Name: Search
*/
get_header(); ?>

<!--Page-->
<div id="page">
	<?php $banner = get_post_meta(8,'meta_box_global_background_image', 'size=banner_image', true);
	$attachment = wp_get_attachment_image_src( $banner, 'banner_image' );
	
	if ( !empty( $attachment ) ) {
		$image = $attachment[0];
	}
	?>
	<div id="banner" class="groups page bg" style="background-image:url(<?=$image; ?>);">
		<div class="container medium clear">
			<div class="col1 padLeft padRight bb clear">
				<div id="caption" class="alignCenter">
					<?php $title = get_post_meta(8, 'meta_box_global_title'); if ( !empty( $title ) ) { ?><h1 class="txtWhite"><?=$title[0] ;?></h1><?php } ?>
					<form role="search" method="get" id="searchform" class="marBottom" action="<?php echo home_url( '/' ); ?>">
						<div><label class="screen-reader-text" for="s"></label>
							<input type="text" value="" name="s" id="s" placeholder="Search by Title or Activity, eg. Pottery">
							<button id="searchsubmit" class="button bgOrange">Search</button>
						</div>
					</form>		
					
					<p class="highlight v1">
						<?php printf( __( '%s', 'shape' ), '<span>Results for: "' . get_search_query() . '"</span>' ); ?>
					</p>

				</div>
			</div>
		</div>
	</div>	
	
	<div id="content" class="bgWhite">
		<div class="container medium padTop padBottom bb">
			<div class="padLeft padRight bb clear">

				<?php if ( have_posts() ) : ?>


				<?php
				$cat = get_cat_name($wp_query->query_vars['cat']);
				$s = $wp_query->query_vars['s'];
				echo $wp_query->found_posts . " results found with '$s'";
				if ($cat != '') {
					echo " in the '$cat' category";
				}
				?>		

				<ul id="listings" class="grid x3 clear">

					<?php while ( have_posts() ) : the_post(); ?>

					<li id="listing_<?php the_ID(); ?>" class="left padAll sml bb">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php if ( has_post_thumbnail() ) { ?>
							<div class="card_thumb"><?php the_post_thumbnail('large_square'); ?><div class="divider" style="background-color:<?php $colour = rwmb_meta( 'meta_box_listings_colour'); if ( !empty( $colour ) ) { echo $colour; } else { echo "#ffc20f"; } ?>"></div></div>
							<?php } else { ?>
							<div class="card_thumb"><img src="<?php bloginfo('template_url');?>/img/placeholder_sq.png"><div class="divider" style="background-color:<?php $colour = rwmb_meta( 'meta_box_listings_colour'); if ( !empty( $colour ) ) { echo $colour; } else { echo "#ffc20f"; } ?>"></div></div>
							<?php } ?>

							<div class="card_meta bb bgWhite">
								<h4><?php the_title(); ?></h4>
								<div id="category">

									<?php
									$term_list = wp_get_post_terms($post->ID, 'listings', array("fields" => "all"));
									foreach ( $term_list as $term ) {
										echo '<a href="' . esc_url( get_term_link( $term ) ) . '" title="' . esc_attr( $term->name ) . '">' . esc_html( $term->name ) . '</a>';
									}
									?>	
								</div>
								<?php $address = rwmb_meta( 'meta_box_listings_location'); ?><?php if ( !empty( $address ) ) { ?><div id="location"><?php echo $address ;?></div><?php } ?>								

							</div>
						</a>
					</li>				

					<?php endwhile; ?>

				</ul>

				<div id="pagination" class="clear">
					<div class="nav_previous left"><?php next_posts_link( 'Previous' ); ?></div>
					<div class="nav_next right"><?php previous_posts_link( 'Next' ); ?></div>
				</div>
				<?php else : ?>
				<p class="alignCenter">
					No results found.
				</p>
				<?php endif; ?>

			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>