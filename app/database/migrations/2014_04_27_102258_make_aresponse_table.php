<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeAresponseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('aresponses', function($t)
		{
			$t->increments('id');
			$t->unsignedInteger('adver_id');
			$t->foreign('adver_id')->references('id')->on('advers')->onDelete('cascade');
			$t->unsignedInteger('user_id');
			$t->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$t->text('response');
			$t->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('aresponses');
	}

}
