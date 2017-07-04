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
            $table->integer('page_id');
            $table->string('title')->nullable();
            $table->string('title_ru')->nullable();
            $table->string('title_it')->nullable();
            $table->text('preview')->nullable();
            $table->text('preview_ru')->nullable();
            $table->text('preview_it')->nullable();
            $table->text('body')->nullable();
            $table->text('body_ru')->nullable();
            $table->text('body_it')->nullable();
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
        Schema::dropIfExists('blocks');
    }
}
