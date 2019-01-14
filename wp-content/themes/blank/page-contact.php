<?php 
/*
 * 	Template Name: Contact
*/
get_header(); ?>
<!--Page-->
<div id="page">
	<div id="content" class="bgWhite">
		<div class="container medium padTop padBottom bb">
			<div class="col1 padLeft padRight bb clear">
				<div class="col2 left padRight bb">
				<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
				<div class="col2 right padLeft bb">

					<?php $phone = get_post_meta(2,'meta_box_home_phone', true); if (!empty($phone)) { echo "<a class='phone' href='".$phone."'><i class='fas fa-phone'></i> ".$phone."</a>";} ?>
					<?php $email = get_post_meta(2,'meta_box_home_email', true); if (!empty($email)) { echo "<a class='email' href='".$email."'><i class='fas fa-envelope'></i> ".$email."</a>";} ?>					
					
					<div class="social_media col1 marTop">
						<?php $facebook = get_post_meta(2,'meta_box_home_facebook', true); if (!empty($facebook)) { echo "<a class='facebook' href='".$facebook."'><i class='fab fa-facebook-f'></i></a>";} ?>
						<?php $twitter = get_post_meta(2,'meta_box_home_twitter', true); if (!empty($twitter)) { echo "<a class='twitter' href='".$twitter."'><i class='fab fa-twitter'></i></a>";} ?>
						<?php $youtube = get_post_meta(2,'meta_box_home_youtube', true); if (!empty($youtube)) { echo "<a class='youtube' href='".$youtube."'><i class='fab fa-youtube'></i></a>";} ?>
						<?php $google = get_post_meta(2,'meta_box_home_google', true); if (!empty($google)) { echo "<a class='google' href='".$google."'><i class='fab fa-google-plus'></i></a>";} ?>
						<?php $pinterest = get_post_meta(2,'meta_box_home_pinterest', true); if (!empty($pinterest)) { echo "<a class='pinterest' href='".$pinterest."'><i class='fab fa-pinterest'></i></a>";} ?>
						<?php $instagram = get_post_meta(2,'meta_box_home_instagram', true); if (!empty($instagram)) { echo "<a class='instagram' href='".$instagram."'><i class='fab fa-instagram'></i></a>";} ?>
					</div>						

				</div>

			</div>
		</div>
	</div>
	
	<div id="contact_form" class="bgGrey">
		<div class="container medium padTop padBottom bb">
			<div class="col1 padLeft padRight bb clear">
				<div class="col1 marBottom">
					
				<h2>
					Send us a message 
				</h2>
				<p>
					Please use the below form for general enquiries only. If you have found a hedgehog in need, please contact us on 01454 327715
				</p>
				</div>
				<script src="<?php bloginfo('template_url');?>/assets/form/process_contact_form.js" type="text/javascript"></script>
				<form id="easyform" class="padAll bb bgWhite" name="contact" method="post" action="<?php bloginfo('template_url');?>/assets/form/process_contact_form.php" onSubmit="return validate()">

					<!--ERROR/SUCCESS MESSAGE-->
					<div id="error"></div>
					<div id="success">Your message has been successfully sent, thank you.</div>
					<div class="col1 marBottom">
						<label for="name">Name<span>*</span></label>
						<input type="text" name="name" id="name" class="text" placeholder="Enter your name here" />
					</div>
					<div class="col2 left padRight sml bb marBottom">
						<label for="email">Email<span>*</span></label>
						<input type="text" name="email" class="text" id="email" placeholder="Enter your email here" />
					</div>
					<div class="col2 right padLeft sml bb marBottom">
						<label for="phone">Phone<span>*</span></label>
						<input type="tel" name="phone" class="text last" id="phone" placeholder="Enter your phone number" />
					</div>
					<!--MESSAGE INPUT-->
					<div class="col1 marBottom">
						<label for="message">Message<span>*</span></label>	
						<textarea name="message" id="message" rows="12" cols="88" placeholder="Type your message in here"></textarea>
					</div>
					<!--VERIFICATION AREA-->
					<div class="verification marBottom clear">
						<div class="col2 left">
							<img id="verify_image" src="<?php bloginfo('template_url');?>/assets/form/image.php" alt="Verification code" width="100" />
							<a class="refresh" href="#" onclick="document.getElementById('verify_image').src = '<?php bloginfo('template_url');?>/assets/form/image.php?' + Math.random(); return false"><img src="<?php bloginfo('template_url');?>/assets/form/refresh.png" alt="Refresh"></a>
						</div>
						<div class="col2 right">
							<input type="text" name="verify" class="text" id="verify" placeholder="Enter the key" title="This confirms you are a human user and not a bot."/>
						</div>
					</div>	
					<button type='submit' class="button full orange" id='send_message'>Send Message</button>
				</form>				
			</div>
		</div>
	</div>
	
<?php get_footer(); ?>