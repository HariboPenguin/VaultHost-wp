<?php 

/* ------------------------------------------------------------------------ * 
 * Add Features Custom Post Type
 * ------------------------------------------------------------------------ */   

add_action('init', 'init_features_post_type');

function init_features_post_type() {
	register_post_type( 'features', 
		array(
			'labels' => array(
				'name' => 'Features',
				'singular_name' => 'Feature',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Feature',
				'edit' => 'Edit',
				'edit_item' => 'Edit Feature',
				'new_item' => 'New Feature',
				'view' => 'View',
				'view_item' => 'View Feature',
				'search_items' => 'Search Features',
				'not_found' => 'No Features found',
				'not_found_in_trash' => 'No Features found in Trash',
				'parent' => 'Parent Features'

			),

			'public' => true,
			'menu_position' => 15,
			'supports' => array('title', 'editor', 'thumbnail'),
			'taxonomies' => array( '' ),
			'menu_icon' => null,
			'has_archive' => true
		) 
	);
}

/* ------------------------------------------------------------------------ * 
 * Add custom columns to table
 * ------------------------------------------------------------------------ */   

add_filter('manage_edit-features_columns', 'feature_edit_columns');

function feature_edit_columns() {
	$columns = array(
		'cb' => '<input type=\"checkbox\" />',
		'icon' => 'Icon',
		'title' => 'Feature',
		'description' => "Description",
	);

	return $columns;
}

add_action('manage_posts_custom_column', 'features_custom_columns');

function features_custom_columns($column) {
	global $post;
	switch ($column) {
		case 'icon':
			the_post_thumbnail(array(64,64));
			break;
		case 'description':
			the_excerpt();
			break;
	}
}

/* ------------------------------------------------------------------------ * 
 * Add custom messages
 * ------------------------------------------------------------------------ */

function features_updated_messages($messages) {
	global $post, $post_ID;
	$messages['features'] = array(
		1 => sprintf( __('Feature Updated. <a href="%s">View Feature</a>'), esc_url( get_home_url() )),
		4 => __('Feature updated.'),
		6 => sprintf( __('Feature Published. <a href="%s">View Feature</a>'), esc_url( get_home_url() )),
		7 => __('Feature Saved.'),
		8 => sprintf( __('Feature Submitted. <a href="%s">View Feature</a>'), esc_url( get_home_url() )),
		9 => sprintf( __('Feature scheduled for: <strong>%1$s</strong>.'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) )),
		10 => sprintf( __('Feature draft updated.')),
	);
	return $messages;
}

add_filter('post_updated_messages', 'features_updated_messages');

/* ------------------------------------------------------------------------ * 
 * Add contextural help
 * ------------------------------------------------------------------------ */   

function features_contextual_help( $contextual_help, $screen_id, $screen ) { 
	if ( 'edit-features' == $screen->id ) {

		$contextual_help = '<h2>Features</h2>
		<p>Features show the various services and support that the company offers on the home page. You can see a list of them on this page in reverse chronological order - the latest one we added is first.</p> 
		<p>You can view/edit the details of each feature by clicking on its name, or you can perform bulk actions using the dropdown menu and selecting multiple items.</p>';

	} elseif ( 'features' == $screen->id ) {

		$contextual_help = '<h2>Editing features</h2>
		<p>This page allows you to view/modify features that are displayed on the home page. Please make sure to fill out the available boxes with the appropriate details (feature image, title, description).</p>';

	}
	return $contextual_help;
}
add_action( 'contextual_help', 'features_contextual_help', 10, 3 );

?>