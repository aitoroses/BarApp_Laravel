<?php

class Comments_Controller extends Base_Controller{

	public $restful = true;

	public function delete_destroy(){

		$comment = Comment::find(Input::get('id'))->first();	

		if($comment != null ){
			$comment->delete();
			return true;
		
		} else {
			Response::error('500');
		}
		

	}
}

?>
