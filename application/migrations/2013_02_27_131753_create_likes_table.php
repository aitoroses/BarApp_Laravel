<?php

class Create_Likes_Table {    

	public function up()
    {
		Schema::create('likes_table', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('description');
			$table->string('link');
			$table->string('picture');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('likes_table');

    }

}