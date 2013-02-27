<?php

class Add_Pinchos {    

	public function up()
    {
		DB::table('pinchos_table')->insert(array(
			'name' => 'Airbag de pollo',
			'description' => 'Pincho de ejemplo',
			'access' => 'Registrado',
			'link' => 'www.vimeo.com',
			'price' => '2.00',
			'picture' => 'placeholder.jpg',
			'created_at' => date('y-m-d H:m:s'),
			'updated_at' => date('y-m-d H:m:s')
		));
	}   

	public function down()
    {
		DB::table('pinchos_table')->delete(1);
    }

}