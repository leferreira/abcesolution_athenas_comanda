<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComandaCozinha extends Model
{
    use HasFactory;
    protected $fillable =[
        'empresa_id',
        'usuario_id',
        'nome',
        'email',
    ];

    public function usuario()
    {
        return $this->belongsTo(ComandaUsuario::class);
    }
}
