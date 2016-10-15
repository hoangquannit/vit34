<?php
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?><?php
/**
 * Index Template
 *
 * Here we setup all logic and XHTML that is required for the index template, used as both the homepage
 * and as a fallback template, if a more appropriate template file doesn't exist for a specific context.
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header();
	global $woo_options;

?>

    <?php if ( isset( $woo_options[ 'woo_homepage_banner' ] ) && $woo_options[ 'woo_homepage_banner' ] == "true" ) { ?>

    	<div class="homepage-banner">
    		<?php
				if ( $woo_options[ 'woo_homepage_banner' ] == "true" ) { $banner = $woo_options['woo_homepage_banner_path']; }
				if ( $woo_options[ 'woo_homepage_banner' ] == "true" && is_ssl() ) { $banner = preg_replace("/^http:/", "https:", $woo_options['woo_homepage_banner_path']); }
			?>
			    <img src="<?php echo $banner; ?>" alt="" />
            <div class="captionLC" style="left: 184.5px;"> <div class="captionLC_inner"> <ul class="captionLC_list"> <li><a>Giao Hàng &amp; thu tiền tận nơi</a></li> <li><a>Hỗ trợ đặt hàng trực tuyến &amp; qua điện thoại</a></li> <li><a>Hệ thống tích điểm hấp dẫn dành riêng cho khách hàng</a></li> </ul> <a href="/cua-hang" class="btnFoodOrder">Đặt món ngay</a> </div> </div>
    	</div>

    <?php } ?>

    <div id="content" class="col-full <?php if ( $woo_options[ 'woo_homepage_banner' ] == "true" ) echo 'with-banner'; ?> <?php if ( $woo_options[ 'woo_homepage_sidebar' ] == "false" ) echo 'no-sidebar'; ?>">

    	<?php woo_main_before(); ?>

		<section id="ctas" class="col-left">
            <div class="row">
                <h3 class="text_head_31">
                    <?php echo $woo_options['woo_homepage_banner_headline']; ?>
                </h3>
                <div class="text_1 text-center"><?php echo wpautop($woo_options['woo_homepage_banner_standfirst']); ?></div>
            </div>
        <div class="shell clearfix">
		<?php woo_loop_before(); ?>

		<?php if ( isset( $woo_options[ 'woo_homepage_blog' ] ) && $woo_options[ 'woo_homepage_blog' ] == "true" ) {
			$postsperpage = $woo_options['woo_homepage_blog_perpage'];
		?>

		<?php

			$the_query = new WP_Query( array( 'posts_per_page' => $postsperpage,'cat' => 38 ) );
            $the_post_sale =  new WP_Query( array( 'posts_per_page' => $postsperpage,'cat' => 24 ) );
            $the_list_store =  new WP_Query( array('cat' => 39 ) );

        	if ( have_posts() ) : $count = 0;
        ?>

			<?php /* Start the Loop */ ?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); $count++; ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php
				endwhile;
				// Reset Post Data
				wp_reset_postdata();
			?>



		<?php else : ?>

            <article <?php post_class(); ?>>
                <p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
            </article><!-- /.post -->

        <?php endif; ?>

        <?php } // End query to see if the blog should be displayed ?>

        <?php woo_loop_after(); ?>
		</div>
            <?php if ( have_posts() ) : $count = 0;?>
            <?php /* Start the Loop */ ?>
            <div class="new-sale">
            <h2 class="sale-head"> Khuyễn mại</h2>
            <ul class="listOfFood listFix">
            <?php while ( $the_post_sale->have_posts() ) : $the_post_sale->the_post(); $count++; ?>

                <?php
                /* Include the Post-Format-specific template for the content.
                 * If you want to overload this in a child theme then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part( 'content-sale', get_post_format() );
                ?>

            <?php
            endwhile;
            ?>
            </ul>
            </div>
            <?php
            // Reset Post Data
            wp_reset_postdata();
            endif;
            ?>
            <?php // he thong cua hang ?>
            <div class="col-rp_39-7">
                <div class="rest_sys_box">
                    <div class="sys_stores_head">
                        <h2 class="text_head_22">Hệ thống cửa hàng</h2>
                    </div>
                    <ul class="listOfStores">
            <?php if ( have_posts() ) : $count = 0;?>
            <?php /* Start the Loop */ ?>
                <?php while ( $the_list_store->have_posts() ) : $the_list_store->the_post(); $count++; ?>

                    <?php
                    /* Include the Post-Format-specific template for the content.
                     * If you want to overload this in a child theme then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part( 'content-list-store', get_post_format() );
                    ?>

                <?php
                endwhile;
                // Reset Post Data
                wp_reset_postdata();
                endif;
                ?>
                    </ul>
                </div>
            </div>
            <?php /* end he thong cua hang*/?>
            <div class="clearfix"></div>
            <div class="product-recent">
                <?php mystile_homepage_content(); ?>
            </div>
		</section><!-- /#main -->

		<?php woo_main_after(); ?>



		<?php if ( isset( $woo_options[ 'woo_homepage_sidebar' ] ) && $woo_options[ 'woo_homepage_sidebar' ] == "true" ) get_sidebar(); ?>

    </div><!-- /#content -->

<?php get_footer(); ?>