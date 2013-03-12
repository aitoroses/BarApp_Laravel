<?php

class Api_Controller extends Base_Controller {

	public $restful = true;

	public function get_wines(){

		return Response::eloquent(Wine::all());

	}

	public function get_wine($id){

		return Response::eloquent(Wine::find($id));

	}


	public function get_information(){

		return Response::eloquent(Information::all());

	}

	public function get_likes(){

		return Response::eloquent(Like::all());

	}

	public function get_like($id){

		return Response::eloquent(Like::find($id));

	}

	/*public function get_comments_wine($id){

		return Response::eloquent(Comment::where('wine_id', '=', $id));	
	}

	public function post_comments_wine($id){


	}*/

/****************** USER ACTIONS *********************************/

	



	public function post_register(){

		$user = Input::get('user');

		$find = User::where('username','=', $user['username'])->first();

		if(is_null($find))
		{

			DB::table('user_table')->insert(array(
				'username' => $user['username'],
				'password' => Hash::make($user['password']),
				'type' => 'normal',
				'picture' => 'placeholder.jpg',
				'created_at' => date('y-m-d H:m:s'),
				'updated_at' => date('y-m-d H:m:s')
			));

			return "Gracias por registrarte en Mô. Ahora empieza a utilizar tu cuenta de usuario. Gracias";

		} else {
			return Response::error('500');
		}

	}

	public function post_login(){

		/*$user = Input::get('user');
		$username = $user['username'];
		$password = $user['password'];

		$find = User::where_username($username)->first();

		if(Hash::check($password, $find->password)){
			return "valid";

		} else {
			return Response::error('500');
		}
		*/

		$username = $user['username'];
		$password = $user['password'];

		$credentials = array('username' => $username, 'password' => $password);

		if (Auth::attempt($credentials)){
			return Response::eloquent(Auth::user());
		} else {
			return Response::error('500');
		}
	}

	public function get_check(){

		if(Auth::check()){
			return Response::eloquent(Auth::user());
		}
		else{
			return Response::error('500');
		}

	}

}