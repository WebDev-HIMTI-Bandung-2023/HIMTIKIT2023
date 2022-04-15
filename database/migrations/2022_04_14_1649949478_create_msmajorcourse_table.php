<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsmajorcourseTable extends Migration
{
    public function up()
    {
        Schema::create('msmajorcourse', function (Blueprint $table) {

            $table->integer('MajorID');
            $table->integer('CourseID');
            $table->integer('SmtID');
            $table->integer('BinusianID');
            $table->String('AuditUserName');
            $table->timestamp('AuditTime');
        });
    }

    public function down()
    {
        Schema::dropIfExists('msmajorcourse');
    }
}