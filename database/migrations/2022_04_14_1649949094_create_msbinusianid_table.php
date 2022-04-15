<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsbinusianidTable extends Migration
{
    public function up()
    {
        Schema::create('msbinusianid', function (Blueprint $table) {

		$table->integer('BinusianID',11);
		$table->string('BinusianName');

        });
    }

    public function down()
    {
        Schema::dropIfExists('msbinusianid');
    }
}