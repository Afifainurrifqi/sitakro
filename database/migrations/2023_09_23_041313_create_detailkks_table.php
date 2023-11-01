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
        Schema::create('detailkks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idkk');

            $table->unsignedBigInteger('idpenduduk');

            $table->timestamps();
            $table->foreign('idkk')->references('id')->on('kks');
            $table->foreign('idpenduduk')->references('id')->on('datapenduduks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailkks');
    }
};
