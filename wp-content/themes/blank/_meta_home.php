<?php add_filter( 'rwmb_meta_boxes', 'meta_box_register_meta_home_box' );

function meta_box_register_meta_home_box( $meta_boxes ) {

	if ( ! home_include() ) {
		return $meta_boxes;
	}

	$prefix = 'meta_box_home_';
	
	$meta_boxes[] = array(
		'id'         => 'Social',
		'title'      => esc_html__( 'Platforms', 'your-prefix' ),
		'post_types' => array( 'page' ),
		'context'    => 'side',
		'priority'   => 'low',
		'autosave'   => true,
		'fields'     => array(
			array(
				'name'  => esc_html__( 'Email', 'your-prefix' ),
				'id'    => "{$prefix}email",
				'type'  => 'text',
			),
			array(
				'name'  => esc_html__( 'phone', 'your-prefix' ),
				'id'    => "{$prefix}phone",
				'type'  => 'text',
			),			
			array(
				'name'  => esc_html__( 'Facebook', 'your-prefix' ),
				'id'    => "{$prefix}facebook",
				'type'  => 'text',
			),
			array(
				'name'  => esc_html__( 'Twitter', 'your-prefix' ),
				'id'    => "{$prefix}twitter",
				'type'  => 'text',
			),	
			array(
				'name'  => esc_html__( 'YouTube', 'your-prefix' ),
				'id'    => "{$prefix}youtube",
				'type'  => 'text',
			),	
			array(
				'name'  => esc_html__( 'Instagram', 'your-prefix' ),
				'id'    => "{$prefix}instagram",
				'type'  => 'text',
			),
			array(
				'name'  => esc_html__( 'LinkedIn', 'your-prefix' ),
				'id'    => "{$prefix}linkedin",
				'type'  => 'text',
			),
			array(
				'name'  => esc_html__( 'Snapchat', 'your-prefix' ),
				'id'    => "{$prefix}snapchat",
				'type'  => 'text',
			),
			array(
				'name'  => esc_html__( 'Pinterest', 'your-prefix' ),
				'id'    => "{$prefix}pinterest",
				'type'  => 'text',
			),
			array(
				'name'  => esc_html__( 'Google Plus', 'your-prefix' ),
				'id'    => "{$prefix}google",
				'type'  => 'text',
			),
		),
	);	
	
	
	$meta_boxes[] = array(
		'id'         => 'gallery',
		'title'      => esc_html__( 'Gallery', 'your-prefix' ),
		'post_types' => array( 'page' ),
		'priority'   => 'low',
		'autosave'   => true,
		'fields'     => array(
			array(
				'name'  => esc_html__( 'Gallery Content', 'your-prefix' ),
				'id'    => "{$prefix}content",
				'type'  => 'wysiwyg',
				'raw'     => false,
				'options' => array(
					'textarea_rows' => 6,
					'teeny'         => false,
					'media_buttons' => true,
				),
			),			
			array(
				'name'             => esc_html__( 'Gallery', 'your-prefix' ),
				'id'               => "{$prefix}gallery",
				'type'             => 'image_advanced',
				'force_delete'     => false,
				'max_file_uploads' => 12,
				'max_status'       => false,
			),
		),
	);	
	

	return $meta_boxes;
}


function home_include() {
	if ( ! is_admin() ) {
		return true;
	}
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		return true;
	}
	$checked_post_IDs = array(0);
	if ( isset( $_GET['post'] ) ) {
		$post_id = intval( $_GET['post'] );
	} elseif ( isset( $_POST['post_ID'] ) ) {
		$post_id = intval( $_POST['post_ID'] );
	} else { $post_id = false;
	}
	$post_id = (int) $post_id;
	if ( in_array( $post_id, $checked_post_IDs ) ) {
		return true;
	}
	$checked_templates = array('page-home.php');
	$template = get_post_meta( $post_id, '_wp_page_template', true );
	if ( in_array( $template, $checked_templates ) ) {
		return true;
	}
	return false;
}