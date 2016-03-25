<?php if (is_home() && igthemes_option('post_slide')) { ?>
<div id="post-slider" class="slick">
<?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 9,
        'orderby' => 'post_date',
        'post__not_in' => get_option('sticky_posts'),
        'post_status' => 'publish',
    );
    $post_carousel_query = new WP_Query( $args );
    if ( $post_carousel_query->have_posts() ) :
    while ( $post_carousel_query->have_posts() ) : $post_carousel_query->the_post();
    ?>
    <div class="item">
        <a href="<?php echo esc_url( get_permalink() );?>">
            <?php if (has_post_thumbnail()) {
                echo  the_post_thumbnail( 'img-slider', array( 'class' => 'carousel-img' ) );
                } ?>
        </a>
        <div class="carousel-details">
           <span class="date"><?php echo get_the_date(); ?></span>
           <?php the_title( sprintf( '<h3 class="carousel-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
        </div>
    </div>
<?php
    endwhile;
    wp_reset_postdata();
    endif
;?>
</div><!-- /.carousel -->
<?php } ;?>

<?php if (class_exists( 'WooCommerce' ) && is_shop() && igthemes_option('shop_slide')) { ?>
<div id="product-carousel" class="slick">
    <?php
    $args = array(
        'posts_per_page' => 9,
        'post_type' => 'product',
        'cat' => '',
        'orderby' => 'post_date',
        'post_status'  => 'publish' );
    $product_carousel_query = new WP_Query( $args );
    if ( $product_carousel_query->have_posts() ) :
    while ( $product_carousel_query->have_posts() ) : $product_carousel_query->the_post();
    ?>
    <div class="item">
        <a href="<?php echo esc_url( get_permalink() );?>">
            <?php if (has_post_thumbnail()) {
                the_post_thumbnail( 'img-slider' );
                } ?>
        </a>
        <div class="carousel-details">
            <?php the_title( sprintf( '<h3 class="product-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
            <?php echo woocommerce_get_template( 'loop/price.php' ); ?>
        </div>
    </div>
<?php
    endwhile;
    wp_reset_postdata();
    endif
;?>
</div><!-- /.product-carousel -->
<?php } ;?>