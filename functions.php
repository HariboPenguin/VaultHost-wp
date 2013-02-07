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

function vaulthost_theme_menu() {

	add_theme_page( 'VaultHost Options', 'VaultHost Options', 'administrator', 'vaulthost_theme_options', 'vaulthost_theme_options_display' );

}

add_action('admin_menu', 'vaulthost_theme_menu');


function vaulthost_theme_options_display() {

	$html = '<div class="wrap">';
		$html .= screen_icon();
		$html .= '<h2>VaultHost Theme Options</h2>';
	$html .= '</div>';

	echo $html;

}

/* ------------------------------------------------------------------------ * 
 * Setting Registration
 * ------------------------------------------------------------------------ */ 

function vaulthost_initialize_theme_options() {

	add_settings_section( 'general_settings_section', 'VaultHost Options', 'vaulthost_general_options_callback', 'general' );


}

add_action('admin_init', 'vaulthost_initialize_theme_options');

?>
