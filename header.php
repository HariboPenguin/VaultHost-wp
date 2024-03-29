<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section, top-bar and page <header>
 *
 * @package WordPress
 * @subpackage VaultHost 
 * @since VaultHost 1.0 
 */
?>
<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php wp_title( '|', true, 'right' );  bloginfo( 'name' ); echo " | "; echo get_bloginfo( 'description', 'display' );?></title>

	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
	<!-- css -->
	<!-- <link rel="stylesheet" href="css/reset.css"> -->
	<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ) ?>/font-awesome.css">
	<link rel="stylesheet" href="<?php bloginfo( 'template_directory') ?>/css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo( 'template_directory') ?>/slider-themes/bar/bar.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!-- end css -->

	<!--[if lt IE 9]>
		<script src="<?php bloginfo('template_directory') ?>/js/html5shiv.js"></script>
	<![endif]-->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="<?php bloginfo( 'template_directory') ?>/js/jquery.nivo.slider.pack.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(window).load(function() {
		    $('#slider').nivoSlider();
		});
	</script>

<?php wp_head(); ?>

</head>
<body>

	<div id="topbar">
		<div class="wrapper">
			<?php $options = get_option('vaulthost_theme_general_options'); ?>
			<p id="currentoffer"><span>CURRENT PROMO:</span> <?php echo $options['current_promo']; ?></p>
			<?php wp_nav_menu( array(
				'theme_location'  => 'topbar-menu',
				'menu'            => '', 
				'container'       => 'div', 
				'container_class' => 'menu-topbar-container', 
				'container_id'    => 'toplinks',
				'menu_class'      => 'menu', 
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => false,
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 0,
				'walker'          => '' ) );?>
		</div>
	</div>
	<div style="clear:both"></div>
	<header>
		<div class="wrapper">
			<?php $options = get_option('vaulthost_theme_general_options'); ?>
			<?php if ( $options['logourl'] != '' ): ?>
				<div id="logo">
					<a href="<?php echo get_home_url(); ?>"><img src="<?php echo $options['logourl'] ;?>"/></a>
				</div>
			<?php else: ?>
				<h1><?php bloginfo( 'name' ); ?></h1>
			<?php endif; ?>
			<?php wp_nav_menu( array(
				'theme_location'  => 'main-menu',
				'menu'            => '', 
				'container'       => 'nav', 
				'container_class' => 'menu-main-nav-container', 
				'container_id'    => '',
				'menu_class'      => 'menu', 
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 0,
				'walker'          => '' ) ) ?>
		</div>
	</header>