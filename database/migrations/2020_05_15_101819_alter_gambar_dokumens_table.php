<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterGambarDokumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gambardokumens', function (Blueprint $table) {
            $table->enum('extension', ['jpg', 'jpeg', 'png']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gambardokumens', function (Blueprint $table) {
            $table->dropColumn('extension');
        });
    }
}
