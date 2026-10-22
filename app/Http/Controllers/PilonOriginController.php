<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PilonOriginRequest;
use App\Models\PilonOrigin;
use App\Models\LotsReception;
use App\Models\Pilon;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;   

class PilonOriginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pilon_origins = PilonOrigin::with(['lots_reception', 'pilon'])->get();
        return view("pilon_origins.index", compact("pilon_origins"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pilon_origin = new PilonOrigin();
        $lots_receptions = LotsReception::all();
        $pilons = Pilon::all();
        return view('pilon_origins.create', compact('pilon_origin', 'lots_receptions', 'pilons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PilonOriginRequest $request)
    {
        PilonOrigin::create($request->validated());
        return redirect()->route('pilon_origins.index')->with('success', 'Origen de pilón creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PilonOrigin $pilon_origin)
    {
        $pilon_origin = PilonOrigin::with(['lot_reception', 'pilon'])->findOrFail($pilon_origin->id);
        return view('pilon_origins.show', compact('pilon_origin'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pilon_origin = PilonOrigin::with(['lot_reception', 'pilon'])->findOrFail($id);
        $lots_receptions = LotsReception::all();
        $pilons = Pilon::all();
        return view('pilon_origins.edit', compact('pilon_origin', 'lots_receptions', 'pilons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PilonOriginRequest $request, string $id): RedirectResponse
    {
        $pilon_origin = PilonOrigin::with(['lot_reception', 'pilon'])->findOrFail($id);
        $pilon_origin->update($request->validated());
        return redirect()->route('pilon_origins.index')->with('success', 'Origen de pilón actualizado correctamente.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pilon_origin = PilonOrigin::with(['lot_reception', 'pilon'])->findOrFail($id);
        $pilon_origin->delete();
        return redirect()->route('pilon_origins.index')->with('success', 'Origen de pilón eliminado correctamente.');
    }
}
