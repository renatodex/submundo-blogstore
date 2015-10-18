<!doctype html>
<html <?php language_attributes(); ?>>
	<head>

		<!-- Meta Tags -->
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Links -->
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

		<?php if ( get_option( 'wi_fav' ) != '' ) : ?>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_option( 'wi_fav' ); ?>" />
		<?php else : ?>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" />
		<?php endif; ?>

		<?php wp_head(); ?>

		<?php global $post; ?>

	</head>

	<body id="body" <?php body_class( '' . get_option( 'wi_menu_sticky', 'no-sticky' ) ); ?> <?php echo get_option( 'wi_menu_sticky', 'no-sticky' ) == 'sticky' ? ' style="padding-top:' . ( get_option( 'wi_header_height', '140')) . 'px"' : '' ;?>>

		<div id="wrapper">
			
			<main class="main-site notfound">