<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeOrgdomainTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('countries', function($t)
		{
			$t->increments('id')->unsigned();
			$t->string('name', 100);
		});

		Schema::table('universities', function($t)
		{
			$t->unsignedInteger('country_id')->nullable();
			$t->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
		});

		Schema::create('organisations', function($t)
		{
			$t->increments('id')->unsigned();
			$t->unsignedInteger('user_id');
			$t->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$t->string('domain', 100);
			$t->string('balance', 10);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('countries');
		Schema::table('universities', function($t)
		{
			$t->dropColumn('country_id');
			$t->dropForeign('universities_country_id_foreign');
		});
		Schema::drop('organisations');
	}

}
