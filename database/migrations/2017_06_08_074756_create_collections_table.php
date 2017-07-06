<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 35);
            $table->string('title_ru', 35)->nullable();
            $table->string('title_it', 35)->nullable();
            $table->string('slug')->nullable();
            $table->text('description', 400);
            $table->text('description_ru', 400)->nullable();
            $table->text('description_it', 400)->nullable();
            $table->string('image')->nullable();
            $table->integer('banner')->nullable();
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
        Schema::dropIfExists('collections');
    }
}
