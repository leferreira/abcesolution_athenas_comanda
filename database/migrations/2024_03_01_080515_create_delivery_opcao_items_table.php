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
        Schema::create('delivery_opcao_items', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('opcao_id')->nullable()->unsigned();
            $table->foreign('opcao_id')->references('id')->on('delivery_opcaos');

            $table->string('nome', 90);
            $table->decimal('preco_adicional', 10, 2)->nullable()->default(0.00);
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
        Schema::dropIfExists('delivery_opcao_items');
    }
};
