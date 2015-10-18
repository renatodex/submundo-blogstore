<?php function wi_image( $atts, $content = null ) {
    extract(shortcode_atts(array(
       	'image'      => '',
       	'target_blank' => false,
       	'img_size'	 => 'full',
       	'alignment'	 => '',
       	'lightbox'	 => '',
       	'size'			 => 'small',
       	'animation'	 => false
    ), $atts));
	
	$img_id = preg_replace('/[^\d]/', '', $image);
	$img = wp_get_attachment_image($img_id, $img_size, false, array(
		'class'	=> $animation . ' ' . $alignment,
		'alt'   => trim(strip_tags( get_post_meta($img_id, '_wp_attachment_image_alt', true) )),
	));
  
  $link_to = $c_lightbox = '';
  if ($lightbox==true) {
      $link_to = wp_get_attachment_image_src( $img_id, 'large');
      $link_to = $link_to[0];
      $c_lightbox = ' rel="gallery"';
  } else if (!empty($img_link)) {
      $link_to = $img_link;
  }
  
  if(!empty($link_to) && !preg_match('/^(https?\:\/\/|\/\/)/', $link_to)) $link_to = 'http://'.$link_to;
  $out = !empty($link_to) ? '<a '.$c_lightbox.' href="'.$link_to.'"'. ($target_blank ? ' target="_blank"' : '') .'>'.$img.'</a>' : $img;

  return $out;
}
add_shortcode('wi_image', 'wi_image');
