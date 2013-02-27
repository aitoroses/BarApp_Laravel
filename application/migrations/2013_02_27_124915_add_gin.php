<?php

class Add_gin {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('gin_table')->insert(array(
			'name' => 'GinTonic',
			'description' => 'Gin de ejemplo',
			'price' => '5.50',
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
		DB::table('gin_table')->delete(1);

	}

}