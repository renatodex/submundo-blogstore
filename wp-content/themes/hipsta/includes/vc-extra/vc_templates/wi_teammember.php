<?php function wi_teammember( $atts, $content = null ) {
    extract(shortcode_atts(array(
       	'image' => '',
       	'name' => '',
       	'position' => '',
       	'text' => '',
       	'advanced' => '',
       	'facebook' => '',
       	'twitter'	=> '',
       	'dribbble' => '',
       	'behance' => ''
    ), $atts));
	
	$out = '';
	
	$img_id = preg_replace('/[^\d]/', '', $image);
	$img = wp_get_attachment_image_src($img_id, 'full');
	$resized = aq_resize( $img[0], 300, 300, true, false);

  $out .= '<div class="member">';
    $out .= '<a class="layer hexagon"></a> ';
    $out .= '<div class="details">';
      $out .= '<h4 class="title text-alt">' . $name . '</h4>';
      $out .= '<h5 class="subtitle item-title"><span>' . $position . '</span></h5>';
      if ($advanced) {
        if ($facebook || $twitter || $dribbble || $behance) {
          $out .= '<div class="social-icons">';
            if ($facebook) {
              $out .= '<a href="' . $facebook . '"><i class="fa fa-facebook"></i></a>';
            }
            if ($twitter) {
              $out .= '<a href="' . $twitter . '"><i class="fa fa-twitter"></i></a>';
            }
            if ($dribbble) {
              $out .= '<a href="' . $dribbble . '"><i class="fa fa-dribbble"></i></a>';
            }
            if ($behance) {
              $out .= '<a href="' . $behance . '"><i class="fa fa-behance"></i></a>';
            }
          $out .= '</div>';
        }
      }
    $out .= '</div>';
    $out .= '<div class="bg"></div>';
    $out .= '<div class="base">';
      $out .= '<img src="' . $resized[0] . '" alt="' . $name . '" />';
    $out .= '</div>';  
  $out .= '</div>';

  return $out;
}
add_shortcode('wi_teammember', 'wi_teammember');
