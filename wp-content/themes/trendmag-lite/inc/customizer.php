<?php
function trendmag_lite_init_options($options){
    #Panels

    $options['panels'][] = array(
        'id'    => 'trendmag_panel_theme_option',
        'title' => __('Theme options', 'trendmag-lite'));

    #Sections
    $options['sections'][] = array(
        'id'    => 'trendmag_section_custom_header',
        'panel' => 'trendmag_panel_theme_option',
        'title' => __('Header options', 'trendmag-lite'));

    $options['sections'][] = array(
        'id'    => 'trendmag_section_custom_blog',
        'panel' => 'trendmag_panel_theme_option',
        'title' => __('Blog', 'trendmag-lite'));

    $options['sections'][] = array(
        'id'    => 'trendmag_section_custom_single_post',
        'panel' => 'trendmag_panel_theme_option',
        'title' => __('Single post', 'trendmag-lite'));

    #Header option
    $options['settings'][] = array(
        'settings'          => 'logo_mobile',
        'label'       => __('Mobile Logo', 'trendmag-lite'),
        'description' => '',
        'default'     => '',
        'type'        => 'image',
        'section'     => 'trendmag_section_custom_header',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'header-enable-search',
        'label'       => __('Search form', 'trendmag-lite'),
        'description' => __('Check this option to display.', 'trendmag-lite'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_header',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'header-enable-breadcrumb',
        'label'       => __('Breadcrumb', 'trendmag-lite'),
        'description' => __('Check this option to display.', 'trendmag-lite'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_header',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'header-page-title-bg',
        'label'       => __('Page title background', 'trendmag-lite'),
        'description' => __('upload background for page title', 'trendmag-lite'),
        'default'     => '',
        'type'        => 'image',
        'section'     => 'trendmag_section_custom_header',
        'transport'   => 'refresh');

    #Blog options
    $options['settings'][] = array(
        'settings'          => 'blog_excerpt_length',
        'label'       => __('Number words of excerpt to show', 'trendmag-lite'),
        'description' => '',
        'default'     => '55',
        'type'        => 'number',
        'section'     => 'trendmag_section_custom_blog',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'blog_number_post_before',
        'label'       => __('Number of posts to show in before', 'trendmag-lite'),
        'description' => '',
        'default'     => '55',
        'type'        => 'number',
        'section'     => 'trendmag_section_custom_blog',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'blog_author_left',
        'label'       => __('Author information in left', 'trendmag-lite'),
        'description' => __('Check this option to display.', 'trendmag-lite'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_blog',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'blog_time_ago',
        'label'       => __('Time ago', 'trendmag-lite'),
        'description' => __('Check this option to display.', 'trendmag-lite'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_blog',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'blog_share',
        'label'       => __('Share links', 'trendmag-lite'),
        'description' => __('Check this option to display.', 'trendmag-lite'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_blog',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'blog_category',
        'label'       => __('Category', 'trendmag-lite'),
        'description' => __('Check this option to display.', 'trendmag-lite'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_blog',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'blog_date',
        'label'       => __('Created date', 'trendmag-lite'),
        'description' => __('Check this option to display.', 'trendmag-lite'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_blog',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'blog_by_author',
        'label'       => __('By author', 'trendmag-lite'),
        'description' => __('Check this option to display.', 'trendmag-lite'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_blog',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'blog_read_more',
        'label'       => __('Read more', 'trendmag-lite'),
        'description' => __('Check this option to display.', 'trendmag-lite'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_blog',
        'transport'   => 'refresh');

    #Single post option
    $options['settings'][] = array(
        'settings'          => 'single_author_left',
        'label'       => __('Author information in left', 'trendmag-lite'),
        'description' => __('Check this option to display.', 'trendmag-lite'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_single_post',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'single_time_ago',
        'label'       => __('Time ago', 'trendmag-lite'),
        'description' => __('Check this option to display.', 'trendmag-lite'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_single_post',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'single_share_left',
        'label'       => __(' Share buttons in left', 'trendmag-lite'),
        'description' => __('Check this option to display.', 'trendmag-lite'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_single_post',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'single_category',
        'label'       => __('Category', 'trendmag-lite'),
        'description' => __('Check this option to display.', 'trendmag-lite'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_single_post',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'single_date',
        'label'       => __('Created date', 'trendmag-lite'),
        'description' => __('Check this option to display.', 'trendmag-lite'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_single_post',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'single_share_middle',
        'label'       => __('Share buttons in middle', 'trendmag-lite'),
        'description' => __('Check this option to display.', 'trendmag-lite'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_single_post',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'single_tag',
        'label'       => __('Tags', 'trendmag-lite'),
        'description' => __('Check this option to display.', 'trendmag-lite'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_single_post',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'single_author_middle',
        'label'       => __('Author information in middle', 'trendmag-lite'),
        'description' => __('Check this option to display.', 'trendmag-lite'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_single_post',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'single_relate_get_by',
        'label'       => __('Related posts - get by', 'trendmag-lite'),
        'description' => '',
        'default'     => 'post_tag',
        'choices'     => array(
            'category' => 'Category',
            'post_tag' => 'Tag',
        ),
        'type'        => 'select',
        'section'     => 'trendmag_section_custom_single_post',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'single_relate_limit',
        'label'       => __('Related posts - Number of posts', 'trendmag-lite'),
        'description' => __('Enter 0 to disable this option.', 'trendmag-lite'),
        'default'     => '6',
        'type'        => 'number',
        'section'     => 'trendmag_section_custom_single_post',
        'transport'   => 'refresh');

    return $options;
}