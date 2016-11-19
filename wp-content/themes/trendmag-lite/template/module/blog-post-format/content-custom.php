<?php
global $post;
$custom  = wp_kses_post( get_post_meta($post->ID, 'trendmag_custom', true) );

?>

<?php if( $custom ): ?>
<div class="entry-thumb">
    <?php echo apply_filters('the_content', $custom); ?>
</div>
<?php endif;
