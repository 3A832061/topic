<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSheetRequsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sheet__requs', function (Blueprint $table) {
            $table->id();
            $table->string('mem_name');
            $table->string('name');
            $table->integer('part');
            $table->string('page');
            $table->string('num_page');
            $table->int('quan');
            $table->string('remark');
            $table->boolean('state');
            $table->date('day');
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
        Schema::dropIfExists('sheet__requs');
    }
}
