<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSliderspacksTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliderspacks', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->nullable();
			$table->string('description')->nullable();
			$table->integer('image_width')->default('400');
			$table->integer('image_height')->default('400');
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
        Schema::drop('sliderspacks');
    }

}
