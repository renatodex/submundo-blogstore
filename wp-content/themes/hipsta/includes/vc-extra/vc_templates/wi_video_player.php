<?php function wi_video_player( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'type' 	=> '',
		'id' 	=> '',
		'width' 	=> false,
		'height' 	=> false,
		'autoplay' 	=> ''
    ), $atts));

	if ($height && !$width) $width = intval($height * 16 / 9);
	if (!$height && $width) $height = intval($width * 9 / 16);
	if (!$height && !$width){
		$height = 315;
		$width = 560;
	}

	$out = '';
	
	$autoplay = ($autoplay == 'yes' ? '1' : false);
		
	if($type == "vimeo") {
		$out = "<div class='video-embed'><iframe src='http://player.vimeo.com/video/$id?autoplay=$autoplay&amp;title=0&amp;byline=0&amp;portrait=0' width='$width' height='$height' class='iframe'></iframe></div>";
	} else if($type == "youtube") {
		$out = "<div class='video-embed'><iframe src='http://youtube.com/embed/$id?autoplay=$autoplay&rel=0&showinfo=0' width='$width' height='$height' class='iframe' showinfo=0' frameborder='0' ></iframe></div>";

	}
		
	if (!empty($id)) {
		return $out;
	}
	

  	return $out;
}
add_shortcode('wi_video_player', 'wi_video_player');
