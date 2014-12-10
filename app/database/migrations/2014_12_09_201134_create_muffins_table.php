<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMuffinsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('muffins', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->text('description')->nullable();
			$table->text('directions')->nullable();
			$table->string('image')->nullable();
			$table->integer('calories')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('muffins');
	}

}
