<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LotsReception;
use App\Http\Requests\LotsReceptionRequest;

class LotsReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lotsReceptions = LotsReception::orderByDesc("id")->get();
        return view("lots_receptions.index", compact("lotsReceptions"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lotReception = new LotsReception();
        return view("lots_receptions.create", compact("lotReception"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LotsReceptionRequest $request)
    {
        LotsReception::create($request->validated());
        return redirect()->route("lots_reception.index")->with("success", "La recepción de lote se ha creado correctamente.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lotReception = LotsReception::findOrFail($id);
        return view("lots_reception.show", compact("lotReception"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lotReception = LotsReception::findOrFail($id);
        return view("lots_reception.edit", compact("lotReception"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LotsReceptionRequest $request, LotsReception $lotReception)
    {
        $lotReception->update($request->validated());
        return redirect()->route("lots_reception.index")->with("success", "La recepción de lote se ha actualizado correctamente.");
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lotReception = LotsReception::findOrFail($id);
        $lotReception->delete();
        return redirect()->route("lots_reception.index")->with("success", "La recepción de lote se ha eliminado correctamente.");
    }
}