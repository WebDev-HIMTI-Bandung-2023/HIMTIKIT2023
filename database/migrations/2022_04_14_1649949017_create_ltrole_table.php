<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLtroleTable extends Migration
{
    public function up()
    {
        Schema::create('ltrole', function (Blueprint $table) {

		$table->integer('RoleID',11);
		$table->string('RoleName');

        });
    }

    public function down()
    {
        Schema::dropIfExists('ltrole');
    }
}