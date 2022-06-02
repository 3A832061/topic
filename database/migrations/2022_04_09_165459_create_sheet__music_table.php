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
            $table->string('type');
            $table->string('name');
            $table->string('zhname')->nullable();
            $table->string('composer');
            $table->string('arranger')->nullable();
            $table->string('lost')->nullable();
            $table->string('saveform');
            $table->string('authorize')->nullable();
            $table->integer('year');
            $table->integer('price')->nullable();
            $table->boolean('change')->default(1);
            $table->boolean('check');
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
        Schema::dropIfExists('sheet__music');
    }
}
