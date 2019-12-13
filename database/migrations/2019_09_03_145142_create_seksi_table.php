<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('dinas_id')->unsigned()->after('id');
            $table->foreign('dinas_id')->references('id')->on('seksi');
            $table->integer('bidang_id')->unsigned()->after('dinas_id');
            $table->foreign('bidang_id')->references('id')->on('seksi');
            $table->string('nama_seksi');
            $table->string('kepala_seksi');
            $table->timestamps();
        });
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
        Schema::dropIfExists('seksi');
    }
}
