jQuery(document).ready(function($)
	{




		$(document).on('click', '.reset-content-layouts', function()
			{
				
				if(confirm("Do you really want to reset ?" )){
					
					jQuery.ajax(
						{
					type: 'POST',
					context: this,
					url: product_slider_ajax.product_slider_ajaxurl,
					data: {"action": "product_slider_reset_content_layouts",},
					success: function(data)
							{	
								$(this).html('Reset Done!');
															
								
							}
						});
					
					}
				
				

				
			})




		$(document).on('change', '.select-layout-hover', function()
			{

				var layout = $(this).val();		
				
				jQuery.ajax(
					{
				type: 'POST',
				url: product_slider_ajax.product_slider_ajaxurl,
				data: {"action": "product_slider_layout_hover_ajax","layout":layout},
				success: function(data)
						{	
							jQuery(".layer-hover").html(data);
														
							
						}
					});
				
			})	

		$(document).on('change', '.select-layout-content', function()
			{
				var layout = $(this).val();		
			
				
				jQuery.ajax(
					{
				type: 'POST',
				url: product_slider_ajax.product_slider_ajaxurl,
				data: {"action": "product_slider_layout_content_ajax","layout":layout},
				success: function(data)
						{	
							//jQuery(".layout-content").html(data);
							jQuery(".layer-content").html(data);
						}
					});
				
			})	

		

		
		
		
		
		
		$(document).on('click', '.post_types', function()
			{
				
				var post_types = $(this).val();
				var post_id = $(this).attr('post_id');	
		
				
				jQuery.ajax(
					{
				type: 'POST',
				url: product_slider_ajax.product_slider_ajaxurl,
				data: {"action": "product_slider_get_categories","post_types":post_types,"post_id":post_id},
				success: function(data)
						{	

							jQuery(".categories-container").html(data);
							
						}
					});
				
			})
		
		
		$(document).on('click', '.categories', function()
			{
				
				var categories = $(this).val();
				
				
				
				jQuery.ajax(
					{
				type: 'POST',
				url: product_slider_ajax.product_slider_ajaxurl,
				data: {"action": "product_slider_active_filter","categories":categories},
				success: function(data)
						{	

							jQuery(".active-filter-container").html(data);
							
						}
					});
				
			})		
	
		
		
		
		
		$(".product_slider_taxonomy").click(function()
			{
				


				var taxonomy = jQuery(this).val();
				
				jQuery(".product_slider_loading_taxonomy_category").css('display','block');

						jQuery.ajax(
							{
						type: 'POST',
						url: product_slider_ajax.product_slider_ajaxurl,
						data: {"action": "product_slider_get_taxonomy_category","taxonomy":taxonomy},
						success: function(data)
								{	
									jQuery(".product_slider_taxonomy_category").html(data);
									jQuery(".product_slider_loading_taxonomy_category").fadeOut('slow');
								}
							});

		
			})
		



	});	







