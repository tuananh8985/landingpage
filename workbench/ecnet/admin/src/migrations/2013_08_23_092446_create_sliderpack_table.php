<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSliderpackTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliderpacks', function(Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->nullable();
            $table->string('name');
			$table->string('description')->nullable();
            $table->integer('image_with')->default(0);
            $table->integer('image_height')->default(0);
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
        Schema::drop('sliderpack');
    }

}
