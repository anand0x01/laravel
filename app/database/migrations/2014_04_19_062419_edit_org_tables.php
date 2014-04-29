<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditOrgTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('organisations', function($t)
		{
			$t->string('name', 100);
		});

		Schema::create('students', function($t)
		{
			$t->increments('id');
			$t->unsignedInteger('user_id');
			$t->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$t->unsignedInteger('country_id');
			$t->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
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
		Schema::table('organisations', function($t)
		{
			$t->dropColumn('name');
		});
		Schema::drop('students');
	}

}
