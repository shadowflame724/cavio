<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',35);
            $table->string('title_ru',35)->nullable();;
            $table->string('title_it',35)->nullable();;
            $table->string('slug',35)->nullable();
            $table->text('description')->nullable();
            $table->text('body')->nullable();
            $table->text('body_ru')->nullable();
            $table->text('body_it')->nullable();
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
        Schema::dropIfExists('pages');
    }
}
