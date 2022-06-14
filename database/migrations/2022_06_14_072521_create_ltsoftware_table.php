<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ltsoftware', function (Blueprint $table) {
            $table->integer('SoftwareID', 11);
            $table->string('SoftwareName');
            $table->string('SoftwareImage');
            $table->string('SoftwareDescription');
            $table->string('SoftwareUrl');
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