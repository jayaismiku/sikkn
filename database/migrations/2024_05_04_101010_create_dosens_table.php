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
			$table->integer('nidn')->unsigned()->nullable();
			$table->integer('nip')->unsigned()->nullable();
			$table->string('nama_lengkap')->nullable();
			$table->string('gelar_depan')->nullable();
			$table->string('gelar_belakang')->nullable();
			$table->string('pangkat')->nullable()->default('Penata Muda Tk.I');
			$table->string('golongan')->nullable()->default('III/B');
			$table->enum('fakultas', ['Fakultas Sains dan Teknologi', 'Fakultas Sosial Humaniora', 'Fakultas Enomoni dan Bisnis', 'Fakultas Agama Islam'])->nullable();
			$table->enum('prodi', ['TE', 'IF', 'TI', 'TP', 'FA', 'BIO', 'AGRI', 'ILKOM', 'PSI', 'KTF', 'AP', 'AKUN', 'MAN', 'PAI', 'PIAUD', 'HKI', 'KPI', 'EKSYAR'])->nullable();
			$table->integer('telp')->nullable();
			$table->string('alamat')->nullable();
			$table->integer('kelurahan_id')->nullable()->default('26603');
			$table->integer('kecamatan_id')->nullable()->default('2458');
			$table->integer('kota_id')->nullable()->default('161');
			$table->integer('provinsi_id')->nullable()->default('12');
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
		Schema::dropIfExists('dosen');
	}
}