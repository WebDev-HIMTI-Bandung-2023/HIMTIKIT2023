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
        Schema::create('msadminpassword', function (Blueprint $table) {

            $table->integer('BinusianID', 11);
            $table->string('PasswordAdmin');
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
        Schema::dropIfExists('msadminpassword');
    }
};