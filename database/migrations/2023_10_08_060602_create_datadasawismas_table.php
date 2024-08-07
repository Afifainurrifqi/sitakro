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
        Schema::create('datadasawismas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('datapenduduk_id');
            $table->string('nama_kelompok');
            $table->timestamps();
            $table->foreign('datapenduduk_id')->references('id')->on('datapenduduks');
        });

        Schema::table('datadasawismas', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->string('email');
            $table->string('password');
            $table->string('role');

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datadasawismas');
    }
};

