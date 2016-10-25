<?php

/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access

class class_product_slider_settings{

	public function __construct(){
		
		add_action('admin_menu', array( $this, 'product_slider_menu_init' ));
		
		}


	public function product_slider_menu_license(){
		include('menu/license.php');	
	}
	
	public function product_slider_menu_settings(){
		include('menu/settings.php');	
	}
	
	public function product_slider_layout_editor(){
		include('menu/layout-editor.php');	
	}	
	
	
	
	public function product_slider_menu_init() {
		
		add_submenu_page('edit.php?post_type=product_slider', __('Layout Editor','product_slider'), __('Layout Editor','product_slider'), 'manage_options', 'product_slider_layout_editor', array( $this, 'product_slider_layout_editor' ));
		
		add_submenu_page('edit.php?post_type=product_slider', __('Settings','product_slider'), __('Settings','product_slider'), 'manage_options', 'product_slider_menu_settings', array( $this, 'product_slider_menu_settings' ));	
		
		
		
		
		add_submenu_page('edit.php?post_type=product_slider', __('License','product_slider'), __('License','product_slider'), 'manage_options', 'product_slider_menu_license', array( $this, 'product_slider_menu_license' ));	
		
			
	
	}



	
	
	}
	
new class_product_slider_settings();