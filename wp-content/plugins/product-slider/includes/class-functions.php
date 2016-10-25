<?php

/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access

class class_product_slider_functions{
	
	public function __construct(){
		
		
		}
	
	
	public function media_source(){
		
						$media_source = array(
												array('id'=>'featured_image','title'=>'Featured Image','checked'=>'yes'),
												array('id'=>'first_image','title'=>'First images from content','checked'=>'yes'),
												array('id'=>'empty_thumb','title'=>'Empty thumbnail','checked'=>'yes'),												
											);
											
						$media_source = apply_filters('product_slider_filter_media_source', $media_source);				
											
						return $media_source;
											
		
		}
	
	
	public function layout_items(){
		
		$layout_items = array(
							
							/*Default Post Stuff*/
							'title'=>'Title',
							'content'=>'Content',							
							'read_more'=>'Read more',	
							'thumb'=>'Thumbnail',
							'excerpt'=>'Excerpt',
							'excerpt_read_more'=>'Excerpt with Read more',													
							'post_date'=>'Post date',								
							'author'=>'Author',
							'categories'=>'Categories',							
							'tags'=>'tags',								
							'comments_count'=>'Comments Count',

							/* WooCommerce Stuff*/
							
							'wc_full_price'=>'WC Full Price',											
							'wc_add_to_cart'=>'WC Add to Cart',
							'wc_rating_star'=>'WC Star Rating',

							/* Easy Digital Downloads Stuff*/						
							'edd_price'=>'EDD Price',																		
							'edd_add_to_cart'=>'EDD Add to Cart',

							'WPeC_sale_price'=>'WPeC Sale Price',												
							'WPeC_add_to_cart'=>'WPeC Add to Cart',
							'WPeC_rating_star'=>'WPeC Star Rating',
							
							'zoom'=>'Zoom button',
							'share_button'=>'Share button',
							'hr'=>'Horizontal line',

								);
		
		$layout_items = apply_filters('product_slider_filter_layout_items', $layout_items);
		
		return $layout_items;
		}
	
	
	public function layout_content_list(){
		
		$layout_content_list = array(
		
						'flat'=>array(
								'0'=>array('key'=>'title', 'char_limit'=>'20', 'name'=>'Title', 'css'=>'display: block;font-size: 21px;line-height: normal;padding: 5px 10px;text-align: left;'),
								'1'=>array('key'=>'excerpt', 'char_limit'=>'20', 'name'=>'Excerpt', 'css'=>'display: block;font-size: 12px;padding: 5px 10px;text-align: left;'),
								'2'=>array('key'=>'read_more', 'name'=>'Read more', 'css'=>'display: block;font-size: 12px;font-weight: bold;padding: 0 10px;text-align: left;'),

									),
									
						'flat-center'=>array(												
								'0'=>array('key'=>'title', 'char_limit'=>'20', 'name'=>'Title', 'css'=>'display: block;font-size: 21px;line-height: normal;padding: 5px 10px;text-align: center;'),
								'1'=>array('key'=>'excerpt', 'char_limit'=>'20', 'name'=>'Excerpt', 'css'=>'display: block;font-size: 12px;padding: 5px 10px;text-align: center;'),
								'2'=>array('key'=>'read_more', 'name'=>'Read more', 'css'=>'display: block;font-size: 12px;font-weight: bold;padding: 0 10px;text-align: center;'),

									),
									
						'flat-right'=>array(												
								'0'=>array('key'=>'title', 'char_limit'=>'20', 'name'=>'Title', 'css'=>'display: block;font-size: 21px;line-height: normal;padding: 5px 10px;text-align: right;'),
								'1'=>array('key'=>'excerpt', 'char_limit'=>'20', 'name'=>'Excerpt', 'css'=>'display: block;font-size: 12px;padding: 5px 10px;text-align: right;'),
								'2'=>array('key'=>'read_more', 'name'=>'Read more', 'css'=>'display: block;font-size: 12px;font-weight: bold;padding: 0 10px;text-align: right;'),					
									),
									
						'flat-left'=>array(												
								'0'=>array('key'=>'title', 'char_limit'=>'20', 'name'=>'Title', 'css'=>'display: block;font-size: 21px;line-height: normal;padding: 5px 10px;text-align: left;'),
								
								'1'=>array('key'=>'excerpt', 'char_limit'=>'20', 'name'=>'Excerpt', 'css'=>'display: block;font-size: 12px;padding: 5px 10px;text-align: left;'),
								'2'=>array('key'=>'read_more', 'name'=>'Read more', 'css'=>'display: block;font-size: 12px;font-weight: bold;padding: 0 10px;text-align: left;')
									),
									
						'wc-center-price'=>array(													
								'0'=>array('key'=>'title', 'char_limit'=>'20', 'name'=>'Title', 'css'=>'display: block;font-size: 21px;line-height: normal;padding: 5px 10px;text-align: center;'),
								'1'=>array('key'=>'wc_full_price', 'name'=>'Price', 'css'=>'background:#f9b013;color:#fff;display: inline-block;font-size: 20px;line-height:normal;padding: 0 17px;text-align: center;'),
								'2'=>array('key'=>'excerpt', 'char_limit'=>'20', 'name'=>'Excerpt', 'css'=>'display: block;font-size: 12px;padding: 5px 10px;text-align: center;'),
									),								
									
						'wc-center-cart'=>array(													
								'0'=>array('key'=>'title', 'char_limit'=>'20', 'name'=>'Title', 'css'=>'display: block;font-size: 21px;line-height: normal;padding: 5px 10px;text-align: center;'),
								'1'=>array('key'=>'wc_add_to_cart', 'name'=>'Add to Cart', 'css'=>'color:#555;display: inline-block;font-size: 13px;line-height:normal;padding: 0 17px;text-align: center;'),
								
								'2'=>array('key'=>'excerpt', 'char_limit'=>'20', 'name'=>'Excerpt', 'css'=>'display: block;font-size: 12px;padding: 5px 10px;text-align: center;'),
									),										

						);
		
		$layout_content_list = apply_filters('product_slider_filter_layout_content_list', $layout_content_list);
		
		
		return $layout_content_list;
		}	
	

	
	public function layout_content($layout){
		
		$layout_content = $this->layout_content_list();
		
		return $layout_content[$layout];
		}	
		
	
	
