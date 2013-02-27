<?php

class Pinchos_Controller extends Base_Controller {

	public $restful = true;    

	public function get_index()
    {
        $data = Pincho::all();

        return View::make('pinchos.index')
            ->with('data', $data);
    }    

	public function get_view($id)
    {
        $data = Pincho::find($id);
        $comments = Pincho::find($id)->comments()->get();

        return View::make('pinchos.view')
            ->with('data', $data)
            ->with('comments', $comments);
    }    

	public function get_edit($id)
    {
        return View::make('pinchos.edit')
            ->with('data', Pincho::find($id));
    }    

	public function get_create()
    {
        return View::make('pinchos.new');

    }    

	public function post_add()
    {
        $validation = Pincho::validate(Input::all());
        if($validation->fails()){
            return Redirect::to_route('create_pincho')
                ->with('error', "No se ha añadido un nuevo pincho, intentalo otra vez")
                ->with_errors($validation)
                ->with_input();
        }

        if(!Input::has_file('image')){

            Pincho::create(array(
            'name' => Input::get('name'),
            'description' => Input::get('description'),
            'link' => Input::get('link'),
            'price' => Input::get('price'),
            'picture' => 'placeholder.jpg'

        ));

        } else {

            $picture = Input::file('image');

            Pincho::create(array(
            'name' => Input::get('name'),
            'description' => Input::get('description'),
            'link' => Input::get('link'),
            //'rating' => Input::get('rating'),
            'price' => Input::get('price'),
            'picture' => $picture['name']

            ));

            Input::upload('image', 'public/img/pinchos', $picture['name']);

            // Creamos y guardamos el thumbnail
            require_once('public/functions/compress.php');

            thumbImage('public/img/pinchos/'.$picture['name'], 'public/img/pinchos/thumb/'.$picture['name']);

        }

        


        return Redirect::to_route('index_pinchos')->with('message', "Se añadío correctamente nuevo pincho");
    }    

	public function put_update()
    {

        $validation = Pincho::validate(Input::all());
        if($validation->fails()){
            return Redirect::back()
                ->with('error', "No se puede guardar el pincho")
                ->with_errors($validation)
                ->with_input();
        }

        $id = Input::get('id');

        if(!Input::has_file('image')){

            Pincho::update($id, array(
                'name' => Input::get('name'),
                'description' => Input::get('description'),
                'link' => Input::get('link'),
                //'rating' => Input::get('rating'),
                'price' => Input::get('price')
            ));
        } else {

            $picture = Input::file('image');

            Pincho::update($id, array(
                'name' => Input::get('name'),
                'description' => Input::get('description'),
                'link' => Input::get('link'),
                //'rating' => Input::get('rating'),
                'price' => Input::get('price'),
                'picture' => $picture['name']
            ));

            Input::upload('image', 'public/img/pinchos', $picture['name']);

            // Creamos y guardamos el thumbnail
            require_once('public/functions/compress.php');

            thumbImage('public/img/pinchos/'.$picture['name'], 'public/img/pinchos/thumb/'.$picture['name']);

        }

        return Redirect::to_route('pincho',$id)->with('message','Pincho actualizado correctamente');

    }    

	public function delete_destroy()
    {
        Pincho::find(Input::get('id'))->delete();
        return Redirect::to_route('index_pinchos')->with('message', 'Se ha eliminado correctamente');
    }

}