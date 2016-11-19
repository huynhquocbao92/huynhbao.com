<?php
add_filter( 'kopa_layout_manager_settings', 'trendmag_lite_register_layouts');

function trendmag_lite_get_positions(){
    $trendmag_positions = array(
        'sb_right_before'       => __( 'RIGHT BEFORE', 'trendmag-lite'),
        'sb_right_after'       => __( 'RIGHT AFTER', 'trendmag-lite'),
        'sb_after'              => __( 'AFTER', 'trendmag-lite'),
        'sb_before_footer'      => __( 'BEFORE FOOTER', 'trendmag-lite'),
        'sb_blog_top'           => __( 'TOP', 'trendmag-lite'),
        'sb_info'               => __( 'INFO', 'trendmag-lite'),
        'sb_content'            => __( 'CONTENT', 'trendmag-lite')
    );
	return apply_filters('trendmag_lite_get_positions', $trendmag_positions);
}

function trendmag_lite_get_sidebars(){
	return apply_filters('trendmag_lite_get_sidebars', array(
        'sb_right_before'           => 'sb_right_before',		
		'sb_right_after'            => 'sb_right_after',
		'sb_after'                  => 'sb_after',
		'sb_before_footer'          => 'sb_before_footer',
		'sb_blog_top'          => 'sb_blog_top',
		'sb_info'                    => 'sb_info',
		'sb_content'                    => 'sb_content',
	));
}

function trendmag_lite_register_layouts( $options ) {
	$positions = trendmag_lite_get_positions();
	$sidebars = trendmag_lite_get_sidebars();

	#1: Archive
	$blog_featured = array(
		'title'     => __( 'Blog Featured', 'trendmag-lite' ),
		'preview'   => esc_attr( get_template_directory_uri() ) . '/inc/assets/images/layouts/blog-featured.png',
		'positions' => array(					
			'sb_right_before',
			'sb_after',
			'sb_before_footer',
			));

	$options['blog-layout']['positions'] = $positions;
	$options['blog-layout']['layouts'] = array(		
		'blog-featured' => $blog_featured
    );

	$options['blog-layout']['default'] = array(
		'layout_id' => 'blog-featured',
		'sidebars'  => array(			
			'blog-featured' => $sidebars
        ));

	#2: Single
	$single_post = array(
		'title'     => __( 'Single post', 'trendmag-lite' ),
		'preview'   => esc_attr(get_template_directory_uri() ) . '/inc/assets/images/layouts/single.png',
		'positions' => array(
            'sb_blog_top',
            'sb_right_before',
            'sb_right_after',
        ));

    $single_gallery = array(
        'title'     => __( 'Single gallery', 'trendmag-lite' ),
        'preview'   => esc_attr( get_template_directory_uri() ) . '/inc/assets/images/layouts/single-gallery.png',
        'positions' => array(
            'sb_after',
            'sb_before_footer'
        ));

	$options['post-layout']['positions'] = $positions;
	$options['post-layout']['layouts'] = array(
		'single-post'     => $single_post,
		'single-gallery'     => $single_gallery
    );

	$options['post-layout']['default'] = array(
		'layout_id' => 'single-post',
		'sidebars'  => array(
			'single-post'     => array(
                'sb_blog_top' => 'sb_top',
                'sb_right_before' => 'sb_right_before',
                'sb_right_after' => 'sb_right_after',
            ),
            'single-gallery'     => array(
                'sb_after' => '',
                'sb_before_footer' => '',
            )
        ));

    #4: Static Page
    $static_page = array(
        'title'     => __('Static page', 'trendmag-lite'),
        'preview'   => esc_attr( get_template_directory_uri() ) . '/inc/assets/images/layouts/static-page.png',
        'positions' => array()
    );

    $page_layout = array(
        'static-page' => $static_page,
    );

    $page_layout_default = array(
        'static-page' => $sidebars,
    );

    $options['page-layout']['positions'] = $positions;
    $options['page-layout']['layouts'] = $page_layout;

    $options['page-layout']['default'] = array(
        'layout_id' => 'static-page',
        'sidebars'  => $page_layout_default
    );


    #5: Search Page
	$search_page = array(
		'title'     => __('Search', 'trendmag-lite'),
		'preview'   => esc_attr( get_template_directory_uri() ) . '/inc/assets/images/layouts/search.png',
		'positions' => array(
            'sb_right_before',
            'sb_before_footer',
        ));
    
    $options['search-layout']['positions'] = $positions;
    $options['search-layout']['layouts'] = array(
        'search-page' => $search_page);

    $options['search-layout']['default'] = array(
		'layout_id' => 'search-page',
		'sidebars'  => array(
            'search-page' => $sidebars
            )
		);

	#6: Error 404
	$error_404 = array(
		'title'     => __('Error page - 404', 'trendmag-lite'),
		'preview'   => esc_attr( get_template_directory_uri() ) . '/inc/assets/images/layouts/error-404.png',
		'positions' => array(
            'sb_info',
            'sb_content',
        ));

    $options['error404-layout']['positions'] = $positions;
    $options['error404-layout']['layouts'] = array(
        'error-404' => $error_404);

    $options['error404-layout']['default'] = array(
		'layout_id' => 'error-404',
		'sidebars'  => array(
            'error-404' => array(
                'sb_info' => 'sb_info',
                'sb_content' => 'sb_content',
            )
        ));

	return apply_filters('trendmag_lite_custom_layouts', $options);
}