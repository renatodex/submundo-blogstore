<?php

if ( function_exists( 'vc_set_as_theme' ) ) {

	// Init functions

	vc_set_as_theme( true );
	vc_disable_frontend();
	vc_set_default_editor_post_types( array( 'page' ) );
	vc_set_template_dir( get_template_directory() . '/includes/vc-extra/vc_templates/');

	// Include property files
	
	require_once('vc-dependencies.php');
	require_once('vc-map.php');

	// Remove some of the elements

	//vc_remove_element('vc_posts_grid');
	vc_remove_element('vc_accordion');
	vc_remove_element('vc_carousel');
	vc_remove_element('vc_cta_button');
	vc_remove_element('vc_cta_button2');
	vc_remove_element('vc_btn');
	vc_remove_element('vc_button');
	vc_remove_element('vc_button2');
	vc_remove_element('vc_facebook');
	vc_remove_element('vc_gallery');
	vc_remove_element('vc_googleplus');
	vc_remove_element('vc_images_carousel');
	vc_remove_element('vc_item');
	vc_remove_element('vc_items');
	vc_remove_element('vc_pinterest');
	vc_remove_element('vc_posts_slider');
	vc_remove_element('vc_toggle');
	vc_remove_element('vc_tweetmeme');
	vc_remove_element("vc_message");
	vc_remove_element('vc_pie');
	vc_remove_element('vc_video');
	vc_remove_element('vc_gmaps');
	vc_remove_element('vc_empty_space');
	vc_remove_element('vc_custom_heading');

	add_action( 'admin_head', 'remove_my_meta_box' );
	function remove_my_meta_box() {
		remove_meta_box("vc_teaser", "portfolio", "side");
		remove_meta_box("vc_teaser", "page", "side"); 
	}

	// Columns

	function wi_translateColumnWidth($width) {
	  switch ( $width ) {
	    case "1/6" :
	      $w = "two columns";
	      break;    
	    case "1/4" :
	      $w = "three columns";
	      break;
	    case "1/3" :
	      $w = "four columns";
	      break;
	    case "2/4" :
	      $w = "six columns";
	    case "1/2" :
	      $w = "six columns";
	      break;
	    case "4/6" :
	    	$w = "eight columns";
	    	break;
	    case "2/3" :
	      $w = "eight columns";
	      break;    
	    case "1/1" :
	      $w = "twelve columns";
	      break;
	    default :
	      $w = $width;
	  }
	  return $w;
	}

	// Replace the classes for the vc_row and vc_column shortcodes

	function custom_css_classes_for_vc_row_and_vc_column( $class_string, $tag ) {

		if ($tag=='vc_row' || $tag=='vc_row_inner') {
			$class_string = str_replace(array('vc_row', 'vc_row_inner'), 'wi-column-row clearfix', $class_string);
		}

		if ($tag=='vc_column' || $tag=='vc_column_inner') {
			$class_string = preg_replace('/vc_col\-(xs|sm|md|lg)\-(\d{1,2})/', 'span$2', $class_string);
			$class_string = str_replace(array('wpb_column','vc_row'), 'wi-column-container clearfix', $class_string);
		}

		return $class_string;

	}

	add_filter('vc_shortcodes_css_class', 'custom_css_classes_for_vc_row_and_vc_column', 10, 2);


}

?>