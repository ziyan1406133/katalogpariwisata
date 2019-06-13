<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLokasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('wilayah_id');
            $table->string('nama');
            $table->string('alamat');
            $table->mediumText('deskripsi_singkat')->nullable();
            $table->longText('deskripsi_detail')->nullable();
            $table->string('longitude');
            $table->string('latitude');
            $table->string('cover')->default('no_image.png');
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
        Schema::dropIfExists('lokasis');
    }
}
