<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryProdutoOpcao extends Model
{
    use HasFactory;
    protected $fillable =[
        'empresa_id',
        'produto_id',
        'opcao_id'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function opcao()
    {
        return $this->belongsTo(DeliveryOpcao::class);
    }
}

