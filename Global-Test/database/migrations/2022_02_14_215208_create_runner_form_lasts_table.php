<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRunnerFormLastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('runner_form_lasts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('runner_id');
            $table->integer('age');
            $table->string('color');
            $table->string('sex');
            $table->string('owner');
            $table->string('career');
            $table->string('first');
            $table->string('second');
            $table->string('third');
            $table->timestamps();
            $table->foreign('runner_id')->references('id')->on('runners');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('runner_form_lasts');
    }
}
