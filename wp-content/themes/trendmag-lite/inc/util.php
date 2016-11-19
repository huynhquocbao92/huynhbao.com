<?php

function trendmag_lite_log($message){
	if (WP_DEBUG === true) {
        if (is_array($message) || is_object($message)) {
            error_log(print_r($message, true));
        } else {
            error_log($message);
        }
    }
}

function trendmag_lite_get_default_image($image_slug, $attributes = array(), $echo = true){
    if ( ! isset($attributes['alt']) ) {
        $attributes['alt'] = '';
    }
    $temp_image = trendmag_lite_get_image_info($image_slug);
    $image_info = array();
    if ( isset($temp_image['info'] ) ) {
        $image_info = $temp_image['info'];
    }
	$image = '';

	if(!empty($image_info)){
		$str_attributes = '';
		if(!empty($attributes)){

			foreach ($attributes as $key => $value) { 
	  			$str_attributes .= sprintf(" %s='%s'", $key, $value);
  			}
		}
		
		$image = apply_filters('trendmag_lite_get_default_image', sprintf('<img src="//placehold.it/%sx%s" %s>', $image_info[0], $image_info[1], $str_attributes), $image_info, $attributes, $echo);
	}	

	if($echo)
		echo wp_kses_post($image);
	else
		return $image;
}

function trendmag_lite_convert_str_uglify($string) {
    $string = preg_replace("/[^a-zA-Z0-9\s]/", '', $string);
    return strtolower(str_replace(' ', '_', $string));
}

function trendmag_lite_uppercase_first_letter($string){
	if(!empty($string)){
		$string = strtoupper(substr($string, 0, 1)) . substr($string, 1);
	}
	return $string;
}

function trendmag_lite_sanitize_array( $input ) {
    $new_input = array();
    if ( is_array( $input ) ) {
        foreach ( $input as $key => $val ) {
            if ( ! is_array( $val ) ) {
                $new_input[ $key ] = ( isset( $input[ $key ] ) ) ? sanitize_text_field( $val ) : '';
            } else {
                $new_input[ $key ] = ( isset( $input[ $key ] ) ) ? $val : '';
            }
        }
    }
    return $new_input;
}