<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryItemPedido extends Model
{
    use HasFactory;
    protected $fillable = [
        'pedido_id', 'produto_id','opcao_id', 'opcao_item_id', 'quantidade', 'valor', 'subtotal', 'subtotal_liquido', 'desconto_percentual',
        'desconto_por_valor','desconto_por_unidade','total_desconto_item','observacao'
    ];

    public function produto(){
        return $this->belongsTo(Produto::class, 'produto_id');
    }

    public function opcao(){
        return $this->belongsTo(DeliveryOpcao::class, 'opcao_id');
    }

    public function opcaoItem(){
        return $this->hasMany(DeliveryOpcaoItem::class, 'opcao_item_id', 'id');
    }

    public function opcoes(){
        return $this->hasMany(DeliveryOpcaoEscolhida::class, 'item_pedido_id', 'id');
    }

    public function pedido(){
        return $this->belongsTo(DeliveryPedido::class, 'pedido_id');
    }

}
