<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeAdsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('advers', function($t)
		{
			$t->increments('id');
			$t->unsignedInteger('user_id');
			$t->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$t->smallInteger('ad_type')->unsigned();
			$t->string('title', 100);
			$t->boolean('confirmed')->default(true);
			$t->boolean('is_viewable')->default(true);
			$t->boolean('is_sold')->default(false);
			$t->timestamps();
		});

		Schema::create('advernormals', function($t)
		{
			$t->increments('id');
			$t->unsignedInteger('adver_id');
			$t->foreign('adver_id')->references('id')->on('advers')->onDelete('cascade');
			$t->smallInteger('sector_id')->unsigned();
			$t->boolean('type_sm')->default(false);
			$t->boolean('type_mr')->default(false);
			$t->boolean('type_pd')->default(false);
			$t->text('description');
			$t->string('phone', 30);
			$t->boolean('degree_ug')->default(false);
			$t->boolean('degree_g')->default(false);
			$t->boolean('degree_phd')->default(false);
			$t->string('image', 150)->nullable();
			$t->smallInteger('students')->unsigned();
		});

		Schema::create('advernonpro', function($t)
		{
			$t->increments('id');
			$t->unsignedInteger('adver_id');
			$t->foreign('adver_id')->references('id')->on('advers')->onDelete('cascade');
			$t->smallInteger('sector_id')->unsigned();
			$t->boolean('type_sm')->default(false);
			$t->boolean('type_mr')->default(false);
			$t->boolean('type_pd')->default(false);
			$t->text('description');
			$t->string('phone', 30);
			$t->boolean('degree_ug')->default(false);
			$t->boolean('degree_g')->default(false);
			$t->boolean('degree_phd')->default(false);
			$t->string('image', 150)->nullable();
			$t->smallInteger('students')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('advers');
		Schema::drop('advernormals');
		Schema::drop('advernonpro');
	}

}
