<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsuserTable extends Migration
{
    public function up()
    {
        Schema::create('msuser', function (Blueprint $table) {

            $table->string('NIM',10)->primary();
            $table->string('Name');

        });
    }

    public function down()
    {
        Schema::dropIfExists('msuser');
    }
}