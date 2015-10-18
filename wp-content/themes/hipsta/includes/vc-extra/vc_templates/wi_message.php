<?php function wi_message( $atts, $content = null ) {
    extract(shortcode_atts(array(
    		'type'			 => 'information'
    ), $atts));

	// Content
	$out = '<div class="message-box '.$type.'"><div class="icon"></div><div class="content">'.$content.'</div></div>';
  return $out;
}
add_shortcode('wi_message', 'wi_message');
