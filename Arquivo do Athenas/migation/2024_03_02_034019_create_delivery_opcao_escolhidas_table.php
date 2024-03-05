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
        Schema::create('delivery_opcao_escolhidas', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('pedido_id')->unsigned();
            $table->foreign('pedido_id')->references('id')->on('comanda_pedidos');

            $table->BigInteger('item_pedido_id')->unsigned();
            $table->foreign('item_pedido_id')->references('id')->on('delivery_item_pedidos');

            $table->BigInteger('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id')->on('produtos');

            $table->BigInteger('opcao_id')->nullable()->unsigned();
            $table->foreign('opcao_id')->references('id')->on('delivery_opcaos');

            $table->BigInteger('opcao_item_id')->nullable()->unsigned();
            $table->foreign('opcao_item_id')->references('id')->on('delivery_opcao_items');

            $table->integer('quantidade');
            $table->decimal('valor', 10,2)->nullable();
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
        Schema::dropIfExists('delivery_opcao_escolhidas');
    }
};
