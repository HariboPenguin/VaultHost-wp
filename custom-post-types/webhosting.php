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

/* ------------------------------------------------------------------------ * 
 * Custom Meta 
 * ------------------------------------------------------------------------ */

add_action('add_meta_boxes', 'webhosting_price_box');

function webhosting_price_box() {
	add_meta_box( 'webhosting_price_box', __('Package Price', 'vaulthost'), 'webhosting_price_box_content', 'webhosting', 'side', 'core');
}

function webhosting_price_box_content($post) { ?>
	<?php wp_nonce_field( plugin_basename( __FILE__ ), 'product_price_box_content_nonce' ); ?>
	<p>
		<label for="package-price"><?php _e("Price:"); ?></label>
		<br />
		<input id="package-price" class="" type="text" name="package-price" value="<?php echo esc_attr( get_post_meta( $object->ID, 'package-price', true ) ); ?>" size="30" />
	</p>
	<p>
		<label for="package-price"><?php _e("Renewal Period:", 'vaulthost'); ?></label>
		<br />
		<select name="package-renewal">
			<option value="monthly">Monthly</option>
			<option value="quarterly">Quarterly</option>
			<option value="yearly">Yearly</option>
		</select>
	</p>

<?php }





?>