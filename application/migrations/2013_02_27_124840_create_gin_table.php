<?php

class Create_Gin_Table {    

	public function up()
    {
		Schema::create('gin_table', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->text('description');
			$table->string('price');
			$table->string('picture');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('gin_table');

    }

}