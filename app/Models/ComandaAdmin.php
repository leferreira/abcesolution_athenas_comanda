<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComandaAdmin extends Model
{
    use HasFactory;

    public function comandaUsuario()
    {
        return $this->belongsTo(ComandaUsuario::class);
    }
}
