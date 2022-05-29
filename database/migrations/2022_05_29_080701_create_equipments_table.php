<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('number')->nullable();  //編號
            $table->string('name');
            $table->string('spec')->nullable(); //規格
            $table->string('supplier')->nullable();     //供應商
            $table->string('supplier_tel')->nullable();     //供應商聯絡方式
            $table->integer('price')->nullable();
            $table->integer('quan');        //數量
            $table->date('pur_date')->nullable();   //購買日期
            $table->string('pur_person')->nullable();
            $table->date('check_date')->nullable();     //最近清點日期
            $table->string('check_person')->nullable();
            $table->string('state');        //目前狀態
            $table->string('remark')->nullable();
            $table->string('location');
            $table->boolean('out_loan');    //是否可外借
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
        Schema::dropIfExists('equipments');
    }
}
