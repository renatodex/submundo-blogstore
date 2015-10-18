<?php 

/* ------------------------------------------------------------------------ */
/* Setup OptionTree
/* ------------------------------------------------------------------------ */

add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
add_filter( 'ot_show_new_layout', '__return_false' );
require_once( 'option-tree/ot-loader.php' );

function filter_ot_upload_text(){
	return __( 'Insert', 'weekend' );
}
function filter_ot_header_list(){
	echo '<li id="option-tree-version"><span>' . __( 'Hipsta Options', 'weekend' ) . '</span></li>';
}
function filter_ot_header_version_text(){
	return '1.0.0';
}

add_filter( 'ot_header_list', 'filter_ot_header_list' );
add_filter( 'ot_upload_text', 'filter_ot_upload_text' );
add_filter( 'ot_header_version_text', 'filter_ot_header_version_text');

/* ------------------------------------------------------------------------ */
/* Theme setup
/* ------------------------------------------------------------------------ */

function wi_theme_setup() {

	// Translation

	load_theme_textdomain( 'weekend', get_template_directory() . '/languages' );

	// Custom menu

	register_nav_menus( array(
		'primary' => __( 'Header Menu', 'weekend' ),
	) );

	// Add post thumbnail (featured image) support

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 480, 480, true );
	add_image_size( 'portfolio', 480, '', true );

	// WP 4.1 title tag

	add_theme_support( 'title-tag' );

	// Add feed link support

	add_theme_support( 'automatic-feed-links' );

	// Define content width (stupid feature, this theme has no width)

	if( ! isset( $content_width ) ) {
		$content_width = 940;
	}

}
add_action( 'after_setup_theme', 'wi_theme_setup' );

/* ------------------------------------------------------------------------ */
/*  TGM plugin activation class
/* ------------------------------------------------------------------------ */

require get_template_directory() . '/includes/plugins.php';

/* ------------------------------------------------------------------------ */
/*  Add enqueue javaScripts & CSS
/* ------------------------------------------------------------------------ */

require get_template_directory() . '/includes/enqueue.php';

/* ------------------------------------------------------------------------ */
/*  Add customizer
/* ------------------------------------------------------------------------ */

require get_template_directory() . '/includes/customizer.php';

/* ------------------------------------------------------------------------ */
/*  Add custom style
/* ------------------------------------------------------------------------ */

require get_template_directory() . '/includes/custom-styles.php';

/* ------------------------------------------------------------------------ */
/*  Add theme options
/* ------------------------------------------------------------------------ */

require get_template_directory() . '/includes/theme-options.php';

/* ------------------------------------------------------------------------ */
/*  Add metaboxes
/* ------------------------------------------------------------------------ */

require get_template_directory() . '/includes/metaboxes.php';

/* ------------------------------------------------------------------------ */
/*  Call SVG
/* ------------------------------------------------------------------------ */

require get_template_directory() . '/includes/wi-svg.php';

/* ------------------------------------------------------------------------ */
/*  Visual Composer Integration
/* ------------------------------------------------------------------------ */

require get_template_directory() . '/includes/vc-extra/vc-init.php';

/* ------------------------------------------------------------------------ */
/*  AQ resizer
/* ------------------------------------------------------------------------ */

require get_template_directory() . '/includes/aq_resizer.php';

/* ------------------------------------------------------------------------ */
/*  Wordpress Importer
/* ------------------------------------------------------------------------ */

if ( is_admin() ) {
	if(!class_exists('WP_Import'))
		require_once( trailingslashit(get_template_directory()) . 'includes/wordpress-importer/wordpress-importer.php');
	require_once( trailingslashit(get_template_directory()) . 'includes/import.php');
}

/*---------------------------------
    Navigation Walker
------------------------------------*/

class Wi_Nav_Walker extends Walker_Nav_Menu {

    function start_lvl( &$output, $depth=0, $args=array() ) {
    	if ( $depth == 0 ) {
        	$output .= '<ul class="sub-menu">';
    	} else if ( $depth == 1 ) {
        	$output .= '<ul class="third-menu">';
    	}
    }
}

/* ------------------------------------------------------------------------ */
/* Social icons
/* ------------------------------------------------------------------------ */

