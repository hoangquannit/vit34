<?php
/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access


function product_slider_posttype_register() {
 
        $labels = array(
                'name' => _x('Product Slider', 'product_slider'),
                'singular_name' => _x('Product Slider', 'product_slider'),
                'add_new' => _x('New Product Slider', 'product_slider'),
                'add_new_item' => __('New Product Slider'),
                'edit_item' => __('Edit Product Slider'),
                'new_item' => __('New Product Slider'),
                'view_item' => __('View Product Slider'),
                'search_items' => __('Search Product Slider'),
                'not_found' =>  __('Nothing found'),
                'not_found_in_trash' => __('Nothing found in Trash'),
                'parent_item_colon' => ''
        );
 
        $args = array(
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                'menu_icon' => null,
                'rewrite' => true,
                'capability_type' => 'post',
                'hierarchical' => false,
                'menu_position' => null,
                'supports' => array('title'),
				'menu_icon' => 'dashicons-media-spreadsheet',
				
          );
 
        register_post_type( 'product_slider' , $args );

}

add_action('init', 'product_slider_posttype_register');





/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function meta_boxes_product_slider()
	{
		$screens = array( 'product_slider' );
		foreach ( $screens as $screen )
			{
				add_meta_box('product_slider_metabox',__( 'Product Slider Options','product_slider' ),'meta_boxes_product_slider_input', $screen);
			}
	}
add_action( 'add_meta_boxes', 'meta_boxes_product_slider' );


