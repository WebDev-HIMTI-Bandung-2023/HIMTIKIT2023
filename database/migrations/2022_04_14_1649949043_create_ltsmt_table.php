<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLtsmtTable extends Migration
{
    public function up()
    {
        Schema::create('ltsmt', function (Blueprint $table) {

		$table->integer('SmtID',11);
		$table->string('SmtName');

        });
    }

    public function down()
    {
        Schema::dropIfExists('ltsmt');
    }
}