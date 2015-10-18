<?php

function wi_main_styles() {	
	
	/* ------------------------------------------------------------------------ */
	/* Register stylesheets
	/* ------------------------------------------------------------------------ */

	wp_register_style( 'skeleton', get_template_directory_uri() . '/css/skeleton.css', null, null );
	wp_register_style( 'icons', get_template_directory_uri() . '/css/icons.css', null, null );
	wp_register_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', null, null );
	wp_register_style( 'carousel', get_template_directory_uri() . '/css/owl.carousel.css', null, null );
	wp_register_style( 'animate', get_template_directory_uri() . '/css/animate.css', null, null );
	
	/* ------------------------------------------------------------------------ */
	/* Enqueue stylesheets
	/* ------------------------------------------------------------------------ */

	wp_enqueue_style( 'skeleton' );
	wp_enqueue_style( 'icons' );
	wp_enqueue_style( 'font-awesome' );
	wp_enqueue_style( 'carousel' );
	wp_enqueue_style( 'animate' );
	wp_enqueue_style( 'wi-style', get_stylesheet_uri(), null, null );
	
}  
add_action('wp_enqueue_scripts', 'wi_main_styles');

function wi_register_js() {
	
	if (!is_admin()) {

		/* ------------------------------------------------------------------------ */
		/* Register scripts
		/* ------------------------------------------------------------------------ */

		wp_register_script( 'apps', get_template_directory_uri() . '/js/apps.js', 'jquery', null, TRUE );
		wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.min.js', 'jquery', null, TRUE );
		wp_register_script( 'elevator', get_template_directory_uri() . '/js/elevator.min.js', 'jquery', null, TRUE );
		wp_register_script( 'imagesloaded', get_template_directory_uri() . '/js/imagesloaded.js', 'jquery', null, TRUE );
		wp_register_script( 'fitvids', get_template_directory_uri() . '/js/fitvids.js', 'jquery', null, TRUE );
		wp_register_script( 'isotope', get_template_directory_uri() . '/js/isotope.js', 'jquery', null, TRUE );
		wp_register_script( 'fancybox', get_template_directory_uri() . '/js/fancybox.js', 'jquery', null, TRUE );
		wp_register_script( 'carousel', get_template_directory_uri() . '/js/jquery.owl.carousel.min.js', 'jquery', null, TRUE );
		wp_register_script( 'smooth-scroll', get_template_directory_uri() . '/js/smooth-scroll.js', 'jquery', null, TRUE );
		
		/* ------------------------------------------------------------------------ */
		/* Enqueue scripts
		/* ------------------------------------------------------------------------ */

		wp_enqueue_script('jquery');
		wp_enqueue_script('apps' );
		wp_enqueue_script('modernizr' );
		wp_enqueue_script('elevator');
		wp_enqueue_script('imagesloaded');
		wp_enqueue_script('fitvids');
		wp_enqueue_script('isotope');
		wp_enqueue_script('fancybox');
		wp_enqueue_script('carousel');
		wp_enqueue_script('smooth-scroll');

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

}
add_action( 'wp_enqueue_scripts', 'wi_register_js');

function wi_admin_scripts() {

	/* ------------------------------------------------------------------------ */
	/* Register admin script
	/* ------------------------------------------------------------------------ */

	wp_register_script('wi-admin-meta', get_template_directory_uri() . '/js/admin-meta.js', array('jquery'));

	/* ------------------------------------------------------------------------ */
	/* Enqueue admin scripts
	/* ------------------------------------------------------------------------ */

	wp_enqueue_script('wi-admin-meta');

	if (class_exists('WPBakeryVisualComposerAbstract')) {
		wp_enqueue_style( 'vc_custom', get_template_directory_uri() . '/css/vc_custom.css' );
	}
}
add_action('admin_enqueue_scripts', 'wi_admin_scripts');

?>
