<?php
/**
 * The sidebar containing the shop widget area.
 *
 * @package Store WP
 */

if ( ! is_active_sidebar( 'sidebar-shop' ) ) {
    return;
}
?>

<?php igthemes_before_sidebar(); ?>

<div id="secondary" class="widget-area" role="complementary">

<?php igthemes_before_sidebar_content(); ?>
    <?php dynamic_sidebar( 'sidebar-shop' ); ?>
<?php igthemes_after_sidebar_content(); ?>

</div><!-- #secondary -->

<?php igthemes_after_sidebar(); ?>
