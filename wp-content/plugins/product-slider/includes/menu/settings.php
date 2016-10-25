<?php	


/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access



if(empty($_POST['product_slider_hidden']))
	{
		$product_slider_options = get_option( 'product_slider_options' );


	}
else
	{	
		if($_POST['product_slider_hidden'] == 'Y') {
			//Form data sent
			
			if(empty($_POST['product_slider_options']))
				{
					$_POST['product_slider_options'] = array();
				}
			
			$product_slider_options = stripslashes_deep($_POST['product_slider_options']);
			update_option('product_slider_options', $product_slider_options);
		

			?>
			<div class="updated"><p><strong><?php _e('Changes Saved.', 'product_slider' ); ?></strong></p></div>
	
			<?php
			} 
	}
	
	

	
	
?>





<div class="wrap">

	<div id="icon-tools" class="icon32"><br></div><?php echo "<h2>".__(product_slider_plugin_name.' Settings', 'product_slider')."</h2>";?>
		<form  method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="product_slider_hidden" value="Y">
        <?php settings_fields( 'product_slider_plugin_options' );
				do_settings_sections( 'product_slider_plugin_options' );
			
		?>

    <div class="para-settings product_slider-settings">
    
        <ul class="tab-nav"> 
            <li nav="1" class="nav1 active">Options</li>        
            <li nav="2" class="nav1">Help & support</li>       
   
        </ul> <!-- tab-nav end --> 
		<ul class="box">

            <li style="display: block;" class="box1 tab-box active">
				<div class="option-box">
                    <p class="option-title"><?php _e('Reset Content Layouts','product_slider'); ?></p>
                    <p class="option-info">you can reset content layouts here, saved & customized layout will reset permanetly.</p>
                    
                    <div class="button reset-content-layouts">Reset Layouts</div>
                    
                    

                </div>
            </li>


            <li style="display: none;" class="box2 tab-box active">
				<div class="option-box">
                    <p class="option-title">Need Help ?</p>
                    <p class="option-info">Feel free to contact with any issue for this plugin, Ask any question via forum <a href="<?php echo product_slider_qa_url; ?>"><?php echo product_slider_qa_url; ?></a> <strong style="color:#139b50;">(free)</strong><br />

					<?php
                
                    if(product_slider_customer_type=="free")
                        {
                    
                            echo 'You are using <strong> '.product_slider_customer_type.' version  '.product_slider_version.'</strong> of <strong>'.product_slider_plugin_name.'</strong>, To get more feature you could try our premium version. ';
                            echo '<br /><a href="'.product_slider_pro_url.'">'.product_slider_pro_url.'</a>';
                            
                        }
                    else
                        {
                    
                            echo 'Thanks for using <strong> premium version  '.product_slider_version.'</strong> of <strong>'.product_slider_plugin_name.'</strong> ';	
                            
                            
                        }
                    
                     ?>       

                    
                    </p>

                </div>
                
				<div class="option-box">
                    <p class="option-title">Submit Reviews...</p>
                    <p class="option-info">We are working hard to build some awesome plugins for you and spend thousand hour for plugins. we wish your three(3) minute by submitting five star reviews at wordpress.org. if you have any issue please submit at forum.</p>
                	<img class="product_slider-pro-pricing" src="<?php echo product_slider_plugin_url."assets/admin/images/five-star.png";?>" /><br />
                    <a target="_blank" href="<?php echo product_slider_wp_reviews; ?>">
                		<?php echo product_slider_wp_reviews; ?>
               		</a>
                    
                    
                    
                </div>
				<div class="option-box">
                    <p class="option-title">Please Share</p>
                    <p class="option-info">If you like this plugin please share with your social share network.</p>
                    <?php
                    
						echo product_slider_share_plugin();
					?>
                </div>
                
				<div class="option-box">
                    <p class="option-title">Video Tutorial</p>
                    <p class="option-info">Please watch this video tutorial.</p>
                	<iframe width="640" height="480" src="<?php echo product_slider_tutorial_video_url; ?>" frameborder="0" allowfullscreen></iframe>
                </div>
                
                
                
                
            </li>            
        </ul>
    
    
		

        
    </div>




<!-- 

<p class="submit">
	<input class="button button-primary" type="submit" name="Submit" value="<?php _e('Save Changes','product_slider' ); ?>" />
</p>

-->


		</form>


</div>
