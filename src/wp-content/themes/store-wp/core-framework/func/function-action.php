<?php
/*-----------------------------------------------
 * Custom action
 -----------------------------------------------*/
// igthemes_header
function igthemes_header() {
    do_action('igthemes_header');
}
// igthemes_footer
function igthemes_footer() {
    do_action('igthemes_footer');
}
// igthemes_after_header
function igthemes_after_header() {
    do_action('igthemes_after_header');
}
// igthemes_before_footer
function igthemes_before_footer() {
    do_action('igthemes_before_footer');
}
// igthemes_before_site_content
function igthemes_before_site_content() {
    do_action('igthemes_before_site_content');
}
// igthemes_after_site_content
function igthemes_after_site_content() {
    do_action('igthemes_after_site_content');
}
// igthemes_before_single
function igthemes_before_single() {
    do_action('igthemes_before_single');
}
// igthemes_after_single_content
function igthemes_after_single() {
    do_action('igthemes_after_single_content');
}
// igthemes_before_single_title
function igthemes_before_single_title() {
    do_action('igthemes_before_single_title');
}
// igthemes_after_single_title
function igthemes_after_single_title() {
    do_action('igthemes_after_single_title');
}
// igthemes_before_single_content
function igthemes_before_single_content() {
    do_action('igthemes_before_single_content');
}
// igthemes_after_single_content
function igthemes_after_single_content() {
    do_action('igthemes_after_single_content');
}
// igthemes_before_sidebar_content
function igthemes_before_sidebar_content() {
    do_action('igthemes_before_sidebar_content');
}
// igthemes_after_sidebar_content
function igthemes_after_sidebar_content() {
    do_action('igthemes_after_sidebar_content');
}
// igthemes_before_sidebar
function igthemes_before_sidebar() {
    do_action('igthemes_before_sidebar');
}
// igthemes_after_sidebar_content
function igthemes_after_sidebar() {
    do_action('igthemes_after_sidebar');
}

/*-----------------------------------------------
# HEADER
 -----------------------------------------------*/
// header nav text filter
function igthemes_header_nav_content() {
    $text = '';
    $text = apply_filters( 'igthemes_header_nav_content', $text );
    return $text;
}
function igthemes_header_nav_text( $text ) {
    $text = '<div class="header-text col6">'. get_bloginfo( "description" ) .'</div>';
    return $text;
}
add_filter( 'igthemes_header_nav_content', 'igthemes_header_nav_text' );

// top menu
function igthemes_header_top_menu() { ?>
    <div class="header-menu">
            <div class="grid">
                <div class="row">
                                                                       <?php echo igthemes_header_nav_content(); ?>
                    
                <nav class="header-navigation col6" role="navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'depth' => 1,  'fallback_cb' => '__return_false') ); ?>
                </nav>
             </div><!-- .row -->
        </div><!-- .grid -->
    </div><!-- .header-menu  -->
<?php }

// branding
function igthemes_header_branding() { ?>
                <?php igthemes_header_top_menu(); ?>
    <div class="grid">
        <div class="row">
            <div class="site-branding col12">
                <?php if ( get_header_image() ) : ?>
                    <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" class="header-image">
                <?php endif; // End header image check. ?>
                <?php if ( igthemes_option('logo') ) : ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="site-logo" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                            <img src="<?php echo esc_url(igthemes_option('logo')); ?>" alt="<?php echo esc_attr( bloginfo( 'name' )); ?>">
                        </a>
                <?php else : ?>
                        <a class="site-title-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
                        </a>
                <?php endif; ?>
            </div><!-- .site-branding  -->
        </div><!-- .row -->
    </div><!-- .grid -->
<?php }
add_action( 'igthemes_header' , 'igthemes_header_branding' );

//main menu
function igthemes_header_main_menu() { ?>
<div class="main-menu">
        <div class="grid">
            <div class="row">
                <div class="col12">
                    <nav id="site-navigation" class="main-navigation" role="navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <span class="icon_menu-square_alt2"></span> <?php esc_html_e( 'Menu', 'store-wp' ); ?>
                </button>
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
                    </nav><!-- #site-navigation .col12 -->
               </div><!-- .col12 -->
            </div><!-- .row -->
        </div><!-- .container -->
</div><!-- .main-menu -->
<?php }
add_action( 'igthemes_header' , 'igthemes_header_main_menu' );

