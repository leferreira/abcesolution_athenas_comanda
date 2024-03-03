<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryPedido extends Model
{
    use HasFactory;
    protected $fillable = [
        'empresa_id','cliente_id', 'endereco_id', 'status_id','status_entrega_id','status_financeiro_id', 'forma_pagto_id',
        'data_pedido', 'valor_venda', 'valor_liquido', 'valor_entrega', 'desconto_valor', 'desconto_per'
    ];

    public function itens(){
        return $this->hasMany(DeliveryItemPedido::class, 'pedido_id', 'id');
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function status(){
        return $this->belongsTo(Status::class, 'status_id');
    }
}
