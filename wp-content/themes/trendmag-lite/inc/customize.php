<?php

add_action('wp_enqueue_scripts', 'trendmag_lite_customize_page_title_bg', 20);
function trendmag_lite_customize_page_title_bg() {
    $image_bg = esc_url( get_theme_mod('header-page-title-bg', '') );
    if ( ! empty($image_bg) ) {
        $logo_css = ".wrap-top-page {background: url({$image_bg}); background-repeat: no-repeat;background-position: center top;}";
        wp_add_inline_style('trendmag-style', $logo_css);
    }
}
