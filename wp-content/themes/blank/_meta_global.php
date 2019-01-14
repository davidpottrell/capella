<?php add_filter( 'rwmb_meta_boxes', 'meta_box_register_meta_global_box' );

function meta_box_register_meta_global_box( $meta_boxes ) {

	if ( ! global_include() ) {
		return $meta_boxes;
	}

	$prefix = 'meta_box_global_';
	
	$meta_boxes[] = array(
		'id'         => 'banner',
		'title'      => esc_html__( 'Banner Settings', 'your-prefix' ),
		'post_types' => array( 'page'),
		'context'    => 'normal',
		'priority'   => 'low',
		'autosave'   => true,
		'fields'     => array(
			array(
				'name'  => esc_html__( 'Banner Title', 'your-prefix' ),
				'id'    => "{$prefix}title",
				'type'  => 'text',
			),
			array(
				'name'    => esc_html__( 'Banner Content', 'your-prefix' ),
				'id'      => "{$prefix}content",
				'type'    => 'wysiwyg',
				'raw'     => false,
				'options' => array(
					'textarea_rows' => 6,
					'teeny'         => false,
					'media_buttons' => true,
				),
			),
			array(
				'name'             => esc_html__( 'Banner Image', 'your-prefix' ),
				'id'               => "{$prefix}background_image",
				'type'             => 'image_advanced',
				'force_delete'     => false,
				'max_file_uploads' => 1,
				'max_status'       => false,
			),
		),
	);

	return $meta_boxes;
}


function global_include() {
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
	$checked_templates = array('page-home.php','page.php','page-about.php','page-services.php','page-service.php','page-contact.php');
	$template = get_post_meta( $post_id, '_wp_page_template', true );
	if ( in_array( $template, $checked_templates ) ) {
		return true;
	}
	return false;
}