<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bap', function (Blueprint $table) {
            $table->id('bap_id');
            $table->string('nama_bap')->nullable();
            $table->string('unggah_surat')->nullable();
            $table->timestamp('tanggal_unggah')->nullable()->useCurrent();
            $table->boolean('validasi')->nullable();
            $table->timestamp('tanggal_validasi')->nullable()->useCurrent();
            $table->unsignedBigInteger('pendamping_id')->nullable;

            $table->foreign('pendamping_id')->references('pendamping_id')->on('pendamping')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bap');
    }
}
