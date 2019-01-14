<?php

define( 'PEAK_VERSION', 1.0 );

/*-----------------------------------------------------------------------------------*/
/* Register meta box
/*-----------------------------------------------------------------------------------*/

include '_meta_global.php';
include '_meta_home.php';
include '_meta_about.php';


/*-----------------------------------------------------------------------------------*/
/* Menus
/*-----------------------------------------------------------------------------------*/
register_nav_menus( 
	array(
		'bar-menu' => __( 'Bar Menu', 'bar-menu' ),
		'header-menu' => __( 'Header Menu', 'primary-menu' ),
		'footer-menu' => __( 'Footer Menu', 'footer-menu' ),
		'sidebar-menu' => __( 'Sidebar Menu', 'sidebar-menu' )
	)
);



/*
	Disable Default Dashboard Widgets
*/
function disable_default_dashboard_widgets() {
	global $wp_meta_boxes;
	// wp..
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
	// bbpress
	unset($wp_meta_boxes['dashboard']['normal']['core']['bbp-dashboard-right-now']);
	// yoast seo
	unset($wp_meta_boxes['dashboard']['normal']['core']['wpseo-dashboard-overview']);
	// gravity forms
	unset($wp_meta_boxes['dashboard']['normal']['core']['rg_forms_dashboard']);
}
add_action('wp_dashboard_setup', 'disable_default_dashboard_widgets', 999);

add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
  
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;
 
wp_add_dashboard_widget('custom_welcome_widget', 'Welcome!', 'custom_dashboard_welcome');
wp_add_dashboard_widget('custom_links_widget', 'Helpful Links', 'custom_dashboard_links');
}
 
function custom_dashboard_welcome() {
echo '<h2>Welcome to Hedgehog Rescue Website Dashboard</h2>
<p>Here you can control the website contents using the navigation menu on the left.</p>
<p>If you have any questions or comments, please do not hesitate to contact me at hello@davidpottrell.co.uk </p>';
}

function custom_dashboard_links() {
echo '<ul><li><a href="wp-admin/edit.php">Add a News Post</a></li></ul>';
}




add_filter('wp_handle_upload_prefilter','tc_handle_upload_prefilter');
function tc_handle_upload_prefilter($file)
{

    $img=getimagesize($file['tmp_name']);
    $minimum = array('width' => '600', 'height' => '400');
    $width= $img[0];
    $height =$img[1];

    if ($width < $minimum['width'] )
        return array("error"=>"Image dimensions are too small. Minimum width is {$minimum['width']}px. Uploaded image width is $width px");

    elseif ($height <  $minimum['height'])
        return array("error"=>"Image dimensions are too small. Minimum height is {$minimum['height']}px. Uploaded image height is $height px");
    else
        return $file; 
}





//Sidebars
function peak_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar', 
		'name' => 'Sidebar',
		'description' => 'Take it on the side...',
		'before_widget' => '<div class="block padAll bb clear">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		'empty_title'=> '',
	));
	register_sidebar(array(	
		'id' => 'footer-one', 			
		'name' => 'Footer One',		
		'description' => 'Take it on the foot...', 
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
		'empty_title'=> '',
	));
	register_sidebar(array(	
		'id' => 'footer-two', 			
		'name' => 'Footer Two',		
		'description' => 'Take it on the foot...', 
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
		'empty_title'=> '',
	));
	register_sidebar(array(	
		'id' => 'footer-three', 			
		'name' => 'Footer Three',		
		'description' => 'Take it on the foot...', 
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
		'empty_title'=> '',
	));
	register_sidebar(array(	
		'id' => 'footer-menu', 			
		'name' => 'Footer Menu',		
		'description' => 'Take it on the foot...', 
		'before_widget' => '<div id="footer-menu">',
		'after_widget' => '</div>',
		'before_title' => '<h6>',
		'after_title' => '</h6>',
		'empty_title'=> '',
	));	
} 
add_action( 'widgets_init', 'peak_register_sidebars' );


function remove_metaboxes() {
	remove_meta_box( 'postcustom' , 'listing' , 'normal' ); //removes custom fields for page
	remove_meta_box( 'postexcerpt' , 'listing' , 'normal' ); //removes custom fields for page
	remove_meta_box( 'commentstatusdiv' , 'listing' , 'normal' ); //removes comments status for page
	remove_meta_box( 'commentsdiv' , 'listing' , 'normal' ); //removes comments for page
	remove_meta_box( 'authordiv' , 'listing' , 'normal' ); //removes author for page
}
add_action( 'admin_menu' , 'remove_metaboxes' );


// Add thumbnails
add_theme_support( 'post-thumbnails' );
add_image_size( 'banner_image', 1200, 575, array( 'center', 'center' ), true );

