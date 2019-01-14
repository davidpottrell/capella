<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">

<!-- Favicons-->
<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url');?>/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url');?>/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_url');?>/favicon-16x16.png">
<link rel="manifest" href="<?php bloginfo('template_url');?>/site.webmanifest">
<link rel="mask-icon" href="<?php bloginfo('template_url');?>/safari-pinned-tab.svg" color="#6c648b">
<meta name="msapplication-TileColor" content="#6c648b">
<meta name="theme-color" content="#6c648b">

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Caveat:400|Roboto:300,400,700" rel="stylesheet">

<!-- CSS -->
<link rel='stylesheet' href='<?php bloginfo('template_url');?>/style.css' type='text/css' media='all' />
	
<?php wp_head(); ?>
		
</head>

<body <?php body_class(); ?>>

<!--Header-->
	
<div id="bar">
	<div class="container large padLeft padRight bb clear">
		<div class="bar_menu left">
			<?php wp_nav_menu( array( 'theme_location' => 'bar-menu' ) ); ?>
		</div>
		<div class="social_media right">
			<?php $facebook = get_post_meta(2,'meta_box_home_facebook', true); if (!empty($facebook)) { echo "<a class='facebook' href='".$facebook."'><i class='fab fa-facebook-f'></i></a>";} ?>
			<?php $twitter = get_post_meta(2,'meta_box_home_twitter', true); if (!empty($twitter)) { echo "<a class='twitter' href='".$twitter."'><i class='fab fa-twitter'></i></a>";} ?>
			<?php $youtube = get_post_meta(2,'meta_box_home_youtube', true); if (!empty($youtube)) { echo "<a class='youtube' href='".$youtube."'><i class='fab fa-youtube'></i></a>";} ?>
			<?php $google = get_post_meta(2,'meta_box_home_google', true); if (!empty($google)) { echo "<a class='google' href='".$google."'><i class='fab fa-google-plus'></i></a>";} ?>
			<?php $pinterest = get_post_meta(2,'meta_box_home_pinterest', true); if (!empty($pinterest)) { echo "<a class='pinterest' href='".$pinterest."'><i class='fab fa-pinterest'></i></a>";} ?>
			<?php $instagram = get_post_meta(2,'meta_box_home_instagram', true); if (!empty($instagram)) { echo "<a class='instagram' href='".$instagram."'><i class='fab fa-instagram'></i></a>";} ?>
		</div>			
		
	</div>
</div>	
	
<header>
	<div class="container large padLeft padRight bb clear">

		<div id="logo" class="left">
			<?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); } ?>
		</div>
		<nav class="right">
			<div id="menu" class="clear">
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
				<div id="extra" class="clear">
					<div id="toggle"><span></span><span></span><span></span><span></span></div>
				</div>
			</div>
		</nav>

	</div>
</header>


