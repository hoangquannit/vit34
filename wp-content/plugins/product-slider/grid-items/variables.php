<?php
/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access

	global $post;
	$product_slider_meta_options = get_post_meta( $post_id, 'product_slider_meta_options', true );
	
	if(!empty($product_slider_meta_options['post_types']))
	$post_types = $product_slider_meta_options['post_types'];
	

	if(!empty($product_slider_meta_options['post_status']))
	$post_status = $product_slider_meta_options['post_status'];	
	

	
	
	//var_dump($offset);
	
	if(!empty($product_slider_meta_options['posts_per_page'])){
		$posts_per_page = $product_slider_meta_options['posts_per_page'];
		}
	else{
		$posts_per_page = -1;
		}
	

	
	if(!empty($product_slider_meta_options['query_order']))
	$query_order = $product_slider_meta_options['query_order'];	
	
	if(!empty($product_slider_meta_options['query_orderby']))
	$query_orderby = $product_slider_meta_options['query_orderby'];
	
	//var_dump($query_orderby);
	$str_orderby = '';
	foreach($query_orderby as $orderby){
		
		$str_orderby.= $orderby.' ';
		
		}
	$query_orderby = $str_orderby;
	//var_dump($query_orderby);
	


	
	if(!empty($product_slider_meta_options['layout']['content']))
	$layout_content = $product_slider_meta_options['layout']['content'];	
	
	if(!empty($product_slider_meta_options['layout']['hover']))
	$layout_hover = $product_slider_meta_options['layout']['hover'];
	
	if(!empty($product_slider_meta_options['skin'])){
		$skin = $product_slider_meta_options['skin'];	
		}
	else{
		$skin = 'flat';	
		
		}
	
	if(!empty($product_slider_meta_options['custom_js']))
	$custom_js = $product_slider_meta_options['custom_js'];	
	
	if(!empty($product_slider_meta_options['custom_css']))
	$custom_css = $product_slider_meta_options['custom_css'];
		

	
	if(!empty($product_slider_meta_options['item']['desktop'])){
		
		$items_in_desktop = $product_slider_meta_options['item']['desktop'];
		}
	else{
		$items_in_desktop = '3';
		
		}
		
		
	if(!empty($product_slider_meta_options['item']['tablet'])){
		
		$items_in_tablet = $product_slider_meta_options['item']['tablet'];
		}
	else{
		$items_in_tablet = '5';
		
		}		
		
	if(!empty($product_slider_meta_options['item']['mobile'])){
		
		$items_in_mobile = $product_slider_meta_options['item']['mobile'];
		}
	else{
		$items_in_mobile = '1';
		
		}	
		
		
	if(!empty($product_slider_meta_options['height']['style'])){
		
		$items_height_style = $product_slider_meta_options['height']['style'];
		}
	else{
		$items_height_style = 'auto_height';
		
		}				
			
	if(!empty($product_slider_meta_options['height']['fixed_height'])){
		
		$items_fixed_height = $product_slider_meta_options['height']['fixed_height'];
		}
	else{
		$items_fixed_height = '';
		
		}
		
		
	if(!empty($product_slider_meta_options['media_source'])){
		
		$media_source = $product_slider_meta_options['media_source'];
		}
	else{
		$media_source = array();
		
		}
		
	if(!empty($product_slider_meta_options['featured_img_size'])){
		
		$featured_img_size = $product_slider_meta_options['featured_img_size'];
		}
	else{
		$featured_img_size = 'full';
		
		}		
		
			
			
	if(!empty($product_slider_meta_options['margin'])){
		
		$items_margin = $product_slider_meta_options['margin'];
		}
	else{
		$items_margin = '';
		
		}
		
	if(!empty($product_slider_meta_options['container']['padding'])){
		
		$container_padding = $product_slider_meta_options['container']['padding'];
		}
	else{
		$container_padding = '';
		
		}	
		
	if(!empty($product_slider_meta_options['container']['bg_color'])){
		
		$container_bg_color = $product_slider_meta_options['container']['bg_color'];
		}
	else{
		$container_bg_color = '';
		
		}		
		
		
	if(!empty($product_slider_meta_options['container']['bg_image'])){
		
		$container_bg_image = $product_slider_meta_options['container']['bg_image'];
		}
	else{
		$container_bg_image = '';
		
		}				
		

	
		
	if(!empty($product_slider_meta_options['nav_bottom']['pagination_theme'])){
		
		$pagination_theme = $product_slider_meta_options['nav_bottom']['pagination_theme'];
		}
	else{
		$pagination_theme = 'lite';
		
		}
	
	
	if(!empty($product_slider_meta_options['nav_bottom']['navigation_theme'])){
		
		$navigation_theme = $product_slider_meta_options['nav_bottom']['navigation_theme'];
		}
	else{
		$navigation_theme = 'round';
		
		}
	
	if(!empty($product_slider_meta_options['slider_options']['navigation_bg'])){
		$navigation_bg = $product_slider_meta_options['slider_options']['navigation_bg'];
	}
	else{
		$navigation_bg = '#35a2ff';
	}	
	
	
	if(!empty($product_slider_meta_options['slider_options']['slider_enable'])){
		$slider_enable = $product_slider_meta_options['slider_options']['slider_enable'];
	}
	else{
		$slider_enable = 'true';
	}	
	
	if(!empty($product_slider_meta_options['slider_options']['slider_pagination'])){
		$slider_pagination = $product_slider_meta_options['slider_options']['slider_pagination'];
	}
	else{
		$slider_pagination = 'true';
	}
	
	
	if(!empty($product_slider_meta_options['slider_options']['slider_navigation'])){
		$slider_navigation = $product_slider_meta_options['slider_options']['slider_navigation'];
	}
	else{
		$slider_navigation = 'true';
	}	
	
	
	
	
	if(!empty($product_slider_meta_options['slider_options']['navigation_position'])){
		$navigation_position = $product_slider_meta_options['slider_options']['navigation_position'];
	}
	else{
		$navigation_position = 'middle';
	}	
		
	
	if(!empty($product_slider_meta_options['slider_options']['slider_autoplay'])){
		$slider_autoplay = $product_slider_meta_options['slider_options']['slider_autoplay'];
	}
	else{
		$slider_autoplay = 'true';
	}	
	
	if(!empty($product_slider_meta_options['slider_options']['hover_stop'])){
		$hover_stop = $product_slider_meta_options['slider_options']['hover_stop'];
	}
	else{
		$hover_stop = 'true';
	}	
	

	
	if(!empty($product_slider_meta_options['slider_options']['slideSpeed'])){
		$slideSpeed = $product_slider_meta_options['slider_options']['slideSpeed'];
	}
	else{
		$slideSpeed = '500';
	}	
	
	if(!empty($product_slider_meta_options['slider_options']['paginationSpeed'])){
		$paginationSpeed = $product_slider_meta_options['slider_options']['paginationSpeed'];
	}
	else{
		$paginationSpeed = '500';
	}	
	
	if(!empty($product_slider_meta_options['slider_options']['pagination_bullet_bg'])){
		$pagination_bullet_bg = $product_slider_meta_options['slider_options']['pagination_bullet_bg'];
	}
	else{
		$pagination_bullet_bg = '#35a2ff';
	}	
	
	
	
	if(!empty($product_slider_meta_options['slider_options']['rewindSpeed'])){
		$rewindSpeed = $product_slider_meta_options['slider_options']['rewindSpeed'];
	}
	else{
		$rewindSpeed = '500';
	}	
	
	if(!empty($product_slider_meta_options['slider_options']['paginationNumbers'])){
		$paginationNumbers = $product_slider_meta_options['slider_options']['paginationNumbers'];
	}
	else{
		$paginationNumbers = 'true';
	}		
	
	
	if(!empty($product_slider_meta_options['slider_options']['lazyLoad'])){
		$lazyLoad = $product_slider_meta_options['slider_options']['lazyLoad'];
	}
	else{
		$lazyLoad = 'true';
	}	
	
	if(!empty($product_slider_meta_options['slider_options']['touchDrag'])){
		$touchDrag = $product_slider_meta_options['slider_options']['touchDrag'];
	}
	else{
		$touchDrag = 'true';
	}		
	
	if(!empty($product_slider_meta_options['slider_options']['mouseDrag'])){
		$mouseDrag = $product_slider_meta_options['slider_options']['mouseDrag'];
	}
	else{
		$mouseDrag = 'true';
	}		
	

		
		if(empty($exclude_post_id))
			{
				$exclude_post_id = array();
			}
		else
			{
				$exclude_post_id = explode(',',$exclude_post_id);
			}
		

		
		if ( get_query_var('paged') ) {
		
			$paged = get_query_var('paged');
		
		} elseif ( get_query_var('page') ) {
		
			$paged = get_query_var('page');
		
		} else {
		
			$paged = 1;
		
		}
