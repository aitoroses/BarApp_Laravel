<?php

class Users_Controller extends Base_Controller{

	public $restful = true;

	public static function get_index(){
		
		$users = User::all();

		return View::make('users.index')
			->with('users', $users);

	}

	public static function get_view($id){

		$user = User::find($id);

		return View::make('users.view')
			->with('user', $user);

	}

	public static function get_create(){

		return View::make('users.new');

	}

	public static function get_edit($id){


	}

	public static function post_addnew(){

		$validation = User::validate(Input::all());
		if($validation->fails()){
			return Redirect::to_route('users_create')
				->with('error', "No se ha añadido un nuevo usuario, intentalo otra vez")
				->with_errors($validation)
				->with_input();
		}

		if(!Input::has_file('image')){

			User::create(array(
			'username' => Input::get('username'),
			'password' => Hash::make(Input::get('password')),
			'type' => Input::get('type'),
			'picture' => 'placeholder.jpg'

		));

		} else {

			$picture = Input::file('image');

			User::create(array(
			'username' => Input::get('username'),
			'password' => Hash::make(Input::get('password')),
			'type' => Input::get('type'),
			'picture' => $picture['name']

			));

			Input::upload('image', 'public/img/users', $picture['name']);

			// Creamos y guardamos el thumbnail
			require_once('public/functions/compress.php');

			thumbImage('public/img/users/'.$picture['name'], 'public/img/users/thumb/'.$picture['name']);

		}

		return Redirect::to_route('users_index')->with('message', "Se añadío correctamente nuevo usuario");


	}

	public static function put_update(){

		$validation = User::validate_type(Input::all());
		if($validation->fails()){
			return Redirect::back()
				->with('error', "No se ha actualizado el usuario, intentalo otra vez")
				->with_errors($validation)
				->with_input();
		}

		$id = Input::get('id');


		if(!Input::has_file('image')){

			User::update($id, array(
			'type' => Input::get('type'),
		));

		} else {

			$picture = Input::file('image');

			User::update($id, array(
			'type' => Input::get('type'),
			'picture' => $picture['name']

			));

			Input::upload('image', 'public/img/users', $picture['name']);

			// Creamos y guardamos el thumbnail
			require_once('public/functions/compress.php');

			thumbImage('public/img/users/'.$picture['name'], 'public/img/users/thumb/'.$picture['name']);

		}

		return Redirect::to_route('users_index')->with('message', "Se actualizó correctamente el usuario");


	}

	public static function delete_destroy(){

		User::find(Input::get('id'))->delete();
		return Redirect::to_route('users_index')->with('message', 'Se ha eliminado correctamente');

	}

}