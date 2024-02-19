<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComandaCategoria extends Model
{
    use HasFactory;
    protected $fillable =[
        'empresa_id',
        'status_id',
        'imagem',
        'categoria',
    ];

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'comanda_produto_categorias', 'categoria_id', 'produto_id');
    }

}
