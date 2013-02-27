<?php

class Like extends Eloquent 
{
	public static $table = "likes_table";

	public static $rules = array(
	'name' => 'required|min:3',
	'description' => 'required|min:5',
	'link' => 'required|min:5',
	'picture' => 'max:1000|image|mimes:jpg,png,gif');

	
	public static function validate($data){
		return Validator::make($data, static::$rules);
	}

	public function comments(){

		return $this->has_many('Comment');
	}
}