/*-----------------------------------------------
# FOOTER
 -----------------------------------------------*/
function igthemes_footer_content() { ?>
<div class="grid">
        <div class="row">
            <div class="site-info">
                <?php get_template_part('core-framework/partials/sidebar-footer') ?>
                <?php get_template_part('core-framework/partials/social') ?>
            </div><!-- .site-info -->
    </div><!-- .row -->
</div><!-- .grid -->
<?php }
add_action( 'igthemes_footer' , 'igthemes_footer_content' );
//go top
function igthemes_footer_gotop() { ?>
                    <div class="gotop">
                        <a href="#masthead" id="smoothup"  title="<?php esc_attr_e('Back to top', 'store-wp' ); ?>">
                            <span class="arrow_carrot-up_alt2"></span>
                        </a>
                    </div><!-- .gotop -->
<?php }
//credits
function igthemes_footer_credits() { ?>
    <div class="credits">
        <div class="grid">
            <div class="row">
                <div class="col12">
                 <?php igthemes_footer_gotop();?>
                        <?php printf( esc_html__( 'Proudly powered by ', 'store-wp' )); ?><a href="<?php echo esc_url( __( 'http://calli.tech/', 'store-wp' ) ); ?>"><?php printf( __( '%s', 'store-wp' ), 'CalliTech' ); ?></a>
                        <span class="sep"> | </span>
                        <?php printf( esc_html__( 'Developed by %2$s.', 'store-wp' ), wp_get_theme()->get( 'Name' ), '<a href="http://dev.calli.tech/" rel="designer">CalliTechDev</a>' ); ?>
                </div><!-- .col12 -->
            </div><!-- .row -->
        </div><!-- .grid -->
    </div><!-- .credits -->
<?php }
add_action( 'igthemes_footer' , 'igthemes_footer_credits' );

/*-----------------------------------------------
 # SLIDER
 -----------------------------------------------*/
function igthemes_header_slider() {
?>
    <div class="grid">
            <div class="row">
                <div class="col12">
    <?php get_template_part('core-framework/partials/image-carousel') ?>
                </div><!-- .col12 -->
            </div><!-- .row -->
    </div><!-- .grid -->
<?php }
add_action( 'igthemes_after_header' , 'igthemes_header_slider' );

/*-----------------------------------------------
# BREADCRUMB
 -----------------------------------------------*/
function igthemes_breadcrumb() {
if ( igthemes_option('breadcrumb') == '1' && function_exists('yoast_breadcrumb') && !is_page() ) {
    yoast_breadcrumb('<div class="breadcrumb">','</div>');
}
elseif (igthemes_option('breadcrumb') == '1'  && !is_page()) {
    echo '<div class="breadcrumb">';
    if (!is_home()) {
        echo '<a href="'. esc_url(home_url('/')) .'">';
            echo esc_html__('Home', 'store-wp');
        echo '</a>';

    if (is_category() || is_single()) {
        echo " &#47; ";
        the_category(' &#47; ');
        if (is_singular( 'post' )) {
               echo " &#47; ";
               the_title();
            }
        elseif (is_singular()) {
            echo the_title();
            }
        }

        elseif (is_page()) {
            echo the_title();
        }
        elseif (is_archive()) {
            echo single_month_title();
            echo single_tag_title("", false);
        }
    }
        echo '</div>';
    }
}
add_action( 'igthemes_before_single' , 'igthemes_breadcrumb' );

/*-----------------------------------------------
# IMAGES
 -----------------------------------------------*/
//page featured image
function igthemes_page_featured_image() { ?>
<?php if ( is_page() && has_post_thumbnail() ) {
    echo "<div class='image'>";
        the_post_thumbnail( 'full', array( 'class' => 'featured-img' ) );
    echo "</div>";
} ?>
<?php }
add_action( 'igthemes_before_single_title' , 'igthemes_page_featured_image' );

