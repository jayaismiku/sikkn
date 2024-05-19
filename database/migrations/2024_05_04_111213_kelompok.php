<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kelompok extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kelompok', function (Blueprint $table) {
			$table->id('kelompok_id');
			$table->string('nama_kelompok', 100)->nullable()->default('kkn-reg-xxx');
			$table->unsignedBigInteger('pendamping_id')->nullable();
			$table->unsignedBigInteger('pemonev_id')->nullable();

			// $table->foreign('pendamping_id')->references('pendamping_id')->on('pendamping')->onDelete('cascade');
			// $table->foreign('pemonev_id')->references('pemonev_id')->on('pemonev')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('kelompok');
	}
}
