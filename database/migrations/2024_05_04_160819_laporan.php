<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Laporan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id('laporan_id');
            $table->string('kelompok_id');
            $table->enum('tipe_laporan', ['kemajuan', 'akhir', 'jurnal']);
            $table->string('unggah_file');
            $table->boolean('validasi')->nullable()->default(false);
            $table->timestamps();


            $table->foreign('kelompok_id')->references('kelompok')->on('kelompok_id')->onDelete('ignore');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan');
    }
}
