<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengelompokanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengelompokan', function (Blueprint $table) {
            $table->id('pengelompokan_id');
            $table->unsignedInteger('nim');
            $table->boolean('ketua_kelompok')->nullable()->default(false);
            $table->unsignedBigInteger('kelompok_id');

            // $table->foreign('kelompok_id')->references('kelompok_id')->on('kelompok')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengelompokan', function (Blueprint $table) {
            //
        });
    }
}
