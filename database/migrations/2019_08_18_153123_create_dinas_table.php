<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dinas', function (Blueprint $table) {
            $table->bigIncrements('id_bidang');
            $table->integer('id')->unsigned()->after('id_bidang');
            $table->foreign('id')->references('id_bidang')->on('bidang');
            $table->string('nama_dinas');
            $table->string('kepala_dinas');
            $table->text('alamat');
            $table->string('email');
            $table->integer('no_telepon');
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
        Schema::dropIfExists('dinas');
    }
}
