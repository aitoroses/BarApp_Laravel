<?php

class Add_Comments {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('comments_table')->insert(array(
			'wine_id' => '1',
			'username' => 'Nephalem',
			'comment' => 'Soy un Nephalem',
			'rating' => 'sinusar',
			'created_at' => date('y-m-d H:m:s'),
			'updated_at' => date('y-m-d H:m:s')
		));
		DB::table('comments_table')->insert(array(
			'wine_id' => '1',
			'username' => 'Nephalem',
			'comment' => 'Soy un Nephalem antiguo',
			'rating' => 'sinusar',
			'created_at' => date('y-m-d H:m:s'),
			'updated_at' => date('y-m-d H:m:s')
		));
		DB::table('comments_table')->insert(array(
			'wine_id' => '1',
			'username' => 'Nephalem',
			'comment' => 'Soy otro Nephalem',
			'rating' => 'sinusar',
			'created_at' => date('y-m-d H:m:s'),
			'updated_at' => date('y-m-d H:m:s')
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('comments_table')->delete(1);
		DB::table('comments_table')->delete(2);
		DB::table('comments_table')->delete(3);
	}

}