<?php

/* ------------------------------------------------------------------------ */
/* Initialize the custom theme options.
/* ------------------------------------------------------------------------ */

add_action( 'init', 'custom_theme_options' );

/* ------------------------------------------------------------------------ */
/* Build the custom settings & update OptionTree.
/* ------------------------------------------------------------------------ */

function custom_theme_options() {

  /* ------------------------------------------------------------------------ */
  /* OptionTree is not loaded yet, or this is not an admin request
  /* ------------------------------------------------------------------------ */

  if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
    return false;

  /* ------------------------------------------------------------------------ */
  /* Get a copy of the saved settings array. 
  /* ------------------------------------------------------------------------ */

  $saved_settings = get_option( ot_settings_id(), array() );

  /* ------------------------------------------------------------------------ */
  /* Custom settings array that will eventually be 
  /* passes to the OptionTree Settings API Class.
  /* ------------------------------------------------------------------------ */
  
  $custom_settings = array( 

    'sections'        => array( 

      array(
        'id'          => 'analytics',
        'title'       => 'Analytics'
      ),

      array(
        'id'          => 'css',
        'title'       => 'Custom CSS'
      ),

      array(
        'title'       => 'Demo Content',
        'id'          => 'import'
      ),

      array(
        'id'          => 'log',
        'title'       => '<strong>Changelog</strong>'
      )

    ),

    'settings'        => array( 
      
      array(
        'id'          => 'wi_changelog',
        'label'       => 'Changelog', 'wi',
        'desc'        => '<ul>
                            <li><strong>Version 1.0</strong><br>- First release</li>
                          </ul>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'log',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),

      array(
        'id'          => 'wi_tracking',
        'label'       => 'Analytics code',
        'desc'        => 'Put your Analytics code inside here. Make sure you include the entire script, not just your ID.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'analytics',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),

      array(
        'id'          => 'wi_custom_css',
        'label'       => 'Custom CSS',
        'desc'        => 'Write any custom css here. Please don\'t change theme files, because you won\'t be able to easily update in the future.',
        'std'         => '',
        'type'        => 'css',
        'section'     => 'css',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),

      array(
        'id'          => 'demo_import',
        'label'       => 'About Importing Demo Content',
        'desc'        => '<div class="format-setting-label"><h3 class="label">About Importing Demo Content</h3></div><p>Depending on your server connection, it might take a while to import all the data and images. Please make sure that:</p>
        <ul>
         <li>- You have setup the theme using the instructions in documentation</li>
        </ul>
        <p><strong style="text-transform: uppercase;">Page will refresh after importing is done, so please wait</strong></p><br><br><a class="button button-primary" id="import-demo-content" href="#">Import Demo Content</a>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'import'
      )

    )
  );

  /* ------------------------------------------------------------------------ */
  /* allow settings to be filtered before saving
  /* ------------------------------------------------------------------------ */

  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );

  /* ------------------------------------------------------------------------ */
  /* Settings are not the same update the DB 
  /* ------------------------------------------------------------------------ */

  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
}

?>