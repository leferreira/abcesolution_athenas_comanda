<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoComanda extends Model
{
    use HasFactory;
    protected $fillable =[
        'empresa_id',
        'pedido_id',
        'comanda_id',
        'mesa_id',
        'status_id',
        'vendedor_id',
        'data_abertura',
        'hora_abertura',
        'data_fechamento',
        'hora_fechamento',
        'identificacao',
        'total',
    ];

    public function vendedor(){
        return $this->belongsTo(Vendedor::class);
    }

    public function mesa(){
        return $this->belongsTo(Mesa::class);
    }

    public function itens(){
        return $this->hasMany(ItemPedidoComanda::class, 'pedido_id', 'id');
    }

    public static function somarTotal($id){
        $pedido             = PedidoComanda::find($id);
        $pedido->total      = ItemPedidoComanda::where("pedido_id", $id)->sum("subtotal");
        $pedido->save();
    }
}
