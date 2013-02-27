<?php

class Gins_Controller extends Base_Controller {

	public $restful = true;    

	public function get_index()
    {
        $data = Gin::all();

        return View::make('gins.index')
            ->with('data', $data);
    }    

    public function get_view($id)
    {
        $data = Gin::find($id);
        $comments = Gin::find($id)->comments()->get();

        return View::make('gins.view')
            ->with('data', $data)
            ->with('comments', $comments);
    }    

    public function get_edit($id)
    {
        return View::make('gins.edit')
            ->with('data', Gin::find($id));
    }    

    public function get_create()
    {
        return View::make('gins.new');

    }    

    public function post_add()
    {
        $validation = Gin::validate(Input::all());
        if($validation->fails()){
            return Redirect::to_route('create_gin')
                ->with('error', "No se ha añadido un nuevo gin, intentalo otra vez")
                ->with_errors($validation)
                ->with_input();
        }

        if(!Input::has_file('image')){

            Gin::create(array(
            'name' => Input::get('name'),
            'description' => Input::get('description'),
            'price' => Input::get('price'),
            'picture' => 'placeholder.jpg'

        ));

        } else {

            $picture = Input::file('image');

            Gin::create(array(
            'name' => Input::get('name'),
            'description' => Input::get('description'),
            'price' => Input::get('price'),
            'picture' => $picture['name']

            ));

            Input::upload('image', 'public/img/gins', $picture['name']);

            // Creamos y guardamos el thumbnail
            require_once('public/functions/compress.php');

            thumbImage('public/img/gins/'.$picture['name'], 'public/img/gins/thumb/'.$picture['name']);

        }

        


        return Redirect::to_route('index_gins')->with('message', "Se añadío correctamente nuevo gin");
    }    

    public function put_update()
    {

        $validation = Gin::validate(Input::all());
        if($validation->fails()){
            return Redirect::back()
                ->with('error', "No se puede guardar el gin")
                ->with_errors($validation)
                ->with_input();
        }

        $id = Input::get('id');

        if(!Input::has_file('image')){

            Gin::update($id, array(
                'name' => Input::get('name'),
                'description' => Input::get('description'),
                'price' => Input::get('price')
            ));
        } else {

            $picture = Input::file('image');

            Gin::update($id, array(
                'name' => Input::get('name'),
                'description' => Input::get('description'),
                'price' => Input::get('price'),
                'picture' => $picture['name']
            ));

            Input::upload('image', 'public/img/gins', $picture['name']);

            // Creamos y guardamos el thumbnail
            require_once('public/functions/compress.php');

            thumbImage('public/img/gins/'.$picture['name'], 'public/img/gins/thumb/'.$picture['name']);

        }

        return Redirect::to_route('gin',$id)->with('message','Gin actualizado correctamente');

    }    

    public function delete_destroy()
    {
        Gin::find(Input::get('id'))->delete();
        return Redirect::to_route('index_gins')->with('message', 'Se ha eliminado correctamente');
    }
}