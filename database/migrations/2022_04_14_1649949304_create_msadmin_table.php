<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsadminTable extends Migration
{
    public function up()
    {
        Schema::create('msadmin', function (Blueprint $table) {
            $table->string('NIM', 10);
            $table->integer('RoleID');
            $table->integer('BinusianID');
            $table->foreign('NIM')->references('NIM')->on('msuser');
            $table->foreign('RoleID')->references('RoleID')->on('ltrole');
            $table->foreign('BinusianID')->references('BinusianID')->on('msbinusianid');
        });
    }

    public function down()
    {
        Schema::dropIfExists('msadmin');
    }
}