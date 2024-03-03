<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryProdutoCategoria extends Model
{
    use HasFactory;
    protected $fillable =[
        'empresa_id',
        'produto_id',
        'categoria_id',
    ];

    public function produto(){
        return $this->belongsTo(Produto::class);
    }

    public function categoria(){
        return $this->belongsTo(DeliveryCategoria::class);
    }
}
