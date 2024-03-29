<?php
/**
 * enqueue css, js for theme
 * @package  trendmag 
 * @version 1.0.0
 * @return null
 */ 
function trendmag_lite_enqueue_scripts(){
    global $wp_styles, $is_IE;
    $dir = esc_attr( get_template_directory_uri() );

    // GOOGLE FONTS.
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'trendmag-lite' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Lato:300,400,700,900,400italic|Playfair Display:900' ), "//fonts.googleapis.com/css" );
        wp_enqueue_style( 'google-fonts', $font_url, array(), '1.0.0' );
    }

    if ( class_exists( 'Kopa_Framework' ) && wp_style_is('kopa_font_awesome', 'registered') ) {
        wp_enqueue_style('kopa_font_awesome');
    } else {
        wp_enqueue_style('font-awesome', "{$dir}/css/font-awesome.css", array(), NULL);
    }

    wp_enqueue_style('bootstrap', "{$dir}/css/bootstrap.css", array(), NULL);
    wp_enqueue_style('owl-carousel', "{$dir}/css/owl.carousel.css", array(), NULL);
    wp_enqueue_style('owl-theme', "{$dir}/css/owl.theme.css", array(), NULL);
    wp_enqueue_style('owl-transitions', "{$dir}/css/owl.transitions.css", array(), NULL);
   	wp_enqueue_style('trendmag-style', get_stylesheet_uri(), array(), NULL);
    wp_enqueue_style('trendmag-extra', "{$dir}/css/extra.css", array(), NULL);
      
    if (is_singular()) {
        wp_enqueue_script('comment-reply');
    }

    /** Load scripts for IE < 9 */
    wp_enqueue_style('trendmag-not-ie', "{$dir}/css/not-ie.css", array(), NULL);
    wp_register_style('trendmag-ie', "{$dir}/css/ie8.css", array(), NULL);
    wp_enqueue_style('trendmag-ie');
    $wp_styles->add_data('trendmag-ie', 'conditional', 'lt IE 9');

    /** Load scripts for IE 9 */
    wp_register_style('trendmag-ie9', "{$dir}/css/ie9.css", array(), NULL);
    wp_enqueue_style('trendmag-ie9');
    $wp_styles->add_data('trendmag-ie9', 'conditional', 'IE 9');

    wp_enqueue_script('modernizr', "{$dir}/js/modernizr.custom.js", array('jquery'), NULL, TRUE);
    wp_enqueue_script('bootstrap', "{$dir}/js/bootstrap.js", array('jquery'), NULL, TRUE);
    wp_enqueue_script('trendmag-custom', "{$dir}/js/custom.js", array('jquery'), NULL, TRUE);

    wp_localize_script('trendmag-custom', 'kopa_variable', array(
        'url' => array(
            'template_directory_uri' => $dir . '/',
            'ajax' => admin_url('admin-ajax.php')
        ),
        'template' => array(
            'post_id' => (is_singular()) ? get_queried_object_id() : 0
        ),
        'validate' => array(
            'name' => array(
                'required' => __('Please enter your name.', 'trendmag-lite'),
                'minlength' => __('At least {0} characters required.', 'trendmag-lite')
            ),
            'email' => array(
                'required' => __('Please enter your email.', 'trendmag-lite'),
                'email' => __('Please enter a valid email.', 'trendmag-lite')
            ),
            'message' => array(
                'required' => __('Please enter a message.', 'trendmag-lite'),
                'minlength' => __('At least {0} characters required.', 'trendmag-lite')
            ),
            'sending' => __('Sending...', 'trendmag-lite'),
            'submit' => __('Submit now', 'trendmag-lite'),

        )
    ));
}

/**
 * return a array of body class
 * @package  trendmag
 * @version 1.0.0
 * @return array $classes
 */ 
function trendmag_lite_set_body_class($classes){
    $trendmag_current_layout = trendmag_lite_sanitize_array( trendmag_lite_get_template_setting() );
    if( $trendmag_layout_id = trendmag_lite_get_layout_id() ){
        switch ( $trendmag_layout_id ) {
            case 'blog-format':
                array_push($classes,  'trendmag-layout-blog-format');
                break;
            case 'blog-featured':
                array_push($classes, 'trendmag-layout-blog-featured');

                if ( is_post_type_archive('show') ) {
                    array_push($classes, 'kopa-sub-page');
                }
                break;            
            case 'single-post':
                array_push($classes,  'trendmag-layout-single-post kopa-sub-page');
                break;
            case 'static-page':
                array_push($classes, 'kopa-element-page trendmag-layout-static-page');
                break;
            case 'contact-page':
                array_push($classes, 'trendmag-contact-page');
                break;
            case 'home-blog':
                array_push($classes, 'trendmag-layout-home-blog');
                break;
            case 'error-404':
                array_push($classes, 'trendmag-layout-error-404 kopa-404-page');
                break;
            case 'product-archive':
                array_push($classes, 'trendmag-layout-product-archive kopa-sub-page kopa-full-width trendmag-shop');
                break;
            case 'product-single':
                array_push($classes, 'trendmag-layout-product-single kopa-sub-page kopa-full-width trendmag-shop');
                break;
            case 'single-gallery':
                array_push($classes, 'trendmag-layout-single-gallery kopa-sub-page kopa-full-width');
                break;
        }

        # CHECK RIGHT SIDEBAR
        $trendmag_sidebar = $trendmag_current_layout['sidebars'];
        if ( isset($trendmag_sidebar['sb_right_before']) && isset($trendmag_sidebar['sb_right_after']) ) {
            $sb_right_before = $trendmag_sidebar['sb_right_before'];
            $sb_right_after = $trendmag_sidebar['sb_right_after'];

            if ( !is_active_sidebar($sb_right_before) && !is_active_sidebar($sb_right_after) ) {
                array_push($classes,  'kopa-full-width');
            } elseif ( !is_active_sidebar($sb_right_before) ) {
                array_push($classes,  'kopa-full-width-before');
            } elseif ( !is_active_sidebar($sb_right_after) ) {
                array_push($classes,  'kopa-full-width-after');
            }
        }

    }

	return $classes;
}

