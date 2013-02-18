<?php

function vaulthost_init_theme_options_page() {
	add_menu_page( 'VaultHost Options', 'VaultHost Options', 'administrator', 'vaulthost_options', 'vaulthost_options_page_display', '');
}
add_action('admin_menu', 'vaulthost_init_theme_options_page');

/* ------------------------------------------------------------------------ * 
 * Social Options
 * ------------------------------------------------------------------------ */   

function vaulthost_init_social_options() {

	if (false == get_option('vaulthost_theme_social_options')) {
		add_option('vaulthost_theme_social_options');
	}

	add_settings_section( 'social_settings_section', 'Social Options', 'vaulthost_social_options_callback', 'vaulthost_theme_social_options' );
	add_settings_field( 'facebook', 'Facebook:', 'vaulthost_facebook_callback', 'vaulthost_theme_social_options', 'social_settings_section');
	add_settings_field( 'twitter', 'Twitter Username:', 'vaulthost_twitter_callback', 'vaulthost_theme_social_options', 'social_settings_section');
	add_settings_field( 'googleplus', 'Google+:', 'vaulthost_googleplus_callback', 'vaulthost_theme_social_options', 'social_settings_section');
	add_settings_field( 'youtube', 'YouTube:', 'vaulthost_youtube_callback', 'vaulthost_theme_social_options', 'social_settings_section');
	add_settings_section( 'twitter_feed_settings_section', 'Twitter Feed Options', 'vaulthost_twitter_feed_options_callback', 'vaulthost_theme_social_options' );
	add_settings_field( 'tweets_to_display', 'Number of tweets to display:', 'vaulthost_tweets_to_display_callback', 'vaulthost_theme_social_options', 'twitter_feed_settings_section');
	register_setting( 'vaulthost_theme_social_options', 'vaulthost_theme_social_options' );

}

add_action('admin_init', 'vaulthost_init_social_options');


/* ------------------------------------------------------------------------ * 
 * Social Options Callbacks
 * ------------------------------------------------------------------------ */   

function vaulthost_social_options_callback() {
	echo '<p>Enter social network usernames below:</p>';
}

function vaulthost_facebook_callback() {

	$options = get_option('vaulthost_theme_social_options');

	$url = '';
	if (isset($options['facebook'])) {
		$url = $options['facebook'];
	}

	echo '<input type="text" id="facebook" name="vaulthost_theme_social_options[facebook]" value="' . $options['facebook'] . '">';

}


function vaulthost_twitter_callback() {

	$options = get_option('vaulthost_theme_social_options');

	$url = '';
	if (isset($options['twitter'])) {
		$url = $options['twitter'];
	}

	echo '<input type="text" id="twitter" name="vaulthost_theme_social_options[twitter]" value="' . $options['twitter'] . '">';

}

function vaulthost_googleplus_callback() {

	$options = get_option('vaulthost_theme_social_options');

	$url = '';
	if (isset($options['googleplus'])) {
		$url = $options['googleplus'];
	}

	echo '<input type="text" id="googleplus" name="vaulthost_theme_social_options[googleplus]" value="' . $options['googleplus'] . '">';

}

function vaulthost_youtube_callback() {

	$options = get_option('vaulthost_theme_social_options');

	$url = '';
	if (isset($options['youtube'])) {
		$url = $options['youtube'];
	}

	echo '<input type="text" id="youtube" name="vaulthost_theme_social_options[youtube]" value="' . $options['youtube'] . '">';

}


function vaulthost_twitter_feed_options_callback() {

	echo '<p>Twitter feed options below:</p>';

}

function vaulthost_tweets_to_display_callback() {

	$options = get_option('vaulthost_theme_social_options');

	$amount = '3';
	if (isset($options['tweets_to_display'])) {
		$amount = $options['tweets_to_display'];
	}

	echo '<input type="number" id="tweets_to_display" name="vaulthost_theme_social_options[tweets_to_display]" value="' . $options['tweets_to_display'] . '">';

}





/* ------------------------------------------------------------------------ * 
 * General Options
 * ------------------------------------------------------------------------ */   

function vaulthost_init_general_options() {
	if (false == get_option('vaulthost_theme_general_options')) {
		add_option('vaulthost_theme_general_options');
	}

	add_settings_section( 'general_options_section', 'General Options', 'vaulthost_general_options_callback', 'vaulthost_theme_general_options' );
	add_settings_field( 'logo', 'Logo:', 'vaulthost_logo_callback', 'vaulthost_theme_general_options', 'general_options_section');
	add_settings_field( 'description', 'Description:', 'vaulthost_description_callback', 'vaulthost_theme_general_options', 'general_options_section');
	register_setting( 'vaulthost_theme_general_options', 'vaulthost_theme_general_options' );

}
add_action('admin_init', 'vaulthost_init_general_options');

function vaulthost_general_options_callback() {
	echo '<p>General Options Thing</p>';
}

function vaulthost_logo_callback() {

	$options = get_option('vaulthost_theme_general_options');

	echo '<p>Logo Upload Goes Here!</p>';

}

function vaulthost_description_callback() {

	$options = get_option('vaulthost_theme_general_options');

	$description = '';
	if (isset($options['description'])) {
		$description = $options['description'];
	}

	echo '<input type="text" id="description" name="vaulthost_theme_general_options[description]" value="' . $options['description'] . '">';
}


/* ------------------------------------------------------------------------ * 
 * Page Rendering
 * ------------------------------------------------------------------------ */   

function vaulthost_options_page_display() {
?>

	<div class="wrap">
		<div id="icon-themes" class="icon32"></div>
		<h2>VaultHost Options</h2>

		<?php settings_errors(); ?>

		<?php 
		$active_tab = isset( $_GET['tab']) ? $_GET['tab'] : 'general_options';


		?>

		<h2 class="nav-tab-wrapper">
			<a href="?page=vaulthost_options&tab=general_options" class="nav-tab <?php echo $active_tab == 'general_options' ? 'nav-tab-active' : ''; ?>">General Options</a>
			<a href="?page=vaulthost_options&tab=social_options" class="nav-tab <?php echo $active_tab == 'social_options' ? 'nav-tab-active' : ''; ?>">Social Options</a>
			<a href="?page=vaulthost_options&tab=contact_options" class="nav-tab <?php echo $active_tab == 'contact_options' ? 'nav-tab-active' : ''; ?>">Contact Options</a>
		</h2>	

		<form method="post" action="options.php">

			<?php 
				if ($active_tab == 'general_options') {
					settings_fields( 'vaulthost_theme_general_options' );
					do_settings_sections( 'vaulthost_theme_general_options' );
					submit_button();

				} else if ($active_tab == 'social_options') {
					settings_fields( 'vaulthost_theme_social_options' );
					do_settings_sections( 'vaulthost_theme_social_options' );
					submit_button();
				}
			?>
		</form>

	</div>


<?php }

?>