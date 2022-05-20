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
        Schema::create('pelatih', function (Blueprint $table) {
            $table->id();
            $table->string("nama_pelatih", 100)->nullable();
            $table->enum("jenis_kelamin", ["L", "P"]);
            $table->integer("umur")->nullable();
            $table->string("no_hp", 50)->nullable();
            $table->text("alamat")->nullable();
            $table->string("foto")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelatih');
    }
};
