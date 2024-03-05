<?php

namespace App\Http\Controllers\Comanda;

use App\Http\Controllers\Controller;

use App\Models\Mesa;
use App\Models\PedidoComanda;
use Illuminate\Http\Request;

class GarconController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkUserType:admin,garcon');
    }

    public function index(){
        $dados["mesas"] = Mesa::get();
        return view("Comanda.Garcon.home", $dados);
    }
}
