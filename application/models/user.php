<?php

class User extends Eloquent {

	public static $table = 'user_table';

	public static $rules = array(
		'username' => 'required|min:5',
		'password' => 'required|min:5',
		'type' => 'required|in:administrador,normal,limitado,excluido',
		'picture' => 'max:1000|image|mimes:jpg,png,gif');

	public static $rules_type = array(
		'type' => 'required|in:administrador,normal,limitado,excluido');

	
	public static function validate($data){
		return Validator::make($data, static::$rules);
	}

	public static function validate_type($data){
		return Validator::make($data, static::$rules_type);
	}
}

?>