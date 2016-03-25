<?php
/**
 * Welcome screen getting started template
 */
?>
<?php
// get theme customizer url
$url 	= admin_url() . 'customize.php?';
?>
<div id="getting_started" class="panel ig-started ig-row">
    <h2><?php esc_html_e( 'Getting started', 'store-wp' ); ?></h2>
    <p><?php esc_html_e( 'Start to customize and read more about the theme.', 'store-wp' ); ?></p>
    <div class="ig-col ig-col2">
        <div class="ig-boxed">
        <h3><span class="dashicons dashicons-format-aside"></span> <?php esc_html_e( 'Using', 'store-wp' ); ?> <?php echo wp_get_theme()->get( "Name" );?></h3>
        <p><?php esc_html_e( 'You can read detailed information on theme features and how to develop on top of it in the documentation.', 'store-wp' ); ?></p>
        <a href="<?php echo esc_url('http://www.iograficathemes.com/documentation/');?>" class="button"><?php esc_html_e( 'View Documentation', 'store-wp' ); ?></a>
    </div>
    </div><!-- end ig-col2 -->
    <div class="ig-col ig-col2">
    <div class="ig-boxed">
        <h3><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e( 'Customize your theme' ,'store-wp' ); ?></h3>
        <p><?php esc_html_e( 'Start to customize the theme layout, colors, menu and more with the WordPress Customizer.', 'store-wp' ); ?></p>
        <a href="<?php echo esc_url( $url ); ?>" class="button"><?php esc_html_e( 'Open the Customizer', 'store-wp' ); ?></a>
    </div>
    </div><!-- end ig-col2 -->
</div><!-- end ig-started -->
