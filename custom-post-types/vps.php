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

/* ------------------------------------------------------------------------ * 
 * Custom Meta 
 * ------------------------------------------------------------------------ */

add_action('add_meta_boxes', 'setup_vps_meta_boxes');

function setup_vps_meta_boxes() {
	add_meta_box( 'vps_price_box', __('Monthly Package Price', 'vaulthost'), 'vps_price_box_content', 'vps', 'side', 'core');
	add_meta_box( 'vps_package_options_box', __('Package Options', 'vaulthost'), 'vps_package_options_box_content', 'vps', 'normal', 'low');
}

function vps_price_box_content($package) { 

	$package_price = floatval(get_post_meta( $package->ID, 'package_price', true));

	?>

	<p>
		<label for="package-price"><?php _e("Price:"); ?></label>
		<br />
		<input id="package-price" class="" type="text" name="vps_package_price" value="<?php echo $package_price; ?>" size="30" />
	</p>

<?php }

function add_vps_price_box_fields($vps_package_id, $vps_package) {
	if ($vps_package->post_type == 'vps') {
		if (isset($_POST['vps_package_price']) && $_POST['vps_package_price'] != '' ) {
			update_post_meta( $vps_package_id, 'package_price', $_POST['vps_package_price']);
		}
	}
}

add_action('save_post', 'add_vps_price_box_fields', 10, 2);

/* ------------------------------------------------------------------------ * 
 * Custom Package Options Meta Box Content
 * ------------------------------------------------------------------------ */   

function vps_package_options_box_content($package) {

	$ram = intval(get_post_meta( $package->ID, 'package_ram', true));
	$cpucores = intval(get_post_meta( $package->ID, 'package_cpucores', true));
	$storage = intval(get_post_meta( $package->ID, 'package_storage', true));
	$bandwidth = intval(get_post_meta( $package->ID, 'package_bandwidth', true));
	$ipv4 = intval(get_post_meta( $package->ID, 'package_ipv4', true));
	$ipv6 = intval(get_post_meta( $package->ID, 'package_ipv6', true));
	$network = intval(get_post_meta( $package->ID, 'package_network', true));
	?>

	<table>
		<tr>
			<td><label for="ram"><?php _e("RAM:"); ?></label></td>
			<td><input id="ram" type="text" name="vps_package_ram" value="<?php echo $ram; ?>" size="30" /></td>
		</tr>
		<tr>
			<td><label for="cpucores"><?php _e("CPU Cores:"); ?></label></td>
			<td><input id="cpucores" type="text" name="vps_package_cpucores" value="<?php echo $cpucores; ?>" size="30" /></td>
		</tr>
		<tr>
			<td><label for="storage"><?php _e("Storage Space:"); ?></label></td>
			<td><input id="storage" type="text" name="vps_package_storage" value="<?php echo $storage; ?>" size="30" /></td>
		</tr>
		<tr>
			<td><label for="bandwidth"><?php _e("Bandwidth:"); ?></label></td>
			<td><input id="bandwidth" type="text" name="vps_package_bandwidth" value="<?php echo $bandwidth; ?>" size="30" /></td>
		</tr>
		<tr>
			<td><label for="ipv4"><?php _e("IPv4 Addresses:"); ?></label></td>
			<td><input id="ipv4" type="text" name="vps_package_ipv4" value="<?php echo $ipv4; ?>" size="30" /></td>
		</tr>
		<tr>
			<td><label for="ipv6"><?php _e("IPv6 Addresses:"); ?></label></td>
			<td><input id="ipv6" type="text" name="vps_package_ipv6" value="<?php echo $ipv6; ?>" size="30" /></td>
		</tr>
		<tr>
			<td><label for="network"><?php _e("Network Speed:"); ?></label></td>
			<td><input id="network" type="text" name="vps_package_network" value="<?php echo $network; ?>" size="30" /></td>
		</tr>
	</table>


<?php }

