<?php

/**
 * Social Widget Class
 */
class igtemes_google_adsense_widget extends WP_Widget {

//Register widget with WordPress.

function __construct() {
    parent::__construct(
        'igtemes_google_adsense_widget', // Base ID
        esc_html__('IG Google Adsense', 'store-wp'), // Name
        array('description' => esc_html__('Displays Adsense Ads.', 'store-wp' ),) // Args
    );
}
//Front-end display of widget.

function widget($args, $instance) {
    $adsenseCode = empty( $instance['adsenseCode'] ) ? '' : $instance['adsenseCode'];
?>
    <?php echo $args['before_widget']; ?>
    <?php if ( ! empty( $instance['title'] ) ) {
        echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
    }  ?>
    <div class="ig-google-adsense" style="overflow: hidden;">
            <?php echo $adsenseCode; ?>
            <div class="clearfix"></div>
    </div> <!-- end adsense -->
    <?php echo $args['after_widget']; ?>

<?php }
// Back-end widget form.
public function form( $instance ) {
        $title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $adsenseCode = isset( $instance['adsenseCode'] ) ? esc_textarea( $instance['adsenseCode'] ) : '';
?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'store-wp' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('adsenseCode'); ?>">
            <?php esc_html_e( 'Code:', 'store-wp' ); ?>
        </label>
        <textarea cols="20" rows="12" class="widefat" id="<?php echo $this->get_field_id('adsenseCode') ; ?>" name="<?php echo  $this->get_field_name('adsenseCode') ; ?>" ><?php echo $adsenseCode ; ?></textarea>
        <?php esc_html_e( 'You can use this widget to add your Google Adsense js code but also for other service or custom js code.', 'store-wp' ); ?>
    </p>
<?php
}

//Sanitize widget form values as they are saved.
public function update( $new_instance, $old_instance ) {
    $instance = array();

    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['adsenseCode'] = current_user_can('unfiltered_html') ? $new_instance['adsenseCode'] : stripslashes( wp_filter_post_kses( addslashes($new_instance['adsenseCode']) ) );

    return $instance;
}

} // Class ends here

//Load the widget
function igtemes_google_adsense_widget() {
    register_widget( 'igtemes_google_adsense_widget' );
}
add_action( 'widgets_init','igtemes_google_adsense_widget');
