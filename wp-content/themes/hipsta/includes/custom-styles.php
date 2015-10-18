<?php 

if( ! function_exists( 'wi_custom_css' ) ) {

	function wi_custom_css() {

		/* ------------------------------------------------------------------------ */
		/*  Get Options
		/* ------------------------------------------------------------------------ */
		
		$colors = get_option( 'wi_colors' );

		// Create Custom CSS

		$custom_css = '

		a:hover, a:focus, a.logo-text:hover, .post-header .post-title a:hover, .portfolio-filter span a.active, .portfolio-filter span a:hover, .social-icons a:hover, .portfolio-details .portfolio-meta .portfolio-share a:hover, .portfolio-navigation .portfolio-navigation-right a:hover, .portfolio-navigation .portfolio-navigation-left a:hover, .member .details .social-icons a:hover { color: ' . $colors['main'] . '; }
		.tagcloud a:hover, .vc_progress_bar .vc_single_bar .vc_bar { background: ' . $colors['main'] . '; }
		.btn, .button, button, input[type="submit"], input[type="reset"], input[type="button"] { border-color: ' . $colors['main'] . '; color: ' . $colors['main'] . '; }
		.btn:hover, .button:hover, button:hover, input[type="submit"]:hover, input[type="reset"]:hover, input[type="button"]:hover, .button:focus, button:focus, input[type="submit"]:focus, input[type="reset"]:focus, input[type="button"]:focus { background: ' . $colors['main'] . '; }
		.footer .back-to-top svg:hover { fill: ' . $colors['main'] . '; }
		';

		$custom_css .= ot_get_option( 'wi_custom_css', '' );

		// Embed Custom CSS

		wp_add_inline_style( 'wi-style', $custom_css );

	}

}

add_action( 'wp_enqueue_scripts', 'wi_custom_css', 101 );


?>