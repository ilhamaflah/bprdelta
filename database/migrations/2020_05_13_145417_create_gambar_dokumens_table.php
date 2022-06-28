<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGambarDokumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gambardokumens', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('dokumen_id')->unsigned();
            $table->foreign('dokumen_id')->references('id')->on('dokumens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gambardokumens');
    }
}
