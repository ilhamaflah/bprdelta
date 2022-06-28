<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('judul', '200');
            $table->longtext('deskripsi');
            $table->datetime('tanggal');
            $table->integer('user_id')->unsigned();
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
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('judul');
            $table->dropColumn('deskripsi');
            $table->dropColumn('tanggal');
            $table->dropColumn('pegawai_id');
            $table->dropColumn('gambar_id');
        });
    }
}
