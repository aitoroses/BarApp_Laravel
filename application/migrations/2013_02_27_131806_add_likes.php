<?php

class Add_Likes {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('likes_table')->insert(array(
			'name' => 'Un "me gusta" de ejemplo',
			'description' => 'Esta es la descripcion del me gusta',
			'link' => 'www.linkdelmegusta.com',
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
		DB::table('likes_table')->delete(1);
	}

}