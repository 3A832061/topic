<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSheetMusicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sheet__music', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('zhname');
            $table->string('composer');
            $table->string('arranger');
            $table->string('lost');
            $table->string('saveform');
            $table->string('authorize');
            $table->int('year');
            $table->int('price');
            $table->boolean('change');
            $table->boolean('check');
            $table->string('remark');
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
        Schema::dropIfExists('sheet__music');
    }
}