//post featured image
function igthemes_post_featured_image() { ?>
<?php if (is_singular() && !is_page() && has_post_thumbnail() && igthemes_option('post_featured_image', 'checked')) {
    echo "<div class='image'>";
        the_post_thumbnail( 'full', array( 'class' => 'featured-img' ) );
    echo "</div>";
} ?>
<?php }
add_action( 'igthemes_before_single_title' , 'igthemes_post_featured_image' );

//featured image index and archive
function igthemes_main_featured_images() { ?>
<?php if ( !is_singular() && has_post_thumbnail() && igthemes_option('main_featured_images', 'checked')) {
     echo "<div class='image'><a href='" . get_permalink() . "' >";
        the_post_thumbnail( 'large', array( 'class' => 'featured-img' ) );
     echo "</a></div>";
} ?>
<?php }
add_action( 'igthemes_before_single_title' , 'igthemes_main_featured_images' );


/*-----------------------------------------------
# CONTENT GRID
 -----------------------------------------------*/
//main grid
function igthemes_grid_before() {
    
   if (!is_singular() || 
       is_singular() && !is_page()) { 
       $col="col8"; 
   }
   if (is_page_template('page-fullwidth.php')) { 
       $col="col12"; 
   }
   if (is_page_template('page-sidebar-left.php')) { 
       $col="col8 pull-right";
   }   
   if (is_page() && !is_page_template()) { 
       $col="col8";
   }//end normal layout
   if (class_exists( 'WooCommerce')) { 
        if (is_woocommerce()) { 
            $colshop="col8"; 
        }
   }//end ecommerce layout
   if (class_exists( 'WooCommerce') && is_woocommerce()) { 
        echo "<div class='".$colshop."'>";
   } else { 
        echo "<div class='".$col."'>";
   }//end div
}
add_action( 'igthemes_before_site_content' , 'igthemes_grid_before' );

function igthemes_grid_after() {
        echo "</div>";
}
add_action( 'igthemes_after_site_content' , 'igthemes_grid_after' );

//sidebar grid
function igthemes_sidebar_grid_before() { 
   if (!is_singular() || 
       is_singular() && !is_page()) { 
       $col="col4"; 
   }
   if (is_page_template('page-sidebar-left.php')) { 
       $col="col4 pull-left";
   }   
   if (is_page() && !is_page_template('')) { 
       $col="col4";
   }//end normal layout
   if (class_exists( 'WooCommerce')) { 
        if (is_woocommerce()) { 
            $colshop="col4"; 
        }
   }//end ecommerce layout
   if (class_exists( 'WooCommerce') && is_woocommerce()) { 
        echo "<div class='".$colshop."'>";
   } else { 
        echo "<div class='".$col."'>";
   }//end div
}
add_action( 'igthemes_before_sidebar' , 'igthemes_sidebar_grid_before' );

function igthemes_sidebar_grid_after() { 
     echo "</div>";
 }
add_action( 'igthemes_after_sidebar' , 'igthemes_sidebar_grid_after' );

/*-----------------------------------------------
# SIDEBAR
 -----------------------------------------------*/
function igthemes_get_sidebar() {
?>
    <?php 
    if (class_exists( 'WooCommerce') && is_woocommerce() ||
        class_exists( 'WooCommerce') && is_cart() && !is_page_template('page-fullwidth.php') ||
        class_exists( 'WooCommerce') && is_checkout() && !is_page_template('page-fullwidth.php')) { 
            get_sidebar('shop'); 
    } elseif ( is_page() && !is_page_template('page-fullwidth.php') ||
            is_singular() && !is_singular( 'product' ) && !is_page())  {
            get_sidebar();
    } 
 
    if  (!is_singular()) {
        if (class_exists( 'WooCommerce') && !is_woocommerce()) {
            get_sidebar(); 
        }  elseif (!class_exists( 'WooCommerce')) {
            get_sidebar(); 
        }
    }

?>
<?php }
add_action( 'igthemes_after_site_content' , 'igthemes_get_sidebar' );
