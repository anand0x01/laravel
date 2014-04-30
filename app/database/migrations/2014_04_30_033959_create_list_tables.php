<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tmplists', function($t)
		{
		   $t->increments('id');
		   $t->unsignedInteger('user_id');
           $t->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           $t->unsignedInteger('student_id');
           $t->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tmplists');
	}

}
