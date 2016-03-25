<?php
/**
 * Recent Posts Widget Class
 */
class igthemes_recent_posts_widget extends WP_Widget {

//Register widget with WordPress.

function __construct() {
    parent::__construct(
        'igthemes_recent_posts_widget', // Base ID
        esc_html__('IG Recent Posts', 'store-wp'), // Name
        array('description' => esc_html__('An extended version of the recent posts widget.', 'store-wp' ),) // Args
    );
}
//Front-end display of widget.

function widget($args, $instance) {
        $number = isset( $instance['number']  ) ? esc_attr( $instance['number']) : '';
        $date = isset( $instance['date'] ) ? esc_attr( $instance['date']) : '';
        $img = isset( $instance['img'] ) ? esc_attr( $instance['img']) : '';
        $cat = isset( $instance['cat'] ) ? esc_attr( $instance['cat']) : '';
        $excerpt = isset( $instance['excerpt'] ) ? esc_attr( $instance['excerpt']) : '';

        $query = new WP_Query( apply_filters( 'widget_posts_args',
                                array( 'posts_per_page' => $number,
                                    'no_found_rows' => true,
                                    'post_status' => 'publish',
                                    'ignore_sticky_posts' => true,
                                    ))
                             );
?>
<?php echo $args['before_widget']; ?>
    <?php if ( ! empty( $instance['title'] ) ) {
        echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
    }  ?>
    <ul class="ig-recent-posts-widget">
        <?php if ($query->have_posts()) :
            while ( $query->have_posts() ) : $query->the_post(); ?>
        <li>
            <?php if ( $img ) : ?>
            <?php if ( has_post_thumbnail()) {
                echo "<div class='post-image'>";
                   echo "<a href='". get_the_permalink() ."'>";
                        the_post_thumbnail( array(50,50) , array( 'class' => 'post-img' ) );
                    echo "</a>";
                echo "</div>";
            }  ?>
            <?php endif; ?>
            <div class='post-title'>
                <a class="title" href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>">
                    <?php if ( get_the_title() ) the_title(); else the_ID(); ?>
                </a>
            </div>
            <?php if ( $date ) : ?>
                <span class="post-date">
                    <?php echo $date . get_the_date(); ?>
                </span>
            <?php endif; ?>
            <?php if ( $excerpt ) : ?>
                <span class="post-excerpt">
                    <?php echo get_the_excerpt(); ?>
                </span>
            <?php endif; ?>
        </li>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <?php endif; ?>

    </ul>
    <?php echo $args['after_widget']; ?>

<?php }
// Back-end widget form.
public function form( $instance ) {
    $title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
    $number = isset( $instance['number'] ) ? esc_attr( $instance['number'] ) : '';
    $date = isset( $instance['date'] ) ? esc_attr( $instance['date'] ) : '';
    $img = isset( $instance['img'] ) ? esc_attr( $instance['img'] ) : '';
    $excerpt = isset( $instance['excerpt'] ) ? esc_attr( $instance['excerpt'] ) : '';
?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:' , 'store-wp' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'post' ); ?>"><?php esc_html_e( 'Post type:' , 'store-wp' ); ?></label>
       <span style="color:#888; display:block;"><?php esc_html_e( 'Display a custom post type - only premium' , 'store-wp' ); ?></span>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html_e( 'Number of posts to show:' , 'store-wp' ); ?></label>
        <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" />
    </p>
    <p>
        <input class="checkbox" type="checkbox" value="1" <?php checked( '1', $date ); ?> id="<?php echo $this->get_field_id( 'date' ); ?>" name="<?php echo $this->get_field_name( 'date' ); ?>" />

        <label for="<?php echo $this->get_field_id( 'date' ); ?>"><?php esc_html_e( 'Display post date?', 'store-wp' ); ?></label>
    </p>
    <p>
        <input class="checkbox" type="checkbox" value="1" <?php checked( '1', $img ); ?> id="<?php echo $this->get_field_id( 'img' ); ?>" name="<?php echo $this->get_field_name( 'img' ); ?>" />

        <label for="<?php echo $this->get_field_id( 'img' ); ?>"><?php esc_html_e( 'Display post image?', 'store-wp' ); ?></label>
    </p>
    <p>
        <input class="checkbox" type="checkbox" value="1" <?php checked( '1', $excerpt ); ?> id="<?php echo $this->get_field_id( 'excerpt' ); ?>" name="<?php echo $this->get_field_name( 'excerpt' ); ?>" />

        <label for="<?php echo $this->get_field_id( 'excerpt' ); ?>"><?php esc_html_e( 'Display post excerpt?', 'store-wp' ); ?></label>
    </p>
<?php
}
//Sanitize widget form values as they are saved.
public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['excerpt'] = ( ! empty( $new_instance['excerpt'] ) ) ? strip_tags( $new_instance['excerpt'] ) : '';
    $instance['img'] = ( ! empty( $new_instance['img'] ) ) ? strip_tags( $new_instance['img'] ) : '';
    $instance['number'] = ( ! empty( $new_instance['number'] ) ) ? strip_tags( $new_instance['number'] ) : '';
    $instance['date'] = ( ! empty( $new_instance['date'] ) ) ? strip_tags( $new_instance['date'] ) : '';
    return $instance;
}

} // Class ends here

//Load the widget
function igthemes_recent_posts_widget() {
    register_widget( 'igthemes_recent_posts_widget' );
}
add_action( 'widgets_init','igthemes_recent_posts_widget');
