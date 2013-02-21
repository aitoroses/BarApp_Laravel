<?php

class Information {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('information_table')->insert(array(
			'title' => 'Descripción',
			'description' => 'El Bar Mô es un nuevo concepto de local situado en el centro de Pamplona.
			Decorado con gusto, el Bar Mô te ofrece un ambiente cálido con variedad de pinchos, cafés y una divertida selección de vinos. Además, nuestra música lounge y de vanguardia hará de tu estancia una experiencia única.',
			'created_at' => date('y-m-d H:m:s'),
			'updated_at' => date('y-m-d H:m:s')
		));
		DB::table('information_table')->insert(array(
			'title' => 'Nuestra Carta',
			'description' => 'Nuestra carta te ofrece los pinchos y tapas más actuales, innovando y renovándolas constantemente. Disponemos de fritos, tostas, raciones y brochetas.
			Bar Mô te ofrece una moderna carta de vinos para que acompañes tus pinchos. Si prefieres tomar un café, prueba uno de nuestros Nespressos.
			Especialistas en gin tonics, el ambiente cálido está garantizado con la música lounge y de vanguardia.',
			'created_at' => date('y-m-d H:m:s'),
			'updated_at' => date('y-m-d H:m:s')
		));
		DB::table('information_table')->insert(array(
			'title' => 'Horario',
			'description' => 'Abrimos a las 8:00 de lunes a viernes, sábado y domingo a las 11:00.',
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
		DB::table('information_table')->where('title','=','Descripción')->delete();
		DB::table('information_table')->where('title','=','Nuestra Carta')->delete();
		DB::table('information_table')->where('title','=','Horario')->delete();
	}

}