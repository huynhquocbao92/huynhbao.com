<?php
    if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) :
?>

        <div class="nav-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                <?php the_custom_logo(); ?>
            </a>
        </div>

<?php
    endif;