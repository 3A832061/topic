<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberMagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member__mags', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->string('part');
            $table->string('name');
            $table->string('class');
            $table->string('acc')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->boolean('pay')->nullable();
            $table->string('remark')->nullable();
            $table->string('pos');
            $table->boolean('now');
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
        Schema::dropIfExists('member__mags');
    }
}
