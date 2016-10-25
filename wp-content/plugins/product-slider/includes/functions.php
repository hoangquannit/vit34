<?php

/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access



function product_slider_get_media($media_source, $featured_img_size){
		
		
		$html_thumb = '';
		
		
		if($media_source == 'featured_image'){
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $featured_img_size );
				$thumb_url = $thumb['0'];
				
				if(!empty($thumb_url)){
					$html_thumb.= '<img src="'.$thumb_url.'" />';
					}
				else{
					
					$html_thumb.= '';
					}

			}
			
			
		elseif($media_source == 'empty_thumb'){


				$html_thumb.= '<img src="'.product_slider_plugin_url.'assets/frontend/css/images/placeholder.png" />';


			}			
			
			
			
			
		elseif($media_source == 'first_image'){

			global $post, $posts;
			$first_img = '';
			ob_start();
			ob_end_clean();
			$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
			
			if(!empty($matches[1][0]))
			$first_img = $matches[1][0];
			
			if(empty($first_img)) {
				$html_thumb.= '';
				}
			else{
				$html_thumb.= '<img src="'.$first_img.'" />';
				}

			
			}	
			

		return $html_thumb;
				
			
	
	
	}






function product_slider_reset_content_layouts(){
	

	$class_product_slider_functions = new class_product_slider_functions();
	$layout_content_list = $class_product_slider_functions->layout_content_list();
	update_option('product_slider_layout_content', $layout_content_list);
	
	
	}


add_action('wp_ajax_product_slider_reset_content_layouts', 'product_slider_reset_content_layouts');
add_action('wp_ajax_nopriv_product_slider_reset_content_layouts', 'product_slider_reset_content_layouts');


function product_slider_term_slug_list($post_id){
	$term_slug_list = '';
	
	$post_taxonomies = get_post_taxonomies($post_id);
	
	foreach($post_taxonomies as $taxonomy){
		
		$term_list[] = wp_get_post_terms(get_the_ID(), $taxonomy, array("fields" => "all"));
		
		}

	if(!empty($term_list)){
		foreach($term_list as $term_key=>$term) 
			{
				foreach($term as $term_id=>$term){
					$term_slug_list .= $term->slug.' ';
					}
			}
		
		}


	return $term_slug_list;

	}














function product_slider_posttypes($post_types){

	$html = '';
	$html .= '<select post_id="'.get_the_ID().'" class="post_types" multiple="multiple" size="6" name="product_slider_meta_options[post_types][]">';
	
		$post_types_all = get_post_types( '', 'names' ); 
		foreach ( $post_types_all as $post_type ) {

			global $wp_post_types;
			$obj = $wp_post_types[$post_type];
			
			if(in_array($post_type,$post_types)){
				$selected = 'selected';
				}
			else{
				$selected = '';
				}

			$html .= '<option '.$selected.' value="'.$post_type.'" >'.$obj->labels->singular_name.'</option>';
		}
		
	$html .= '</select>';
	return $html;
	}










