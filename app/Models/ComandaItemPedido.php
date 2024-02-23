<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComandaItemPedido extends Model
{
    use HasFactory;
    protected $fillable = [
        'produto_id', "pedido_id", 'quantidade', 'valor', 'subtotal', 'status_id',

    ];

    public function produto(){
        return $this->belongsTo(Produto::class);
    }

    public function pedido(){
        return $this->belongsTo(ComandaPedido::class);
    }


}
