<?php

class Wi_Customize {

	/* ------------------------------------------------------------------------ */
	/* Customizer is below
	/* ------------------------------------------------------------------------ */

	public static function register ( $wp_customize ) {

		/* ------------------------------------------------------------------------ */
		/* Sections
		/* ------------------------------------------------------------------------ */	

		$wp_customize->remove_section( 'static_front_page');

		$wp_customize->add_section('logo', array(
			'title' => 'Logo',
			'priority' => 20
		));

		$wp_customize->add_section('nav', array(
			'title' => 'Navigation',
			'priority' => 21
		));

		$wp_customize->add_section('colors', array(
			'title' => 'Colors',
			'priority' => 22
		));

		$wp_customize->add_section( 'socials', array(
			'title'		=> 'Social Icons',
			'priority'	=> 23
		) );

		$wp_customize->add_section('footer', array(
			'title' => 'Footer',
			'priority' => 25
		));

		/* ------------------------------------------------------------------------ */
		/* Logo
		/* ------------------------------------------------------------------------ */

		// Logo

		$wp_customize->add_setting(
			'wi_logo', array(
				'default' => '',
				'type' => 'option',
				'capability' => 'edit_theme_options'
			)
		);
		$wp_customize->add_control(
		    new WP_Customize_Image_Control(
		        $wp_customize,
		        'wi_logo',
		        array(
		            'label' => 'Logo',
		            'section' => 'logo',
		            'settings' => 'wi_logo',
		            'priority' => 1
		        )
		    )
		);

		// Favicon

		$wp_customize->add_setting(
			'wi_fav', array(
				'default' => '',
				'type' => 'option',
				'capability' => 'edit_theme_options'
			)
		);
		$wp_customize->add_control(
		    new WP_Customize_Image_Control(
		        $wp_customize,
		        'wi_fav',
		        array(
		            'label' => 'Favicon',
		            'section' => 'logo',
		            'settings' => 'wi_fav',
		            'priority' => 11
		        )
		    )
		);

		/* ------------------------------------------------------------------------ */
		/* Colors
		/* ------------------------------------------------------------------------ */

		$colorsArray = array(
			array(
				'label' => 'Main color',
				'default' => '#777777',
				'setting' => 'main'
			)
		);

		$i = 10;

		foreach($colorsArray as $color){

			$wp_customize->add_setting(
				'wi_colors[' . $color['setting'] . ']', array(
					'default' => $color['default'],
					'type' => 'option',
					'capability' => 'edit_theme_options'
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'wi_colors[' . $color['setting'] . ']', array(
						'label' => $color['label'],
						'section' => 'colors',
						'settings' => 'wi_colors[' . $color['setting'] . ']',
						'priority' => $i++
					)
				)
			);
		}

		/* ------------------------------------------------------------------------ */
		/* Social icons
		/* ------------------------------------------------------------------------ */

		$wp_customize->add_setting( 
			'wi_facebook' 
		);
		$wp_customize->add_control( 
			'wi_facebook', 
			array(
				'label'		=> 'Facebook URL',
				'section'	=> 'socials',
				'type'		=> 'text',
				'priority'	=> 1
			) 
		);

		$wp_customize->add_setting( 
			'wi_twitter' 
		);
		$wp_customize->add_control( 
			'wi_twitter', 
			array(
				'label'		=> 'Twitter URL',
				'section'	=> 'socials',
				'type'		=> 'text',
				'priority'	=> 2
			) 
		);

		$wp_customize->add_setting( 
			'wi_behance' 
		);
		$wp_customize->add_control( 
			'wi_behance', 
			array(
				'label'		=> 'Behance URL',
				'section'	=> 'socials',
				'type'		=> 'text',
				'priority'	=> 3
			) 
		);

		$wp_customize->add_setting( 
			'wi_dribbble' 
		);
		$wp_customize->add_control( 
			'wi_dribbble', 
			array(
				'label'		=> 'Dribbble URL',
				'section'	=> 'socials',
				'type'		=> 'text',
				'priority'	=> 4
			) 
		);

		$wp_customize->add_setting( 
			'wi_flickr' 
		);
		$wp_customize->add_control( 
			'wi_flickr', 
			array(
				'label'		=> 'Flickr URL',
				'section'	=> 'socials',
				'type'		=> 'text',
				'priority'	=> 5
			) 
		);

		$wp_customize->add_setting( 
			'wi_instagram' 
		);
		$wp_customize->add_control( 
			'wi_instagram', 
			array(
				'label'		=> 'Instagram URL',
				'section'	=> 'socials',
				'type'		=> 'text',
				'priority'	=> 6
			)
		);

		$wp_customize->add_setting( 
			'wi_googleplus' 
		);
		$wp_customize->add_control( 
			'wi_googleplus', 
			array(
				'label'		=> 'Google+ URL',
				'section'	=> 'socials',
				'type'		=> 'text',
				'priority'	=> 7
			) 
		);

		$wp_customize->add_setting( 
			'wi_youtube' 
		);
		$wp_customize->add_control( 
			'wi_youtube', 
			array(
				'label'		=> 'YouTube URL',
				'section'	=> 'socials',
				'type'		=> 'text',
				'priority'	=> 8
			) 
		);

		$wp_customize->add_setting( 
			'wi_vimeo' 
		);
		$wp_customize->add_control( 
			'wi_vimeo', array(
				'label'		=> 'Vimeo URL',
				'section'	=> 'socials',
				'type'		=> 'text',
				'priority'	=> 9
			) 
		);

		$wp_customize->add_setting( 
			'wi_pinterest' 
		);
		$wp_customize->add_control( 
			'wi_pinterest', 
			array(
				'label'		=> 'Pinterest URL',
				'section'	=> 'socials',
				'type'		=> 'text',
				'priority'	=> 10
			) 
		);

		$wp_customize->add_setting( 
			'wi_github' 
		);
		$wp_customize->add_control( 
			'wi_github', 
			array(
				'label'		=> 'GitHub URL',
				'section'	=> 'socials',
				'type'		=> 'text',
				'priority'	=> 11
			) 
		);

		$wp_customize->add_setting( 
			'wi_linkedin' 
		);
		$wp_customize->add_control( 
			'wi_linkedin', 
			array(
				'label'		=> 'LinkedIn URL',
				'section'	=> 'socials',
				'type'		=> 'text',
				'priority'	=> 12
			) 
		);

		$wp_customize->add_setting( 
			'wi_rss' 
		);
		$wp_customize->add_control( 
			'wi_rss', 
			array(
				'label'		=> 'RSS URL',
				'section'	=> 'socials',
				'type'		=> 'text',
				'priority'	=> 13
			) 
		);

		/* ------------------------------------------------------------------------ */
		/* Footer
		/* ------------------------------------------------------------------------ */

		$wp_customize->add_setting(
			'wi_footer_copy', array(
				'default' => '',
				'type' => 'option',
				'capability' => 'edit_theme_options'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Textarea_Control(
				$wp_customize,
				'wi_footer_copy', 
				array(
					'label' => 'Footer Copyright',
					'section' => 'footer',
					'settings' => 'wi_footer_copy',
					'type' => 'textarea',
					'priority'	=> 4
				)
			)
		);

	}

}

add_action( 'customize_register' , array( 'Wi_Customize' , 'register' ) );

/* ------------------------------------------------------------------------ */
/* Custom textarea control
/* ------------------------------------------------------------------------ */

if ( class_exists( 'WP_Customize_Control' ) ) {
	class WP_Customize_Textarea_Control extends WP_Customize_Control {
	 
	    public function render_content() {
	        ?>
	            <label>
	                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	                <textarea rows="7" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	            </label>
	        <?php
	    }
	}
}

?>