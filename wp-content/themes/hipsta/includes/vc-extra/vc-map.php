<?php

// Shortcodes 

$shortcodes = get_template_directory()."/includes/vc-extra/vc_templates/";
$files = glob($shortcodes."/wi_?*.php");
foreach ($files as $filename)
{
	require_once($shortcodes.basename($filename));
}

// Section title

vc_map( array(
	"name" => __("Section Title", "weekend"),
	"base" => "wi_section_title",
	"icon" => "wi_vc_ico",
	"class" => "wi_vc_ico",
	"category" => "by Weekend",
	"params" => array(
		array(
			"type" => "textfield",
			"heading" => __("Title", "weekend"),
			"param_name" => "title",
			"value" => "",
			"admin_label" => true,
			"description" => __("Section title.", "weekend")
		),
		array(
			"type" => "dropdown",
			"heading" => __("Alignment", "weekend"),
			"param_name" => "align",
			"value" => array(
				__("Left", "weekend") => "left", 
				__("Center", "weekend") => "center", 
				__("Right", "weekend") => "right"
			),
			"description" => ""
		),
		array(
			"type" => "textfield",
			"heading" => __("Bottom margin", "weekend"),
			"param_name" => "margin",
			"value" => "70",
			"description" => ""
		)
	),
	"description" => __("Display a title", "weekend")
));

// Iconbox shortcode

vc_map( array(
	"name" => __("Feature Boxes", "weekend"),
	"base" => "wi_featurebox",
	"icon" => "wi_vc_ico",
	"class" => "wi_vc_ico",
	"category" => "by Weekend",
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Style", "weekend"),
			"param_name" => "style",
			"value" => array(
				__("Style 1", "weekend") => "style1",
				__("Style 2", "weekend") => "style2"
			),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Alignment", "weekend"),
			"param_name" => "align",
			"value" => array(
				__("Left", "weekend") => "alignleft",
				__("Center", "weekend") => "aligncenter",
				__("Right", "weekend") => "alignright"
			),
			"dependency" => array(
				"element" => "style",
				"value" => array("style1")
			),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Icon", "weekend"),
			"param_name" => "icon",
			"value" => $et_icons_arr,
			"description" => ""
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Heading", "weekend"),
			"param_name" => "heading",
			"value" => "",
			"admin_label" => true,
			"description" => ""
		),
		array(
			"type" => "textarea",
			"class" => "",
			"heading" => __("Content", "weekend"),
			"param_name" => "content",
			"value" => "",
			"description" => ""
		)
	),
	"description" => __("Feature box with an icon", "weekend")
) );

// Notification shortcode

/*vc_map( array(
	"name" => __("Message", "weekend"),
	"base" => "wi_message",
	"icon" => "wi_vc_ico",
	"class" => "wi_vc_ico",
	"category" => "by Weekend",
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Type", "weekend"),
			"param_name" => "type",
			"value" => array(
				__("Information", "weekend") => "information",
				__("Success", "weekend") => "success",
				__("Warning", "weekend") => "warning",
				__("Error", "weekend") => "error"
			),
			"description" => ""
		),
		array(
			"type" => "textarea",
			"class" => "",
			"heading" => __("Content", "weekend"),
			"admin_label" => true,
			"param_name" => "content",
			"value" => "",
			"description" => ""
		)
	),
	"description" => __("Display Meesage", "weekend")
) );
*/

// Image Slider

vc_map( array(
	"name" => __("Image Slider", "weekend"),
	"base" => "wi_slider",
	"icon" => "wi_vc_ico",
	"class" => "wi_vc_ico",
	"category" => "by Weekend",
	"params" => array(
		array(
			"type" => "attach_images",
			"class" => "",
			"heading" => __("Select Images", "weekend"),
			"param_name" => "images",
			"admin_label" => true,
			"description" => ""
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Width", "weekend"),
		  "param_name" => "width",
		  "description" => __("Enter the width of the images. The slider will fill the width of the container, so make sure you size the columns accordingly.", "weekend")
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Height", "weekend"),
		  "param_name" => "height",
		  "description" => __("Enter the height of the images.", "weekend")
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => __("Navigation Arrows", "weekend"),
			"param_name" => "navigation",
			"value" => array(
				"" => "true"
			),
			"description" => __("Check this if you want to show navigation arrows.", "weekend")
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => __("Bullets", "weekend"),
			"param_name" => "bullets",
			"value" => array(
				"" => "true"
			),
			"description" => __("Check if you want to show bullets", "weekend")
		)
	),
	"description" => __("Add an image slider", "weekend")
) );

// Blockquote

vc_map( array(
	"name" => __("Pullquote", "weekend"),
	"base" => "wi_pullquote",
	"icon" => "wi_vc_ico",
	"class" => "wi_vc_ico",
	"category" => "by Weekend",
	"params" => array(
		array(
			"type" => "textarea",
			"class" => "",
			"heading" => __("Content", "weekend"),
			"admin_label" => true,
			"param_name" => "content",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Align", "weekend"),
			"param_name" => "align",
			"value" => array(
				__("Left", "weekend") => "alignleft",
				__("Right", "weekend") => "alignright"
			),
			"description" => ""
		),
	),
	"description" => __("Display Pullquote", "weekend")
) );

// Progress Bar