add_image_size( 'large_landscape_rectangle', 800, 450, array( 'center', 'center' ), true );
add_image_size( 'large_portrait_rectangle', 650, 850, array( 'center', 'center' ), true );
add_image_size( 'large_square', 800, 800, array( 'center', 'center' ), true );
add_image_size( 'small_square', 400, 400, array( 'center', 'center' ), true );


function custom_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'custom_logo_setup' );


// Add excerpts
function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	return $excerpt;
}

function word_count() {    
	$post = get_post();    
	$words = str_word_count( strip_tags( $post->post_content ) );
	return $words;
} 

function reading_time() {	
	$post = get_post();		
	$words = str_word_count( strip_tags( $post->post_content ) );
	$m = floor($words / 190);
	$s = floor($words % 190 / (190 / 60));
	$estimated_time = $m . '' . ($m == 1 ? '' : '') . ':' . ($s >= 9 ? '' : '0') . '' . $s . '' . ($s == 1 ? '' : '');return $estimated_time;
}


// Add stylesheet
add_editor_style('style.css');

// jQuery
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "https://code.jquery.com/jquery-3.3.1.min.js", false, null);
   wp_enqueue_script('jquery');
}


// Add video container
function div_wrapper($content) {
    // match any iframes
    $pattern = '~<iframe.*</iframe>|<embed.*</embed>~';
    preg_match_all($pattern, $content, $matches);

    foreach ($matches[0] as $match) {
        // wrap matched iframe with div
        $wrappedframe = '<div class="videoContainer">' . $match . '</div>';

        //replace original iframe with new in content
        $content = str_replace($match, $wrappedframe, $content);
    }

    return $content;    
}
add_filter('the_content', 'div_wrapper');



//Remove Category title from Archive
add_filter( 'get_the_archive_title', function ( $title ) {
    if( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
});


remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'feed_links', 2 );
remove_action('wp_head', 'wp_resource_hints', 2 );
remove_action('wp_head', 'feed_links_extra', 3 );
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rest_output_link_wp_head', 10 );
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10 );
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_action('wp_print_styles', 'print_emoji_styles');



// Remove comment style
add_action( 'widgets_init', 'my_remove_recent_comments_style' );
function my_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'  ) );
}

// Remove logo
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );
function remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
}


//Add button functionality to TinyMCE
function my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
add_filter('mce_buttons_2', 'my_mce_buttons_2');

function my_mce_before_init_insert_formats( $init_array ) {
$style_formats = array(
	array(
		'title' => 'Buttons',
		'items' => array(
			array(
				'title' => 'Blue Button',
				'selector' => 'a',
				'classes' => 'bgBlue button',
			),
		),
	),
	array(
		'title' => 'Highlight',
		'items' => array(
			array(
				'title' => 'Highlight',
				'selector' => 'p',
				'classes' => 'highlight',
			),
		),
	),  
);

$init_array['style_formats'] = json_encode( $style_formats );
	return $init_array;
}

add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );


// Admin Style of Separators
function separators() {
  echo '<style type="text/css">#adminmenu li.wp-menu-separator {display: none;}</style>';
}
add_action( 'admin_head', 'separators' );


//Remove Admin
function remove_menus(){
	remove_menu_page( 'edit-comments.php' ); //Comments
}
add_action( 'admin_menu', 'remove_menus' );


//Change Login Logo URL
add_filter( 'login_headerurl', 'custom_loginlogo_url' );
function custom_loginlogo_url($url) {
    return '#';
}


//Make stuff pretty
function prettyTxt($string) {
    $string = str_replace("-", " ", $string);
	$string = str_replace("_", " ", $string);
	$string = ucwords($string);
    return $string;
}

//Make stuff ugly
function uglyTxt($string) {
    $string = strtolower($string);
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    $string = preg_replace("/[\s-]+/", " ", $string);
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}	


//Admin page
function login() { ?>
<style type="text/css">
body {background-color:#6c648b!important;}
#login h1 a, .login h1 a {background-image: url();height:84px;width:215px;background-size: 100%;background-repeat: no-repeat;}		
body.login div#login form#loginform input {background: #FFF;box-shadow: none;padding: 8px;}
body.login div#login form#loginform p.submit input#wp-submit {display: block;padding: 8px 25px;text-transform: uppercase;color: #ffffff;border: 0;font-size: 18px;background: #fba100;font-weight: 700;-webkit-transition: all .35s ease;transition: all .35s ease;text-shadow: none;height: auto;}
body.login #backtoblog, body.login #nav {padding: 0;margin-top: 15px;font-size: 12px;text-align: center;}
body.login form .forgetmenot {margin-top: 3px;}
body.login #backtoblog {margin-top:5px;}
.login #backtoblog a, .login #nav a {color:#FFF!important;}	
a.privacy-policy-link {display:none;}
</style>
<?php }
add_action( 'login_enqueue_scripts', 'login' );