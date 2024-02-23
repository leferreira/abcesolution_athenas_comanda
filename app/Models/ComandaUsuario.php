<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ComandaUsuario extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['empresa_id', 'nome', 'email', 'password'];

    public function cliente()
    {
        return $this->hasOne(ComandaCliente::class, "usuario_id");
    }

    public function garcon()
    {
        return $this->hasOne(ComandaGarcon::class, "usuario_id");
    }

    public function admin()
    {
        return $this->hasOne(ComandaAdmin::class, "usuario_id");
    }

    public function cozinha()
    {
        return $this->hasOne(ComandaCozinha::class, "usuario_id");
    }

}
