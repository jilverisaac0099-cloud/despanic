<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\DryingReceptionRequest;
use App\Models\DryingReception;
use App\Models\DestemmingClousure;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;   

class DryingReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drying_receptions = DryingReception::with(['destemming_clousure'])->get();
        return view("drying_receptions.index", compact("drying_receptions"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $drying_reception = new DryingReception();
        $destemming_clousures = DestemmingClousure::all();
        return view('drying_receptions.create', compact('drying_reception', 'destemming_clousures'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DryingReceptionRequest $request)
    {
        DryingReception::create($request->validated());
        return redirect()->route('drying_receptions.index')->with('success', 'Recepción de secado creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DryingReception $drying_reception)
    {
        $drying_reception = DryingReception::with(['destemming_clousure'])->findOrFail($drying_reception->id);
        return view('drying_receptions.show', compact('drying_reception'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $drying_reception = DryingReception::with(['destemming_clousure'])->findOrFail($id);
        $destemming_clousures = DestemmingClousure::all();
        return view('drying_receptions.edit', compact('drying_reception', 'destemming_clousures'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DryingReceptionRequest $request, string $id): RedirectResponse
    {
        $drying_reception = DryingReception::with(['destemming_clousure'])->findOrFail($id);
        $drying_reception->update($request->validated());
        return redirect()->route('drying_receptions.index')->with('success', 'Recepción de secado actualizada correctamente.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $drying_reception = DryingReception::with(['destemming_clousure'])->findOrFail($id);
        $drying_reception->delete();
        return redirect()->route('drying_receptions.index')->with('success', 'Recepción de secado eliminada correctamente.');
    }
}
