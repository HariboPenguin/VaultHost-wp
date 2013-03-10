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

function webhosting_price_box_content($package) { 

	$package_price = floatval(get_post_meta( $package->ID, 'package_price', true));
	$package_renewal = esc_html(get_post_meta( $package->ID, 'package_renewal', true));

	?>

	<p>
		<label for="package-price"><?php _e("Price:"); ?></label>
		<br />
		<input id="package-price" class="" type="text" name="webhosting_package_price" value="<?php echo $package_price; ?>" size="30" />
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

function add_webhosting_price_box_fields($webhosting_package_id, $webhosting_package) {
	if ($webhosting_package->post_type == 'webhosting') {
		if (isset($_POST['webhosting_package_price']) && $_POST['webhosting_package_price'] != '' ) {
			update_post_meta( $webhosting_package_id, 'package_price', $_POST['webhosting_package_price']);
		}
	}
}

add_action('save_post', 'add_webhosting_price_box_fields', 10, 2);


?>