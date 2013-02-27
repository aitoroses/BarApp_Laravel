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
			'user_id' => '1',
			'title' => 'titulo 1',
			'comment' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris bibendum volutpat neque sed malesuada. Nullam ac enim vel justo condimentum semper. Donec sollicitudin nibh laoreet leo tincidunt congue. Proin in dui felis, id cursus arcu. Quisque erat diam, eleifend quis gravida at, molestie sit amet velit. Suspendisse porttitor magna enim.',
			'rating' => '5',
			'created_at' => date('y-m-d H:m:s'),
			'updated_at' => date('y-m-d H:m:s')
		));
		DB::table('comments_table')->insert(array(
			'wine_id' => '1',
			'user_id' => '1',
			'title' => 'titulo 2',
			'comment' => 'Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontró una de las palabras más oscuras de la lengua del latín, "consecteur", en un pasaje de Lorem Ipsum, y al seguir leyendo distintos textos del latín, descubrió la fuente indudable. Lorem Ipsum viene de las secciones 1.10.32 y 1.10.33 de "de Finnibus Bonorum et Malorum" (Los Extremos del Bien y El Mal) por Cicero, escrito en el año 45 antes de Cristo. Este libro es un tratado de teoría de éticas, muy popular durante el Renacimiento. La primera linea del Lorem Ipsum, "Lorem ipsum dolor sit amet..", viene de una linea en la sección 1.10.32',
			'rating' => '3',
			'created_at' => date('y-m-d H:m:s'),
			'updated_at' => date('y-m-d H:m:s')
		));
		DB::table('comments_table')->insert(array(
			'wine_id' => '1',
			'user_id' => '2',
			'title' => 'titulo 3',
			'comment' => 'Un comentario corto de otro usuario',
			'rating' => '1',
			'created_at' => date('y-m-d H:m:s'),
			'updated_at' => date('y-m-d H:m:s')
		));
		DB::table('comments_table')->insert(array(
			'pincho_id' => '1',
			'user_id' => '2',
			'title' => 'titulo 3',
			'comment' => 'Un comentario para el airbag de pollo',
			'rating' => '1',
			'created_at' => date('y-m-d H:m:s'),
			'updated_at' => date('y-m-d H:m:s')
		));
		DB::table('comments_table')->insert(array(
			'gin_id' => '1',
			'user_id' => '2',
			'title' => 'gintonic?',
			'comment' => 'Un comentario para el gintonic',
			'rating' => '2',
			'created_at' => date('y-m-d H:m:s'),
			'updated_at' => date('y-m-d H:m:s')
		));
		DB::table('comments_table')->insert(array(
			'like_id' => '1',
			'user_id' => '2',
			'title' => 'gintonic?',
			'comment' => 'Un comentario para el like',
			'rating' => '2',
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