<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_jadwal')->unsigned();
            $table->foreign('id_jadwal')->references('id')->on('jadwals')
                ->onDelete('cascade');

            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')
                ->onDelete('cascade');

            $table->string('foto',255);
            $table->enum('verifikasi',['Wait','Verifikasi']);
            $table->enum('status',['Masuk','Sakit','Alpha']);
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
        Schema::dropIfExists('absensi');
    }
}
