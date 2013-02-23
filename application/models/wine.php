<?php

class Wine extends Eloquent {

	public static $table = "wines_table";


	public static $rules = array(
		'name' => 'required|min:3',
		'description' => 'required|min:5',
		'category' => 'required|in:Cosecha,Crianza,Reserva,Gran Reserva',
		'rating' => 'required|in:Aceptable,Bueno,Muy bueno,Excelente',
		'price' => 'required|numeric',
		'picture' => 'max:1000|image|mimes:jpg,png,gif');

	
	public static function validate($data){
		return Validator::make($data, static::$rules);
	}

	public function comments(){

		return $this->has_many('Comment');

	}
	
}
?>