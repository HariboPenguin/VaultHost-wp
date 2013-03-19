<?php 

/* ------------------------------------------------------------------------ * 
 * Add Testimonials Custom Post Type
 * ------------------------------------------------------------------------ */   

add_action('init', 'init_testimonials_post_type');

function init_testimonials_post_type() {
	register_post_type( 'testimonials', 
		array(
			'labels' => array(
				'name' => 'Testimonials',
				'singular_name' => 'Testimonial',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Testimonial',
				'edit' => 'Edit',
				'edit_item' => 'Edit Testimonial',
				'new_item' => 'New Testimonial',
				'view' => 'View',
				'view_item' => 'View Testimonial',
				'search_items' => 'Search Testimonials',
				'not_found' => 'No Testimonials found',
				'not_found_in_trash' => 'No Testimonials found in Trash',
				'parent' => 'Parent Testimonials'
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
 * Add Custom Meta Boxes
 * ------------------------------------------------------------------------ */

add_action('add_meta_boxes', 'setup_testimonial_meta_boxes');

function setup_testimonial_meta_boxes() {
	add_meta_box( 'testimonial_options_box', __('Testimonial Options', 'vaulthost'), 'testimonial_options_box_content', 'testimonials', 'normal', 'core');
}

/* ------------------------------------------------------------------------ * 
 * Custom Testimonial Options Meta Box Content
 * ------------------------------------------------------------------------ */   

function testimonial_options_box_content($testimonial) {

	$person_name = esc_html(get_post_meta($testimonial->ID, 'testimonial_person_name', true));
	$company_position = esc_html(get_post_meta($testimonial->ID, 'testimonial_company_position', true));
	$company_name = esc_html(get_post_meta($testimonial->ID, 'testimonial_company_name', true));
	?>

	<table>
		<tr>
			<td><label for="person_name"><?php _e("Person's Name:") ?></label></td>
			<td><input id="person_name" type="text" name="testimonials_testimonial_person_name" value="<?php echo $person_name; ?>" size="30" /></td>
		</tr>
		<tr>
			<td><label for="company_position"><?php _e("Company Position:") ?></label></td>
			<td><input id="company_position" type="text" name="testimonials_testimonial_company_position" value="<?php echo $company_position; ?>" size="30" /></td>
		</tr>
		<tr>
			<td><label for="company_name"><?php _e("Company Name:") ?></label></td>
			<td><input id="company_name" type="text" name="testimonials_testimonial_company_name" value="<?php echo $company_name; ?>" size="30" /></td>
		</tr>
	</table>


<?php }

function add_testimonial_options_box_fields($testimonial_id, $testimonial) {
	if ($testimonial->post_type == 'testimonials') {
		if (isset($_POST['testimonials_testimonial_person_name']) && $_POST['testimonials_testimonial_person_name'] != '' ) {
			update_post_meta($testimonial_id, 'testimonial_person_name', $_POST['testimonials_testimonial_person_name']);
		}
		if (isset($_POST['testimonials_testimonial_company_position']) && $_POST['testimonials_testimonial_company_position'] != '' ) {
			update_post_meta($testimonial_id, 'testimonial_company_position', $_POST['testimonials_testimonial_company_position']);
		}
		if (isset($_POST['testimonials_testimonial_company_name']) && $_POST['testimonials_testimonial_company_name'] != '' ) {
			update_post_meta($testimonial_id, 'testimonial_company_name', $_POST['testimonials_testimonial_company_name']);
		}
	}
}

add_action('save_post', 'add_testimonial_options_box_fields', 10, 2);

/* ------------------------------------------------------------------------ * 
 * Custom Testimonial Columns
 * ------------------------------------------------------------------------ */   

add_filter('manage_edit-testimonials_columns', 'testimonials_edit_columns');

function testimonials_edit_columns() {
	$columns = array(
		'cb' => '<input type=\"checkbox\" />',
		'title' => 'Title',
		'description' => "Description",
		'person_name' => "Person's Name",
		'company_position' => "Company Position",
		'company_name' => "Company Name"
	);

	return $columns;
}

add_filter('manage_edit-testimonials_sortable_columns', 'testimonials_sortable_columns');

function testimonials_sortable_columns($columns) {
	$columns['person_name'] = 'person_name';
	$columns['company_position'] = 'company_position';
	$columns['company_name'] = 'company_name';

	return $columns;
}

add_action('pre_get_posts', 'testimonials_orderby');

function testimonials_orderby($query) {
	if (!is_admin()) {
		return;
	}

	$orderby = $query->get('orderby');

	if ('person_name' == $orderby) {
		$query->set('meta_key', 'testimonial_person_name');
		$query->set('orderby', 'meta_value');
	}
	if ('company_position' == $orderby) {
		$query->set('meta_key', 'testimonial_company_position');
		$query->set('orderby', 'meta_value');
	}
	if ('company_name' == $orderby) {
		$query->set('meta_key', 'testimonial_company_name');
		$query->set('orderby', 'meta_value');
	}
}

add_action('manage_posts_custom_column', 'testimonials_custom_columns');

function testimonials_custom_columns($column) {
	global $post;
	switch ($column) {
		case 'person_name':
			echo esc_html(get_post_meta($post->ID, 'testimonial_person_name', true));
			break;
		case 'company_position':
			echo esc_html(get_post_meta($post->ID, 'testimonial_company_position', true));
			break;
		case 'company_name':
			echo esc_html(get_post_meta($post->ID, 'testimonial_company_name', true));
			break;
	}
}


?>