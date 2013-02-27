<?php

class Wines_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wines_table',function($table){
			$table->increments('id');
			$table->string('name');
			$table->text('description');
			$table->string('category');
			$table->string('price');
			$table->string('picture');
			$table->string('thumb');
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wines_table');
	}

}
?>