<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bap', function (Blueprint $table) {
            $table->id('bap_id');
            $table->string('pendamping_id');
            $table->string('unggah_surat');
            $table->boolean('validasi');

            $table->foreign('pendamping_id')->references('pendamping')->on('pendamping_id')->onDelete('ignore');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bap');
    }
}
