<?php 

add_action('wp_ajax_wi_import_ajax', 'wi_import_data');

function wi_import_data() {

	// Load Importer API
	require_once ABSPATH . 'wp-admin/includes/import.php';
	$importerError = false;
  
  $file = get_template_directory() ."/includes/democontent/demo-content.xml";
	

	if ( !class_exists( 'WP_Importer' ) ) {
		$class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
		if ( file_exists( $class_wp_importer ) ) 
			require_once($class_wp_importer);
		else 
			$importerError = true;
	}
    
	
	if($importerError !== false) {
		echo ("The Auto importing script could not be loaded. Please use the wordpress importer and import the XML file that is located in your themes folder manually.");
	} else {
		
		if(class_exists('WP_Importer')){
			try{
				$importer = new WP_Import();
				$importer->fetch_attachments = true;
				$importer->import($file);
		         
				wi_update_options();
                wi_update_menus();
                wi_import_theme_options();
			  
		    die('Success!');
				
			} catch (Exception $e) {
				echo ("Error while importing");
			}
	
		}
		
	}
		
	die();
}

function wi_import_theme_options() {
	$file = get_template_directory_uri() ."/includes/democontent/theme-options.txt";
	$theme_options_txt = wp_remote_get( $file );

	$options = unserialize( ot_decode( $theme_options_txt['body'] ) );
	
	/* get settings array */
	$settings = get_option( ot_settings_id() );
	
    /* validate options */
    foreach( $settings['settings'] as $setting ) {

        if ( isset( $options[$setting['id']] ) ) {
          
          $content = ot_stripslashes( $options[$setting['id']] );
          
          $options[$setting['id']] = ot_validate_setting( $content, $setting['type'], $setting['id'] );
          
        }
  }
  
  /* update the option tree array */
  update_option( ot_options_id(), $options );
  
  $message = 'success';
	  
	
}
function wi_update_options() {
	global $options_presets;
	$home = get_page_by_title('We create exiting stuff');
	$blog = get_page_by_title('Blog');
	
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $home->ID );
	update_option( 'page_for_posts', $blog->ID );
	
	// We no longer need to install pages for WooCommerce
    delete_option( '_wc_needs_pages' );
    delete_transient( '_wc_activation_redirect' );

  // Flush rules after install
  flush_rewrite_rules();
}

function wi_update_menus(){
	
	global $wpdb;
	
    $menuname = 'primary';
	$menulocation = 'primary';
	
	$tablename = $wpdb->prefix.'terms';
	$menu_ids = $wpdb->get_results(
	    "
	    SELECT term_id
	    FROM ".$tablename." 
	    WHERE name= '".$menuname."'
	    "
	);
	
	// results in array 
	foreach($menu_ids as $menu):
	    $menu_id = $menu->term_id;
	endforeach; 

  if( !has_nav_menu( $menulocation ) ){
      $locations = get_theme_mod('nav_menu_locations');
      $locations[$menulocation] = $menu_id;
      set_theme_mod( 'nav_menu_locations', $locations );
  }      
}