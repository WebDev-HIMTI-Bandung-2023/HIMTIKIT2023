<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLtsoftwareTable extends Migration
{
    public function up()
    {
        Schema::create('ltsoftware', function (Blueprint $table) {
            $table->integer('SoftwareID', 11);
            $table->string('SoftwareName');
            $table->string('SoftwareImage');
            $table->string('SoftwareDescription');
            $table->string('SoftwareUrl');
            $table->integer('BinusianID');
            $table->foreign('BinusianID')->references('BinusianID')->on('msbinusianid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ltsoftware');
    }
};