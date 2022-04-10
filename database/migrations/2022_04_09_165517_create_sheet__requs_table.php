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
            $table->string('part');
            $table->string('page');
            $table->integer('num_page')->default(1);
            $table->integer('quan')->default(1);
            $table->string('remark')->nullable();
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
