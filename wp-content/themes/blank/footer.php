<footer>
	<div class="container full clear">
		<div class="col1 bb clear">
						
			<div class="col3 left bb">
				<div id="footer_logo" class="txtWhite padTop padBottom padLeft padRight">
				<?php if ( is_active_sidebar( 'footer-one' ) ) : ?>
					<?php dynamic_sidebar( 'footer-one' ); ?>
				<?php endif; ?>
				<p>&copy; <?php echo date("Y") ?> <?php echo get_bloginfo( 'name' );?><br>Registered Charity No: 1100458</p>
				
				</div>			
			</div>
			<div class="twoThirds right">

				<div class="col3 left bb padTop padBottom padLeft padRight">
					<?php if ( is_active_sidebar( 'footer-two' ) ) : ?>
					<?php dynamic_sidebar( 'footer-two' ); ?>
					<?php endif; ?>
				</div>

				<div class="col3 left bb padTop padBottom padRight">
					<h5>
						Support Us
					</h5>
					Content

				</div>

				<div class="col3 left bb padTop padBottom">
					<h5>
						Contact Us
					</h5>
					<div id="contact_info">
					<?php $phone = get_post_meta(2,'meta_box_home_phone', true); if (!empty($phone)) { echo "<a class='phone' href='".$phone."'><i class='fas fa-phone'></i> ".$phone."</a>";} ?>
					<?php $email = get_post_meta(2,'meta_box_home_email', true); if (!empty($email)) { echo "<a class='email' href='".$email."'><i class='fas fa-envelope'></i> ".$email."</a>";} ?>
					</div>
					<div class="social_media marBottom marTop">
						<?php $facebook = get_post_meta(2,'meta_box_home_facebook', true); if (!empty($facebook)) { echo "<a class='facebook' href='".$facebook."'><i class='fab fa-facebook-f'></i></a>";} ?>
						<?php $twitter = get_post_meta(2,'meta_box_home_twitter', true); if (!empty($twitter)) { echo "<a class='twitter' href='".$twitter."'><i class='fab fa-twitter'></i></a>";} ?>
						<?php $youtube = get_post_meta(2,'meta_box_home_youtube', true); if (!empty($youtube)) { echo "<a class='youtube' href='".$youtube."'><i class='fab fa-youtube'></i></a>";} ?>
						<?php $google = get_post_meta(2,'meta_box_home_google', true); if (!empty($google)) { echo "<a class='google' href='".$google."'><i class='fab fa-google-plus'></i></a>";} ?>
						<?php $pinterest = get_post_meta(2,'meta_box_home_pinterest', true); if (!empty($pinterest)) { echo "<a class='pinterest' href='".$pinterest."'><i class='fab fa-pinterest'></i></a>";} ?>
						<?php $instagram = get_post_meta(2,'meta_box_home_instagram', true); if (!empty($instagram)) { echo "<a class='instagram' href='".$instagram."'><i class='fab fa-instagram'></i></a>";} ?>
					</div>
					<p class="dp">Designed by <br><a href="https://davidpottrell.co.uk" target="_blank">David Pottrell</a></p>	
				</div>			
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

<!-- Fonts/Stylesheets -->
<link rel='stylesheet' property='stylesheet' id='font-awesome' href='<?php bloginfo('template_url');?>/assets/font-awesome/css/fontawesome.min.css' type='text/css' media='all' />
<link rel='stylesheet' property='stylesheet' id='font-awesome' href='<?php bloginfo('template_url');?>/assets/font-awesome/css/fa-brands.min.css' type='text/css' media='all' />
<link rel='stylesheet' property='stylesheet' id='font-awesome' href='<?php bloginfo('template_url');?>/assets/font-awesome/css/fa-solid.min.css' type='text/css' media='all' />


<!-- Scripts -->
<script type='text/javascript' src="<?php bloginfo('template_url');?>/assets/magnific/magnific.js"></script>
<script type='text/javascript' src="<?php bloginfo('template_url');?>/js/functions.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('.open-popup-link').magnificPopup({
			removalDelay: 500,
			callbacks: {
				beforeOpen: function() {
					this.st.mainClass = this.st.el.attr('data-effect');
				}
			},
			midClick: true
		});
	});
	if (window.location.hash == '#_=_') {
		window.location.hash = '';
	}

	
	$('.gallery').each(function() {
		$(this).magnificPopup({
			delegate: 'a',
			type: 'image',
			gallery: {enabled: true}
		});
	});
	
</script>

</body>
</html>