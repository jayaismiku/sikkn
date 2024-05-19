<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('desa', function (Blueprint $table) {
			$table->id('desa_id');
			$table->string('nama_desa', 50)->nullable();
			$table->string('alamat')->nullable();
			$table->integer('kelurahan_id')->nullable()->default('26603');
			$table->integer('kecamatan_id')->nullable()->default('2458');
			$table->integer('kota_id')->nullable()->default('161');
			$table->integer('provinsi_id')->nullable()->default('12');
			$table->string('longitude')->nullable();
			$table->string('latitude')->nullable();
			$table->boolean('status')->default(true);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('desa');
	}
}
