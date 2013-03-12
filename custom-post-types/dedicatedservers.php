<?php 

/* ------------------------------------------------------------------------ * 
 * Add Dedicated Servers Custom Post Type
 * ------------------------------------------------------------------------ */   

add_action('init', 'init_dedicatedsevers_post_type');

function init_dedicatedsevers_post_type() {
	register_post_type( 'dedicatedservers', 
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

/* ------------------------------------------------------------------------ * 
 * Custom Meta 
 * ------------------------------------------------------------------------ */

add_action('add_meta_boxes', 'setup_dedicatedservers_meta_boxes');

function setup_dedicatedservers_meta_boxes() {
	add_meta_box( 'dedicatedservers_price_box', __('Monthly Package Price', 'vaulthost'), 'dedicatedservers_price_box_content', 'dedicatedservers', 'side', 'core');
	add_meta_box( 'dedicatedservers_package_options_box', __('Package Options', 'vaulthost'), 'dedicatedservers_package_options_box_content', 'dedicatedservers', 'normal', 'low');
}

function dedicatedservers_price_box_content($package) { 

	$package_price = number_format(floatval(get_post_meta( $package->ID, 'package_price', true)), 2);

	?>

	<p>
		<label for="package-price"><?php _e("Price:"); ?></label>
		<br />
		<input id="package-price" class="" type="text" name="dedicatedservers_package_price" value="<?php echo $package_price; ?>" size="30" />
	</p>

<?php }

function add_dedicatedservers_price_box_fields($dedicatedservers_package_id, $dedicatedservers_package) {
	if ($dedicatedservers_package->post_type == 'dedicatedservers') {
		if (isset($_POST['dedicatedservers_package_price']) && $_POST['dedicatedservers_package_price'] != '' ) {
			update_post_meta( $dedicatedservers_package_id, 'package_price', $_POST['dedicatedservers_package_price']);
		}
	}
}

add_action('save_post', 'add_dedicatedservers_price_box_fields', 10, 2);

/* ------------------------------------------------------------------------ * 
 * Custom Package Options Meta Box Content
 * ------------------------------------------------------------------------ */   

function dedicatedservers_package_options_box_content($package) {

	$cpu = esc_html(get_post_meta( $package->ID, 'package_cpu', true));
	$ram = intval(get_post_meta( $package->ID, 'package_ram', true));
	$storage = intval(get_post_meta( $package->ID, 'package_storage', true));
	$bandwidth = intval(get_post_meta( $package->ID, 'package_bandwidth', true));
	$ipv4 = intval(get_post_meta( $package->ID, 'package_ipv4', true));
	$ipv6 = intval(get_post_meta( $package->ID, 'package_ipv6', true));
	$network = intval(get_post_meta( $package->ID, 'package_network', true));
	?>

	<table>
		<tr>
			<td><label for="cpu"><?php _e("CPU:"); ?></label></td>
			<td><input id="cpu" type="text" name="dedicatedservers_package_cpu" value="<?php echo $cpu; ?>" size="30" /></td>
		</tr>
		<tr>
			<td><label for="ram"><?php _e("RAM:"); ?></label></td>
			<td><input id="ram" type="text" name="dedicatedservers_package_ram" value="<?php echo $ram; ?>" size="30" /></td>
			<td><span class="description">MB</span></td>
		</tr>
		<tr>
			<td><label for="storage"><?php _e("Storage Space:"); ?></label></td>
			<td><input id="storage" type="text" name="dedicatedservers_package_storage" value="<?php echo $storage; ?>" size="30" /></td>
			<td><span class="description">GB</span></td>
		</tr>
		<tr>
			<td><label for="bandwidth"><?php _e("Bandwidth:"); ?></label></td>
			<td><input id="bandwidth" type="text" name="dedicatedservers_package_bandwidth" value="<?php echo $bandwidth; ?>" size="30" /></td>
			<td><span class="description">GB</span></td>
		</tr>
		<tr>
			<td><label for="ipv4"><?php _e("IPv4 Addresses:"); ?></label></td>
			<td><input id="ipv4" type="text" name="dedicatedservers_package_ipv4" value="<?php echo $ipv4; ?>" size="30" /></td>
		</tr>
		<tr>
			<td><label for="ipv6"><?php _e("IPv6 Addresses:"); ?></label></td>
			<td><input id="ipv6" type="text" name="dedicatedservers_package_ipv6" value="<?php echo $ipv6; ?>" size="30" /></td>
		</tr>
		<tr>
			<td><label for="network"><?php _e("Network Speed:"); ?></label></td>
			<td><input id="network" type="text" name="dedicatedservers_package_network" value="<?php echo $network; ?>" size="30" /></td>
			<td><span class="description">Mbps</span></td>
		</tr>
	</table>


<?php }

function add_dedicatedservers_package_options_box_fields($dedicatedservers_package_id, $dedicatedservers_package) {
	if ($dedicatedservers_package->post_type == 'dedicatedservers') {
		if (isset($_POST['dedicatedservers_package_cpu']) && $_POST['dedicatedservers_package_cpu'] != '' ) {
			update_post_meta( $dedicatedservers_package_id, 'package_cpu', $_POST['dedicatedservers_package_cpu']);
		}
		if (isset($_POST['dedicatedservers_package_ram']) && $_POST['dedicatedservers_package_ram'] != '' ) {
			update_post_meta( $dedicatedservers_package_id, 'package_ram', $_POST['dedicatedservers_package_ram']);
		}
		if (isset($_POST['dedicatedservers_package_storage']) && $_POST['dedicatedservers_package_storage'] != '' ) {
			update_post_meta( $dedicatedservers_package_id, 'package_storage', $_POST['dedicatedservers_package_storage']);
		}
		if (isset($_POST['dedicatedservers_package_bandwidth']) && $_POST['dedicatedservers_package_bandwidth'] != '' ) {
			update_post_meta( $dedicatedservers_package_id, 'package_bandwidth', $_POST['dedicatedservers_package_bandwidth']);
		}
		if (isset($_POST['dedicatedservers_package_ipv4']) && $_POST['dedicatedservers_package_ipv4'] != '' ) {
			update_post_meta( $dedicatedservers_package_id, 'package_ipv4', $_POST['dedicatedservers_package_ipv4']);
		}
		if (isset($_POST['dedicatedservers_package_ipv6']) && $_POST['dedicatedservers_package_ipv6'] != '' ) {
			update_post_meta( $dedicatedservers_package_id, 'package_ipv6', $_POST['dedicatedservers_package_ipv6']);
		}
		if (isset($_POST['dedicatedservers_package_network']) && $_POST['dedicatedservers_package_network'] != '' ) {
			update_post_meta( $dedicatedservers_package_id, 'package_network', $_POST['dedicatedservers_package_network']);
		}
	}
}

add_action('save_post', 'add_dedicatedservers_package_options_box_fields', 10, 2);

/* ------------------------------------------------------------------------ * 
 * Custom Columns
 * ------------------------------------------------------------------------ */   

add_filter('manage_edit-dedicatedservers_columns', 'dedicatedservers_edit_columns');

function dedicatedservers_edit_columns() {
	$columns = array(
		'cb' => '<input type=\"checkbox\" />',
		'title' => 'Package',
		'description' => "Description",
		'cpu' => "CPU",
		'ram' => "RAM",
		'storage' => "Storage",
		'bandwidth' => "Bandwidth",
		'ipv4' => "IPv4 Addresses",
		'ipv6' => "IPv6 Addresses",
		'network' => "Link Speed",
		'prices' => "Price"
	);

	return $columns;
}

add_filter('manage_edit-dedicatedservers_sortable_columns', 'dedicatedservers_sortable_columns');

function dedicatedservers_sortable_columns($columns) {
	$columns['cpu'] = 'cpu';
	$columns['ram'] = 'ram';
	$columns['storage'] = 'storage';
	$columns['bandwidth'] = 'bandwidth';
	$columns['ipv4'] = 'ipv4';
	$columns['ipv6'] = 'ipv6';
	$columns['network'] = 'network';
	$columns['prices'] = 'price';

	return $columns;
}

add_action('pre_get_posts', 'dedicatedservers_orderby');

function dedicatedservers_orderby($query) {
	if (!is_admin()) {
		return;
	}

	$orderby = $query->get('orderby');

	if ('cpu' == $orderby) {
		$query->set('meta_key', 'package_cpu');
		$query->set('orderby', 'meta_value_num');
	}
	if ('ram' == $orderby) {
		$query->set('meta_key', 'package_ram');
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

add_action('manage_posts_custom_column', 'dedicatedservers_custom_columns');

function dedicatedservers_custom_columns($column) {
	global $post;
	switch ($column) {
		case 'cpu':
			echo esc_html(get_post_meta( $post->ID, 'package_cpu', true));
			break;
	}
}

?>