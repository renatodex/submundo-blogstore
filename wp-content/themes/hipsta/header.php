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

	<body id="body" <?php body_class(); ?>>

		<div id="preloader" class="preloader"><div class="preloader-mark"></div></div>

		<div id="wrapper">
			<header class="header">
				<div class="clearfix">
					<div class="container">
						<div class="twelve columns">
							<div class="logo">
								<?php if ( get_option( 'wi_logo' ) != '' ) : ?>
									<a class="logo-img" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_option( 'wi_logo' ); ?>" /></a>
								<?php else : ?>
									<a class="link logo-text" href="<?php echo esc_url( home_url( '/' ) ); ?>" ><?php bloginfo( 'name' ); ?></a>
								<?php endif; ?>
							</div> <!-- end logo -->

							<div class="navicon">
								<a><i class="fa fa-bars"></i></a>
							</div>

							<div class="nav-menu">
								<nav>
									<span class="close close-icon"><i class="fa fa-times"></i></span>
									<?php if ( has_nav_menu( 'primary' ) ) { ?>
										<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'menu-list' ) ); ?>
									<?php } else { ?>
										<div class="menu-list"><a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>">Set up a navigation menu</a></div>
									<?php } ?>
								</nav>
								<?php wi_social_icons(); ?>
							</div>

							<!-- end-navigation -->
						</div>
					</div>
				</div>
			</header> <!-- end-header -->
			
			<main class="main-site">
				<?php wi_page_header(); ?>