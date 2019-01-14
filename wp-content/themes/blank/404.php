<?php 
/*
 * 	Template Name: Error
*/
get_header(); ?>

<!--Page-->
<div id="page">
	
	<div id="banner" class="blog page">
		<div class="container medium clear">
			<div class="col1 padLeft padRight bb clear">
				<div id="caption" class="alignCenter">
					<h1 class="txtWhite"><span>Page Not Found</span></h1>
					<h2 class="noLine">Oops, the page you're looking for does not exist.</h2>
					<p>You may want to head back to the homepage.<br>
					If you think something is broken, please report the problem.</p>
					<a class="marTop orange button" href="<?php echo get_page_link(2);?>">Return home</a> <a class="marTop orange button" href="mailto:ridgewood@live.co.uk">Report the problem</a>									
				</div>
			</div>
		</div>
	</div>		

</div>
			
<?php get_footer(); ?>