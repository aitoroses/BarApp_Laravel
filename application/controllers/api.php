<?php

class Api_Controller extends Base_Controller {

	public $restful = true;

	public function get_wines(){

		return Response::eloquent(Wine::all());


		$result = [];

		foreach (Wine::all() as $wine){

			$result[] = $wine;
			
		}

		return json_encode($result, JSON_UNESCAPED_UNICODE);

	}

	public function get_information(){

		return Response::eloquent(Information::all());

		$result = [];

		foreach (Information::all() as $ele){

			$result[] = $ele;
			
		}

		return json(json_encode($result, JSON_UNESCAPED_UNICODE));

	}

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

}