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
			$table->string('fakultas')->nullable();
			$table->string('prodi')->nullable();
			$table->string('semester')->default('6');
			$table->string('unggah_krs')->nullable();
			$table->boolean('validasi_krs')->default(false);
			$table->string('unggah_keuangan')->nullable();
			$table->boolean('validasi_keuangan')->default(false);
			$table->string('unggah_ukt')->nullable();
			$table->boolean('validasi_ukt')->default(false);
			$table->string('sakit_berat')->nullable();
			$table->string('alergi')->nullable();
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
