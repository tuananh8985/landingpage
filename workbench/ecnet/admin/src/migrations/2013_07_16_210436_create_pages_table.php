<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function(Blueprint $table) {
            $table->increments('id');
            $table->text('custom_head')->nullable();
			$table->text('custom_footer')->nullable();
			$table->string('title');
            $table->string('slug');
			$table->text('body')->nullable();
            $table->string('image')->nullable();
			$table->text('description')->nullable();
			$table->string('keywords')->nullable();
			$table->integer('parent')->default(0);
            $table->integer('type')->default(0);
            $table->integer('order')->default(0);
            $table->boolean('hompage')->default(0);
            $table->string('meta_keywords')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->boolean('published')->default(1);
            $table->boolean('featured')->default(1);
            $table->string('template')->nullable();
            $table->timestamp('deleted_at')->nullable();
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
        Schema::drop('pages');
    }

}
