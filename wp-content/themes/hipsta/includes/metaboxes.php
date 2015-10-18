<?php

/* ------------------------------------------------------------------------ */
/*  Initialize the meta boxes. 
/* ------------------------------------------------------------------------ */

add_action( 'admin_init', 'wi_meta_boxes' );

function wi_meta_boxes() {

    /* ------------------------------------------------------------------------ */
    /*  Init some useful variables
    /* ------------------------------------------------------------------------ */

    $wi_page_meta = array(
        'id' => 'wi_page_meta',
        'title' => __('Page Settings', 'weekend'),
        'pages' => array( 'page' ),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
              'label' => __('Page Subtitle', 'weekend'),
              'id' => 'wi_subtitle',
              'type' => 'text',
              'desc' => 'Enter page subtitle.'
            )
        )
    );

    $wi_portfolio_meta = array(
        'id' => 'wi_portfolio_meta',
        'title' => __('Portfolio Settings', 'weekend'),
        'pages' => array( 'page' ),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'label' => __('Columns', 'weekend'),
                'id' => 'wi_portfolio_cols',
                'type' => 'select',
                'desc' => __('Choose the number of columns for this portfolio page.', 'weekend'),
                'std' => 'three',
                'choices' => array(
                    array(
                        'label' => __('Two columns', 'weekend'),
                        'value' => 'two'
                    ),
                    array(
                        'label' => __('Three columns', 'weekend'),
                        'value' => 'three'
                    ),
                    array(
                        'label' => __('Four columns', 'weekend'),
                        'value' => 'four'
                    )
                )
            ),

            array(
                'label' => __('Grid style', 'weekend'),
                'id' => 'wi_portfolio_style',
                'type' => 'select',
                'desc' => __('Choose the style of the grid.', 'weekend'),
                'std' => 'masonry',
                'choices' => array(
                    array(
                        'label' => __('Masonry', 'weekend'),
                        'value' => 'masonry'
                    ),
                    array(
                        'label' => __('Basic grid', 'weekend'),
                        'value' => 'grid'
                    )
                )
            ),

            array(
                'label' => __('Enable margin', 'weekend'),
                'id' => 'wi_portfolio_margin',
                'type' => 'select',
                'desc' => '',
                'std' => 'margin',
                'choices' => array(
                    array(
                        'label' => __('Enable', 'weekend'),
                        'value' => 'margin'
                    ),
                    array(
                        'label' => __('Disable', 'weekend'),
                        'value' => 'no-margin'
                    )
                )
            ),

            array(
                'label' => __('Categories', 'weekend'),
                'id' => 'wi_portfolio_cats',
                'type' => 'taxonomy-checkbox',
                'taxonomy'    => 'portfolio-category',
                'desc' => __('You have the possibility to select only certain categories to appear in this portfolio page.', 'weekend')
            ),

            array(
                'label' => __('Category filtering', 'weekend'),
                'id' => 'wi_portfolio_filter',
                'type' => 'select',
                'desc' => __('You can enable or disable filters in this portfolio.', 'weekend'),
                'std' => 'enable-filters',
                'choices' => array(
                    array(
                        'label' => __('Disabled', 'weekend'),
                        'value' => 'disable-filters'
                    ),
                    array(
                        'label' => __('Enabled', 'weekend'),
                        'value' => 'enable-filters'
                    )
                )
            ),

        )
    );

    $wi_portfolio_settings_meta = array(
        'id' => 'wi_portfolio_settings_meta',
        'title' => __('Portfolio Settings', 'weekend'),
        'pages' => array( 'portfolio' ),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'label' => __('Portfolio Subtitle', 'weekend'),
                'id' => 'wi_subtitle',
                'type' => 'text',
                'desc' => __('This is the subtitle that is shown under the portfolio title.', 'weekend'),
                'rows' => '2',
                'std' => ''
            ),
            array(
                'id' => 'wi_portfolio_type',
                'label' => __('Portfolio Type', 'weekend'),
                'type'  => 'radio',
                'desc' => __('What type of portfolio item is this? Always upload an image and set it as the featured image even if its a video portfolio.', 'weekend'),
                'choices' => array(
                    array(
                        'label' => __('Gallery', 'weekend'),
                        'value' => 'gallery'
                    ),
                    array(
                        'label' => __('Video', 'weekend'),
                        'value' => 'video'
                    )
                ),
                'std' => ''
            ),
            array(
                'label' => __('Gallery', 'weekend'),
                'id' => 'wi_portfolio_gallery',
                'type' => 'gallery',
                'desc' => '',
                'std' => '',
                'rows' => '1',
                'condition'   => 'wi_portfolio_type:is(gallery)'
            ),
            array(
                'label' => __('Video Embed Code', 'weekend'),
                'id' => 'wi_portfolio_video',
                'type' => 'textarea-simple',
                'desc'  => __('Video Embed Code.', 'weekend'),
                'std' => '',
                'rows' => '5',
                'condition' => 'wi_portfolio_type:is(video)'
            ),
            array(
                'label' => __('Portfolio Attributes', 'weekend'),
                'id' => 'wi_portfolio_attributes',
                'type' => 'list-item',
                'desc' => __('Please add attributes for this portfolio. Ex: Client name, Client URL, etc.', 'weekend'),
                'settings' => array(
                    array(
                        'label' => 'Value',
                        'id' => 'wi_attribute_value',
                        'type' => 'text',
                        'desc' => 'Value of this attribute',
                        'rows' => '1'
                    )                    
                )
            )
        )
    );


    $wi_portfolio_url = array(
    'id' => 'wi_portfolio_url',
    'title' => __('Custom Link', 'weekend'),
    'desc' => __('If you want this portfolio be a custom URL, you can configure it here.', 'weekend'),
    'pages' => array( 'portfolio' ),
    'context' => 'side',
    'priority' => 'core',
    'fields' => array(
        array(
          'label' => __('URL', 'weekend'),
          'id' => 'wi_portfolio_link',
          'type' => 'text',
          'desc' => ''
          ),
        array(
          'label' => __('Target', 'weekend'),
          'id' => 'wi_portfolio_link_target',
          'type' => 'select',
          'desc' => '',
          'choices' => array(
            array(
                'value' => '_self',
                'label' => 'Same tab'
                ),
            array(
                'value' => '_blank',
                'label' => 'New tab'
                )
            )
          )
      )
    );


    /* ------------------------------------------------------------------------ */
    /*  Register our meta boxes using the 
    /*  ot_register_meta_box() function.
    /* ------------------------------------------------------------------------ */

    $post_id = isset($_GET['post']) ? $_GET['post'] : (isset($_POST['post_ID']) ? $_POST['post_ID'] : 'no');
    $template_file = $post_id != 'no' ? get_post_meta($post_id,'_wp_page_template',TRUE) : 'no';

    if ( $template_file == 'template-portfolio.php' ) {
        ot_register_meta_box( $wi_portfolio_meta );
    }
        ot_register_meta_box( $wi_page_meta );
        ot_register_meta_box( $wi_portfolio_settings_meta );
        ot_register_meta_box( $wi_portfolio_url );

}

?>