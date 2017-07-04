<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePopupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('popups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 40);
            $table->string('title_ru', 40)->nullable();
            $table->string('title_it', 40)->nullable();
            $table->text('body');
            $table->text('body_ru')->nullable();
            $table->text('body_it')->nullable();
            $table->string('link', 20)->nullable();
            $table->string('image');
            $table->tinyInteger('show')->default(0);

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
        Schema::dropIfExists('popups');
    }
}
