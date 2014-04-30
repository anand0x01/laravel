<?php

class CountriesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('countries')->insert(array (
			0 =>
			array (
				'id' => 1,
				'name' => 'India',
			),
			1 =>
			array (
				'id' => 2,
				'name' => 'USA',
			),
		));
	}

}
