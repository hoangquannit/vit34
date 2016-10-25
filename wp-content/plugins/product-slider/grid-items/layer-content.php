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
	
	//$layout = $class_product_slider_functions->layout_content($layout_content);
	
	
	

	

	$html.='<div class="layer-content">';	
	
	foreach($layout as $item_id=>$item_info){
		
		$item_key = $item_info['key'];
		
		if(!empty($item_info['char_limit'])){
			$char_limit = $item_info['char_limit'];	
			}
			
		
		
		if($item_key=='title'){
			$html.='<div class="element element_'.$item_id.' '.$item_key.'" style="" >';
			$html.= wp_trim_words(get_the_title(), $char_limit,'');
			$html.='</div>';
			}
			
		elseif($item_key=='thumb'){
			
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
			$thumb_url = $thumb['0'];
	

			$html.='<div class="element element_'.$item_id.' '.$item_key.'" style="" >';
				$html.= '<img src="'.$thumb_url.'" />';
			$html.='</div>';
			}			
			
			
		elseif($item_key=='excerpt'){
			$html.='<div class="element element_'.$item_id.' '.$item_key.'" style="" >';
				$html.= wp_trim_words(get_the_excerpt(), $char_limit,'');
			$html.='</div>';
			}

		elseif($item_key=='read_more'){

				$html.= '<a class="element element_'.$item_id.' '.$item_key.'" style="" class="read-more" href="'.get_permalink().'">'.__('Read more.', product_slider_textdomain).'</a>';

			}			
	
		elseif($item_key=='excerpt_read_more'){
			$html.='<div class="element element_'.$item_id.' '.$item_key.'" style="" >';
				$html.= wp_trim_words(get_the_excerpt(), $char_limit,'').' <a class="read-more" href="'.get_permalink().'">'.__('Read more.', product_slider_textdomain).'</a>';
			$html.='</div>';
			}
			
		elseif($item_key=='post_date'){
			$html.='<div class="element element_'.$item_id.' '.$item_key.'" style="" >';
				$html.= get_the_date();
			$html.='</div>';
			}			
			
		elseif($item_key=='author'){
			$html.='<div class="element element_'.$item_id.' '.$item_key.'" style="" >';
				$html.= get_the_author();
			$html.='</div>';
			}	
			
		elseif($item_key=='categories'){
			
			$html.='<div class="element element_'.$item_id.' '.$item_key.'" style="" >';
				$categories = get_the_category();
				$separator = ' ';
				$output = '';
				if ( ! empty( $categories ) ) {
					foreach( $categories as $category ) {
						$html .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
					}
					$html.= trim( $output, $separator );
				}
			$html.='</div>';
		}					
			
		elseif($item_key=='tags'){
			$html.='<div class="element element_'.$item_id.' '.$item_key.'" style="" >';
				$posttags = get_the_tags();
				if ($posttags) {
				  foreach($posttags as $tag){
					$html.= '<a href="#">'.$tag->name . '</a> , ';
					}
				}
			$html.='</div>';
		}
		
		elseif($item_key=='comments_count'){
			$html.='<div class="element element_'.$item_id.' '.$item_key.'" style="" >';
			
				$comments_number = get_comments_number( get_the_ID() );
				
				if(comments_open()){
					
					if ( $comments_number == 0 ) {
							$html.= __('No Comments',product_slider_textdomain);
						} elseif ( $comments_number > 1 ) {
							$html.= $comments_number . __(' Comments',product_slider_textdomain);
						} else {
							$html.= __('1 Comment',product_slider_textdomain);
						}
		
					}
			$html.='</div>';
		}		
		
	
		
		elseif($item_key=='wc_full_price'){
			$html.='<div class="element element_'.$item_id.' '.$item_key.'" style="" >';
			
				$is_product = get_post_type( get_the_ID() );
				$active_plugins = get_option('active_plugins');
				if(in_array( 'woocommerce/woocommerce.php', (array) $active_plugins ) && $is_product=='product'){
				global $woocommerce, $product;
				
				$full_price = $product->get_price_html();
				
				$html.=$full_price;
				}
			$html.='</div>';
		}		
		

		
		
		elseif($item_key=='wc_add_to_cart'){
			$html.='<div class="element element_'.$item_id.' '.$item_key.'" style="" >';
			
				$is_product = get_post_type( get_the_ID() );
				$active_plugins = get_option('active_plugins');
				if(in_array( 'woocommerce/woocommerce.php', (array) $active_plugins ) && $is_product=='product'){
				global $woocommerce, $product;
				
					
					$add_to_cart = do_shortcode('[add_to_cart show_price="false" id="'.get_the_ID().'"]');
					$html.= $add_to_cart;
					
				}
			$html.='</div>';
		}			
		
		elseif($item_key=='wc_rating_star'){
			$html.='<div class="element element_'.$item_id.' '.$item_key.'" style="" >';
			
				$is_product = get_post_type( get_the_ID() );
				$active_plugins = get_option('active_plugins');
				if(in_array( 'woocommerce/woocommerce.php', (array) $active_plugins ) && $is_product=='product'){
				global $woocommerce, $product;
				
				$rating = $product->get_average_rating();
				$rating = (($rating/5)*100);
				
				if( $rating > 0 ){
					
					$rating_html = '<div class="woocommerce woocommerce-product-rating"><div class="star-rating" style="color:#444; padding-bottom:10px;" title="'.__('Rated',product_slider_textdomain).' '.$rating.'"><span style="width:'.$rating.'%;"></span></div></div>';
					
					}
				else{
					$rating_html = '';
					
					}
	
				$html.= $rating_html;
					
				}
			$html.='</div>';
		}			
		

		
		
		elseif($item_key=='edd_price'){
			$html.='<div class="element element_'.$item_id.' '.$item_key.'" style="" >';
			
				$is_download = get_post_type( get_the_ID() );
				$active_plugins = get_option('active_plugins');
				if(in_array( 'easy-digital-downloads/easy-digital-downloads.php', (array) $active_plugins ) && $is_download=='download'){

				
				$edd_price = edd_price(get_the_ID(),false);

				$html.= $edd_price;
					
				}
			$html.='</div>';
		}		
		
		
		
		elseif($item_key=='edd_add_to_cart'){
			$html.='<div class="element element_'.$item_id.' '.$item_key.'" style="" >';
			
				$is_download = get_post_type( get_the_ID() );
				$active_plugins = get_option('active_plugins');
				if(in_array( 'easy-digital-downloads/easy-digital-downloads.php', (array) $active_plugins ) && $is_download=='download'){

				$purchase_link = do_shortcode('[purchase_link id="'.get_the_ID().'" text="Add to Cart" style="button"]'  );
				$html.= $purchase_link;
					
				}
			$html.='</div>';
		}			
		

				
		elseif($item_key=='WPeC_sale_price'){
			
			$html.='<div class="element element_'.$item_id.' '.$item_key.'" style="" >';
			
				$is_product = get_post_type( get_the_ID() );
				$active_plugins = get_option('active_plugins');
				if(in_array( 'wp-e-commerce/wp-shopping-cart.php', (array) $active_plugins ) && $is_product=='wpsc-product'){

				$html.= wpsc_the_product_price();
					
				}
			$html.='</div>';
		}		
		
		
		
		elseif($item_key=='WPeC_rating_star'){
			
			$html.='<div class="element element_'.$item_id.' '.$item_key.'" style="" >';
			
				$is_product = get_post_type( get_the_ID() );
				$active_plugins = get_option('active_plugins');
				if(in_array( 'wp-e-commerce/wp-shopping-cart.php', (array) $active_plugins ) && $is_product=='wpsc-product'){

				$html.= wpsc_product_rater();
					
				}
			$html.='</div>';
		}
		

		
		elseif($item_key=='zoom'){
			$html.='<div class="element element_'.$item_id.' '.$item_key.'" style="" >';
			$html.= '<i class="fa fa-search"></i>';
			$html.='</div>';

		}		
		
		elseif($item_key=='share_button'){
			$html.='<div class="element element_'.$item_id.' '.$item_key.'" style="" >';
			$html.= '
			
			<span class="fb">
				<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.get_permalink().'"> </a>
			</span>
			<span class="twitter">
				<a target="_blank" href="https://twitter.com/intent/tweet?url='.get_permalink().'&text='.get_the_title().'"></a>
			</span>
			<span class="gplus">
				<a target="_blank" href="https://plus.google.com/share?url='.get_permalink().'"></a>
			</span>
			
			';
			$html.='</div>';

		}			
		
		elseif($item_key=='hr'){

			$html.= '<hr class="element element_'.$item_id.' '.$item_key.'" style="" />';

		}		
		
		elseif($item_key=='meta_key'){
			
			$meta_value = get_post_meta(get_the_ID(), $item_info['field_id'],true);
			if(!empty($meta_value)){
				
				$html.='<div class="element element_'.$item_id.' '.$item_key.'" style="" >';
				$html.= do_shortcode($meta_value);
				$html.='</div>';
				
				}


		}					
					
			

		}
	
	
	
	
	$html.='</div>'; // .layer-content