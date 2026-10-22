<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\DestemmingPreparationRequest;
use App\Models\DestemmingPreparation;
use App\Models\Pilon;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;   

class DestemmingPreparationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destemming_preparations = DestemmingPreparation::with("pilon")->get();
        return view("destemming_preparations.index", compact("destemming_preparations"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $destemming_preparation = new DestemmingPreparation();
        $pilons = Pilon::all();
        return view('destemming_preparations.create', compact('destemming_preparation', 'pilons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DestemmingPreparationRequest $request)
    {
        DestemmingPreparation::create($request->validated());
        return redirect()->route('destemming_preparations.index')->with('success', 'Preparación de despalillo creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DestemmingPreparation $destemming_preparation)
    {
        $destemming_preparation = DestemmingPreparation::with('pilon')->findOrFail($destemming_preparation->id);
        return view('destemming_preparations.show', compact('destemming_preparation'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $destemming_preparation = DestemmingPreparation::with('pilon')->findOrFail($id);
        $pilons = Pilon::all();
        return view('destemming_preparations.edit', compact('destemming_preparation', 'pilons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DestemmingPreparationRequest $request, string $id): RedirectResponse
    {
        $destemming_preparation = DestemmingPreparation::with('pilon')->findOrFail($id);
        $destemming_preparation->update($request->validated());
        return redirect()->route('destemming_preparations.index')->with('success', 'Preparación de despalillo actualizada correctamente.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $destemming_preparation = DestemmingPreparation::with('pilon')->findOrFail($id);
        $destemming_preparation->delete();
        return redirect()->route('destemming_preparations.index')->with('success', 'Preparación de despalillo eliminada correctamente.');
    }
}
