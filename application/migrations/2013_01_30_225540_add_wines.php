<?php

class Add_Wines {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('wines_table')->insert(array(
			'name' => 'Maset del Lleó Gran Reserva Cabernet Sauvignon Doble Magnum 300 cl',
			'description' => 'Procedente de viñedos viejos de Cabernet Sauvignon y junto a una larga crianza en barrica, proporciona un vino con potencia y muy buena estructura. Una de las joyas mejor guardadas de nuestra bodega que, ahora, le invitamos a degustar. Ahora en nuevo formato de 300 cl.',
			'category' => 'Gran Reserva',
			'rating' => 'Excelente',
			'price' => '64,28',
			'picture' => 'placeholder.jpg',
			'created_at' => date('y-m-d H:m:s'),
			'updated_at' => date('y-m-d H:m:s')
		));

		DB::table('wines_table')->insert(array(
			'name' => '1777 Maset del Lleó',
			'description' => 'Procedente de viñedos viejos de Cabernet Sauvignon y junto a una larga crianza en barrica, proporciona un vino con potencia y muy buena estructura. Una de las joyas mejor guardadas de nuestra bodega que, ahora, le invitamos a degustar. Ahora en nuevo formato de 300 cl.',
			'category' => 'Crianza',
			'rating' => 'Excelente',
			'price' => '25,99',
			'picture' => 'placeholder.jpg',
			'created_at' => date('y-m-d H:m:s'),
			'updated_at' => date('y-m-d H:m:s')
		));

		DB::table('wines_table')->insert(array(
			'name' => 'Maset del Lleó Syrah Reserva',
			'description' => 'Vino moderno e innovador, nacido de la variedad syrah. Vino profundo y amplio de la intensa expresión varietal que se funde con los finos tostados del roble. Untuoso, redondo y con textura sedosa. Cada cosecha nos brinda una satisfacción. El esfuerzo y la generosidad de la tierra son reconocidos por nuestros clientes y en certámenes internacionales.',
			'category' => 'Reserva',
			'rating' => 'Bueno',
			'price' => '13,98',
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
		DB::table('wines_table')->delete(1);
		DB::table('wines_table')->delete(2);
		DB::table('wines_table')->delete(3);
	}

}