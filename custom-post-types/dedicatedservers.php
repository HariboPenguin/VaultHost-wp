<?php 

/* ------------------------------------------------------------------------ * 
 * Add Dedicated Servers Custom Post Type
 * ------------------------------------------------------------------------ */   

add_action('init', 'init_dedicatedsevers_post_type');

function init_dedicatedsevers_post_type() {
	register_post_type( 'dedicatedsevers', 
		array(
			'labels' => array(
				'name' => 'Dedicated Servers',
				'singular_name' => 'Dedicated Server',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Dedicated Server',
				'edit' => 'Edit',
				'edit_item' => 'Edit Dedicated Server',
				'new_item' => 'New Dedicated Server',
				'view' => 'View',
				'view_item' => 'View Dedicated Server',
				'search_items' => 'Search Dedicated Servers',
				'not_found' => 'No Dedicated Servers found',
				'not_found_in_trash' => 'No Dedicated Servers found in Trash',
				'parent' => 'Parent Dedicated Servers'
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