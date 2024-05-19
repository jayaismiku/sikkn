<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerangkatDesaTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('perangkatdesa', function (Blueprint $table) {
			$table->id('perangkat_id');
			$table->string('nama_lengkap', 50);
			$table->enum('jabatan', ['Kepala Desa', 'Sekretaris Desa', 'Pegawai Desa', 'Kepala Dusun', 'Ketua RW', 'Ketua RT']);
			$table->string('telp', 15)->nullable();
			$table->unsignedBigInteger('desa_id')->nullable();
			$table->timestamps();

			$table->foreign('desa_id')->references('desa_id')->on('desa')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('perangkatdesa', function (Blueprint $table) {
			//
		});
	}
}
