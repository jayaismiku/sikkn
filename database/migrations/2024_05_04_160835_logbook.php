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
            $table->string('kelompok_id');
            $table->string('nama_kegiatan', 100);
            $table->text('deskripsi');
            $table->string('foto_kegiatan')->nullable()->default(false);
            $table->boolean('validasi')->default(false);
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
        Schema::dropIfExists('logbook');
    }
}
