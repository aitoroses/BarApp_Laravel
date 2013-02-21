<?php

class Information_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('information_table', function($table){
			$table->increments('id');
			$table->string('title');
			$table->text('description');
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
		Schema::drop('information_table');
	}

}