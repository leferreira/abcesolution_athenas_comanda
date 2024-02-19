<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    public $fillable = ['id','uuid','razao_social', 'subdominio', 'pasta', 'cpf_cnpj','cep',
        'logradouro','numero','bairro','complemento','uf',
        'cidade','fone','email',
        'celular',
        'status_id',
        'status_assinatura_id',
        'plano_preco_id',
        "forma_pagto_id",
        'data_aquisicao',
        "valor_contrato",
        "data_vencimento",
        "tipo_recorrencia",
        "data_inicial_vencimento",
        "valor_recorrente",
        "dias_bloqueia",
        "configurado",
        "mostrar_pendencia",
        "logo"

    ];

    public function usuarios()
    {
        return $this->hasMany(User::class);
    }

}
