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
            $table->integer('nim', 12)->primary();
            $table->string('user_id', 20)->nullable();
            $table->string('nama_depan', 50)->nullable();
            $table->string('nama_belakang', 50)->nullable();
            $table->string('telp', 13)()->unique();
            $table->string('alamat', 100)->nullable();
            $table->integer('provinsi', 100)->nullable()->default(12);
            $table->integer('kota', 100)->nullable()->default(161);
            $table->integer('kecamatan', 100)->nullable()->default(2458);
            $table->integer('kelurahan', 100)->nullable()->default(26603);
            $table->enum('fakultas', ['Fakultas Sains dan Teknologi', 'Fakultas Sosial Humaniora', 'Fakultas Enomoni dan Bisnis', 'Fakultas Agama Islam'])->nullable();
            $table->enum('prodi', ['TE', 'IF', 'TI', 'TP', 'FA', 'BIO', 'AGRI', 'ILKOM', 'PSI', 'KTF', 'AP', 'AKUN', 'MAN', 'PAI', 'PIAUD', 'HKI', 'KPI', 'EKSYAR'])->nullable();
            $table->enum('semester', ['1', '2', '3', '4', '5', '6', '7', '8'])->default('6');
            $table->boolean('krs')->default(true);
            $table->string('unggah_krs')->nullable();
            $table->boolean('keuangan')->default(true);
            $table->string('unggah_keuangan')->nullable();

            $table->foreign('user_id')->references('user_id')->on('users');
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