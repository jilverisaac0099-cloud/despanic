<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LotReception;    
use App\Http\Requests\LotReceptionRequest;

class LotReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lotsReceptions = LotReception::orderByDesc("id")->get();
        return view("lot_receptions.index", compact("lotsReceptions"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lotReception = new LotReception();
        return view("lot_receptions.create", compact("lotReception"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LotReceptionRequest $request)
    {
        LotReception::create($request->validated());
        return redirect()->route("lots_reception.index")->with("success", "La recepción de lote se ha creado correctamente.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lotReception = LotReception::findOrFail($id);
        return view("lots_reception.show", compact("lotReception"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lotReception = LotReception::findOrFail($id);
        return view("lots_reception.edit", compact("lotReception"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LotReceptionRequest $request, LotReception $lotReception)
    {
        $lotReception->update($request->validated());
        return redirect()->route("lots_reception.index")->with("success", "La recepción de lote se ha actualizado correctamente.");
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lotReception = LotReception::findOrFail($id);
        $lotReception->delete();
        return redirect()->route("lots_reception.index")->with("success", "La recepción de lote se ha eliminado correctamente.");
    }
}