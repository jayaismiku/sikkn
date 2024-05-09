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
            $table->integer('nidn', 10)->primary();
            $table->integer('nip', 15)->unique();
            $table->string('user_id', 20);
            $table->string('nama_dosen', 50);
            $table->string('gelar_depan', 20);
            $table->string('gelar_belakang', 50);
            $table->string('alamat', 100);
            $table->string('kelurahan', 100);
            $table->string('kecamatan', 100);
            $table->string('provinsi', 100);
            $table->integer('no_telp', 15)->unique();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('ignore');
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
