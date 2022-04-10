<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('type');
            $table->string('manu')->nullable();
            $table->string('manu_tel')->nullable();
            $table->string('spec')->nullable();
            $table->integer('quan');
            $table->date('purdate')->nullable();
            $table->integer('price')->nullable();
            $table->string('location');
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
        Schema::dropIfExists('equipment');
    }
}
