<?php

class Likes_Controller extends Base_Controller {

	public $restful = true;    

	public function get_index()
    {
        $data = Like::all();

        return View::make('likes.index')
            ->with('data', $data);
    }    

    public function get_view($id)
    {
        $data = Like::find($id);
        $comments = Like::find($id)->comments()->get();

        return View::make('likes.view')
            ->with('data', $data)
            ->with('comments', $comments);
    }    

    public function get_edit($id)
    {
        return View::make('likes.edit')
            ->with('data', Like::find($id));
    }    

    public function get_create()
    {
        return View::make('likes.new');

    }    

    public function post_add()
    {
        $validation = Like::validate(Input::all());
        if($validation->fails()){
            return Redirect::to_route('create_like')
                ->with('error', "No se ha añadido un nuevo like, intentalo otra vez")
                ->with_errors($validation)
                ->with_input();
        }

        if(!Input::has_file('image')){

            Like::create(array(
            'name' => Input::get('name'),
            'description' => Input::get('description'),
            'link' => Input::get('link'),
            'picture' => 'placeholder.jpg'

        ));

        } else {

            $picture = Input::file('image');

            Like::create(array(
            'name' => Input::get('name'),
            'description' => Input::get('description'),
            'link' => Input::get('link'),
            'picture' => $picture['name']

            ));

            Input::upload('image', 'public/img/likes', $picture['name']);

            // Creamos y guardamos el thumbnail
            require_once('public/functions/compress.php');

            thumbImage('public/img/likes/'.$picture['name'], 'public/img/likes/thumb/'.$picture['name']);

        }

        


        return Redirect::to_route('index_likes')->with('message', "Se añadío correctamente nuevo like");
    }    

    public function put_update()
    {

        $validation = Like::validate(Input::all());
        if($validation->fails()){
            return Redirect::back()
                ->with('error', "No se puede guardar el like")
                ->with_errors($validation)
                ->with_input();
        }

        $id = Input::get('id');

        if(!Input::has_file('image')){

            Like::update($id, array(
                'name' => Input::get('name'),
                'description' => Input::get('description'),
                'link' => Input::get('link')
            ));
        } else {

            $picture = Input::file('image');

            Like::update($id, array(
                'name' => Input::get('name'),
                'description' => Input::get('description'),
                'link' => Input::get('link'),
                'picture' => $picture['name']
            ));

            Input::upload('image', 'public/img/likes', $picture['name']);

            // Creamos y guardamos el thumbnail
            require_once('public/functions/compress.php');

            thumbImage('public/img/likes/'.$picture['name'], 'public/img/likes/thumb/'.$picture['name']);

        }

        return Redirect::to_route('like',$id)->with('message','like actualizado correctamente');

    }    

    public function delete_destroy()
    {
        Like::find(Input::get('id'))->delete();
        return Redirect::to_route('index_likes')->with('message', 'Se ha eliminado correctamente');
    }

}