function wi_social_icons() {
	$facebook = get_theme_mod( 'wi_facebook' );
	$twitter = get_theme_mod( 'wi_twitter' );
	$behance = get_theme_mod( 'wi_behance' );
	$dribbble = get_theme_mod( 'wi_dribbble' );
	$flickr = get_theme_mod( 'wi_flickr' );
	$instagram = get_theme_mod( 'wi_instagram' );
	$googleplus = get_theme_mod( 'wi_googleplus' );
	$youtube = get_theme_mod( 'wi_youtube' );
	$vimeo = get_theme_mod( 'wi_vimeo' );
	$pinterest = get_theme_mod( 'wi_pinterest' );
	$soundcloud = get_theme_mod( 'wi_soundcloud' );
	$github = get_theme_mod( 'wi_github' );
	$linkedin = get_theme_mod( 'wi_linkedin' );
	$rss = get_theme_mod( 'wi_rss' );

	if ( ! $facebook && ! $twitter && ! $behance && ! $flickr && ! $instagram && ! $googleplus && ! $youtube && ! $vimeo && ! $pinterest && ! $github && ! $linkedin && ! $rss ) {
		return;
	}

	echo '<div class="social-icons">';
		if ( $facebook ) echo  '<a href="' . esc_url( $facebook ) . '" target="_blank"><i class="fa fa-facebook"></i></a>';
		if ( $twitter ) echo '<a href="' . esc_url( $twitter ) . '"><i class="fa fa-twitter"></i></a>';
		if ( $behance ) echo  '<a href="' . esc_url( $behance ) . '"><i class="fa fa-behance"></i></a>';
		if ( $dribbble ) echo  '<a href="' . esc_url( $dribbble ) . '"><i class="fa fa-dribbble"></i></a>';
		if ( $flickr ) echo  '<a href="' . esc_url( $flickr ) . '"><i class="fa fa-flickr"></i></a>';
		if ( $instagram ) echo  '<a href="' . esc_url( $instagram ) . '"><i class="fa fa-instagram"></i></a>';
		if ( $googleplus ) echo  '<a href="' . esc_url( $googleplus ) . '"><i class="fa fa-google-plus"></i></a>';
		if ( $youtube ) echo  '<a href="' . esc_url( $youtube ) . '"><i class="fa fa-youtube"></i></a>';
		if ( $vimeo ) echo  '<a href="' . esc_url( $vimeo ) . '"><i class="fa fa-vimeo-square"></i></a>';
		if ( $pinterest ) echo  '<a href="' . esc_url( $pinterest ) . '"><i class="fa fa-pinterest"></i></a>';
		if ( $github ) echo  '<a href="' . esc_url( $github ) . '"><i class="fa fa-github"></i></a>';
		if ( $linkedin ) echo  '<a href="' . esc_url( $linkedin ) . '"><i class="fa fa-linkedin"></i></a>';
		if ( $rss ) echo  '<a href="' . esc_url( $rss ) . '"><i class="fa fa-rss"></i></a>';
	echo '</div>';
}

/* ------------------------------------------------------------------------ */
/* Google fonts
/* ------------------------------------------------------------------------ */

function wi_google_fonts() {
	$fonts_url = '';
	$font_families = array();
	$font_families[] = 'Oswald:400,300';
	$font_families[] = 'PT+Serif:400italic,700italic';
	$protocol = is_ssl() ? 'https' : 'http';
	$query_args = array(
		'family' => implode( '|', $font_families ),
		'subset' => 'latin,latin-ext',
	);
	$fonts_url = add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" );

	wp_enqueue_style( 'google-fonts', esc_url_raw( $fonts_url ), array(), null );
}
add_action( 'wp_enqueue_scripts', 'wi_google_fonts' );

/* ------------------------------------------------------------------------ */
/* Title tag up to WP 4.1
/* ------------------------------------------------------------------------ */

if ( ! function_exists( '_wp_render_title_tag' ) ) {

	function theme_slug_render_title() {
	    echo '<title>' . wp_title( '|', false, 'right' ) . "</title>\n";
	}

	add_action( 'wp_head', 'theme_slug_render_title' );

	function wi_filter_wp_title( $title, $separator ) {

		if ( is_feed() ) return $title;

		global $paged, $page;

		if ( is_search() ) {

			$title = sprintf( __( 'Search results for %s', 'iwrite' ), '"' . get_search_query() . '"' );
			if ( $paged >= 2 )
				$title .= " $separator " . sprintf( __( 'Page %s', 'iwrite' ), $paged );
			$title .= " $separator " . get_bloginfo( 'name', 'display' );
			return $title;
		}

		$title .= get_bloginfo( 'name', 'display' );
		$site_description = get_bloginfo( 'description', 'display' );

		if ( $site_description && ( is_home() || is_front_page() ) )
			$title .= " $separator " . $site_description;

		if ( $paged >= 2 || $page >= 2 )
			$title .= " $separator " . sprintf( __( 'Page %s', 'iwrite' ), max( $paged, $page ) );

		return $title;

	}

	add_filter( 'wp_title', 'wi_filter_wp_title', 10, 2 );
}

