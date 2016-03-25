<?php
/**
 * Welcome screen intro template
 */
?>
<div class="ig-intro ig-row">
    <div class="welcome ig-col ig-col2">
        <h1 style="margin-right: 0;">
            <?php echo '<strong>'.wp_get_theme()->get( "Name" ).'</strong> <sup style="font-weight: bold; font-size: 14px; padding: 5px 10px; color: #666; background: #fff;">' . esc_attr( wp_get_theme()->get( 'Version' ) ) . '</sup>'; ?>
        </h1>
        <p style="font-size: 1.2em;"><?php esc_html_e( 'Thank you to use ', 'store-wp'); ?><?php echo wp_get_theme()->get( "Name" ); ?></p>
        <p><?php esc_html_e( 'Here you can read the documentation and you can know how to get the most out of your new theme.', 'store-wp' ); ?></p>
    </div><!-- end ig-col2 -->  
    <div class="ig-boxed premium ig-col ig-col2">
        <h3><span class="dashicons dashicons-star-filled"></span><?php esc_html_e( 'UPGRADE TO PREMIUM', 'store-wp' ); ?></h3>
        <p><?php esc_html_e( 'If you like this theme, considering supporting development by purchasing the premium version.', 'store-wp' ); ?></p>
        <a href="http://www.iograficathemes.com/downloads/store-wp-premium/" class="button button-primary" style="text-decoration: none;">
            <?php esc_html_e( 'More Info', 'store-wp' ); ?>
        </a>
    </div><!-- end ig-col2 -->
</div><!-- end ig-intro -->
    
