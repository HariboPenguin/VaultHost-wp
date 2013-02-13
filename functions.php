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

	if ( false == get_option( 'vaulthost_social_options' )) {
		add_option('vaulthost_social_options');
	}

	register_setting( 'vaulthost_social_options', 'vaulthost_social_fb_option');
	register_setting( 'vaulthost_social_options', 'vaulthost_social_twitter_option');
	register_setting( 'vaulthost_social_options', 'vaulthost_social_googleplus_option');
}

function theme_options_add_page() {
	add_theme_page( __('Theme Options', 'vaulthosttheme'), __('Theme Options', 'vaulthosttheme'), 'edit_theme_options', 'theme_options', 'render_theme_options_page' );
}

function old_theme_options_page() {
	global $select_options;

	if (! isset($_REQUEST['settings-updated']))
		$_REQUEST['settings-updated'] = false;
		$html = '<div class="wrap">';
			$html .= screen_icon();
			$html .= "<h2>". __('VaultHost Theme Options', 'vaulthosttheme') . "</h2>";
		$html .= '</div>';

	echo $html;

}

function render_theme_options_page() {
?>

	<?php $options = get_option('vaulthost_social_options') ?>

	<div class="wrap">
		<?php screen_icon(); ?>
		<h2>VaultHost Theme Options</h2>

	</div>

	<div class="options">
		<h3>Social Options</h3>

		<form method="post" action="options.php">

			<?php settings_fields( 'vaulthost_social_options' ); ?>
			<?php do_settings_sections( 'vaulthost_social_options' ); ?>

			<label for="fb_option">Facebook:</label>
			<input type="text" id="fb_option" name="vaulthost_social_fb_option" value="<?php echo get_option( 'vaulthost_social_fb_option' ); ?>" /> </br>
			<label for="twitter_option">Twitter:</label>
			<input type="text" id="fb_option" name="vaulthost_social_twitter_option" value="<?php echo get_option( 'vaulthost_social_twitter_option' ); ?>" /> </br>
			<label for="googleplus_option">Google+:</label>
			<input type="text" id="fb_option" name="vaulthost_social_googleplus_option" value="<?php echo get_option( 'vaulthost_social_googleplus_option' ); ?>" /> </br>

			<?php submit_button(); ?>

		</form>

	</div>

<?php }

?>
