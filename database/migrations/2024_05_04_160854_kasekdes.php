<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kasekdes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasekdes', function (Blueprint $table) {
            $table->id('kasekdes_id');
            $table->string('user_id');
            $table->string('desa_id');
            $table->string('nama_lengkap', 50);
            $table->enum('jabatan', ['Kepala Desa', 'Sekretaris Desa', 'Kepala Dusun']);
            $table->integer('no_telp', 15);
            $table->timestamps();

            $table->foreign('user_id')->references('users')->on('user_id')->onDelete('cascade');
            $table->foreign('desa_id')->references('desa')->on('desa_id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kasekdes');
    }
}