function product_slider_layout_content_ajax(){
	
	$layout_key = $_POST['layout'];
	
	$class_product_slider_functions = new class_product_slider_functions();
	
	
	$product_slider_layout_content = get_option( 'product_slider_layout_content' );
	
	if(empty($product_slider_layout_content)){
		$layout = $class_product_slider_functions->layout_content($layout_key);
		}
	else{
		$layout = $product_slider_layout_content[$layout_key];
		
		}
	
	//$layout = $class_product_slider_functions->layout_content($layout_key);
	
	

	?>
    <div class="<?php echo $layout_key; ?>">
    <?php
    
		foreach($layout as $item_key=>$item_info){
			$item_key = $item_info['key'];
			?>
			

				<div class="item <?php echo $item_key; ?>" style=" <?php echo $item_info['css']; ?> ">
				
				<?php
				
				if($item_key=='thumb'){
					
					?>
					<img src="<?php echo product_slider_plugin_url; ?>assets/admin/images/thumb.png" />
					<?php
					}
					
				elseif($item_key=='title'){
					
					?>
					Lorem Ipsum is simply
					
					<?php
					}								
					
				elseif($item_key=='excerpt'){
					
					?>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text
					<?php
					}	
					
				elseif($item_key=='excerpt_read_more'){
					
					?>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text <a href="#">Read more</a>
					<?php
					}					
					
				elseif($item_key=='read_more'){
					
					?>
					<a href="#">Read more</a>
					<?php
					}												
					
				elseif($item_key=='post_date'){
					
					?>
					18/06/2015
					<?php
					}	
					
				elseif($item_key=='author'){
					
					?>
					PickPlugins
					<?php
					}					
					
				elseif($item_key=='categories'){
					
					?>
					<a hidden="#">Category 1</a> <a hidden="#">Category 2</a>
					<?php
					}
					
				elseif($item_key=='tags'){
					
					?>
					<a hidden="#">Tags 1</a> <a hidden="#">Tags 2</a>
					<?php
					}	
					
				elseif($item_key=='comments_count'){
					
					?>
					3 Comments
					<?php
					}
					
					// WooCommerce
				elseif($item_key=='wc_full_price'){
					
					?>
					<del>$45</del> - <ins>$40</ins>
					<?php
					}											
				elseif($item_key=='wc_sale_price'){
					
					?>
					$45
					<?php
					}					
									
				elseif($item_key=='wc_regular_price'){
					
					?>
					$45
					<?php
					}	
					
				elseif($item_key=='wc_add_to_cart'){
					
					?>
					Add to Cart
					<?php
					}	
					
				elseif($item_key=='wc_rating_star'){
					
					?>
					*****
					<?php
					}					
										
				elseif($item_key=='wc_rating_text'){
					
					?>
					2 Reviews
					<?php
					}	
				elseif($item_key=='wc_categories'){
					
					?>
					<a hidden="#">Category 1</a> <a hidden="#">Category 2</a>
					<?php
					}					
					
				elseif($item_key=='wc_tags'){
					
					?>
					<a hidden="#">Tags 1</a> <a hidden="#">Tags 2</a>
					<?php
					}
					
				elseif($item_key=='edd_price'){
					
					?>
					$45
					<?php
					}					
																										
					
				else{
					
					echo $item_info['name'];
					
					}
				
				?>
				
				
				
				</div>
				<?php
			}
	
	?>
    </div>
    <?php
	
	die();
	
	}
	
add_action('wp_ajax_product_slider_layout_content_ajax', 'product_slider_layout_content_ajax');
add_action('wp_ajax_nopriv_product_slider_layout_content_ajax', 'product_slider_layout_content_ajax');


















