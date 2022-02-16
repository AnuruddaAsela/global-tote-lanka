<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLastRunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('last_runs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('runner_form_id');
            $table->integer('age');
            $table->string('color');
            $table->string('sex');
            $table->string('owner');
            $table->string('career');
            $table->string('first');
            $table->string('second');
            $table->string('third');
            $table->timestamps();
            $table->foreign('runner_form_id')->references('id')->on('runner_forms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('last_runs');
    }
}
