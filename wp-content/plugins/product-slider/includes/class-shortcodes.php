<?php

/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access

class class_product_slider_shortcodes{
	
	
    public function __construct(){
		
		add_shortcode( 'product_slider', array( $this, 'product_slider_display' ) );

    }
	
	
	
	
	public function product_slider_display($atts, $content = null ) {
			$atts = shortcode_atts(
				array(
					'id' => "",
	
					), $atts);
	
				$html  = '';
				$post_id = $atts['id'];

				include product_slider_plugin_dir.'/grid-items/variables.php';
				include product_slider_plugin_dir.'/grid-items/query.php';
				include product_slider_plugin_dir.'/grid-items/custom-css.php';				



				$html.='<div id="product-slider-'.$post_id.'" class="product-slider">';




				if ( $wp_query->have_posts() ) :
				
				//$html.='<div class="grid-nav-top">';	
				//include product_slider_plugin_dir.'/grid-items/nav-top.php';							
				//$html.='</div>';  // .grid-nav-top	
				
				$html.='<div class="grid-items">';
				while ( $wp_query->have_posts() ) : $wp_query->the_post();

				
				$html.='<div  class="item skin '.$skin.' '.product_slider_term_slug_list(get_the_ID()).'">';

				include product_slider_plugin_dir.'/grid-items/layer-media.php';
				include product_slider_plugin_dir.'/grid-items/layer-content.php';
				include product_slider_plugin_dir.'/grid-items/layer-hover.php';	
				
				$html.='</div>';  // .item		

				endwhile;
				wp_reset_query();
				$html.='</div>';  // .grid-items	
				
				//$html.='<div class="grid-nav-bottom">';	
							//include product_slider_plugin_dir.'/grid-items/nav-bottom.php';
				//$html.='</div>';  // .grid-nav-bottom	
				
				
				else:
				$html.='<div class="item">';
				$html.=__('No Post found',product_slider_textdomain);  // .item	
				$html.='</div>';  // .item					
				
				endif;
				
				include product_slider_plugin_dir.'/grid-items/scripts.php';	
				
				include product_slider_plugin_dir.'/grid-items/slider-scripts.php';	
				
				$html.='</div>';  // .product-slider
	

	
				return $html;
	
	
	}


	
	
	
	}

new class_product_slider_shortcodes();