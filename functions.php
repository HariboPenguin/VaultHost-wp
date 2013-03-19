<?php 

add_theme_support( 'post-thumbnails' ); 

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
include 'theme-options/options.php';

/* ------------------------------------------------------------------------ * 
 * Web Hosting Custom Post Type
 * ------------------------------------------------------------------------ */ 
include 'custom-post-types/webhosting.php';

/* ------------------------------------------------------------------------ * 
 * VPS Custom Post Type
 * ------------------------------------------------------------------------ */ 
include 'custom-post-types/vps.php';

/* ------------------------------------------------------------------------ * 
 * Dedicated Servers Custom Post Type
 * ------------------------------------------------------------------------ */ 
include 'custom-post-types/dedicatedservers.php';

/* ------------------------------------------------------------------------ * 
 * Features Custom Post Stuff
 * ------------------------------------------------------------------------ */
include 'custom-post-types/features.php';

/* ------------------------------------------------------------------------ * 
 * Testimonials Custom Post Type
 * ------------------------------------------------------------------------ */
include 'custom-post-types/testimonials.php';