<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FinishTissue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finish_tissues', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('parent_id')->nullable();
            $table->string('title', 35)->nullable();
            $table->string('title_ru', 35)->nullable();
            $table->string('title_it', 35)->nullable();
            $table->string('short', 10)->nullable();
            $table->text('comment')->nullable();

            $table->string('type', 35)->nullable();
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
        Schema::dropIfExists('finish_tissues');
    }
}
