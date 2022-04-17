<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsmajorcourseTable extends Migration
{
    public function up()
    {
        Schema::create('msmajorcourse', function (Blueprint $table) {
            $table->integer('MajorCourseID', 11);
            $table->integer('MajorID');
            $table->integer('CourseID');
            $table->integer('SmtID');
            $table->integer('BinusianID');
            $table->String('AuditUserName');
            $table->timestamp('AuditTime');
            $table->foreign('MajorID')->references('MajorID')->on('ltmajor');
            $table->foreign('CourseID')->references('CourseID')->on('ltcourse');
            $table->foreign('SmtID')->references('SmtID')->on('ltsmt');
            $table->foreign('BinusianID')->references('BinusianID')->on('msbinusianid');
        });
    }

    public function down()
    {
        Schema::dropIfExists('msmajorcourse');
    }
}