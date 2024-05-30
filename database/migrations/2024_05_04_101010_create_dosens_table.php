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
			$table->id('dosen_id');
			$table->string('nidn')->unsigned()->nullable();
			$table->string('nip')->unsigned()->nullable();
			$table->string('nama_lengkap')->nullable();
			$table->string('gelar_depan')->nullable();
			$table->string('gelar_belakang')->nullable();
			$table->string('pangkat')->nullable()->default('Penata Muda Tk.I');
			$table->string('golongan')->nullable()->default('III/B');
			$table->string('fakultas')->nullable();
			$table->string('prodi')->nullable();
			$table->string('telp')->nullable();
			$table->string('alamat')->nullable();
			$table->integer('kelurahan_id')->nullable()->default('26603');
			$table->integer('kecamatan_id')->nullable()->default('2458');
			$table->integer('kota_id')->nullable()->default('161');
			$table->integer('provinsi_id')->nullable()->default('12');
			$table->unsignedBigInteger('user_id')->nullable();

			$table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
			$table->foreign('fakultas')->references('kode_fakultas')->on('fakultas')->onDelete('cascade');
			$table->foreign('prodi')->references('kode_prodi')->on('prodi')->onDelete('cascade');
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
