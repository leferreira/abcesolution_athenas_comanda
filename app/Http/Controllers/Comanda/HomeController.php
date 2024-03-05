<?php

namespace App\Http\Controllers\Comanda;

use App\Http\Controllers\Controller;

use App\Models\Mesa;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class HomeController extends Controller
{
    public function index(){
        $dados["mesas"] = Mesa::get();
        return view("Comanda.home", $dados);
    }


public function generateQrCode($productId)
{
    //$url = route('add.to.order', ['productId' => $productId]); // Certifique-se de que a rota esteja definida
    //return QrCode::size(300)->generate($url);
}
}