	public function layout_hover_list(){
		
		$layout_hover_list = array(
									
									
						'flat'=>array(												

								'read_more'=>array('name'=>'Read more', 'css'=>'display: block;font-size: 12px;font-weight: bold;padding: 0 10px;text-align: center;')
									),										
						'flat-center'=>array(												

								'read_more'=>array('name'=>'Read more', 'css'=>'display: block;font-size: 12px;font-weight: bold;padding: 0 10px;text-align: center;')
									),
										
		
						);
		
		$layout_hover_list = apply_filters('product_slider_filter_layout_hover_list', $layout_hover_list);
		
		
		return $layout_hover_list;
		}	
	

	
	public function layout_hover($layout){
		
		$layout_hover = $this->layout_hover_list();
		
		return $layout_hover[$layout];
		}	
	
	
	
	
	public function skins(){
		
		$skins = array(
		
						'flat'=> array(
										'slug'=>'flat',									
										'name'=>'Flat',
										'thumb_url'=>'',
										),		
		
						'flip-x'=> array(
										'slug'=>'flip-x',									
										'name'=>'Flip-x',
										'thumb_url'=>'',
										),
						
						'zoomout'=>array(
										'slug'=>'zoomout',
										'name'=>'ZoomOut',
										'thumb_url'=>'',
										),							
						'spinright'=>array(
										'slug'=>'spinright',
										'name'=>'SpinRight',
										'thumb_url'=>'',
										),


						'contentinbottom'=>array(
										'slug'=>'contentinbottom',
										'name'=>'ContentInBottom',
										'thumb_url'=>'',
										),										

						'thumbrounded'=>array(
										'slug'=>'thumbrounded',
										'name'=>'ThumbRounded',
										'thumb_url'=>'',
										),																											
										
																															
					
						
						);
		
		$skins = apply_filters('product_slider_filter_skins', $skins);	
		
		return $skins;
		
		}
	


	}
	
//new class_product_slider_functions();