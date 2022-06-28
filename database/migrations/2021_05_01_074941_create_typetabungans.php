<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypetabungans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typetabungans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->text('keterangan');
            $table->string('gambar');
            $table->integer('tabungan_id')->unsigned();
            $table->foreign('tabungan_id')->references('id')->on('tabungans');
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
        Schema::dropIfExists('typetabungans');
    }
}
