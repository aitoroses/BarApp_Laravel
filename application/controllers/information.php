<?php

class Information_Controller extends Base_Controller{
	
	public $restful = true;

	public function get_index(){

		return View::make('information.index')
			->with('information', Information::all())
			->with('title', 'Información del Bar Mô');
		
	}

	public function get_view($id){

		return View::make('information.view')
			->with('information', Information::find($id));


	}

	public function get_edit($id){

		return View::make('information.edit')
			->with('title', 'Editar información')
			->with('information', Information::find($id));
	}

	public function get_create(){

		return View::make('information.new')
			->with('title', 'nueva información')
			->with('description', 'Nueva descripción');
	}

	public function post_addnew(){

		Information::create(array(
			'title' => Input::get('title'),
			'description' => Input::get('description')
		));
		return Redirect::to_route('information')->with('message', "Se añadío correctamente nueva informacion");
	}

	public function put_update(){

		$id = Input::get('id');

		Information::update($id, array(
			'title' => Input::get('title'),
			'description' => Input::get('description')
		));

		return Redirect::to_route('information',$id)->with('message','Información actualizada correctamente');
	}

	public function delete_destroy(){

		Information::find(Input::get('id'))->delete();
		return Redirect::to_route('index')->with('message', 'Se ha eliminado correctamente');
	}

}
?>