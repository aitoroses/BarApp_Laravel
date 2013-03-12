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
			$table->integer('pincho_id');
			$table->integer('gin_id');
			$table->integer('like_id');
			$table->integer('user_id');
			$table->string('name');
			$table->string('title');
			$table->text('comment');
			$table->integer('rating');
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