<?php

namespace BulkCurrencyEditorCURCY\Http\Controllers;

if (! defined('ABSPATH')) {
		exit;
}

use BulkCurrencyEditorCURCY\Http\Controllers\Controller;
use BulkCurrencyEditorCURCY\WPBones\Database\DB;
use Illuminate\Support\Collection;

class ProductEditor extends Controller
{
	/**
	 * This function will show the main page for the plugin and it contains the regular price settings, how to and submission form
	 * */
	public function index()
	{
		// GET
		//Gets all options from woo commerce multi plugin
		$currencyOptions = get_option("woo_multi_currency_params");
		//Gets all the enabled currencies from woo commerce multi plugin
		$currencies = $currencyOptions['currency'];
		//Gets the default currency from woo commerce multi plugin
		$defaultCurrency = $currencyOptions['currency_default'];

		//Removes the primary currency from the currencies, the woocommerece bulk editor can handle the primary currency
		//This will array search the value instead of the key and then delete that index
		if (($curKey = array_search($defaultCurrency, $currencies)) !== false) {
			unset($currencies[$curKey]);
		}

		/*
		This will query posts that contain woocommerce products, filtered by post type and post status
		Only published product posts will be queries and only ID and Post Title will be returned as an Object Array
		*/
		$productraws = DB::table("posts")
					->select('ID as ID', 'post_title as title')
					->where([
						['post_type', 'product'],
						['post_status', 'publish']
					])
					->orWhere([
						['post_type', 'product_variation']
					])->get();

		//Empty collection used for prepare products to be display on the admin front end
		$products = collect();

		//Loops through the products returned by the db query (posts query)
		foreach ($productraws as $key => $product) {
			
			$_regular_price_wmcp = get_post_meta($product->ID, '_regular_price_wmcp', true);
			$categories = collect(get_the_terms($product->ID, 'product_cat'));

			$item = collect([
				'ID' => $product->ID,
				'title' => $product->title,
				'categories' => collect($categories->pluck('name'))->join(', '),
				'post_id' => $product->ID,
				'meta_value' => json_decode($_regular_price_wmcp),
			]);

			$products->put($product->ID, $item);
		};

		$data = array(
			'products' => $products, 
			'currencies' => $currencies
		);

		//Data is passed to the view along with the required libraries and css
		return BulkCurrencyEditorCURCY()->view('dashboard.index')
		->with($data)
		->withAdminStyles('jquery.dataTables.min')
		->withAdminStyles('bootstrap')
		->withAdminStyles('datatable.theme')
		->withAdminScripts('jquery.dataTables.min')
		->withAdminScripts('datatable.prep');
	}

	public function store()
	{
		// POST
		//Gets all options from woo commerce multi plugin
		$currencyOptions = get_option("woo_multi_currency_params");
		//Gets all the enabled currencies from woo commerce multi plugin
		$currencies = $currencyOptions['currency'];
		//Gets the default currency from woo commerce multi plugin
		$defaultCurrency = $currencyOptions['currency_default'];

		//Removes the primary currency from the currencies, the woocommerece bulk editor can handle the primary currency
		//This will array search the value instead of the key and then delete that index
		if (($curKey = array_search($defaultCurrency, $currencies)) !== false) {
			unset($currencies[$curKey]);
		}

		//A list of selected products as an input array
		$selected_products = collect($_REQUEST['selected_products']);
		//A list of new currency values from the input fields
		$bulk = collect($_REQUEST['bulk']);
		$bulk = $bulk->toArray();
		
		//check if the it is not empty or null
		if($selected_products != null && !empty($selected_products)){
			//counts how many successful updates occured
			$resp = 0;
			//loop through all the product ids sent by the checkbox
			foreach ($selected_products as $post_id) {
				//Get existing post meta regular pricing
				$existingPrices = get_post_meta($post_id, '_regular_price_wmcp', true);
				//Decode the post meta regular pricing json values as an array
				$existingPrices = json_decode($existingPrices, JSON_OBJECT_AS_ARRAY);
				//an empty array to store the new updated values
				$updatedPrices = array();

				foreach ($currencies as $key => $curre) {
					//Adding updated currency item to new array
					$updatedPrices[$curre] = $bulk[$curre];
				}
				//Reencoding existing prices in JSON
				$existingPricesJSON = json_encode($existingPrices);
				//Encoding existing prices in JSON
				$updatedPricesJSON = json_encode($updatedPrices);
				//Updating the regular pricing post meta with the newly updated values
				$resp += update_post_meta($post_id, '_regular_price_wmcp', $updatedPricesJSON);
			}
		}
		//back to main page
		$this->redirect('admin.php?page=bulk_currency_editor_curcy_slug_menu');
	}

	public function update()
	{
		// PUT AND PATCH
		//back to main page
		$this->redirect('admin.php?page=bulk_currency_editor_curcy_slug_menu');
	}

	public function destroy()
	{
		// DELETE
		//back to main page
		$this->redirect('admin.php?page=bulk_currency_editor_curcy_slug_menu');
	}

}