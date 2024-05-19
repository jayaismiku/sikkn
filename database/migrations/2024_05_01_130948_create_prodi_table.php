<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodi', function (Blueprint $table) {
            $table->id('prodi_id');
            $table->string('kode_prodi')->unique();
            $table->string('nama_prodi')->nullable();
            $table->string('kaprodi')->nullable();
            $table->string('sekprodi')->nullable();
            $table->string('fakultas')->nullable();

            $table->foreign('fakultas')->references('kode_fakultas')->on('fakultas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prodi');
    }
}