/* ------------------------------------------------------------------------ */
/* Page header
/* ------------------------------------------------------------------------ */

function wi_page_header() {
	$title = '';
	$subtitle = '';

	if ( is_front_page() && is_home() ) {
		$title = get_theme_mod( 'wi_default_blog_title', 'Blog' );
		$subtitle = get_theme_mod( 'wi_default_blog_subtitle', 'Blog subtitle' );
	} elseif ( is_singular( 'post' ) ) {
		$title = get_the_title();
		$subtitle = get_the_date() . ' - ' . get_the_category_list( ', ' );
	} elseif ( is_home() ) {
		$blog = get_post( get_option( 'page_for_posts' ) );
		$title = $blog->post_title;
		$subtitle = get_post_meta( $blog->ID, 'wi_subtitle', true );
	} elseif ( is_tax() ) {
		$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
		$title = $term->name;
		$subtitle = category_description();
	} elseif ( is_category() ) {
		$title = single_cat_title( '', false );
		$subtitle = category_description();
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
		$subtitle = tag_description();
	} elseif ( is_day() ) {
		$title = get_the_date();
		$subtitle = __( 'Daily archives', 'weekend' );
	} elseif ( is_month() ) {
		$title = get_the_date( 'F Y' );
		$subtitle = __( 'Monthly archives', 'weekend' );
	} elseif ( is_year() ) {
		$title = get_the_date( 'Y' );
		$subtitle = __( 'Yearly archives', 'weekend' );
	} elseif ( is_author() ) {
		$title = get_the_author();
		$subtitle = __( 'Author archives', 'weekend' );
	} elseif ( is_search() ) {
		$title = __( 'Search results for: ', 'weekend' ) . get_search_query();
	} elseif ( is_404() ) {
		$title = __( 'Error 404', 'weekend' );
		$subtitle = __( 'Page not found', 'weekend' );
	} else {
		$title = get_the_title();
		$subtitle = get_post_meta( get_the_ID(), 'wi_subtitle', true );
	}

	echo '<div class="page-header">';
		echo '<div class="container">';
			echo '<div class="twelve columns">';
				echo '<h1 class="page-title text-alt">' . $title . '</h1>';

				if ( $subtitle ) {
					echo '<div class="page-subtitle">' . $subtitle . '</div>';
				}
			echo '</div>';
		echo '</div>';
	echo '</div>';
}

/* ------------------------------------------------------------------------ */
/* Posts Meta
/* ------------------------------------------------------------------------ */

function wi_post_meta() {

	if ( is_sticky() && is_home() && ! is_paged() ) {
		echo '<span class="post-sticky">' . __( 'Sticky', 'weekend' ) . '</span><span class="separator">-</span>';
	}

	printf( '<span class="post-date"><a href="%1$s" rel="bookmark"><time datetime="%2$s">%3$s</time></a></span><span class="separator">-</span>', esc_url( get_permalink() ), esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() ) );

	if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="post-comments">'; comments_popup_link(); echo '</span><span class="separator">-</span>';
	}

	echo '<span class="post-categories">' . get_the_category_list( ', ' ) . '</span>';

}

/* ------------------------------------------------------------------------ */
/* Page Navigation
/* ------------------------------------------------------------------------ */

function wi_page_nav() {
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => '<i class="fa fa-angle-left"></i>',
		'next_text' => '<i class="fa fa-angle-right"></i>'
	) );

	if ( $links ) {
		echo '<nav class="page-navigation" role="navigation">';
			echo $links;
		echo '</nav>';
	}
}

/* ------------------------------------------------------------------------ */
/* Post Navigation
/* ------------------------------------------------------------------------ */

function wi_post_nav() {
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next = get_adjacent_post( false, '', false );

	if ( ! $previous && ! $next ) {
		return;
	}

	echo '<div class="twelve columns">';
		echo '<nav class="post-navigation clearfix" role="navigation">';
			previous_post_link( '%link', __( '<i class="fa fa-angle-left"></i> Previous Post', 'weekend' ) );
			next_post_link( '%link', __( 'Next Post <i class="fa fa-angle-right"></i>', 'weekend' ) );
		echo '</nav>';
	echo '</div>';
}

/* ------------------------------------------------------------------------ */
/* portfolio Navigation
/* ------------------------------------------------------------------------ */

