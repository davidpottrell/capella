<?php $args = array(
	'post_type'      => 'page',
	'post_parent'    => 8,
	'order'          => 'ASC',
	'orderby'        => 'title'
);

$parent = new WP_Query( $args );
if ( $parent->have_posts() ) : ?>

<?php $pages = get_pages('child_of=8');
$count = count( $pages ); ?>

<ul class="grid padTop sml padBottom x<?=$count;?> clear">

	<?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

	<li class="item padAll sml <?php the_ID(); ?> bb left">
		<a href="<?php the_permalink(); ?>">
			<div class="thumb">
				<?php the_post_thumbnail('large_landscape_rectangle');?>
			</div>
			<div class="meta bb">
				<h4><?php the_title(); ?></h4>
			</div>
		</a>
	</li>
	<?php endwhile; ?>
</ul>
<?php endif; wp_reset_query(); ?>