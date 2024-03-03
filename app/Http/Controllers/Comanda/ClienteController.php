<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(){
        $dados["mesas"] = Mesa::get();
        return view("home", $dados);
    }

    public function create(){

        return view("Cliente.Create");
    }
}
