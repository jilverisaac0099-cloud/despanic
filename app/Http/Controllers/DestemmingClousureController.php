<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\DestemmingClousureRequest;
use App\Models\DestemmingClousure;
use App\Models\Pilon;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;   

class DestemmingClousureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destemming_clousures = DestemmingClousure::with(['pilon'])->get();
        return view("destemming_clousures.index", compact("destemming_clousures"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $destemming_clousure = new DestemmingClousure();
        $pilons = Pilon::all();
        return view('destemming_clousures.create', compact('destemming_clousure', 'pilons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DestemmingClousureRequest $request)
    {
        DestemmingClousure::create($request->validated());
        return redirect()->route('destemming_clousures.index')->with('success', 'Cierre de despalillo creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DestemmingClousure $destemming_clousure)
    {
        $destemming_clousure = DestemmingClousure::with(['pilon'])->findOrFail($destemming_clousure->id);
        return view('destemming_clousures.show', compact('destemming_clousure'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $destemming_clousure = DestemmingClousure::with(['pilon'])->findOrFail($id);
        $pilons = Pilon::all();
        return view('destemming_clousures.edit', compact('destemming_clousure', 'pilons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DestemmingClousureRequest $request, string $id): RedirectResponse
    {
        $destemming_clousure = DestemmingClousure::with(['pilon'])->findOrFail($id);
        $destemming_clousure->update($request->validated());
        return redirect()->route('destemming_clousures.index')->with('success', 'Cierre de despalillo actualizado correctamente.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $destemming_clousure = DestemmingClousure::with(['pilon'])->findOrFail($id);
        $destemming_clousure->delete();
        return redirect()->route('destemming_clousures.index')->with('success', 'Cierre de despalillo eliminado correctamente.');
    }
}
