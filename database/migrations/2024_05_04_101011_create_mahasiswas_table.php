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
			$table->id('mahasiswa_id');
			$table->unsignedBigInteger('nim')->unique();
			$table->string('nama_lengkap', 50)->nullable();
			$table->string('alamat')->nullable();
			$table->integer('kelurahan_id')->nullable()->default('26603');
			$table->integer('kecamatan_id')->nullable()->default('2458');
			$table->integer('kota_id')->nullable()->default('161');
			$table->integer('provinsi_id')->nullable()->default('12');
			$table->unsignedBigInteger('telp')->unique();
			$table->enum('fakultas', ['Fakultas Sains dan Teknologi', 'Fakultas Sosial Humaniora', 'Fakultas Enomoni dan Bisnis', 'Fakultas Agama Islam'])->nullable();
			$table->enum('prodi', ['TE', 'IF', 'TI', 'TP', 'FA', 'BIO', 'AGRI', 'ILKOM', 'PSI', 'KTF', 'AP', 'AKUN', 'MAN', 'PAI', 'PIAUD', 'HKI', 'KPI', 'EKSYAR'])->nullable();
			$table->enum('semester', ['1', '2', '3', '4', '5', '6', '7', '8'])->default('6');
			$table->string('unggah_krs')->nullable();
			$table->boolean('validasi_krs')->default(false);
			$table->string('unggah_keuangan')->nullable();
			$table->boolean('validasi_keuangan')->default(false);
			$table->string('unggah_ukt')->nullable();
			$table->boolean('validasi_ukt')->default(false);
			$table->string('sakit_berat')->nullable();
			$table->string('alergi')->default(false);
			$table->unsignedBigInteger('user_id')->nullable();

			$table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
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
