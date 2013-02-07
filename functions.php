<?php 

register_menus();

function register_menus() {
	register_nav_menus( 
		array(
			'topbar-menu' => __( 'Top Bar Menu' ),
			'main-menu' => __( 'Main Navigation Menu' )
		) 
	);
}

/* ------------------------------------------------------------------------ * 
 * WP-Login Page Styling and Tweaks
 * ------------------------------------------------------------------------ */   

function login_stylesheet() {
	wp_enqueue_style( 'login_stylesheet', get_template_directory_uri().'/css/login.css');
}
add_action('login_head', 'login_stylesheet');

function login_logo_url($url) {
	return get_site_url();
}
add_filter('login_headerurl','login_logo_url');

/* ------------------------------------------------------------------------ * 
 * Admin Area Styling and Tweaks
 * ------------------------------------------------------------------------ */   

function change_footer_content() {
	echo 'Website designed and created by Daniel Tomlinson';
}

add_filter('admin_footer_text','change_footer_content');

/* ------------------------------------------------------------------------ * 
 * Theme Options Page
 * ------------------------------------------------------------------------ */ 


add_action('admin_init', 'theme_options_init');
add_action('admin_menu', 'theme_options_add_page');

function theme_options_init() {
	register_setting( 'vaulthost_options', 'vaulthost_theme_options');
}

function theme_options_add_page() {
	add_theme_page( __('Theme Options', 'vaulthosttheme'), __('Theme Options', 'vaulthosttheme'), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

function theme_options_do_page() {
	global $select_options;

	if (! isset($_REQUEST['settings-updated']))
		$_REQUEST['settings-updated'] = false;
		$html = '<div class="wrap">';
			$html .= screen_icon();
			$html .= "<h2>". __('VaultHost Theme Options', 'vaulthosttheme') . "</h2>";
		$html .= '</div>';

	echo $html;

}


function vaulthost_theme_options_display() {

	$html = '<div class="wrap">';
		$html .= screen_icon();
		$html .= '<h2>VaultHost Theme Options</h2>';
	$html .= '</div>';

	echo $html;

}





?>
