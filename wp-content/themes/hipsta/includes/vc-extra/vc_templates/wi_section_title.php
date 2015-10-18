<?php function wi_section_title( $atts, $content = null ) {
        
    extract(shortcode_atts(array(
        'title' => '',
        'margin' => '70',
        'align' => ''
    ), $atts));

    $out = false;
    $out .= '<h2 class="section-title ' . $align . ' text-alt" style="margin-bottom:' . $margin . 'px; text-align:' . $align . '">' . $title . '</h2>';

    return $out;

}
add_shortcode('wi_section_title', 'wi_section_title');