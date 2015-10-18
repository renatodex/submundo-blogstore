<?php function wi_featurebox( $atts, $content = null ) {
    extract(shortcode_atts(array(
    	'style' => 'style1',
    	'align' => 'aligncenter',
      'icon' => '',
      'heading' => ''
    ), $atts));
	
	$out = '<div class="features-item ' . $style . ' ' . $align . ' ">';
		$out .= '<div class="features-icon"><span class="icons ' . $icon . '"></span></div>';
		$out .= '<h4 class="features-title text-alt">' . $heading . '</h4>';
		$out .= '<div class="features-descr">' . $content . '</div>';
	$out .='</div>';

  return $out;
}
add_shortcode('wi_featurebox', 'wi_featurebox');
