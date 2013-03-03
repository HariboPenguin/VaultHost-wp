<?php 

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

?>