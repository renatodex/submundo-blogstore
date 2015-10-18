<?php function wi_pullquote( $atts, $content = null ) {
    extract(shortcode_atts(array(
            'align' => 'alignleft'
    ), $atts));

    $out = '<div class="pullquote ' . $align . '">'.$content.'</div>';

  return $out;
}

add_shortcode('wi_pullquote', 'wi_pullquote');
