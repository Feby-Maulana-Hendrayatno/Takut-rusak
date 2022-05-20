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
        Schema::create('deskripsi_rumah', function (Blueprint $table) {
            $table->id();
            $table->string("type");
            $table->integer("harga");
            $table->string("kusen");
            $table->string("pintu");
            $table->string("jendela");
            $table->string("plafond");
            $table->string("air");
            $table->string("listrik");
            $table->string("pondasi");
            $table->string("dinding");
            $table->string("lantai");
            $table->string("atap");
            $table->string("wc");
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
        Schema::dropIfExists('table_deskripsi_rumah');
    }
};
