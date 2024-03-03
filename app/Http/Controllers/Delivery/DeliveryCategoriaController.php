<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\ComandaCategoria;
use App\Models\DeliveryCategoria;
use App\Models\DeliveryProdutoCategoria;
use Illuminate\Http\Request;

class DeliveryCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dados["categoria"]    = DeliveryCategoria::find($id);
        $dados["categorias"]   = DeliveryCategoria::get();
        $dados["produtos"]     = DeliveryProdutoCategoria::where("categoria_id", $id)->limit(15)->get();
        return view("Delivery.Categoria.Index", $dados);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
