<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Store WP
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php igthemes_before_single_title(); ?>
            <?php if (get_post_meta( get_the_ID(), 'igthemes-page-title', TRUE ) !='yes') { the_title( '<h1 class="entry-title">', '</h1>'); } ?>
        <?php igthemes_after_single_title(); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php igthemes_before_single_content(); ?>
          <?php the_content(); ?>
        <?php igthemes_after_single_content(); ?>
        <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'store-wp' ),
                'after'  => '</div>',
            ) );
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php
            edit_post_link(
                sprintf(
                    /* translators: %s: Name of current post */
                    esc_html__( 'Edit %s', 'store-wp' ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ),
                '<span class="edit-link">',
                '</span>'
            );
        ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
