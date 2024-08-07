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
        Schema::create('datapenduduks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('nik');
            $table->string('gelarawal');
            $table->string('nama');
            $table->string('gelarakhir');
            $table->boolean('jenis_kelamin');
            $table->string('tempat_lahir')->nullable();;
            $table->date('tanggal_lahir');
            $table->unsignedBigInteger('agama_id');
            $table->unsignedBigInteger('pendidikan_id');
            $table->unsignedBigInteger('pekerjaan_id');
            $table->unsignedBigInteger('goldar_id');
            $table->unsignedBigInteger('status_id');
            $table->date('tanggal_perkawinan')->nullable();
            $table->string('hubungan');
            $table->string('ayah')->nullable();
            $table->string('ibu')->nullable();
            $table->string('alamat')->nullable();
            $table->integer('rt');
            $table->integer('rw');
            $table->string('datak');
            $table->string('data_lain')->nullable();
            $table->timestamps();


            $table->foreign('agama_id')->references('id')->on('agamas');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pendidikan_id')->references('id')->on('pendidikans');
            $table->foreign('pekerjaan_id')->references('id')->on('pekerjaans');
            $table->foreign('goldar_id')->references('id')->on('goldars');
            $table->foreign('status_id')->references('id')->on('statuses');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datapenduduks');
    }
};
