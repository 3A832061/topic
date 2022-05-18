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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('year')->nullable(); //屆別
            $table->string('part')->nullable(); //聲部別
            $table->string('class')->nullable();
            $table->string('acc')->nullable(); //學號
            $table->string('phone')->nullable();
            $table->boolean('pay')->nullable();
            $table->string('remark')->nullable();
            $table->string('pos')->nullable(); //職位
            $table->boolean('now')->nullable(); //現在是否為社員
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('users');
    }
};
