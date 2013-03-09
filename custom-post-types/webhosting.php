<?php

/* ------------------------------------------------------------------------ * 
 * Add Web Hosting Custom Post Type
 * ------------------------------------------------------------------------ */   

add_action('init', 'init_webhosting_post_type');

function init_webhosting_post_type() {
	register_post_type( 'webhosting', 
		array(
			'labels' => array(
				'name' => 'Web Hosting',
				'singular_name' => 'Web Hosting Package',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Web Hosting Package',
				'edit' => 'Edit',
				'edit_item' => 'Edit Web Hosting Package',
				'new_item' => 'New Web Hosting Package',
				'view' => 'View',
				'view_item' => 'View Web Hosting Package',
				'search_items' => 'Search Web Hosting Packages',
				'not_found' => 'No Web Hosting Packages found',
				'not_found_in_trash' => 'No Web Hosting Packages found in Trash',
				'parent' => 'Parent Web Hosting Packages'
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