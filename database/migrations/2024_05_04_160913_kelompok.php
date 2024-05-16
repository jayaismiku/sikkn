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
            $table->string('nama_kelompok', 100)->nullable()->default('text');
            $table->integer('nim', 15)->unique();
            $table->boolean('ketua_kelompok')->nullable()->default(false);
            $table->string('pendamping_id');
            $table->string('desa_id');            
            $table->timestamps();

            $table->foreign('nim')->references('mahasiswa')->on('nim')->onDelete('cascade');
            $table->foreign('pendamping_id')->references('pendamping')->on('pendamping_id')->onDelete('cascade');
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
        Schema::dropIfExists('kelompok');
    }
}