/**
 * get current layout information
 * @package  trendmag
 * @version 1.0.0
 * @return $settings
 */ 
function trendmag_lite_get_template_setting($default = null) {
    if( function_exists('kopa_get_template_setting') ){
        return kopa_get_template_setting();
    }    

    return $default;
}

function trendmag_lite_get_layout_id() {
    if( function_exists('kopa_get_template_setting') ){
        $current_layout = trendmag_lite_sanitize_array( kopa_get_template_setting() );
        if ( isset( $current_layout['layout_id'] ) ) {
            return esc_attr( $current_layout['layout_id'] );
        }
    }
    return '';
}

/**
 * Get number words of excerpt, if excerpt is null, get number words of content
 * @package  trendmag
 * @version 1.0.0
 *
 * @param string $excerpt
 * @param string $content
 * @param int $length
 * @param string $more
 * @return mixed|void
 */
function trendmag_lite_get_the_excerpt($excerpt='', $content = '', $length = 0, $more = ' [...] ') {
    if ( $length ){
        $trendmag_length = $length;
    } elseif ( is_category() || is_tag() || is_home() ) {
        $trendmag_length = esc_attr( get_theme_mod('blog_excerpt_length', '55') );
    }else{
        $trendmag_length = 55;
    }

    if ( empty($excerpt) ) {
        $more_arr = get_extended($content);
        if ( count($more_arr) > 0 ) {
            $temp_excerp = $more_arr['main'];
        } else {
            $temp_excerp =  $content;
        }
        $temp_excerp =  strip_tags($temp_excerp);
        $temp_excerp =  strip_shortcodes($temp_excerp);
        $trendmag_excerpt = wp_trim_words($temp_excerp, $trendmag_length, $more);

    } else {
        $trendmag_excerpt = wp_trim_words($excerpt, $trendmag_length, $more);
    }

    return apply_filters( 'trendmag_filter_excerpt', $trendmag_excerpt, $trendmag_length, $more);
}

function trendmag_lite_get_readmore_icon() {
    $readmore_icon = apply_filters('trendmag_custom_readmore_icon', 'T');
    return $readmore_icon;
}

function trendmag_lite_get_readmore_text() {
    $readmore_text = apply_filters('trendmag_custom_readmore_text', __('read more', 'trendmag-lite'));
    return $readmore_text;
}

/**
 * Custom WP_LINK_PAGES for post content
 * @param $args
 * @return array|string
 */
function trendmag_lite_wp_link_pages_args_add_prevnext($args)
{
    global $page, $numpages, $more;

    if (!$args['next_or_number'] == 'next_and_number')
        return $args;

    $args['next_or_number'] = 'number';
    if (!$more)
        return $args;

    if( $page-1) { # there is a previous page
        $args['before'] .= _wp_link_page($page-1)
            . $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>'
        ;
        $args['before'] = $args['before'];
    }

    if ( $page<$numpages ) { # there is a next page
        $args['after'] = _wp_link_page($page+1)
            . $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>'
            . $args['after']
        ;
        $args['after'] = $args['after'];
    }
    return $args;
}

/**
 * Add current class to WP_LINK_PAGES
 * @param $link
 * @return string
 */
function trendmag_lite_custom_link_pages( $link ) {
    if ( ctype_digit( $link ) ) {
        return '<span class="current">' . $link . '</span>';
    }else{
        return $link;
    }
    return $link;
}

function trendmag_lite_get_header($affix) {

    if( $trendmag_current_layout = trendmag_lite_get_template_setting() ){
        if ( 'blog-format' == $trendmag_current_layout['layout_id'] ) {
            $affix = 'page';
        }
    }

    if ( is_page() && class_exists('Kopa_Page_Builder') ) {
            global $post;
            $current_layout = Kopa_Page_Builder::get_current_layout($post->ID);
            if(in_array($current_layout, array('', 'disable'))){
                $affix = '';
            }
    }
    return $affix;
}

function trendmag_lite_filter_search_post( $query ) {
    if ( !is_admin() && $query->is_main_query() ) {
        if ($query->is_search) {
            $query->set('post_type', 'post');
        }
    }
}

/**
 * get list of google fonts
 * @package  trendmag
 * @version 1.0.0
 * @return $settings
 */
function trendmag_lite_google_font_options(){
    if(function_exists('kopa_google_font_options')){
        return kopa_google_font_options();
    }

    return array();
}

function trendmag_lite_remove_oembed_attributes( $html, $url, $attr, $post_ID ) {
    $return = str_replace('frameborder="no"', 'style="border: none"', $html);
    $return = str_replace('frameborder="0"', 'style="border: none"', $return);
    $return = str_replace('allowfullscreen', '', $return);
    $return = str_replace('scrolling="no"', '', $return);
    return $return;
}