function meta_boxes_product_slider_input( $post ) {
	
	global $post;
	wp_nonce_field( 'meta_boxes_product_slider_input', 'meta_boxes_product_slider_input_nonce' );
	
	
	$product_slider_meta_options = get_post_meta( $post->ID, 'product_slider_meta_options', true );
	

	if(!empty($product_slider_meta_options['post_types'])){
		$post_types = $product_slider_meta_options['post_types'];
		}
	else{
		$post_types = array('post');
		}	
	

	
	if(!empty($product_slider_meta_options['post_status'])){
		$post_status = $product_slider_meta_options['post_status'];
		}
	else{
		$post_status = array('publish');
		}	
	

	
	if(!empty($product_slider_meta_options['posts_per_page'])){
		$posts_per_page = $product_slider_meta_options['posts_per_page'];
		
		}
	else{
		$posts_per_page = 10;
		}
	

	
	
	if(!empty($product_slider_meta_options['query_order'])){
		$query_order = $product_slider_meta_options['query_order'];
		}
	else{
		$query_order = 'DESC';
		}	
	
	if(!empty($product_slider_meta_options['query_orderby'])){
		$query_orderby = $product_slider_meta_options['query_orderby'];
		}
	else{
		$query_orderby = array('date');
		}

	
	
	
	if(!empty($product_slider_meta_options['layout']['content'])){
		
		$layout_content = $product_slider_meta_options['layout']['content'];	
		}
	else{
		$layout_content = 'flat';	
		}
	
	
	if(!empty($product_slider_meta_options['layout']['hover']))
	$layout_hover = $product_slider_meta_options['layout']['hover'];		
	
	
	if(!empty($product_slider_meta_options['skin'])){
		$skin = $product_slider_meta_options['skin'];
		}
	else{
		$skin = 'flat';
		}
		
	
	if(!empty($product_slider_meta_options['custom_js'])){
		$custom_js = $product_slider_meta_options['custom_js'];
		}
	else{
		$custom_js = '/*Write your js code here*/';
		}
		
	
	if(!empty($product_slider_meta_options['custom_css'])){
		$custom_css = $product_slider_meta_options['custom_css'];
		}
	else{
		$custom_css = '/*Write your CSS code here*/';
		}
	
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
		$items_in_tablet = '2';
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
		$items_fixed_height = '180px';
		
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
		$featured_img_size = 'medium';
		
		}				
			
			
			
			
			
			
	if(!empty($product_slider_meta_options['margin'])){
		
		$items_margin = $product_slider_meta_options['margin'];
		}
	else{
		$items_margin = '10px';
		
		}
		
	if(!empty($product_slider_meta_options['container']['padding'])){
		
		$container_padding = $product_slider_meta_options['container']['padding'];
		}
	else{
		$container_padding = '10px';
		
		}	
		
	if(!empty($product_slider_meta_options['container']['bg_color'])){
		
		$container_bg_color = $product_slider_meta_options['container']['bg_color'];
		}
	else{
		$container_bg_color = '#fff';
		
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
		$pagination_theme = 'round';
		
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
	
	if(!empty($product_slider_meta_options['slider_options']['pagination_bullet_bg'])){
		$pagination_bullet_bg = $product_slider_meta_options['slider_options']['pagination_bullet_bg'];
	}
	else{
		$pagination_bullet_bg = '#35a2ff';
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
	
	if(!empty($product_slider_meta_options['slider_options']['singleItem'])){
		$singleItem = $product_slider_meta_options['slider_options']['singleItem'];
	}
	else{
		$singleItem = 'true';
	}	
	
	
	if(!empty($product_slider_meta_options['slider_options']['transitionStyle'])){
		$transitionStyle = $product_slider_meta_options['slider_options']['transitionStyle'];
	}
	else{
		$transitionStyle = 'fade';
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
	
	
		
?>

    <div class="para-settings product-slider-metabox">
	
        <ul class="tab-nav"> 
            <li nav="1" class="nav1 active"><i class="fa fa-code"></i> <?php _e('Shortcodes','product_slider'); ?></li>
            <li nav="2" class="nav2"><i class="fa fa-cubes"></i> <?php _e('Query Post','product_slider'); ?></li>
            <li nav="3" class="nav3"><i class="fa fa-object-group"></i> <?php _e('Layout','product_slider'); ?></li>
            <li nav="4" class="nav3"><i class="fa fa-magic"></i> <?php _e('Layout settings','product_slider'); ?></li>            
            <li nav="5" class="nav4"><i class="fa fa-sliders"></i> <?php _e('Naviagtions','product_slider'); ?></li>            
            <li nav="6" class="nav6"><i class="fa fa-css3"></i> <?php _e('Custom Scripts','product_slider'); ?></li>           
            <li nav="7" class="nav7"><i class="fa fa-sliders"></i> <?php _e('Slider Options','product_slider'); ?></li>           
            
                     
                       
        </ul> <!-- tab-nav end -->
        
		<ul class="box">
            <li style="display: block;" class="box1 tab-box active">
                <div class="option-box">
                    <p class="option-title"><?php _e('Shortcode','product_slider'); ?></p>
                    <p class="option-info"><?php _e('Copy this shortcode and paste on page or post where you want to display Product Slider. <br />Use PHP code to your themes file to display Product Slider.','product_slider'); ?></p>
                    <textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" >[product_slider <?php echo 'id="'.$post->ID.'"';?>]</textarea>
                <br /><br />
                PHP Code:<br />
                <textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[product_slider id='; echo "'".$post->ID."']"; echo '"); ?>'; ?></textarea>  
                </div>
               
            </li>
            <li style="display: none;" class="box2 tab-box ">
                <div class="option-box">
                    <p class="option-title"><?php _e('Post Types','product_slider'); ?></p>
                    <p class="option-info"><?php _e('Select post types you want to query post , can be select multiple. <br />Hint: Ctrl + click to select mulitple','product_slider'); ?></p>
                    <?php
					echo product_slider_posttypes($post_types);
					?>

                </div>
                
 
                        
                <div class="option-box">
                    <p class="option-title"><?php _e('Post Status','product_slider'); ?></p>
                    <p class="option-info"><?php _e('Display post from following post status, <br />Hint: Ctrl + click to select mulitple','product_slider'); ?></p>
                    
                    <select class="post_status" name="product_slider_meta_options[post_status][]" multiple >
                        <option value="publish" <?php if(in_array("publish",$post_status)) echo "selected"; ?>>Publish</option>
                        <option value="pending" <?php if(in_array("pending",$post_status)) echo "selected"; ?>>Pending</option>
                        <option value="draft" <?php if(in_array("draft",$post_status)) echo "selected"; ?>>Draft</option>
                        <option value="auto-draft" <?php if(in_array("auto-draft",$post_status)) echo "selected"; ?>>Auto draft</option>
                        <option value="future" <?php if(in_array("future",$post_status)) echo "selected"; ?>>Future</option>
                        <option value="private" <?php if(in_array("private",$post_status)) echo "selected"; ?>>Private</option>                    
                        <option value="inherit" <?php if(in_array("inherit",$post_status)) echo "selected"; ?>>Inherit</option>                    
                        <option value="trash" <?php if(in_array("trash",$post_status)) echo "selected"; ?>>Trash</option>
                        <option value="any" <?php if(in_array("any",$post_status)) echo "selected"; ?>>Any</option>                                          
                    </select> 
                    
                </div>                         
                        
                <div class="option-box">
                    <p class="option-title"><?php _e('Max number post on lsider.','product_slider'); ?></p>
                    <p class="option-info"><?php _e('Number of post each pagination. -1 to display all. default is 10 if you left empty.','product_slider'); ?></p>
                    <input type="text" placeholder="3" name="product_slider_meta_options[posts_per_page]" value="<?php if(!empty($posts_per_page)) echo $posts_per_page; else echo ''; ?>" />
                </div>                        
                        
    
                
                <div class="option-box">
                    <p class="option-title"><?php _e('Post query order','product_slider'); ?></p>
                    <p class="option-info"><?php _e('Query order ascending or descending','product_slider'); ?></p>
                    
                    <select class="query_order" name="product_slider_meta_options[query_order]" >
                    <option value="ASC" <?php if($query_order=="ASC") echo "selected"; ?>>Ascending</option>
                    <option value="DESC" <?php if($query_order=="DESC") echo "selected"; ?>>Descending</option>
                    </select>
                    
                </div>
                
                
                <div class="option-box">
                    <p class="option-title"><?php _e('Post query orderby','product_slider'); ?></p>
                    <p class="option-info"><?php _e('Query orderby parameter, can select multiple','product_slider'); ?></p>
                    
                        <select class="query_orderby" name="product_slider_meta_options[query_orderby][]"  multiple>
                        <option value="ID" <?php if(in_array("ID",$query_orderby)) echo "selected"; ?>>ID</option>
                        <option value="date" <?php if(in_array("date",$query_orderby)) echo "selected"; ?>>Date</option>
                        <option value="rand" <?php if(in_array("rand",$query_orderby)) echo "selected"; ?>>Rand</option>                    
                        <option value="comment_count" <?php if(in_array("comment_count",$query_orderby)) echo "selected"; ?>>Comment Count</option>
                        <option value="author" <?php if(in_array("author",$query_orderby)) echo "selected"; ?>>Author</option>               
                        <option value="title" <?php if(in_array("title",$query_orderby)) echo "selected"; ?>>Title</option>
                        <option value="name" <?php if(in_array("name",$query_orderby)) echo "selected"; ?>>Name</option>                    
                        <option value="type" <?php if(in_array("type",$query_orderby)) echo "selected"; ?>>Type</option>
                        </select>
                        <br />
                        
                        
                        <input type="hidden" placeholder="meta_key" name="product_slider_meta_options[query_orderby_meta_key]" id="query_orderby_meta_key" value="<?php if(!empty($query_orderby_meta_key)) echo $query_orderby_meta_key; ?>" />
                    
                </div>                 
                
                
                
                                
                
            </li>
            <li style="display: none;" class="box3 tab-box ">
            
            
            
                <div class="option-box">
                    <p class="option-title"><?php _e('Layout','product_slider'); ?></p>
                    <p class="option-info"><?php _e('Choose your layout','product_slider'); ?></p>
                    
                    <?php
                    $class_product_slider_functions = new class_product_slider_functions();
					?>

                    <div class="layout-list">
                    <div class="idle  ">
                    <div class="name">Content
                    
                    <select class="select-layout-content" name="product_slider_meta_options[layout][content]" >
                    <?php
					
					$layout_content_list = $class_product_slider_functions->layout_content_list();
                    foreach($layout_content_list as $layout_key=>$layout_info){
						?>
                        <option <?php if($layout_content==$layout_key) echo 'selected'; ?>  value="<?php echo $layout_key; ?>"><?php echo $layout_key; ?></option>
                        <?php
						
						}
					?>
                    </select>
                    <a target="_blank" class="edit-layout" href="<?php echo admin_url().'edit.php?post_type=product_slider&page=product_slider_layout_editor&layout_content='.$layout_content;?>" >Edit</a>
                    </div>     
                    
                    <script>
						jQuery(document).ready(function($)
							{
								$(document).on('change', '.select-layout-content', function()
									{
						
										
										var layout = $(this).val();		
										
										$('.edit-layout').attr('href', '<?php echo admin_url().'edit.php?post_type=product_slider&page=product_slider_layout_editor&layout_content='; ?>'+layout);
										})
								
							})
					</script>
                    
                    
                    
                    
                    
                    
                    
                    <?php
					
					if(empty($layout_content)){
						$layout_content = 'flat-left';
						}
					
                    
					?>
                    
                                   
                    <div class="layer-content">
                    <div class="<?php echo $layout_content; ?>">
                    <?php
					$product_slider_layout_content = get_option( 'product_slider_layout_content' );
					
					if(empty($product_slider_layout_content)){
						$layout = $class_product_slider_functions->layout_content($layout_content);
						}
					else{
						$layout = $product_slider_layout_content[$layout_content];
						
						}
					
                  //  $layout = $class_product_slider_functions->layout_content($layout_content);
					
					//var_dump($layout);
					
					foreach($layout as $item_key=>$item_info){
						
						$item_key = $item_info['key'];
						
						
						
						?>
                        

							<div class="item <?php echo $item_key; ?>" style=" <?php echo $item_info['css']; ?> ">
							
                            <?php
                            
							if($item_key=='thumb'){
								
								?>
                                <img style="width:100%; height:auto;" src="<?php echo product_slider_plugin_url; ?>assets/admin/images/thumb.png" />
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
								
								
								
							else{
								
								echo $item_info['name'];
								
								}
							
							?>
                            
                            
                            
                            </div>
							<?php
						}
					
					
					?>
                    </div>
                    </div>
                    </div>
                    <div class="hover">
                    <div class="name">
                    
                    <select class="select-layout-hover" name="product_slider_meta_options[layout][hover]" >
                    <?php
					
					$layout_hover_list = $class_product_slider_functions->layout_hover_list();
                    foreach($layout_hover_list as $layout_key=>$layout_info){
						?>
                        <option  value="<?php echo $layout_key; ?>"><?php echo $layout_key; ?></option>
                        <?php
						
						}
					?>
                    </select>
                    
                    Hover</div>
                    <div class="layer-hover">
                    <div class="title">Hello Title</div>
                    <div class="content">There are many variations of passages of Lorem Ipsum available, but the majority have.</div> 
                    </div>
 
                    
                    </div>                    
                    </div>

                </div> 
            
            
            
                <div class="option-box">
                    <p class="option-title"><?php _e('Skins','product_slider'); ?></p>
                    <p class="option-info"><?php _e('Select grid Skins','product_slider'); ?></p>
                    
                    <?php
                    
					
					$skins = $class_product_slider_functions->skins();
					
					
					?>
                    
                    <div class="skin-list">
                    
                    <?php 
					//var_dump($skin);
					foreach($skins as $skin_slug=>$skin_info){
						
						?>
                        <div class="skin-container">
                        
                        
                        <?php
                        
						if($skin==$skin_slug){
							
							$checked = 'checked';
							$selected_skin = 'selected';							
							}
						else{
							$checked = '';
							$selected_skin = '';	
							}
						
						?>
                        <div class="checked <?php echo $selected_skin; ?>">
                        
                        <label><input <?php echo $checked; ?> type="radio" name="product_slider_meta_options[skin]" value="<?php echo $skin_slug; ?>" ><?php echo $skin_info['name']; ?></label>

                        
                        </div>
                        
                        
                        <div class="skin <?php echo $skin_slug; ?>">
                        
                        
                        <?php
                        
						include product_slider_plugin_dir.'skins/'.$skin_slug.'/index.php';
						
						?>
                        </div>
                        </div>
                        <?php
						
						}
					
					?>
                    
                    
                    
                    </div>
                    
                    
                </div>
                 
            </li>
            <li style="display: none;" class="box4 tab-box ">
            
                <div class="option-box">
                    <p class="option-title"><?php _e('Max number of column on slider','product_slider'); ?></p>
                    <p class="option-info"><?php _e('Slider column number for different device','product_slider'); ?></p>
					
                    
                    
                    <div class="">
                    Desktop:<br>
                    <input type="text" placeholder="3" name="product_slider_meta_options[item][desktop]" value="<?php echo $items_in_desktop; ?>" />
                  	</div>                      
                    <br>
                    <div class="">
                    Tablet:<br>
                    <input type="text" placeholder="2" name="product_slider_meta_options[item][tablet]" value="<?php echo $items_in_tablet; ?>" />
                  	</div>                   
                    <br>
                    <div class="">
                    Mobile:<br>
                    <input type="text" placeholder="1" name="product_slider_meta_options[item][mobile]" value="<?php echo $items_in_mobile; ?>" />
                  	</div>

                </div>
                
                
                <div class="option-box">
                    <p class="option-title"><?php _e('Media Height','product_slider'); ?></p>
                    <p class="option-info"><?php _e('Grid item media height','product_slider'); ?></p>
					
                    <label><input <?php if($items_height_style=='auto_height') echo 'checked'; ?> type="radio" name="product_slider_meta_options[height][style]" value="auto_height" />Auto height</label><br />
                    <label><input <?php if($items_height_style=='fixed_height') echo 'checked'; ?> type="radio" name="product_slider_meta_options[height][style]" value="fixed_height" />Fixed height</label><br />                 
                    
                    <div class="">

                    <input type="text" name="product_slider_meta_options[height][fixed_height]" value="<?php echo $items_fixed_height; ?>" />
                  	</div>                      

                </div>                
                
                
                <div class="option-box">

                    <p class="option-title"><?php _e('Featured Image size','product_slider'); ?></p>
                    <select name="product_slider_meta_options[featured_img_size]" >
                    <option value="full" <?php if($featured_img_size=="full")echo "selected"; ?>><?php _e('Full','product_slider'); ?></option>
                    <option value="thumbnail" <?php if($featured_img_size=="thumbnail")echo "selected"; ?>><?php _e('Thumbnail','product_slider'); ?></option>
                    <option value="medium" <?php if($featured_img_size=="medium")echo "selected"; ?>><?php _e('Medium','product_slider'); ?></option>
                    <option value="large" <?php if($featured_img_size=="large")echo "selected"; ?>><?php _e('Large','product_slider'); ?></option>       
                       
                    </select>
                    
                    
                    <p class="option-title"><?php _e('Media source','product_slider'); ?></p>
                    <p class="option-info"><?php _e('Grid item media source','product_slider'); ?></p>
                	<?php
                    if(empty($media_source)){
						
						$media_source = $class_product_slider_functions->media_source();
						}
					
					
					?>
                
                
                
                
                    
                    <div class="media-source-list expandable">
                    	
                        <?php
                        foreach($media_source as $source_key=>$source_info){
							?>
							<div class="items">
                                <div class="header">
                                <input type="hidden" name="product_slider_meta_options[media_source][<?php echo $source_info['id']; ?>][id]" value="<?php echo $source_info['id']; ?>" />
                                <input type="hidden" name="product_slider_meta_options[media_source][<?php echo $source_info['id']; ?>][title]" value="<?php echo $source_info['title']; ?>" />
                                
                                <input <?php if(!empty($source_info['checked'])) echo 'checked'; ?> type="checkbox" name="product_slider_meta_options[media_source][<?php echo $source_info['id']; ?>][checked]" value="<?php echo $source_info['checked']; ?>" />                                
                                                           
                                
                                <?php echo $source_info['title']; ?>
                                </div>
                            </div>
	
							<?php
							
							
							}
						
						?>
                        
                        
                                           
                        
                        
                    
                  	</div>                      

<script>
jQuery(document).ready(function($)
	{
		$( ".media-source-list" ).sortable({revert: "invalid"});

	})
</script>

                </div>                 
                
                
                
                
                
                
                <div class="option-box">
                    <p class="option-title"><?php _e('Grid Items Margin','product_slider'); ?></p>
                    <p class="option-info"><?php _e('Grid item margin','product_slider'); ?></p>
                    
                    <div class="">
                    <input type="text" name="product_slider_meta_options[margin]" value="<?php echo $items_margin; ?>" />
                  	</div>                      

                </div>
                
                
                <div class="option-box">
                    <p class="option-title"><?php _e('Grid Container options','product_slider'); ?></p>
                    <p class="option-info"><?php _e('Grid container ','product_slider'); ?></p>
                    
                    <div class="">
                    Padding: <br>
                    <input type="text" name="product_slider_meta_options[container][padding]" value="<?php echo $container_padding; ?>" />
                  	</div>
                     <br>
                    <div class="">
                    Background color: <br>
                    <input type="text" class="color" name="product_slider_meta_options[container][bg_color]" value="<?php echo $container_bg_color; ?>" />
                  	</div>
                    <br>
                    <div class="">
                    Background image: <br>
                    <img class="bg_image_src" onClick="bg_img_src(this)" src="<?php echo product_slider_plugin_url; ?>assets/admin/bg/dark_embroidery.png" />
                    <img class="bg_image_src" onClick="bg_img_src(this)" src="<?php echo product_slider_plugin_url; ?>assets/admin/bg/dimension.png" />
                    <img class="bg_image_src" onClick="bg_img_src(this)" src="<?php echo product_slider_plugin_url; ?>assets/admin/bg/eight_horns.png" />                     
                    
                    <br>
                    
                    <input type="text" id="container_bg_image" class="container_bg_image" name="product_slider_meta_options[container][bg_image]" value="<?php echo $container_bg_image; ?>" /> <div onClick="clear_container_bg_image()" class="button clear-container-bg-image"> Clear</div>
                    
                    <script>
					
					function bg_img_src(img){
						
						src =img.src;
						
						document.getElementById('container_bg_image').value  = src;
						
						}
					
					function clear_container_bg_image(){

						document.getElementById('container_bg_image').value  = '';
						
						}					
					
					
					</script>
                    
                    
                    
                    
                  	</div>                    
                    
                                                        

                </div>                           
            
            
            </li>
            <li style="display: none;" class="box5 tab-box ">
            
                <div class="option-box">
                    <p class="option-title"><?php _e('Navigation','product_slider'); ?></p>
                    <p class="option-info"><?php _e('Customize navigation layout.','product_slider'); ?></p>
                    
                    
                    <div class="grid-layout">
                    	<div class="grid-up">

                        
                        <label><input <?php if($navigation_position=='none') echo 'checked'; ?> type="radio" name="product_slider_meta_options[slider_options][navigation_position]" value="none" />Navigation (None)</label>                        
                        <label><input <?php if($navigation_position=='top-right') echo 'checked'; ?> type="radio" name="product_slider_meta_options[slider_options][navigation_position]" value="top-right" />Top right</label>
                        <label><input <?php if($navigation_position=='top-left') echo 'checked'; ?> type="radio" name="product_slider_meta_options[slider_options][navigation_position]" value="top-left" />Top left</label>
                        <label><input <?php if($navigation_position=='middle') echo 'checked'; ?> type="radio" name="product_slider_meta_options[slider_options][navigation_position]" value="middle" />Middle</label>  
                            
                            
                            
                        
                        </div>
                        <div class="grid-container">
                        <img src="<?php echo product_slider_plugin_url; ?>assets/admin/images/grid.png" />
                        </div>
                    	<div class="grid-bottom">

                            <label><input <?php if($slider_pagination=='true') echo 'checked'; ?> type="radio" name="product_slider_meta_options[slider_options][slider_pagination]" value="true" />Pagination</label>
                            <label><input <?php if($slider_pagination=='false') echo 'checked'; ?> type="radio" name="product_slider_meta_options[slider_options][slider_pagination]" value="false" />No</label> 
                            
                        </div> 
                        
                        
                    </div>

                    
                </div>
                
                
                <div class="option-box">
                    <p class="option-title"><?php _e('Navigation themes','product_slider'); ?></p>
                    <p class="option-info"><?php _e('Themes for Navigation','product_slider'); ?></p>
                      
                    <label><input <?php if($navigation_theme=='round') echo 'checked'; ?> type="radio" name="product_slider_meta_options[nav_bottom][navigation_theme]" value="round" />Round</label>
                    <label><input <?php if($navigation_theme=='round-border') echo 'checked'; ?> type="radio" name="product_slider_meta_options[nav_bottom][navigation_theme]" value="round-border" />Round border</label>
                    <label><input <?php if($navigation_theme=='semi-round') echo 'checked'; ?> type="radio" name="product_slider_meta_options[nav_bottom][navigation_theme]" value="semi-round" />Semi Round</label>
                    <label><input <?php if($navigation_theme=='square') echo 'checked'; ?> type="radio" name="product_slider_meta_options[nav_bottom][navigation_theme]" value="square" />Square</label>
                    <label><input <?php if($navigation_theme=='square-border') echo 'checked'; ?> type="radio" name="product_slider_meta_options[nav_bottom][navigation_theme]" value="square-border" />Square border</label>
                    <label><input <?php if($navigation_theme=='square-shadow') echo 'checked'; ?> type="radio" name="product_slider_meta_options[nav_bottom][navigation_theme]" value="square-shadow" />Square shadow</label>                    
                    
                    
                </div>                
                
			<div class="option-box">
                    <p class="option-title"><?php _e('Navigation background color','product_slider'); ?></p>
                    <p class="option-info"><?php _e('','product_slider'); ?></p>
                    <input type="text" class="color" name="product_slider_meta_options[slider_options][navigation_bg]" value="<?php echo $navigation_bg; ?>" />
                </div>
                
                <div class="option-box">
                    <p class="option-title"><?php _e('Pagination themes','product_slider'); ?></p>
                    <p class="option-info"><?php _e('Themes for pagination','product_slider'); ?></p>
                      
                    <label><input <?php if($pagination_theme=='round') echo 'checked'; ?> type="radio" name="product_slider_meta_options[nav_bottom][pagination_theme]" value="round" />Round</label>
                    <label><input <?php if($pagination_theme=='round-border') echo 'checked'; ?> type="radio" name="product_slider_meta_options[nav_bottom][pagination_theme]" value="round-border" />Round border</label>
                    <label><input <?php if($pagination_theme=='semi-round') echo 'checked'; ?> type="radio" name="product_slider_meta_options[nav_bottom][pagination_theme]" value="semi-round" />Semi Round</label>
                    <label><input <?php if($pagination_theme=='square') echo 'checked'; ?> type="radio" name="product_slider_meta_options[nav_bottom][pagination_theme]" value="square" />Square</label>
                    <label><input <?php if($pagination_theme=='square-border') echo 'checked'; ?> type="radio" name="product_slider_meta_options[nav_bottom][pagination_theme]" value="square-border" />Square border</label>
                </div>
                
				<div class="option-box">
                    <p class="option-title"><?php _e('Pagination bullet background color','product_slider'); ?></p>
                    <p class="option-info"><?php _e('','product_slider'); ?></p>
                    <input type="text" class="color" name="product_slider_meta_options[slider_options][pagination_bullet_bg]" value="<?php echo $pagination_bullet_bg; ?>" />
                </div>
            
            </li>
            
            <li style="display: none;" class="box6 tab-box ">
            
                <div class="option-box">
                    <p class="option-title"><?php _e('Custom Js','product_slider'); ?></p>
                    <p class="option-info"><?php _e('Add your custom js','product_slider'); ?></p>
                    
                    <textarea id="custom_js" name="product_slider_meta_options[custom_js]" ><?php echo $custom_js; ?></textarea>

                </div>
                
                
                <div class="option-box">
                    <p class="option-title"><?php _e('Custom CSS','product_slider'); ?></p>
                    <p class="option-info"><?php _e('Add your custom CSS','product_slider'); ?></p>
                    
                    <textarea id="custom_css" name="product_slider_meta_options[custom_css]" ><?php echo $custom_css; ?></textarea>
                    

                </div>  
 <script>
	
		var editor = CodeMirror.fromTextArea(document.getElementById("custom_js"), {
		  lineNumbers: true,
		  scrollbarStyle: "simple"
		});
		
		var editor = CodeMirror.fromTextArea(document.getElementById("custom_css"), {
		  lineNumbers: true,
		  scrollbarStyle: "simple"
		});		
		


    </script>				
            
            </li>
            
			
			<li style="display: none;" class="box7 tab-box ">
			
            
				<div class="option-box">
                    <p class="option-title"><?php _e('Slider enable','product_slider'); ?></p>
                    <p class="option-info"><?php _e('','product_slider'); ?></p>
					<label><input <?php if($slider_enable=='true') echo 'checked'; ?> type="radio" name="product_slider_meta_options[slider_options][slider_enable]" value="true" />Yes</label>
                    <label><input <?php if($slider_enable=='false') echo 'checked'; ?> type="radio" name="product_slider_meta_options[slider_options][slider_enable]" value="false" />No</label> 
                </div>            
            
				<div class="option-box">
                    <p class="option-title"><?php _e('Autoplay','product_slider'); ?></p>
                    <p class="option-info"><?php _e('','product_slider'); ?></p>
					<label><input <?php if($slider_autoplay=='true') echo 'checked'; ?> type="radio" name="product_slider_meta_options[slider_options][slider_autoplay]" value="true" />Yes</label>
                    <label><input <?php if($slider_autoplay=='false') echo 'checked'; ?> type="radio" name="product_slider_meta_options[slider_options][slider_autoplay]" value="false" />No</label> 
                </div> 
            
            
                <div class="option-box">
                    <p class="option-title"><?php _e('Show Navigation','product_slider'); ?></p>
                    <p class="option-info"><?php _e('','product_slider'); ?></p>
					<label><input <?php if($slider_navigation=='true') echo 'checked'; ?> type="radio" name="product_slider_meta_options[slider_options][slider_navigation]" value="true" />Yes</label>
                    <label><input <?php if($slider_navigation=='false') echo 'checked'; ?> type="radio" name="product_slider_meta_options[slider_options][slider_navigation]" value="false" />No</label> 
                </div>

				<div class="option-box">
                    <p class="option-title"><?php _e('Stop on Hover','product_slider'); ?></p>
                    <p class="option-info"><?php _e('','product_slider'); ?></p>
					<label><input <?php if($hover_stop=='true') echo 'checked'; ?> type="radio" name="product_slider_meta_options[slider_options][hover_stop]" value="true" />Yes</label>
                    <label><input <?php if($hover_stop=='false') echo 'checked'; ?> type="radio" name="product_slider_meta_options[slider_options][hover_stop]" value="false" />No</label> 
                </div>
                
               

                
				<div class="option-box">
                    <p class="option-title"><?php _e('Slide speed','product_slider'); ?></p>
                    <p class="option-info"><?php _e('','product_slider'); ?></p>
                    <input type="text" name="product_slider_meta_options[slider_options][slideSpeed]" value="<?php echo $slideSpeed; ?>" />
                </div>
                
				<div class="option-box">
                    <p class="option-title"><?php _e('Pagination speed','product_slider'); ?></p>
                    <p class="option-info"><?php _e('','product_slider'); ?></p>
                    <input type="text" name="product_slider_meta_options[slider_options][paginationSpeed]" value="<?php echo $paginationSpeed; ?>" />
                </div>                                 
                
                  
                
                
				<div class="option-box">
                    <p class="option-title"><?php _e('Rewind speed','product_slider'); ?></p>
                    <p class="option-info"><?php _e('','product_slider'); ?></p>
                    <input type="text" name="product_slider_meta_options[slider_options][rewindSpeed]" value="<?php echo $rewindSpeed; ?>" />
                </div>                 
                
                
                
				<div class="option-box">
                    <p class="option-title"><?php _e('LazyLoad','product_slider'); ?></p>
                    <p class="option-info"><?php _e('','product_slider'); ?></p>
					<label><input <?php if($lazyLoad =='true') echo 'checked'; ?> type="radio" name="product_slider_meta_options[slider_options][lazyLoad]" value="true" />Yes</label>
                    <label><input <?php if($lazyLoad =='false') echo 'checked'; ?> type="radio" name="product_slider_meta_options[slider_options][lazyLoad]" value="false" />No</label> 
                </div>                  
                
				<div class="option-box">
                    <p class="option-title"><?php _e('Display pagination numbers','product_slider'); ?></p>
                    <p class="option-info"><?php _e('','product_slider'); ?></p>
					<label><input <?php if($paginationNumbers=='true') echo 'checked'; ?> type="radio" name="product_slider_meta_options[slider_options][paginationNumbers]" value="true" />Yes</label>
                    <label><input <?php if($paginationNumbers=='false') echo 'checked'; ?> type="radio" name="product_slider_meta_options[slider_options][paginationNumbers]" value="false" />No</label> 
                </div>                
                
                
				<div class="option-box">
                    <p class="option-title"><?php _e('Touch drag enable','product_slider'); ?></p>
                    <p class="option-info"><?php _e('','product_slider'); ?></p>
					<label><input <?php if($touchDrag=='true') echo 'checked'; ?> type="radio" name="product_slider_meta_options[slider_options][touchDrag]" value="true" />Yes</label>
                    <label><input <?php if($touchDrag=='false') echo 'checked'; ?> type="radio" name="product_slider_meta_options[slider_options][touchDrag]" value="false" />No</label> 
                </div>    
                
                
                
				<div class="option-box">
                    <p class="option-title"><?php _e('Mouse drag enable','product_slider'); ?></p>
                    <p class="option-info"><?php _e('','product_slider'); ?></p>
					<label><input <?php if($mouseDrag=='true') echo 'checked'; ?> type="radio" name="product_slider_meta_options[slider_options][mouseDrag]" value="true" />Yes</label>
                    <label><input <?php if($mouseDrag=='false') echo 'checked'; ?> type="radio" name="product_slider_meta_options[slider_options][mouseDrag]" value="false" />No</label> 
                </div>                  
                            
                
				
            </li>
        </ul>
    </div>
    
<?php	
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function meta_boxes_product_slider_save( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['meta_boxes_product_slider_input_nonce'] ) )
    return $post_id;

  $nonce = $_POST['meta_boxes_product_slider_input_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'meta_boxes_product_slider_input' ) )
      return $post_id;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
		return $post_id;



	/* OK, its safe for us to save the data now. */
	
	// Sanitize user input.
	$product_slider_meta_options = stripslashes_deep( $_POST['product_slider_meta_options'] );
	update_post_meta( $post_id, 'product_slider_meta_options', $product_slider_meta_options );	
	
		
}
add_action( 'save_post', 'meta_boxes_product_slider_save' );






?>