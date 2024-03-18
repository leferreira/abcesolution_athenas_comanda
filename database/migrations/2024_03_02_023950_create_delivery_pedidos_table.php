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
        Schema::create('delivery_pedidos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('empresa_id')->nullable()->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas');

            $table->BigInteger('cliente_id')->nullable()->unsigned();
            $table->foreign('cliente_id')->references('id')->on('comanda_clientes');

            $table->BigInteger('endereco_id')->nullable()->unsigned();
            $table->foreign('endereco_id')->references('id')->on('endereco_clientes');

            $table->BigInteger('status_id')->nullable()->unsigned();
            $table->foreign('status_id')->references('id')->on('statuses');

            $table->BigInteger('status_entrega_id')->nullable()->unsigned();
            $table->foreign('status_entrega_id')->references('id')->on('status_entregas');

            $table->BigInteger('status_financeiro_id')->nullable()->unsigned();
            $table->foreign('status_financeiro_id')->references('id')->on('statuses');

            $table->BigInteger('forma_pagto_id')->nullable()->unsigned();
            $table->foreign('forma_pagto_id')->references('id')->on('forma_pagtos');


            $table->date('data_pedido')->nullable();

            $table->decimal('valor_venda', 10,2)->nullable();
            $table->decimal('valor_liquido', 10,2)->nullable();
            $table->decimal('valor_entrega', 10,2)->nullable();
            $table->decimal('desconto_valor', 10,2)->nullable();
            $table->decimal('desconto_per', 10,2)->nullable();
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
        Schema::dropIfExists('delivery_pedidos');
    }
};
