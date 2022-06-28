<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypekreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typekredits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->TEXT('keterangan');
            $table->string('gambar');
            $table->integer('kredit_id')->unsigned();
            $table->foreign('kredit_id')->references('id')->on('kredits');
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
        Schema::dropIfExists('typekredits');
    }
}