function add_vps_package_options_box_fields($vps_package_id, $vps_package) {
	if ($vps_package->post_type == 'vps') {
		if (isset($_POST['vps_package_ram']) && $_POST['vps_package_ram'] != '' ) {
			update_post_meta( $vps_package_id, 'package_ram', $_POST['vps_package_ram']);
		}
		if (isset($_POST['vps_package_cpucores']) && $_POST['vps_package_cpucores'] != '' ) {
			update_post_meta( $vps_package_id, 'package_cpucores', $_POST['vps_package_cpucores']);
		}
		if (isset($_POST['vps_package_storage']) && $_POST['vps_package_storage'] != '' ) {
			update_post_meta( $vps_package_id, 'package_storage', $_POST['vps_package_storage']);
		}
		if (isset($_POST['vps_package_bandwidth']) && $_POST['vps_package_bandwidth'] != '' ) {
			update_post_meta( $vps_package_id, 'package_bandwidth', $_POST['vps_package_bandwidth']);
		}
		if (isset($_POST['vps_package_ipv4']) && $_POST['vps_package_ipv4'] != '' ) {
			update_post_meta( $vps_package_id, 'package_ipv4', $_POST['vps_package_ipv4']);
		}
		if (isset($_POST['vps_package_ipv6']) && $_POST['vps_package_ipv6'] != '' ) {
			update_post_meta( $vps_package_id, 'package_ipv6', $_POST['vps_package_ipv6']);
		}
		if (isset($_POST['vps_package_network']) && $_POST['vps_package_network'] != '' ) {
			update_post_meta( $vps_package_id, 'package_network', $_POST['vps_package_network']);
		}
	}
}

add_action('save_post', 'add_vps_package_options_box_fields', 10, 2);

/* ------------------------------------------------------------------------ * 
 * Custom Columns
 * ------------------------------------------------------------------------ */   

add_filter('manage_edit-vps_columns', 'vps_edit_columns');

function vps_edit_columns() {
	$columns = array(
		'cb' => '<input type=\"checkbox\" />',
		'title' => 'Package',
		'description' => "Description",
		'ram' => "RAM",
		'cpucores' => "CPU Cores",
		'storage' => "Storage",
		'bandwidth' => "Bandwidth",
		'ipv4' => "IPv4 Addresses",
		'ipv6' => "IPv6 Addresses",
		'network' => "Link Speed",
		'prices' => "Price"
	);

	return $columns;
}

add_filter('manage_edit-vps_sortable_columns', 'vps_sortable_columns');

function vps_sortable_columns($columns) {
	$columns['ram'] = 'ram';
	$columns['cpucores'] = 'cpucores';
	$columns['storage'] = 'storage';
	$columns['bandwidth'] = 'bandwidth';
	$columns['ipv4'] = 'ipv4';
	$columns['ipv6'] = 'ipv6';
	$columns['network'] = 'network';
	$columns['prices'] = 'price';

	return $columns;
}

add_action('pre_get_posts', 'vps_orderby');

function vps_orderby($query) {
	if (!is_admin()) {
		return;
	}

	$orderby = $query->get('orderby');

	if ('ram' == $orderby) {
		$query->set('meta_key', 'package_ram');
		$query->set('orderby', 'meta_value_num');
	}
	if ('cpucores' == $orderby) {
		$query->set('meta_key', 'package_cpucores');
		$query->set('orderby', 'meta_value_num');
	}
	if ('storage' == $orderby) {
		$query->set('meta_key', 'package_storage');
		$query->set('orderby', 'meta_value_num');
	}
	if ('bandwidth' == $orderby) {
		$query->set('meta_key', 'package_bandwidth');
		$query->set('orderby', 'meta_value_num');
	}
	if ('ipv4' == $orderby) {
		$query->set('meta_key', 'package_ipv4');
		$query->set('orderby', 'meta_value_num');
	}
	if ('ipv6' == $orderby) {
		$query->set('meta_key', 'package_ipv6');
		$query->set('orderby', 'meta_value_num');
	}
	if ('network' == $orderby) {
		$query->set('meta_key', 'package_network');
		$query->set('orderby', 'meta_value_num');
	}
	if ('price' == $orderby) {
		$query->set('meta_key', 'package_price');
		$query->set('orderby', 'meta_value_num');
	}
}

add_action('manage_posts_custom_column', 'vps_custom_columns');

function vps_custom_columns($column) {
	global $post;
	switch ($column) {
		case 'ram':
			echo intval(get_post_meta( $post->ID, 'package_ram', true)) . 'MB';
			break;
		case 'cpucores':
			echo intval(get_post_meta( $post->ID, 'package_cpucores', true));
			break;
		case 'ipv4':
			echo intval(get_post_meta( $post->ID, 'package_ipv4', true));
			break;
		case 'ipv6':
			echo intval(get_post_meta( $post->ID, 'package_ipv6', true));
			break;
		case 'network':
			echo intval(get_post_meta( $post->ID, 'package_network', true)) . 'Mbps';
			break;
	}
}


?>