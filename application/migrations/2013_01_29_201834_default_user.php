<?php

class Default_User {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_table', function($table){
			$table->increments('id');
			$table->string('username');
			$table->string('password');
			$table->string('type');
			$table->string('picture');
			$table->timestamps();
		});

		DB::table('user_table')->insert(array(
			'username' => 'admin',
			'password' => Hash::make('admin'),
			'type' => 'administrador',
			'picture' => 'placeholder.jpg',
			'created_at' => date('y-m-d H:m:s'),
			'updated_at' => date('y-m-d H:m:s')
		));

		DB::table('user_table')->insert(array(
			'username' => 'admin',
			'password' => Hash::make('aitor.oses@gmail.com'),
			'type' => 'normal',
			'picture' => 'placeholder.jpg',
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
		Schema::drop('user_table');
	}

}