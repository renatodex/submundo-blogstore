<?php function wi_button( $atts, $content = null ) {
  extract(shortcode_atts(array(
     	'color'      => '',
     	'target_blank' => false,
     	'link'       => '#',
     	'rounded'      => '',
     	'size'			 => 'small',
     	'style'       => false,
     	'icon'			 => false,
     	'animation'	 => false
  ), $atts));
	
	if($icon) { $content = '<span class="icon"><i class="'.$icon.'"></i></span> '.$content; }
	
	$out = '<a class="btn '.$color.' '.$size.' '.$style.' '.$rounded.'" href="'.$link.'" ' . ($target_blank ? ' target="_blank"' : '') .'>' .$content. '</a>';
  
  return $out;

}
add_shortcode('wi_button', 'wi_button');
