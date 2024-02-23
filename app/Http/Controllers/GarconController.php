<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use App\Models\PedidoComanda;
use Illuminate\Http\Request;

class GarconController extends Controller
{
    public function index(){
        $dados["mesas"] = Mesa::get();
        return view("Garcon.home", $dados);
    }
}
