<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHisEvasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('his__evas', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->string('title');
            $table->string('file');
            $table->string('remark')->nullable();
            $table->string('pin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('his__evas');
    }
}
