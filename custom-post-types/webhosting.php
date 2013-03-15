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

add_action('add_meta_boxes', 'setup_webhosting_meta_boxes');

function setup_webhosting_meta_boxes() {
	add_meta_box( 'webhosting_price_box', __('Monthly Package Price', 'vaulthost'), 'webhosting_price_box_content', 'webhosting', 'side', 'core');
	add_meta_box( 'webhosting_package_options_box', __('Package Options', 'vaulthost'), 'webhosting_package_options_box_content', 'webhosting', 'normal', 'low');
}

/* ------------------------------------------------------------------------ * 
 * Custom Price Meta Box Content
 * ------------------------------------------------------------------------ */   

function webhosting_price_box_content($package) { 

	$package_price = number_format(floatval(get_post_meta( $package->ID, 'package_price', true)), 2);

	?>

	<p>
		<label for="package-price"><?php _e("Price:"); ?></label>
		<br />
		<input id="package-price" class="" type="text" name="webhosting_package_price" value="<?php echo $package_price; ?>" size="30" />
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

/* ------------------------------------------------------------------------ * 
 * Custom Package Options Meta Box Content
 * ------------------------------------------------------------------------ */   

function webhosting_package_options_box_content($package) {

	$storage = intval(get_post_meta( $package->ID, 'package_storage', true));
	$bandwidth = intval(get_post_meta( $package->ID, 'package_bandwidth', true));
	$domains = intval(get_post_meta( $package->ID, 'package_domains', true));
	$subdomains = intval(get_post_meta( $package->ID, 'package_subdomains', true));
	$emailaccounts = intval(get_post_meta( $package->ID, 'package_emailaccounts', true));
	$dbs = intval(get_post_meta( $package->ID, 'package_dbs', true));
	$ftpaccounts = intval(get_post_meta( $package->ID, 'package_ftpaccounts', true));
	?>

	<table>
		<tr>
			<td><label for="storage"><?php _e("Storage Space:"); ?></label></td>
			<td><input id="storage" type="text" name="webhosting_package_storage" value="<?php echo $storage; ?>" size="30" /></td>
			<td><span class="description">GB</span></td>
		</tr>
		<tr>
			<td><label for="bandwidth"><?php _e("Bandwidth:"); ?></label></td>
			<td><input id="bandwidth" type="text" name="webhosting_package_bandwidth" value="<?php echo $bandwidth; ?>" size="30" /></td>
			<td><span class="description">GB</span></td>
		</tr>
		<tr>
			<td><label for="domains"><?php _e("Domains:"); ?></label></td>
			<td><input id="domains" type="text" name="webhosting_package_domains" value="<?php echo $domains; ?>" size="30" /></td>
		</tr>
		<tr>
			<td><label for="subdomains"><?php _e("Sub Domains:"); ?></label></td>
			<td><input id="subdomains" type="text" name="webhosting_package_subdomains" value="<?php echo $subdomains; ?>" size="30" /></td>
		</tr>
		<tr>
			<td><label for="emailaccounts"><?php _e("Email Accounts:"); ?></label></td>
			<td><input id="emailaccounts" type="text" name="webhosting_package_emailaccounts" value="<?php echo $emailaccounts; ?>" size="30" /></td>
		</tr>
		<tr>
			<td><label for="dbs"><?php _e("MySQL Databases:"); ?></label></td>
			<td><input id="dbs" type="text" name="webhosting_package_dbs" value="<?php echo $dbs; ?>" size="30" /></td>
		</tr>
		<tr>
			<td><label for="ftpaccounts"><?php _e("FTP Accounts:"); ?></label></td>
			<td><input id="ftpaccounts" type="text" name="webhosting_package_ftpaccounts" value="<?php echo $ftpaccounts; ?>" size="30" /></td>
		</tr>
	</table>


<?php }

function add_webhosting_package_options_box_fields($webhosting_package_id, $webhosting_package) {
	if ($webhosting_package->post_type == 'webhosting') {
		if (isset($_POST['webhosting_package_storage']) && $_POST['webhosting_package_storage'] != '' ) {
			update_post_meta( $webhosting_package_id, 'package_storage', $_POST['webhosting_package_storage']);
		}
		if (isset($_POST['webhosting_package_bandwidth']) && $_POST['webhosting_package_bandwidth'] != '' ) {
			update_post_meta( $webhosting_package_id, 'package_bandwidth', $_POST['webhosting_package_bandwidth']);
		}
		if (isset($_POST['webhosting_package_domains']) && $_POST['webhosting_package_domains'] != '' ) {
			update_post_meta( $webhosting_package_id, 'package_domains', $_POST['webhosting_package_domains']);
		}
		if (isset($_POST['webhosting_package_subdomains']) && $_POST['webhosting_package_subdomains'] != '' ) {
			update_post_meta( $webhosting_package_id, 'package_subdomains', $_POST['webhosting_package_subdomains']);
		}
		if (isset($_POST['webhosting_package_emailaccounts']) && $_POST['webhosting_package_emailaccounts'] != '' ) {
			update_post_meta( $webhosting_package_id, 'package_emailaccounts', $_POST['webhosting_package_emailaccounts']);
		}
		if (isset($_POST['webhosting_package_dbs']) && $_POST['webhosting_package_dbs'] != '' ) {
			update_post_meta( $webhosting_package_id, 'package_dbs', $_POST['webhosting_package_dbs']);
		}
		if (isset($_POST['webhosting_package_ftpaccounts']) && $_POST['webhosting_package_ftpaccounts'] != '' ) {
			update_post_meta( $webhosting_package_id, 'package_ftpaccounts', $_POST['webhosting_package_ftpaccounts']);
		}
	}
}

add_action('save_post', 'add_webhosting_package_options_box_fields', 10, 2);



/* ------------------------------------------------------------------------ * 
 * Custom Columns
 * ------------------------------------------------------------------------ */   

add_filter('manage_edit-webhosting_columns', 'webhosting_edit_columns');

function webhosting_edit_columns() {
	$columns = array(
		'cb' => '<input type=\"checkbox\" />',
		'title' => 'Package',
		'description' => "Description",
		'storage' => "Storage",
		'bandwidth' => "Bandwidth",
		'domains' => "Domains",
		'subdomains' => "Subdomains",
		'emailaccounts' => "Email Accounts",
		'dbs' => "Databases",
		'ftpaccounts' => "FTP Accounts",
		'prices' => "Price"
	);

	return $columns;
}

add_filter('manage_edit-webhosting_sortable_columns', 'webhosting_sortable_columns');

function webhosting_sortable_columns($columns) {
	$columns['storage'] = 'storage';
	$columns['bandwidth'] = 'bandwidth';
	$columns['domains'] = 'domains';
	$columns['subdomains'] = 'subdomains';
	$columns['emailaccounts'] = 'emailaccounts';
	$columns['dbs'] = 'dbs';
	$columns['ftpaccounts'] = 'ftpaccounts';
	$columns['prices'] = 'price';

	return $columns;
}

add_action('pre_get_posts', 'webhosting_orderby');

function webhosting_orderby($query) {
	if (!is_admin()) {
		return;
	}

	$orderby = $query->get('orderby');

	if ('storage' == $orderby) {
		$query->set('meta_key', 'package_storage');
		$query->set('orderby', 'meta_value_num');
	}
	if ('bandwidth' == $orderby) {
		$query->set('meta_key', 'package_bandwidth');
		$query->set('orderby', 'meta_value_num');
	}
	if ('domains' == $orderby) {
		$query->set('meta_key', 'package_domains');
		$query->set('orderby', 'meta_value_num');
	}
	if ('subdomains' == $orderby) {
		$query->set('meta_key', 'package_subdomains');
		$query->set('orderby', 'meta_value_num');
	}
	if ('emailaccounts' == $orderby) {
		$query->set('meta_key', 'package_emailaccounts');
		$query->set('orderby', 'meta_value_num');
	}
	if ('dbs' == $orderby) {
		$query->set('meta_key', 'package_dbs');
		$query->set('orderby', 'meta_value_num');
	}
	if ('ftpaccounts' == $orderby) {
		$query->set('meta_key', 'package_ftpaccounts');
		$query->set('orderby', 'meta_value_num');
	}
	if ('price' == $orderby) {
		$query->set('meta_key', 'package_price');
		$query->set('orderby', 'meta_value_num');
	}
}

add_action('manage_posts_custom_column', 'webhosting_custom_columns');

function webhosting_custom_columns($column) {
	global $post;
	switch ($column) {
		case 'storage':
			echo intval(get_post_meta( $post->ID, 'package_storage', true)) . 'GB';
			break;
		case 'bandwidth':
			echo intval(get_post_meta( $post->ID, 'package_bandwidth', true)) . 'GB';
			break;
		case 'domains':
			echo intval(get_post_meta( $post->ID, 'package_domains', true));
			break;
		case 'subdomains':
			echo intval(get_post_meta( $post->ID, 'package_subdomains', true));
			break;
		case 'emailaccounts':
			echo intval(get_post_meta( $post->ID, 'package_emailaccounts', true));
			break;
		case 'dbs':
			echo intval(get_post_meta( $post->ID, 'package_dbs', true));
			break;
		case 'ftpaccounts':
			echo intval(get_post_meta( $post->ID, 'package_ftpaccounts', true));
			break;
		case 'prices':
			echo '£' . number_format(floatval(get_post_meta( $post->ID, 'package_price', true)),2);
			break;
	}
}

?>