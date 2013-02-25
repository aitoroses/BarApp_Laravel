<?php

class Comment extends Eloquent {

	public static $table = "comments_table";

	public function user()
     {
          return $this->belongs_to('User');
     }
	
}
?>