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
        Schema::create('item_pedido_comandas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pedido_id')->unsigned();
            $table->foreign('pedido_id')->references('id')->on('pedido_comandas');

            $table->BigInteger('status_id')->nullable()->unsigned();
            $table->foreign('status_id')->references('id')->on('statuses');

            $table->BigInteger('produto_id')->nullable()->unsigned();
            $table->foreign('produto_id')->references('id')->on('produtos');

            $table->decimal('quantidade', 10,3);
            $table->decimal('valor', 10,2);
            $table->decimal('subtotal', 10,2);
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
        Schema::dropIfExists('item_pedido_comandas');
    }
};
