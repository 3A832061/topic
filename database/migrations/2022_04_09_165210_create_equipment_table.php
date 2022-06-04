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
            $table->string('type');
            $table->string('number')->nullable();
            $table->string('name');
            $table->string('spec')->nullable();
            $table->string('supplier')->nullable();
            $table->string('supplier_tel')->nullable();
            $table->integer('price')->nullable();
            $table->integer('quan');
            $table->date('pur_date')->nullable();
            $table->string('pur_person')->nullable();
            $table->date('check_date')->nullable();
            $table->string('check_person')->nullable();
            $table->string('state');
            $table->string('remark')->nullable();
            $table->string('location');
            $table->boolean('out_loan');
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
