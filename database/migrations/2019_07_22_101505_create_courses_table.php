<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->unsignedInteger('field_id');
            $table->unsignedBigInteger('teacher_id');
            $table->string('title',500);
            $table->text('description');
            $table->string('cover_image');
            $table->boolean('is_approved');
            $table->timestamp('created_at');

            $table->foreign('field_id')->references('id')->on('fields');
            $table->foreign('teacher_id')->references('id')->on('teachers');
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
