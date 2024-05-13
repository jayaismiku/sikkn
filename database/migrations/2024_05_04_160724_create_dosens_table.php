<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosen', function (Blueprint $table) {
            $table->integer('nidn', 10)->primary();
            $table->integer('nip', 15)->unique()->nullable();
            $table->string('user_id', 20)->nullable();
            $table->string('nama_depan', 50)->nullable();
            $table->string('nama_belakang', 50)->nullable();
            $table->string('gelar_depan', 20)->nullable();
            $table->string('gelar_belakang', 50)->nullable();
            $table->string('pangkat')->nullable()->default('Penata Muda Tk.1');
            $table->string('golongan')->nullable()->default('III/b');
            $table->enum('fakultas', ['Fakultas Sains dan Teknologi', 'Fakultas Sosial Humaniora', 'Fakultas Enomoni dan Bisnis', 'Fakultas Agama Islam'])->nullable();
            $table->enum('prodi', ['TE', 'IF', 'TI', 'TP', 'FA', 'BIO', 'AGRI', 'ILKOM', 'PSI', 'KTF', 'AP', 'AKUN', 'MAN', 'PAI', 'PIAUD', 'HKI', 'KPI', 'EKSYAR'])->nullable();
            $table->integer('telp', 15)->nullable()->unique();
            $table->string('alamat')->nullable();
            $table->integer('provinsi_id', 5)->default(12);
            $table->integer('kota_id', 5)->default(161);
            $table->integer('kecamatan_id', 10)->default(2458);
            $table->integer('kelurahan_id', 10)->default(26603);

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
        Schema::dropIfExists('dosen');
    }
}
