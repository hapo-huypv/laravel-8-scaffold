<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100)->nullable();
            $table->string('logo_path', 255)->nullable();
            $table->string('description', 255)->nullable();
            $table->string('intro', 255)->nullable();
            $table->integer('learn_time')->nullable();
            $table->bigInteger('quizzes')->nullable();
            $table->bigInteger('price')->nullable();
            $table->softDelete();
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
        Schema::dropIfExists('courses');
    }
}
