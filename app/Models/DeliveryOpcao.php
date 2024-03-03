<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryOpcao extends Model
{
    use HasFactory;
    protected $fillable =[
        'tipo_id',
        'nome',
        'qtde_item_obrigatorio'
    ];

    public function tipo()
    {
        return $this->belongsTo(DeliveryTipoSelecao::class);
    }

    public function itens(){
        return $this->hasMany(DeliveryOpcaoItem::class, 'opcao_id', 'id');
    }

}
