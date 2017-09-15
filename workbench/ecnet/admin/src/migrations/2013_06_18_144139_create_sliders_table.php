<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSlidersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
			$table->string('description')->nullable();
			$table->text('body')->nullable();
            $table->integer('pack')->default(0);
			$table->string('image')->default("#");
			$table->integer('order')->default(0);
            $table->string('link')->default('#')->nullable();
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
        Schema::drop('sliders');
    }

}