function product_slider_layout_hover_ajax(){
	
	$layout_key = $_POST['layout'];
	
	$class_product_slider_functions = new class_product_slider_functions();
	$layout = $class_product_slider_functions->layout_hover($layout_key);
	
	

	?>
    <div class="<?php echo $layout_key; ?>">
    <?php
    
		foreach($layout as $item_key=>$item_info){
			
			?>
			

				<div class="item <?php echo $item_key; ?>" style=" <?php echo $item_info['css']; ?> ">
				
				<?php
				
				if($item_key=='thumb'){
					
					?>
					<img src="<?php echo product_slider_plugin_url; ?>assets/admin/images/thumb.png" />
					<?php
					}
					
				elseif($item_key=='title'){
					
					?>
					Lorem Ipsum is simply
					
					<?php
					}								
					
				elseif($item_key=='excerpt'){
					
					?>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text
					<?php
					}	
					
				elseif($item_key=='excerpt_read_more'){
					
					?>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text <a href="#">Read more</a>
					<?php
					}					
					
				elseif($item_key=='read_more'){
					
					?>
					<a href="#">Read more</a>
					<?php
					}												
					
				elseif($item_key=='post_date'){
					
					?>
					18/06/2015
					<?php
					}	
					
				elseif($item_key=='author'){
					
					?>
					PickPlugins
					<?php
					}					
					
				elseif($item_key=='categories'){
					
					?>
					<a hidden="#">Category 1</a> <a hidden="#">Category 2</a>
					<?php
					}
					
				elseif($item_key=='tags'){
					
					?>
					<a hidden="#">Tags 1</a> <a hidden="#">Tags 2</a>
					<?php
					}	
					
				elseif($item_key=='comments_count'){
					
					?>
					3 Comments
					<?php
					}
					
					// WooCommerce
				elseif($item_key=='wc_full_price'){
					
					?>
					<del>$45</del> - <ins>$40</ins>
					<?php
					}											
				elseif($item_key=='wc_sale_price'){
					
					?>
					$45
					<?php
					}					
									
				elseif($item_key=='wc_regular_price'){
					
					?>
					$45
					<?php
					}	
					
				elseif($item_key=='wc_add_to_cart'){
					
					?>
					Add to Cart
					<?php
					}	
					
				elseif($item_key=='wc_rating_star'){
					
					?>
					*****
					<?php
					}					
										
				elseif($item_key=='wc_rating_text'){
					
					?>
					2 Reviews
					<?php
					}	
				elseif($item_key=='wc_categories'){
					
					?>
					<a hidden="#">Category 1</a> <a hidden="#">Category 2</a>
					<?php
					}					
					
				elseif($item_key=='wc_tags'){
					
					?>
					<a hidden="#">Tags 1</a> <a hidden="#">Tags 2</a>
					<?php
					}																						
					
				else{
					
					echo $item_info['name'];
					
					}
				
				?>
				
				
				
				</div>
				<?php
			}
	
	?>
    </div>
    <?php
	
	die();
	
	}
	
add_action('wp_ajax_product_slider_layout_hover_ajax', 'product_slider_layout_hover_ajax');
add_action('wp_ajax_nopriv_product_slider_layout_hover_ajax', 'product_slider_layout_hover_ajax');