function wi_portfolio_nav() {

	echo '<div class="twelve columns">';
		echo '<nav class="portfolio-navigation" role="navigation">';
			echo '<span class="portfolio-navigation-left">';
				if ( get_adjacent_post( false, '', true ) ) {
					previous_post_link( '%link', __( '&larr; Previous portfolio', 'weekend' ) );
				} else {
					echo __( '&larr; Previous portfolio', 'weekend' );
				};
			echo '</span>';

			echo '<span class="portfolio-navigation-right">';
				if ( get_adjacent_post( false, '', false ) ) {
					next_post_link( '%link', __( 'Next portfolio &rarr;', 'weekend' ) );
				} else {
					echo __( 'Next portfolio &rarr;', 'weekend' );
				};
			echo '</span>';
		echo '</nav>';
	echo '</div>';
}

/* ------------------------------------------------------------------------ */
/* Redefine the search form structure
/* ------------------------------------------------------------------------ */

if ( ! function_exists( 'wi_search_form' ) ) {

	function wi_search_form( $form ) {

	    $form = '
		<form role="search" method="get" class="search-form" action="' . home_url( '/' ) . '" >
			<label>
				<span class="screen-reader-text" for="s">' . __( 'Search for:', 'weekend' ) . '</span>
				<input type="search" class="search-field" placeholder="' . __( 'Type and hit Enter', 'weekend' ) . '" name="s" title="' . __( 'Search for:', 'weekend' ) . '" />
			</label>
			<input type="submit" class="search-submit" value="' . __( 'Search', 'weekend' ) . '" />
	    </form>';

	    return $form;
		
	}

}

add_filter( 'get_search_form', 'wi_search_form' );

/* ------------------------------------------------------------------------ */
/* Register sidebar
/* ------------------------------------------------------------------------ */

function wi_sidebars() {
	register_sidebar( array(
		'name' 			=> 'Default sidebar',
		'id' 			=> 'sidebar',
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h4 class="widget-title text-alt">',
		'after_title'	=> '</h4>',
	) );
};
add_action( 'widgets_init', 'wi_sidebars' );

/* ------------------------------------------------------------------------ */
/* Insert analytics code into the footer
/* ------------------------------------------------------------------------ */

if ( ! function_exists( 'wi_analytics' ) ) {

	function wi_analytics() {
		echo ot_get_option( 'wi_tracking' );
	}

}

add_filter( 'wp_footer', 'wi_analytics' );

/* ------------------------------------------------------------------------ */
/* Comments form fields
/* ------------------------------------------------------------------------ */

function wi_comment_fields_placeholders( $fields ) {
	$req = get_option( 'require_name_email' );

    $fields['author'] = str_replace( 'name="author"', 'placeholder="' . __( 'Name', 'weekend' ) . ( $req ? ' *' : '' ) . '" name="author"', $fields['author'] );
    $fields['email'] = str_replace( 'name="email"', 'placeholder="' . __( 'Email', 'weekend' ) . ( $req ? ' *' : '' ) . '" name="email"', $fields['email'] );
    $fields['url'] = str_replace( 'name="url"', 'placeholder="' . __( 'Website', 'weekend' ) . '" name="url"', $fields['url'] );

    return $fields;
}
add_filter( 'comment_form_default_fields', 'wi_comment_fields_placeholders' );

function wi_comment_textarea_placeholder( $fields ) {
	$fields['comment_field'] = str_replace( 'name="comment"', 'placeholder="' . __( 'Comment', 'weekend' ) . '" name="comment"', $fields['comment_field'] );

	return $fields;
}
add_filter( 'comment_form_defaults', 'wi_comment_textarea_placeholder' );

/* ------------------------------------------------------------------------ */
/* Change default excerpt
/* ------------------------------------------------------------------------ */

function wi_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'wi_excerpt_length', 999 );

function wi_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'wi_excerpt_more' );

/* ------------------------------------------------------------------------ */
/* Exclude pages from search
/* ------------------------------------------------------------------------ */

function wi_search_filter( $query ) {
	if ( $query->is_search ) {
		$query->set( 'post_type', 'post' );
	}

	return $query;
}
add_filter( 'pre_get_posts', 'wi_search_filter' );

/* ------------------------------------------------------------------------ */
/* Portfolio Categories Array
/* ------------------------------------------------------------------------ */

function wi_portfolioCategories(){
	$portfolio_categories = get_categories(array('taxonomy'=>'portfolio-category'));
	$out = array();

	foreach($portfolio_categories as $portfolio_category) {
		$out[$portfolio_category->cat_name] = $portfolio_category->term_id;
	}

	return $out;
}

?>