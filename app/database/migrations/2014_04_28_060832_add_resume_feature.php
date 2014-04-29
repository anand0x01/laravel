<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddResumeFeature extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::transaction(function()
		{
			Schema::table('students', function($t)
			{
				$t->dropColumn('balance');
			});

			Schema::table('students', function($t)
			{
				$t->decimal('balance', 10, 3)->default(0);
				$t->string('resume', 256)->nullable();
			});
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('students', function($t)
		{
			$t->dropColumn('resume');
		});
	}

}
