<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeDoubtsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adoubts', function($t)
		{
			$t->increments('id');
			$t->unsignedInteger('adver_id');
			$t->foreign('adver_id')->references('id')->on('advers')->onDelete('cascade');
			$t->unsignedInteger('user_id');
			$t->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$t->string('doubt', 1000);
			$t->text('answer')->nullable();
			$t->timestamp('created_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('adoubts');
	}

}
