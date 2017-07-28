<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_messages', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('title_ru');
            $table->string('title_it');

            $table->text('body');
            $table->text('body_ru');
            $table->text('body_it');
            $table->string('type');

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
        Schema::dropIfExists('template_messages');
    }
}
