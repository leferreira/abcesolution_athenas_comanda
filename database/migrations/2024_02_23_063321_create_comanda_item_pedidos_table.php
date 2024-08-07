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
        Schema::create('comanda_item_pedidos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pedido_id')->unsigned();

            $table->BigInteger('status_id')->nullable()->unsigned();

            $table->BigInteger('produto_id')->nullable()->unsigned();

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
        Schema::dropIfExists('comanda_item_pedidos');
    }
};
