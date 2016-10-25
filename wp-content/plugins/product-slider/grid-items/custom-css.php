<?php

/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access
	
	
	$class_product_slider_functions = new class_product_slider_functions();
	
	$product_slider_layout_content = get_option( 'product_slider_layout_content' );
	
	if(empty($product_slider_layout_content)){
		$layout = $class_product_slider_functions->layout_content($layout_content);
		}
	else{
		$layout = $product_slider_layout_content[$layout_content];
		
		}
	
	$html .= '<style type="text/css">';	
	
	foreach($layout as $item_id=>$item_info){
		$item_css = $item_info['css'];
		
		$html .= '#product-slider-'.$post_id.' .element_'.$item_id.'{'.$item_css.'}';
		
		}
	
	
	$html .= '</style>';
	
	
	
	
	if($items_height_style == 'auto_height'){
		$items_media_height = 'auto';
		}
	elseif($items_height_style == 'fixed_height'){
		$items_media_height = $items_fixed_height;
		}
	else{
		$items_media_height = '220px';
		}
	
	
	
	
		
	if(!empty($custom_css)){
		$html .= '<style type="text/css">'.$custom_css.'</style>';	
		}
		
		$html .= '<style type="text/css">';
		
		$html .= '#product-slider-'.$post_id.' {
			padding:'.$container_padding.';
			background: '.$container_bg_color.' url('.$container_bg_image.') repeat scroll 0 0;
		}';

	
	if($skin=='flip-y' || $skin=='flip-x'){
		
	$html .= '#product-slider-'.$post_id.' .item{
		height:'.$items_media_height.' !important;
		}';	
		
		}




	$html .= '#product-slider-'.$post_id.' .item{
		margin:'.$items_margin.';

		}';
	

	$html .= '#product-slider-'.$post_id.' .owl-controls .owl-page span{
		background:'.$pagination_bullet_bg.';

		}';


	
	$html .= '#product-slider-'.$post_id.' .item .layer-media{
		height:'.$items_media_height.';
		overflow: hidden;
		}';	


	
/*

	$html .= '#product-slider-'.$post_id.' .owl-buttons .owl-next{
		background: '.$navigation_bg.' no-repeat scroll 10px 4px;

		}';

	$html .= '#product-slider-'.$post_id.' .owl-buttons .owl-prev{
		background: '.$navigation_bg.' no-repeat scroll 10px 4px;

		}';

*/










	$html .= '
	@media only screen and (min-width: 1024px ) {
	#product-slider-'.$post_id.' .item{}
	
	}
	
	@media only screen and ( min-width: 768px ) and ( max-width: 1023px ) {
	#product-slider-'.$post_id.' .item{}
	}
	
	@media only screen and ( min-width: 320px ) and ( max-width: 767px ) {
	#product-slider-'.$post_id.' .item{}
	}
			
			
			
			</style>';	