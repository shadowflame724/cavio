<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('title_ru')->nullable();
            $table->string('title_it')->nullable();
            $table->string('slug')->nullable();
            $table->text('description');
            $table->text('description_ru')->nullable();
            $table->text('description_it')->nullable();
            $table->text('preview');
            $table->text('preview_ru')->nullable();
            $table->text('preview_it')->nullable();
            $table->text('body');
            $table->text('body_ru')->nullable();
            $table->text('body_it')->nullable();
            $table->string('type')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('news');
    }
}