vc_map_update( 'vc_progress_bar', array(
	"icon" => "wi_vc_ico",
	"class" => "wi_vc_ico",
	"category" => "by Weekend",
	"params" =>array(
	array(
	  "type" => "exploded_textarea",
	  "heading" => __("Graphic values", "weekend"),
	  "param_name" => "values",
	  "description" => __('Input graph values here. Divide values with linebreaks (Enter). Example: 90|Development', 'js_composer'),
	  "value" => "90|Development,80|Design,70|Marketing"
	),
	array(
	  "type" => "textfield",
	  "heading" => __("Units", "weekend"),
	  "param_name" => "units",
	  "description" => __("Enter measurement units (if needed) Eg. %, px, points, etc. Graph value and unit will be appended to the graph title.", "weekend")
	),
	array(
	    "type" => "textfield",
	    "heading" => __("Extra class name", "weekend"),
	    "param_name" => "el_class",
	    "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "weekend")
	)
	)
) );

// Gap 

vc_map( array(
	"name" => __("Gap", "weekend"),
	"base" => "wi_gap",
	"icon" => "wi_vc_ico",
	"class" => "wi_vc_ico",
	"category" => "by Weekend",
	"params" => array(
		array(
		  "type" => "textfield",
		  "heading" => __("Gap Height", "weekend"),
		  "param_name" => "height",
		  "admin_label" => true,
		  "description" => __("Enter height of the gap.", "weekend")
		)
	),
	"description" => __("Add a gap to seperate elements", "weekend")
));

// Video player

vc_map( array(
	"name" => __("Video Player", "weekend"),
	"base" => "wi_video_player",
	"icon" => "wi_vc_ico",
	"class" => "wi_vc_ico",
	"category" => "by Weekend",
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Video type", "weekend"),
			"param_name" => "type",
			"value" => array(
				__("Youtube", "weekend") => "youtube",
				__("Vimeo", "weekend") => "vimeo"
			),
			"description" => ""
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Video ID", "weekend"),
			"admin_label" => true,
			"param_name" => "id",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Video width", "weekend"),
			"admin_label" => true,
			"param_name" => "width",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Video height", "weekend"),
			"admin_label" => true,
			"param_name" => "height",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Autoplay?",
			"param_name" => "autoplay",
			"value" => array(
				"" => "yes"
			)
		),
	),
	"description" => __("Display video player", "weekend")
) );

// Image shortcode

vc_map( array(
	"name" => __("Image", "weekend"),
	"base" => "wi_image",
	"icon" => "wi_vc_ico",
	"class" => "wi_vc_ico",
	"category" => "by Weekend",
	"params" => array(
		array(
			"type" => "attach_image", //attach_images
			"class" => "",
			"heading" => __("Select Image", "weekend"),
			"param_name" => "image",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"heading" => __("Image size", "weekend"),
			"param_name" => "img_size",
			"description" => __("Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Leave empty to use 'large' size.", "weekend")
		),
		array(
			"type" => "dropdown",
			"heading" => __("Image alignment", "weekend"),
			"param_name" => "alignment",
			"value" => array(
					__("Align left", "weekend") => "alignleft", 
					__("Align right", "weekend") => "alignright", 
					__("Align center", "weekend") => "aligncenter"
				),
			"description" => "Select image alignment."
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => __("Link to Full-Width Image?", "weekend"),
			"param_name" => "lightbox",
			"value" => array(
				"" => "true"
			)
		),
		array(
			"type" => "textfield",
			"heading" => __("Image link", "weekend"),
			"param_name" => "img_link",
			"description" => __("Enter url if you want this image to have link.", "weekend"),
			"dependency" => array(
				'element' => "lightbox", 'is_empty' => true
			)
		),
	),
	"description" => __("Add an animated image", "weekend")
) );

// Team Member

vc_map( array(
	"name" => __("Team Member", "weekend"),
	"base" => "wi_teammember",
	"icon" => "wi_vc_ico",
	"class" => "wi_vc_ico",
	"category" => "by Weekend",
	"params" => array(
		array(
			"type" => "attach_image",
			"class" => "",
			"heading" => __("Select Team Member Image", "weekend"),
			"param_name" => "image",
			"description" => __("Minimum size is 270x270 pixels", "weekend")
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Name", "weekend"),
		  "param_name" => "name",
		  "admin_label" => true,
		  "description" => __("Enter name of the team member", "weekend")
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Position", "weekend"),
		  "param_name" => "position",
		  "description" => __("Enter position/title of the team member", "weekend")
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => __("Advanced Style?", "weekend"),
			"param_name" => "advanced",
			"value" => array(
				"" => "true"
			),
			"description" => __("Enable to display a short text and social icons", "weekend")
		),
		array(
			"type" => "textarea",
			"class" => "",
			"heading" => __("Short text", "weekend"),
			"param_name" => "text",
			"value" => "",
			"dependency" => array(
				"element" => "advanced",
				"not_empty" => true
			),
			"description" => __("Text to display on hover", "weekend")
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Facebook", "weekend"),
		  "param_name" => "facebook",
		  "dependency" => array(
		  	"element" => "advanced",
		  	"not_empty" => true
		  ),
		  "description" => __("Enter Facebook Link", "weekend")
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Twitter", "weekend"),
		  "param_name" => "twitter",
		  "dependency" => array(
		  	"element" => "advanced",
		  	"not_empty" => true
		  ),
		  "description" => __("Enter Twitter Link", "weekend")
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Dribbble", "weekend"),
		  "param_name" => "dribbble",
		  "dependency" => array(
		  	"element" => "advanced",
		  	"not_empty" => true
		  ),
		  "description" => __("Enter Dribbble Link", "weekend")
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Behance", "weekend"),
		  "param_name" => __("behance", "weekend"),
		  "dependency" => array(
		  	"element" => "advanced",
		  	"not_empty" => true
		  ),
		  "description" => __("Enter Behance Link", "weekend")
		)
	),
	"description" => __("Display your team members in a stylish way", "weekend")
) );


?>
