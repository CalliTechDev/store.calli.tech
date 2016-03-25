<?php

/**
 * Social Widget Class
 */
class igthemes_social_widget extends WP_Widget {

//Register widget with WordPress.

function __construct() {
    parent::__construct(
        'igthemes_social_widget', // Base ID
        esc_html__('IG Social', 'store-wp'), // Name
        array('description' => esc_html__('Show your social profiles pages.', 'store-wp' ),) // Args
    );
}
//Front-end display of widget.

function widget($args, $instance) {
    $facebook = isset( $instance['facebook'] ) ? esc_attr( $instance['facebook'] ) : '';
    $twitter = isset( $instance['twitter'] ) ? esc_attr( $instance['twitter'] ) : '';
    $google = isset( $instance['google'] ) ? esc_attr( $instance['google'] ) : '';
    $pinterest = isset( $instance['pinterest'] ) ? esc_attr( $instance['pinterest'] ) : '';
    $tumblr = isset( $instance['tumblr'] ) ? esc_attr( $instance['tumblr'] ) : '';
    $instagram = isset( $instance['instagram'] ) ? esc_attr( $instance['instagram'] ) : '';
    $linkedin = isset( $instance['linkedin'] ) ? esc_attr( $instance['linkedin'] ) : '';
    $dribbble = isset( $instance['dribbble'] ) ? esc_attr( $instance['dribbble'] ) : '';
    $vimeo = isset( $instance['vimeo'] ) ? esc_attr( $instance['vimeo'] ) : '';
    $youtube = isset( $instance['youtube'] ) ? esc_attr( $instance['youtube'] ) : '';
    $rss = isset( $instance['rss'] ) ? esc_attr( $instance['rss'] ) : '';
?>
    <?php echo $args['before_widget']; ?>
    <?php if ( ! empty( $instance['title'] ) ) {
        echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
    }  ?>
        <div class="ig-social-widget">
        <?php if ( ! empty( $instance['facebook'] ) ) {
              $facebook_url = esc_url($facebook);
              echo "<a href='$facebook_url' title='Facebook' target='_blank' class='facebook'><span class='social_facebook'></span>";
              echo "<span class='text'>". esc_html__("Facebook", "store-wp") ."</span></a>";
        }?>
        <?php if ( ! empty( $instance['twitter'] ) ) {
              $twitter_url = esc_url($twitter);
              echo "<a href='$twitter_url' title='Twitter' target='_blank' class='twitter'><span class='social_twitter'></span>";
              echo "<span class='text'>". esc_html__("Twitter", "store-wp") ."</span></a>";
        }?>
        <?php if ( ! empty( $instance['google'] ) ) {
              $google_url = esc_url($google);
              echo "<a href='$google_url' title='Google Plus' target='_blank' class='google'><span class='social_googleplus'></span>";
              echo "<span class='text'>". esc_html__("Google Plus", "store-wp") ."</span></a>";
        }?>
        <?php if ( ! empty( $instance['pinterest'] ) ) {
              $pinterest_url = esc_url($pinterest);
              echo "<a href='$pinterest_url' title='Pinterest' target='_blank' class='pinterest'><span class='social_pinterest'></span>";
              echo "<span class='text'>". esc_html__("Pinterest", "store-wp") ."</span></a>";
        }?>
        <?php if ( ! empty( $instance['tumblr'] ) ) {
              $tumblr_url = esc_url($tumblr);
              echo "<a href='$tumblr_url' title='Tumblr' target='_blank' class='tumblr'><span class='social_tumblr'></span>";
              echo "<span class='text'>". esc_html__("Tumblr", "store-wp") ."</span></a>";
        }?>
        <?php if ( ! empty( $instance['instagram'] ) ) {
              $instagram_url = esc_url($instagram);
              echo "<a href='$instagram_url' title='Instagram' target='_blank' class='instagram'><span class='social_instagram'></span>";
              echo "<span class='text'>". esc_html__("Instagram", "store-wp") ."</span></a>";
        }?>
        <?php if ( ! empty( $instance['linkedin'] ) ) {
              $linkedin_url = esc_url($linkedin);
              echo "<a href='$linkedin_url' title='Linkedin' target='_blank' class='linkedin'><span class='social_linkedin'></span>";
              echo "<span class='text'>". esc_html__("Linkedin", "store-wp") ."</span></a>";
        }?>
        <?php if ( ! empty( $instance['dribbble'] ) ) {
              $dribbble_url = esc_url($dribbble);
              echo "<a href='$dribbble_url' title='Dribbnle' target='_blank' class='dribbble'><span class='social_dribbble'></span>";
              echo "<span class='text'>". esc_html__("Dribbble", "store-wp") ."</span></a>";
        }?>
        <?php if ( ! empty( $instance['vimeo'] ) ) {
              $vimeo_url = esc_url($vimeo);
              echo "<a href='$vimeo_url' title='Vimeo' target='_blank' class='vimeo'><span class='social_vimeo'></span>";
              echo "<span class='text'>". esc_html__("Vimeo", "store-wp") ."</span></a>";
        }?>
        <?php if ( ! empty( $instance['youtube'] ) ) {
              $youtube_url = esc_url($youtube);
              echo "<a href='$youtube_url' title='Vimeo' target='_blank' class='youtube'><span class='social_vimeo'></span>";
              echo "<span class='text'>". esc_html__("Youtube", "store-wp") ."</span></a>";
        }?>
        <?php if ( ! empty( $instance['rss'] ) ) {
              $rss_url = esc_url($rss);
              echo "<a href='$rss_url' title='RSS' target='_blank' class='rss'><span class='social_rss'></span>";
              echo "<span class='text'>". esc_html__("RSS", "store-wp") ."</span></a>";
        }?>
    </div>
    <?php echo $args['after_widget']; ?>

<?php }
// Back-end widget form.
public function form( $instance ) {
    $title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
    $facebook = isset( $instance['facebook'] ) ? esc_attr( $instance['facebook'] ) : '';
    $twitter = isset( $instance['twitter'] ) ? esc_attr( $instance['twitter'] ) : '';
    $google = isset( $instance['google'] ) ? esc_attr( $instance['google'] ) : '';
    $pinterest = isset( $instance['pinterest'] ) ? esc_attr( $instance['pinterest'] ) : '';
    $tumblr = isset( $instance['tumblr'] ) ? esc_attr( $instance['tumblr'] ) : '';
    $instagram = isset( $instance['instagram'] ) ? esc_attr( $instance['instagram'] ) : '';
    $linkedin = isset( $instance['linkedin'] ) ? esc_attr( $instance['linkedin'] ) : '';
    $dribbble = isset( $instance['dribbble'] ) ? esc_attr( $instance['dribbble'] ) : '';
    $vimeo = isset( $instance['vimeo'] ) ? esc_attr( $instance['vimeo'] ) : '';
    $youtube = isset( $instance['youtube'] ) ? esc_attr( $instance['youtube'] ) : '';
    $rss = isset( $instance['rss'] ) ? esc_attr( $instance['rss'] ) : '';
?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:' , 'store-wp' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php esc_html_e( 'Facebook url:' , 'store-wp' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo $facebook; ?>" placeholder="<?php echo esc_url(igthemes_option( 'facebook_url', '' )); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php esc_html_e( 'Twitter url:' , 'store-wp' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo $twitter; ?>" placeholder="<?php echo esc_url(igthemes_option( 'twitter_url', '' )); ?>"/>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'google' ); ?>"><?php esc_html_e( 'Google url:' , 'store-wp' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'google' ); ?>" name="<?php echo $this->get_field_name( 'google' ); ?>" type="text" value="<?php echo $google; ?>" placeholder="<?php echo esc_url(igthemes_option( 'google_url', '' )); ?>"/>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php esc_html_e( 'Pinterest url:' , 'store-wp' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" type="text" value="<?php echo $pinterest; ?>" placeholder="<?php echo esc_url(igthemes_option( 'pinterest_url', '' )); ?>"/>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'tumblr' ); ?>"><?php esc_html_e( 'Tumblr url:' , 'store-wp' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'tumblr' ); ?>" name="<?php echo $this->get_field_name( 'tumblr' ); ?>" type="text" value="<?php echo $tumblr; ?>" placeholder="<?php echo esc_url(igthemes_option( 'tumblr_url', '' )); ?>"/>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php esc_html_e( 'Instagram url:' , 'store-wp' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" type="text" value="<?php echo $instagram; ?>" placeholder="<?php echo esc_url(igthemes_option( 'instagram_url', '' )); ?>"/>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php esc_html_e( 'Linkedin url:' , 'store-wp' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" type="text" value="<?php echo $linkedin; ?>" placeholder="<?php echo esc_url(igthemes_option( 'linkedin_url', '' )); ?>"/>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'dribbble' ); ?>"><?php esc_html_e( 'Dribbble url:' , 'store-wp' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'dribbble' ); ?>" name="<?php echo $this->get_field_name( 'dribbble' ); ?>" type="text" value="<?php echo $dribbble; ?>" placeholder="<?php echo esc_url(igthemes_option( 'dribbble_url', '' )); ?>"/>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'vimeo' ); ?>"><?php esc_html_e( 'Vimeo url:' , 'store-wp' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'vimeo' ); ?>" name="<?php echo $this->get_field_name( 'vimeo' ); ?>" type="text" value="<?php echo $vimeo; ?>" placeholder="<?php echo esc_url(igthemes_option( 'vimeo_url', '' )); ?>"/>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php esc_html_e( 'Youtube url:' , 'store-wp' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" type="text" value="<?php echo $youtube; ?>" placeholder="<?php echo esc_url(igthemes_option( 'youtube_url', '' )); ?>"/>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'rss' ); ?>"><?php esc_html_e( 'RSS url:' , 'store-wp' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" type="text" value="<?php echo $rss; ?>" placeholder="<?php echo esc_url(igthemes_option( 'rss_url', '' )); ?>"/>
    </p>
<?php
}
//Sanitize widget form values as they are saved.
public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
    $instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
    $instance['google'] = ( ! empty( $new_instance['google'] ) ) ? strip_tags( $new_instance['google'] ) : '';
    $instance['pinterest'] = ( ! empty( $new_instance['pinterest'] ) ) ? strip_tags( $new_instance['pinterest'] ) : '';
    $instance['tumblr'] = ( ! empty( $new_instance['tumblr'] ) ) ? strip_tags( $new_instance['tumblr'] ) : '';
    $instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? strip_tags( $new_instance['instagram'] ) : '';
    $instance['linkedin'] = ( ! empty( $new_instance['linkedin'] ) ) ? strip_tags( $new_instance['linkedin'] ) : '';
    $instance['dribbble'] = ( ! empty( $new_instance['dribbble'] ) ) ? strip_tags( $new_instance['dribbble'] ) : '';
    $instance['vimeo'] = ( ! empty( $new_instance['vimeo'] ) ) ? strip_tags( $new_instance['vimeo'] ) : '';
    $instance['youtube'] = ( ! empty( $new_instance['youtube'] ) ) ? strip_tags( $new_instance['youtube'] ) : '';
    $instance['rss'] = ( ! empty( $new_instance['rss'] ) ) ? strip_tags( $new_instance['rss'] ) : '';
    return $instance;
}

} // Class ends here

//Load the widget
function igthemes_social_widget() {
    register_widget( 'igthemes_social_widget' );
}
add_action( 'widgets_init','igthemes_social_widget');
