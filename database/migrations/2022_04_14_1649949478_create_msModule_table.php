<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsModuleTable extends Migration
{
    public function up()
    {
        Schema::create('msmodule', function (Blueprint $table) {

            $table->integer('ModuleID', 11);
            $table->String('ModuleName');
            $table->String('ModuleLink');
        });
    }

    public function down()
    {
        Schema::dropIfExists('msmodule');
    }
}