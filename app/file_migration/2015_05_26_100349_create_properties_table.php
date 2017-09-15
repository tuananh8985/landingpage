<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('properties', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('template_id')->unsigned();
			$table->integer('page_id')->unsigned();
			$table->string('value');
			$table->timestamps();

			$table->foreign('template_id')
			      ->references('id')->on('property_templates')
			      ->onDelete('cascade');
			$table->foreign('page_id')
			      ->references('id')->on('pages')
			      ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('properties');
	}

}
