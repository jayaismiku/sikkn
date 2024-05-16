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
            $table->string('nama_desa', 50);
            $table->string('alamat');
            $table->integer('provinsi_id', 5)->default(12);
            $table->integer('kota_id', 5)->default(161);
            $table->integer('kecamatan_id', 10)->default(2458);
            $table->integer('kelurahan_id', 10)->default(26603);
            $table->string('longitude');
            $table->string('latitude');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->primary('desa_id');
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
