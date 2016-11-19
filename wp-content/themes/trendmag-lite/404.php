<?php
get_header();
if( $trendmag_layout_id = trendmag_lite_get_layout_id() ){
    get_template_part('template/'. $trendmag_layout_id );
}else{
    get_template_part('template/error-404');
}
get_footer();