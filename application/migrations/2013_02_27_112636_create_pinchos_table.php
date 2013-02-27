<?php

class Create_Pinchos_Table {    

	public function up()
    {
		Schema::create('pinchos_table', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->text('description');
			$table->string('link');
			$table->string('price');
			$table->string('picture');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('pinchos_table');

    }

}