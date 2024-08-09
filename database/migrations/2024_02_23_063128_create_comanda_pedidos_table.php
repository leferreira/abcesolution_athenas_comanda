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
        Schema::create('comanda_pedidos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('empresa_id')->nullable();

            $table->bigInteger('cliente_id')->nullable();

            $table->bigInteger('comanda_id')->nullable();

            $table->bigInteger('mesa_id')->nullable();

            $table->BigInteger('status_id')->nullable();

            $table->BigInteger('garcon_id')->nullable();

            $table->BigInteger('admin_id')->nullable();

            $table->string('online',1)->default('N');
            $table->integer('tipo_pedido'); //1 - Mesa / 2 - cliente mesa / 3 - Delivery
            $table->date('data_abertura')->nullable();
            $table->time('hora_abertura')->nullable();

            $table->date('data_fechamento')->nullable();
            $table->time('hora_fechamento')->nullable();


            $table->string("identificacao", 80)->nullable();
            $table->decimal("total", 10,2)->nullable();
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
        Schema::dropIfExists('comanda_pedidos');
    }
};
