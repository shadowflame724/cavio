<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('page_id');
            $table->string('title', 35)->nullable();
            $table->string('title_ru', 35)->nullable();
            $table->string('title_it', 35)->nullable();
            $table->text('preview')->nullable();
            $table->text('preview_ru')->nullable();
            $table->text('preview_it')->nullable();
            $table->text('body')->nullable();
            $table->text('body_ru')->nullable();
            $table->text('body_it')->nullable();
            $table->string('image')->nullable();
            $table->smallInteger('title_limit')->nullable();
            $table->smallInteger('body_limit')->nullable();
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
        Schema::dropIfExists('blocks');
    }
}
