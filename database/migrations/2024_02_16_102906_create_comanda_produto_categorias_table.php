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
        Schema::create('comanda_produto_categorias', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('empresa_id')->nullable()->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas');

            $table->BigInteger('produto_id')->nullable()->unsigned();
            $table->foreign('produto_id')->references('id')->on('produtos');

            $table->BigInteger('categoria_id')->nullable()->unsigned();
            $table->foreign('categoria_id')->references('id')->on('comanda_categorias');

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
        Schema::dropIfExists('comanda_produto_categorias');
    }
};
