<?php

class UniversitiesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('universities')->insert(array (
			0 =>
			array (
				'id' => 1,
				'domain' => 'princeton.edu',
				'name' => 'Princeton University',
				'country_id' => 2,
			),
			1 =>
			array (
				'id' => 2,
				'domain' => 'iitr.ernet.in',
				'name' => 'IIT Roorkee',
				'country_id' => 1,
			),
		));
	}

}
