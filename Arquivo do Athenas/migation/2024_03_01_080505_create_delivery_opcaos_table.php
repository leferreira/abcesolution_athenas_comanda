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
        Schema::create('delivery_opcaos', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('tipo_id')->nullable()->unsigned();
            $table->foreign('tipo_id')->references('id')->on('delivery_tipo_selecaos');
            $table->string('nome', 90);
            $table->integer("qtde_min")->default(0);
            $table->integer("qtde_max")->default(0);
            $table->integer("qtde_obrigatoria")->default(0);
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
        Schema::dropIfExists('delivery_opcaos');
    }
};
