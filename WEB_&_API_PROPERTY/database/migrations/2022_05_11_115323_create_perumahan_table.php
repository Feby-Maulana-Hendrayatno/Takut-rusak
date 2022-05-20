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
        Schema::create('perumahan', function (Blueprint $table) {
            $table->id();
            $table->string("nama_perumahan")->nullable();
            $table->string("alamat")->nullable();
            $table->string("stok")->nullable();
            $table->string("uraian")->nullable();
            $table->string("foto")->nullable();
            $table->string("id_user")->nullable();
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
        Schema::dropIfExists('perumahan');
    }
};
