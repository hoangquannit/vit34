<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * The default template for displaying content
 */

global $woo_options;

/**
 * The Variables
 *
 * Setup default variables, overriding them if the "Theme Options" have been saved.
 */
?>

<li>
    <a class="photo" href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail();?>
    </a>
    <div class="food_info">
        <h3>
            <a href="<?php the_permalink(); ?>" class="text_head_32"><?php the_title(); ?></a></h3>
            <p class="text_2 pv_5_10">
                <?php $content = get_the_content(); echo mb_strimwidth($content, 0, 100, '...');?>
            </p>
        <a href="<?php the_permalink(); ?>" class="viewDetail">
            XEM CHI TIẾT <i class="navIcon right-mid"></i></a>
    </div>
</li>
