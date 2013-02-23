<?php

class Comments_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments_table',function($table){
			$table->increments('id');
			$table->integer('wine_id');
			$table->string('username');
			$table->text('comment');
			$table->string('rating');
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
		Schema::drop('comments_table');

	}

}