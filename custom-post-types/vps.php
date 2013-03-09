<?php

/* ------------------------------------------------------------------------ * 
 * Add VPS Custom Post Type
 * ------------------------------------------------------------------------ */   

add_action('init', 'init_vps_post_type');

function init_vps_post_type() {
	register_post_type( 'vps', 
		array(
			'labels' => array(
				'name' => "VPS's",
				'singular_name' => 'VPS',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New VPS',
				'edit' => 'Edit',
				'edit_item' => 'Edit VPS',
				'new_item' => 'New VPS',
				'view' => 'View',
				'view_item' => 'View VPS',
				'search_items' => "Search VPS's",
				'not_found' => "No VPS's found",
				'not_found_in_trash' => "No VPS's found in Trash",
				'parent' => "Parent VPS's"
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