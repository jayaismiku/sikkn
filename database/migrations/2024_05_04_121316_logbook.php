<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Logbook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logbook', function (Blueprint $table) {
            $table->id('logbook_id');
            $table->string('nama_kegiatan', 100)->nullable();
            $table->timestamp('tanggal_kegiatan')->nullable()->useCurrent();
            $table->text('deskripsi_kegiatan')->nullable();
            $table->string('foto_kegiatan')->nullable()->default(false);
            $table->boolean('validasi')->default(false);
            $table->timestamp('tanggal_validasi')->nullable()->useCurrent();
            $table->unsignedBigInteger('nim')->nullable();

            $table->foreign('nim')->references('nim')->on('mahasiswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logbook');
    }
}
