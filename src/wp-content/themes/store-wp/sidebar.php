<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Store WP
 */

if ( ! is_active_sidebar( 'sidebar-main' ) ) {
    return;
}
?>
<?php igthemes_before_sidebar(); ?>

<div id="secondary" class="widget-area" role="complementary">

<?php igthemes_before_sidebar_content(); ?>
    <?php dynamic_sidebar( 'sidebar-main' ); ?>
<?php igthemes_after_sidebar_content(); ?>

</div><!-- #secondary -->

<?php igthemes_after_sidebar(); ?>
