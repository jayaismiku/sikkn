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
            $table->string('judul_laporan')->nullable();
            $table->enum('tipe_laporan', ['kemajuan', 'akhir', 'jurnal']);
            $table->string('unggah_file');
            $table->timestamp('tanggal_unggah')->nullable()->useCurrent();
            $table->boolean('validasi')->nullable()->default(false);
            $table->timestamp('tanggal_validasi')->nullable()->useCurrent();
            $table->unsignedBigInteger('kelompok_id')->nullable();

            $table->foreign('kelompok_id')->references('kelompok_id')->on('kelompok')->onDelete('cascade');
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
