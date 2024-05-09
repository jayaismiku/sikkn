<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->integer('nim', 10)->primary();
            $table->string('user_id', 20);
            $table->string('phone', 13)()->unique();
            $table->string('nama', 50);
            $table->string('alamat', 100);
            $table->string('kelurahan', 100);
            $table->string('kecamatan', 100);
            $table->string('provinsi', 100);
            $table->enum('semester', ['1', '2', '3', '4', '5', '6', '7', '8'])->default('6');
            $table->enum('prodi', ['TE', 'IF', 'TI', 'TP', 'FA', 'BIO', 'AGRI', 'ILKOM', 'PSI', 'KTF', 'AP', 'AKUN', 'MAN', 'PAI', 'PIAUD', 'HKI', 'KPI', 'EKSYAR']);
            $table->boolean('krs')->default(0);
            $table->string('unggah_krs');
            $table->boolean('keuangan')->default(0);
            $table->string('unggah_keuangan');

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
        Schema::dropIfExists('mahasiswa');
    }
}
