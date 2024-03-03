<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $dados["mesas"] = Mesa::get();
        return view("Admin.home", $dados);
    }
}
