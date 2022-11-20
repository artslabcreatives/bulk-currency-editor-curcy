<?php

/*
|--------------------------------------------------------------------------
| Plugin activation
|--------------------------------------------------------------------------
|
| This file is included when the plugin is activated the first time.
| Usually you will use this file to register your custom post types or
| to perform some db delta process.
|
*/


if (!function_exists('bulk_currency_editor_curcy_activation')) {

	function bulk_currency_editor_curcy_activation(){
		if(!class_exists('woocommerce')){
			deactivate_plugins(plugin_basename(__FILE__));
			wp_die(__('Please install and activate WooCommerce first. Click the Back button in your browser to continue.'));
		}
		if(!class_exists('WOOMULTI_CURRENCY_F')){
			deactivate_plugins(plugin_basename(__FILE__));
			wp_die(__('Please install and activate CURCY - Multi Currency for WooCommerce as well. Click the Back button in your browser to continue.'));
		}
	}

	bulk_currency_editor_curcy_activation();
}