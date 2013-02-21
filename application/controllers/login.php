<?php

class Login_Controller extends Base_Controller{

	public $restful = true;

	public function get_index(){

		return View::make('login.index');
	}

	public function post_verify(){
		
		$submit = Input::get('submit');

		if(isset($submit)){
		    
		    session_start();
		    
		    $_SESSION['tried'] = true; 
		    
		    $credentials = array(
		    	'username' => Input::get('username'),
		    	'password' => Input::get('password')
		    );

		    // Comprobamos privilegios de administrador
		    $user = User::where('username', '=', Input::get('username'))->first();
		    // Si el usuario existe
		    if(!is_null($user))
		    {
		    	// Y el usuario es administrador no loguees
		    	if($user->type != 'administrador') return Redirect::to_route('login');
		    }

		    // Intenta acceder con los credenciales
		    if (Auth::attempt($credentials)){
		        
		        unset($_SESSION['tried']);
		        // Entra
     			return Redirect::to_route('index');
			} else 
				// Vuelve al login
				return Redirect::to_route('login');

		} else {    //If the form button wasn't submitted go to the index page, or login page 
	    return Redirect::to_route('login');    
	    exit; 
		}
	}

	public function get_logout(){

		Auth::logout();
		return Redirect::to_route('login');
	}
}

?>