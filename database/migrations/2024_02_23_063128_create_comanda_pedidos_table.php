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
            $table->bigInteger('empresa_id')->nullable()->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas');

            $table->bigInteger('cliente_id')->nullable()->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');

            $table->bigInteger('comanda_id')->nullable()->unsigned();
            $table->foreign('comanda_id')->references('id')->on('comandas');

            $table->bigInteger('mesa_id')->nullable()->unsigned();
            $table->foreign('mesa_id')->references('id')->on('mesas');

            $table->BigInteger('status_id')->nullable()->unsigned();
            $table->foreign('status_id')->references('id')->on('statuses');

            $table->BigInteger('garcon_id')->nullable()->unsigned();
            $table->foreign('garcon_id')->references('id')->on('comanda_garcons');

            $table->BigInteger('admin_id')->nullable()->unsigned();
            $table->foreign('admin_id')->references('id')->on('comanda_admins');

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
