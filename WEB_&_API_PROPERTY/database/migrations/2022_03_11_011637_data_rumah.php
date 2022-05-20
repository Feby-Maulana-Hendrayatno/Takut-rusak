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
        Schema::create('rumah', function (Blueprint $table) {
            $table->id();
            $table->string("image_url");
            $table->string("nama_rumah");
            $table->text("deskripsi");
            $table->string("harga");
            $table->string("alamat");
            $table->string("kontak");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
