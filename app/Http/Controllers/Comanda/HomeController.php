<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $dados["mesas"] = Mesa::get();
        return view("home", $dados);
    }
}
