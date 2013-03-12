<?php

class Application_Controller extends Base_Controller {

	public $restful = true;

	public static function get_product($product, $id){

		return View::make('application.product')
			->with('product', $product)
			->with('id', $id);
	}

}

?>