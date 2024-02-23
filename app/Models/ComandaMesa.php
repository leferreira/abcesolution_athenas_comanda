<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComandaMesa extends Model
{
    use HasFactory;
    protected $fillable = [
        'mesa_id', "comanda_id",
    ];

    public function mesa(){
        return $this->belongsTo(Produto::class);
    }

    public function comanda(){
        return $this->belongsTo(Comanda::class);
    }
}
