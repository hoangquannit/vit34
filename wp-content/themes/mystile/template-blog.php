<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Template Name: Blog
 *
 * The blog page template displays the "blog-style" template on a sub-page. 
 *
 * @package WooFramework
 * @subpackage Template
 */

 global $woo_options;
 get_header();
 
/**
 * The Variables
 *
 * Setup default variables, overriding them if the "Theme Options" have been saved.
 */
	
	$settings = array(
					'thumb_w' => 787, 
					'thumb_h' => 300, 
					'thumb_align' => 'alignleft'
					);
					
	$settings = woo_get_dynamic_values( $settings );
?>
    <!-- #content Starts -->
    <div id="content" class="col-full">
    
        <?php woo_main_before(); ?>
        
        <section id="main" class="col-left">       
		
		<?php woo_loop_before(); ?>

        <?php
        	if ( get_query_var( 'paged') ) { $paged = get_query_var( 'paged' ); } elseif ( get_query_var( 'page') ) { $paged = get_query_var( 'page' ); } else { $paged = 1; }
        	
        	$query_args = array(
        						'post_type' => 'post', 
        						'paged' => $paged,
                                'cat'=> 40,
        					);
            $the_list_store =  array('cat' => 39 ) ;
        	
        	$query_args = apply_filters( 'woo_blog_template_query_args', $query_args ); // Do not remove. Used to exclude categories from displaying here.
            $the_list_store = apply_filters( 'woo_blog_template_query_args', $the_list_store ); // Do not remove. Used to exclude categories from displaying here.

        	remove_filter( 'pre_get_posts', 'woo_exclude_categories_homepage' );
        	
        	query_posts( $query_args );
        ?>
            <div class="col-lp_65-5">
                <h1 class="text_head_11">Giới thiệu về chúng tôi</h1>
                <ul class="list_of_fn">
        <?php	if ( have_posts() ) {
        		$count = 0;
        		while ( have_posts() ) { the_post(); $count++;
        ?>                                                            
            <!-- Post Starts -->
            <?php get_template_part( 'content-new', get_post_format() ); ?>
                                                
        <?php
        		} // End WHILE Loop
        	
        	} else {
        ?>
            <article <?php post_class(); ?>>
                <p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
            </article><!-- /.post -->
        <?php } // End IF Statement ?> 
        
        <?php woo_loop_after(); ?> 
    
        <?php woo_pagenav(); ?>
		<?php wp_reset_query(); ?>
                </ul>
            </div>
            <?php query_posts( $the_list_store );?>
            <div class="col-rp_39-7 store-list-new">
                <div class="rest_sys_box">
                    <div class="sys_stores_head">
                        <h2 class="text_head_22">Hệ thống cửa hàng</h2>
                    </div>
                    <ul class="listOfStores">
                        <?php	if ( have_posts() ) {
                            $count = 0;
                            while ( have_posts() ) { the_post(); $count++;
                                ?>
                                <!-- Post Starts -->
                                <?php get_template_part( 'content-list-store', get_post_format() ); ?>

                            <?php
                            } // End WHILE Loop

                        } else {
                            ?>
                            <article <?php post_class(); ?>>
                                <p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
                            </article><!-- /.post -->
                        <?php } // End IF Statement ?>

                        <?php woo_loop_after(); ?>

                        <?php woo_pagenav(); ?>
                        <?php wp_reset_query(); ?>
                    </ul>
                </div>
            </div>

        </section><!-- /#main -->
        
        <?php woo_main_after(); ?>
            
		<?php get_sidebar(); ?>

    </div><!-- /#content -->    
		
<?php get_footer(); ?>