function product_slider_layout_add_elements(){
	
	$item_key = $_POST['item_key'];
	$layout = $_POST['layout'];	
	$unique_id = $_POST['unique_id'];	

	$class_product_slider_functions = new class_product_slider_functions();
	$layout_items = $class_product_slider_functions->layout_items();



	$html = array();
	$html['item'] = '';
	$html['item'].= '<div class="item '.$item_key.'" >';	

    
    if($item_key=='thumb'){
		
        $html['item'].= '<img style="width:100%;" src="'.product_slider_plugin_url.'assets/admin/images/thumb.png" />';

        }
        
    elseif($item_key=='title'){
        
		$html['item'].= 'Lorem Ipsum is simply';

        }								
        
    elseif($item_key=='excerpt'){
        $html['item'].= 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text';
		

        }	
        
    elseif($item_key=='excerpt_read_more'){
        $html['item'].= 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text <a href="#">Read more</a>';

        }					
        
    elseif($item_key=='read_more'){
        $html['item'].= '<a href="#">Read more</a>';

        }												
        
    elseif($item_key=='post_date'){
        $html['item'].= '18/06/2015';

        }	
        
    elseif($item_key=='author'){
        $html['item'].= 'PickPlugins';

        }					
        
    elseif($item_key=='categories'){
        $html['item'].= '<a hidden="#">Category 1</a> <a hidden="#">Category 2</a>';

        }
        
    elseif($item_key=='tags'){
        $html['item'].= '<a hidden="#">Tags 1</a> <a hidden="#">Tags 2</a>';

        }	
        
    elseif($item_key=='comments_count'){
         $html['item'].= '3 Comments';

        }
        
        // WooCommerce
    elseif($item_key=='wc_full_price'){
        $html['item'].= '<del>$45</del> - <ins>$40</ins>';

        }											
    elseif($item_key=='wc_sale_price'){
        $html['item'].= '$45';

        }					
                        
    elseif($item_key=='wc_regular_price'){
         $html['item'].= '$45';

        }	
        
    elseif($item_key=='wc_add_to_cart'){
        $html['item'].= 'Add to Cart';

        }	
        
    elseif($item_key=='wc_rating_star'){
        $html['item'].= '*****';

        }					
                            
    elseif($item_key=='wc_rating_text'){
        $html['item'].= '2 Reviews';

        }	
    elseif($item_key=='wc_categories'){
        $html['item'].= '<a href="#">Category 1</a> <a href="#">Category 2</a>';

        }					
        
    elseif($item_key=='wc_tags'){
         $html['item'].= '<a href="#" >Tags 1</a> <a href="#">Tags 2</a>';

        }	
		
	/* WP eCommerce Stuff*/
		
    elseif($item_key=='WPeC_old_price'){
         $html['item'].= '$45';

        }
		
    elseif($item_key=='WPeC_sale_price'){
         $html['item'].= '$40';

        }		
    elseif($item_key=='WPeC_add_to_cart'){
         $html['item'].= 'Add to Cart';

        }		
		
    elseif($item_key=='WPeC_rating_star'){
         $html['item'].= '*****';

        }			
    elseif($item_key=='WPeC_categories'){
         $html['item'].= '<a href="#">Category 1</a> <a href="#">Category 2</a>';

        }		
		
		
    elseif($item_key=='meta_key'){
         $html['item'].= 'Meta Key';

        }			
																							
        
    else{
        
        echo '';
        
        }
     $html['item'].= '</div>';

	$html['options'] = '';
	$html['options'].= '<div class="items" id="'.$unique_id.'">';
	$html['options'].= '<div class="header"><span class="remove">X</span>'.$layout_items[$item_key].'</div>';
	$html['options'].= '<div class="options">';
	
	if($item_key=='meta_key'){
		
		$html['options'].= 'Meta Key: <br /><input type="text" value="" name="product_slider_layout_content['.$layout.']['.$unique_id.'][field_id]" /><br /><br />';
		}
		
	if($item_key=='title'  || $item_key=='excerpt' || $item_key=='excerpt_read_more'){
		
		$html['options'].= 'Character limit: <br /><input type="text" value="20" name="product_slider_layout_content['.$layout.']['.$unique_id.'][char_limit]" /><br /><br />';
		}		
		
		

	$html['options'].= '
	<input type="hidden" value="'.$item_key.'" name="product_slider_layout_content['.$layout.']['.$unique_id.'][key]" />
	<input type="hidden" value="'.$layout_items[$item_key].'" name="product_slider_layout_content['.$layout.']['.$unique_id.'][name]" />
	<textarea class="custom_css" name="product_slider_layout_content['.$layout.']['.$unique_id.'][css]" item_id="'.$item_key.'" style="width:50%" spellcheck="false" autocapitalize="off" autocorrect="off">font-size:12px;display:block;padding:10px 0;</textarea>';
	
	
	
	$html['options'].= '</div>';
	$html['options'].= '</div>';	



	echo json_encode($html);


	
	die();
	
	}
	
add_action('wp_ajax_product_slider_layout_add_elements', 'product_slider_layout_add_elements');
add_action('wp_ajax_nopriv_product_slider_layout_add_elements', 'product_slider_layout_add_elements');















	
	function product_slider_share_plugin(){
			
			?>
<iframe src="//www.facebook.com/plugins/like.php?href=https://wordpress.org/plugins/product-slider/%2F&amp;width&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=80&amp;appId=652982311485932" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:80px;" allowTransparency="true"></iframe>
            
            <br />
            <!-- Place this tag in your head or just before your close body tag. -->
            <script src="https://apis.google.com/js/platform.js" async defer></script>
            
            <!-- Place this tag where you want the +1 button to render. -->
            <div class="g-plusone" data-size="medium" data-annotation="inline" data-width="300" data-href="<?php echo product_slider_share_url; ?>"></div>
            
            <br />
            <br />
            <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo product_slider_share_url; ?>" data-text="<?php echo product_slider_plugin_name; ?>" data-via="ParaTheme" data-hashtags="WordPress">Tweet</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>



            <?php

		
		}
	
	
	

		
		
		
		

		
		