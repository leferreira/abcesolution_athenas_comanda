<?php

namespace App\Http\Controllers\Comanda;

use App\Http\Controllers\Controller;
use App\Models\Mesa;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkUserType:admin');
    }

    public function index(){
        $dados["mesas"] = Mesa::get();
        return view("Comanda.Admin.home", $dados);
    }
}
