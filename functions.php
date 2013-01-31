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
	return 'http://vaulthost.d-tomlinson.co.uk';
}
add_filter('login_headerurl','login_logo_url');

/* ------------------------------------------------------------------------ * 
 * Admin Area Styling and Tweaks
 * ------------------------------------------------------------------------ */   

function change_footer_content() {
	echo 'Website designed and created by Daniel Tomlinson';
}

add_filter('admin_footer_text','change_footer_content');

?>
