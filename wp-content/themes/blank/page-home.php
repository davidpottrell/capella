<?php 
/*
 * 	Template Name: Home
*/
get_header(); ?>

<!--Page-->
<div id="page">
	<div id="content" class="bgWhite borderBottom">
		<div class="container medium padTop bb">
			<div class="col1 padLeft padRight bb clear">
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