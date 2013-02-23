<?php

class Wines_Controller extends Base_Controller{

	public $restful = true;

	public function get_index(){

		$wines = Wine::all();

		return View::make('wines.index')
			->with('wines', $wines);
	}

	public function get_view($id){

		$wine = Wine::find($id);
		$comments = Wine::find($id)->comments()->get();

		return View::make('wines.view')
			->with('wine', $wine)
			->with('comments', $comments);
			
	}

	public function get_edit($id){

		return View::make('wines.edit')
			->with('wine', Wine::find($id));
	}

	public function get_create(){

		return View::make('wines.new');
	}

	public function post_addnew(){

		$validation = Wine::validate(Input::all());
		if($validation->fails()){
			return Redirect::to_route('wines_create')
				->with('error', "No se ha añadido un nuevo vino, intentalo otra vez")
				->with_errors($validation)
				->with_input();
		}

		if(!Input::has_file('image')){

			Wine::create(array(
			'name' => Input::get('name'),
			'description' => Input::get('description'),
			'category' => Input::get('category'),
			'rating' => Input::get('rating'),
			'price' => Input::get('price'),
			'picture' => 'placeholder.jpg'

		));

		} else {

			$picture = Input::file('image');

			Wine::create(array(
			'name' => Input::get('name'),
			'description' => Input::get('description'),
			'category' => Input::get('category'),
			'rating' => Input::get('rating'),
			'price' => Input::get('price'),
			'picture' => $picture['name']

			));

			Input::upload('image', 'public/img/wines', $picture['name']);

			// Creamos y guardamos el thumbnail
			require_once('public/functions/compress.php');

			thumbImage('public/img/wines/'.$picture['name'], 'public/img/wines/thumb/'.$picture['name']);

		}

		


		return Redirect::to_route('wines_index')->with('message', "Se añadío correctamente nuevo vino");
	}

	public function put_update(){

		$validation = Wine::validate(Input::all());
		if($validation->fails()){
			return Redirect::back()
				->with('error', "No se puede guardar el vino")
				->with_errors($validation)
				->with_input();
		}

		$id = Input::get('id');

		if(!Input::has_file('image')){

			Wine::update($id, array(
				'name' => Input::get('name'),
				'description' => Input::get('description'),
				'category' => Input::get('category'),
				'rating' => Input::get('rating'),
				'price' => Input::get('price')
			));
		} else {

			$picture = Input::file('image');

			Wine::update($id, array(
				'name' => Input::get('name'),
				'description' => Input::get('description'),
				'category' => Input::get('category'),
				'rating' => Input::get('rating'),
				'price' => Input::get('price'),
				'picture' => $picture['name']
			));

			Input::upload('image', 'public/img/wines', $picture['name']);

			// Creamos y guardamos el thumbnail
			require_once('public/functions/compress.php');

			thumbImage('public/img/wines/'.$picture['name'], 'public/img/wines/thumb/'.$picture['name']);

		}

		return Redirect::to_route('wine',$id)->with('message','Vino actualizado correctamente');


	}

	public function delete_destroy(){
		
		Wine::find(Input::get('id'))->delete();
		return Redirect::to_route('wines_index')->with('message', 'Se ha eliminado correctamente');

	}

}