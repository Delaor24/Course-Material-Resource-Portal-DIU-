<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->boolean('status')->default(false);
            $table->bigInteger('faculty_id')->unsigned();
            $table->bigInteger('department_id')->unsigned();
            $table->bigInteger('program_id')->unsigned();
            $table->bigInteger('semester_id')->unsigned();
            $table->bigInteger('course_id')->unsigned();


            $table->string('title');
            $table->text('description');
            
            $table->text('file')->nullable();
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
        Schema::dropIfExists('contents');
    }
}
