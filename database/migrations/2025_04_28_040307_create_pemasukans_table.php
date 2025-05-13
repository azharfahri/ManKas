<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemasukans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipe')->default('pemasukan');
            $table->string('deskripsi');
            $table->integer('jumlah');
            $table->foreign('id_dana')->references('id')->on('danas')->onDelete('cascade');
            $table->unsignedBigInteger('id_dana');
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
        Schema::dropIfExists('pemasukan');
    }
};
