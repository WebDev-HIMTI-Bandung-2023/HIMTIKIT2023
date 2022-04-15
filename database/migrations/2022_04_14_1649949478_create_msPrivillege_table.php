<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msprivilege', function (Blueprint $table) {

            $table->integer('PrivilegeID', 11);
            $table->integer('ModuleID');
            $table->integer('BinusianID');
            $table->foreign('ModuleID')->references('ModuleID')->on('msmodule');
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
        Schema::dropIfExists('msprivilege');
    }
};