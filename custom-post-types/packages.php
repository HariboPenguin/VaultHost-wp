<?php 

add_action('init', 'init_vps_post_type');

function init_vps_post_type() {
	register_post_type( 'vps', 
		array(
			'labels' => array(
				'name' => 'VPS Packages',
				'singular_name' => 'VPS Package',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New VPS Package',
				'edit' => 'Edit',
				'edit_item' => 'Edit VPS Package',
				'new_item' => 'New Movie Review',
				'view' => 'View',
				'view_item' => 'View VPS Package',
				'search_items' => 'Search VPS Packages',
				'not_found' => 'No VPS Packages found',
				'not_found_in_trash' => 'No VPS Packages found in Trash',
				'parent' => 'Parent VPS Packages'

			),

			'public' => true,
			'menu_position' => 15,
			'supports' => array('title', 'editor', 'comments', 'thumbnail', 'custom-fields'),
			'taxonomies' => array( '' ),
			'menu_icon' => '',
			'has_archive' => true
		) 
	);
}


?>