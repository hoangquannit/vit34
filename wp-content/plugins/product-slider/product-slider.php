<?php
/*
Plugin Name: Product Slider
Plugin URI: http://pickplugins.com
Description: Awesome Product Slider for query post from any post type and display on grid.
Version: 1.0.1
Author: pickplugins
Author URI: http://pickplugins.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class ProductSlider{
	
	
	public function __construct(){
		
		define('product_slider_plugin_url', plugins_url('/', __FILE__) );
		define('product_slider_plugin_dir', plugin_dir_path(__FILE__) );
		define('product_slider_wp_url', 'https://wordpress.org/plugins/product-slider/' );
		define('product_slider_wp_reviews', 'http://wordpress.org/support/view/plugin-reviews/product-slider' );
		define('product_slider_pro_url','http://www.pickplugins.com/item/product-slider-display-any-post-type-in-carousel-slider/' );
		define('product_slider_demo_url', 'http://pickplugins.com/demo/product-slider/' );
		define('product_slider_conatct_url', 'http://pickplugins.com/contact/' );
		define('product_slider_qa_url', 'http://pickplugins.com/qa/' );
		define('product_slider_plugin_name', 'Product Slider' );
		define('product_slider_version', '1.0.1' );
		define('product_slider_customer_type', 'free' );		
		define('product_slider_share_url', 'https://wordpress.org/plugins/product-slider/' );
		define('product_slider_tutorial_video_url', '//www.youtube.com/embed/94F4xk_7o4g' );
		define('product_slider_textdomain', 'product_slider' );		

		include( 'includes/class-functions.php' );
		include( 'includes/class-shortcodes.php' );
		include( 'includes/class-settings.php' );		
		include( 'includes/meta.php' );		
		include( 'includes/functions.php' );

		add_action( 'wp_enqueue_scripts', array( $this, 'product_slider_scripts_front' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'product_slider_scripts_admin' ) );
		add_action( 'admin_enqueue_scripts', 'wp_enqueue_media' ); 
		
		add_action( 'plugins_loaded', array( $this, 'product_slider_load_textdomain' ));
		
		register_activation_hook( __FILE__, array( $this, 'product_slider_install' ) );
		register_deactivation_hook( __FILE__, array( $this, 'product_slider_deactivation' ) );
		//register_uninstall_hook( __FILE__, array( $this, 'product_slider_uninstall' ) );
		
		}
		
	public function product_slider_load_textdomain() {
	  load_plugin_textdomain( 'product_slider', false, plugin_basename( dirname( __FILE__ ) ) . '/languages/' ); 
	}
		
	public function product_slider_install(){
		
		
		$class_product_slider_functions = new class_product_slider_functions();
		
		$layout_content_list = $class_product_slider_functions->layout_content_list();
		$layout_hover_list = $class_product_slider_functions->layout_hover_list();		
		
		update_option('product_slider_layout_content', $layout_content_list);
		update_option('product_slider_layout_hover', $layout_hover_list);
		
		do_action( 'product_slider_action_install' );
		
		}		
		
	public function product_slider_uninstall(){
		
		do_action( 'product_slider_action_uninstall' );
		}		
		
	public function product_slider_deactivation(){
		
		do_action( 'product_slider_action_deactivation' );
		}
		
	
		
	public function product_slider_scripts_front(){
		wp_enqueue_script('jquery');

		wp_enqueue_style('product_slider_style', product_slider_plugin_url.'/assets/frontend/css/style.css');
		//wp_enqueue_script('product_slider_scripts', plugins_url( '/assets/frontend/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		//wp_localize_script('product_slider_scripts', 'product_slider_ajax', array( 'product_slider_ajaxurl' => admin_url( 'admin-ajax.php')));

		//wp_enqueue_script('isotope.pkgd.min', plugins_url( '/assets/frontend/js/isotope.pkgd.min.js' , __FILE__ ) , array( 'jquery' ));		
		
	
		wp_enqueue_script('owl.carousel', plugins_url( '/assets/frontend/js/owl.carousel.js' , __FILE__ ) , array( 'jquery' ));
		wp_enqueue_style('owl.carousel', product_slider_plugin_url.'assets/frontend/css/owl.carousel.css');
		wp_enqueue_style('owl.theme', product_slider_plugin_url.'assets/frontend/css/owl.theme.css');
		//wp_enqueue_style('font-awesome', product_slider_plugin_url.'assets/frontend/css/font-awesome.css');	
		wp_enqueue_style('style-slider', product_slider_plugin_url.'assets/frontend/css/style-slider.css');
		

		
		wp_enqueue_style('style.skins', product_slider_plugin_url.'assets/global/css/style.skins.css');
		wp_enqueue_style('style.layout', product_slider_plugin_url.'assets/global/css/style.layout.css');
		
		}
		
		
	public function product_slider_scripts_admin(){
			
		wp_enqueue_script('jquery');
		//wp_enqueue_script('jquery-ui-core');
		//wp_enqueue_script('jquery-ui-sortable');
		//wp_enqueue_script('jquery-ui-droppable');
		
		wp_enqueue_script('product_slider_admin_js', plugins_url( 'assets/admin/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		wp_localize_script( 'product_slider_admin_js', 'product_slider_ajax', array( 'product_slider_ajaxurl' => admin_url( 'admin-ajax.php')));

		wp_enqueue_style('product_slider_admin_style', product_slider_plugin_url.'assets/admin/css/style.css');

		//ParaAdmin
		wp_enqueue_style('ParaAdmin', product_slider_plugin_url.'assets/admin/ParaAdmin/css/ParaAdmin.css');		
		wp_enqueue_script('ParaAdmin', plugins_url( 'assets/admin/ParaAdmin/js/ParaAdmin.js' , __FILE__ ) , array( 'jquery' ));
		//wp_enqueue_style('font-awesome', product_slider_plugin_url.'assets/frontend/css/font-awesome.css');	

		wp_enqueue_script('codemirror', plugins_url( 'assets/admin/js/codemirror.js' , __FILE__ ) , array( 'jquery' ));
		wp_enqueue_script('codemirror-simplescrollbars', plugins_url( 'assets/admin/js/simplescrollbars.js' , __FILE__ ) , array( 'jquery' ));
		wp_enqueue_script('codemirror-css', plugins_url( 'assets/admin/js/css.js' , __FILE__ ) , array( 'jquery' ));	
		wp_enqueue_script('codemirror-javascript', plugins_url( 'assets/admin/js/javascript.js' , __FILE__ ) , array( 'jquery' ));				
		wp_enqueue_style('codemirror', product_slider_plugin_url.'assets/admin/css/codemirror.css');
		wp_enqueue_style('codemirror-simplescrollbars', product_slider_plugin_url.'assets/admin/css/simplescrollbars.css');		
			
		wp_enqueue_script('layout-editor', plugins_url( 'assets/admin/js/layout-editor.js' , __FILE__ ) , array( 'jquery' ));	
		
		wp_enqueue_style('style.skins', product_slider_plugin_url.'assets/global/css/style.skins.css');
		wp_enqueue_style('style.layout', product_slider_plugin_url.'assets/global/css/style.layout.css');		
		
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'product_slider_color_picker', plugins_url('/assets/admin/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
		
		
		}
		
		
	
	}

new ProductSlider();

