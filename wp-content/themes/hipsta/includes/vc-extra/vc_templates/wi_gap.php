<?php function wi_gap( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'height' => ''
    ), $atts));

    $out = '';
    $out .= '<div class="gap" style="height:'.$height.';"></div>';

    return $out;

}
add_shortcode('wi_gap', 'wi_gap');