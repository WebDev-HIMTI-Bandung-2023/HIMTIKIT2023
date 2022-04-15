<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLtcourseTable extends Migration
{
    public function up()
    {
        Schema::create('ltcourse', function (Blueprint $table) {

		$table->integer('CourseID',11);
		$table->string('CourseName');
		$table->string('CourseDescription');
		$table->string('FileName');

        });
    }

    public function down()
    {
        Schema::dropIfExists('ltcourse');
    }
}