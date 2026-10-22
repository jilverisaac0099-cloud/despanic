<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\VeinDestemmingRequest;
use App\Models\VeinDestemming;
use App\Models\Pilon;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;   

class VeinDestemmingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vein_destemmings = VeinDestemming::with("pilon")->get();
        return view("vein_destemmings.index", compact("vein_destemmings"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vein_destemming = new VeinDestemming();
        $pilons = Pilon::all();
        return view('vein_destemmings.create', compact('vein_destemming', 'pilons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VeinDestemmingRequest $request)
    {
        VeinDestemming::create($request->validated());
        return redirect()->route('vein_destemmings.index')->with('success', 'Despalillo de venas creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(VeinDestemming $vein_destemming)
    {
        $vein_destemming = VeinDestemming::with('pilon')->findOrFail($vein_destemming->id);
        return view('vein_destemmings.show', compact('vein_destemming'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vein_destemming = VeinDestemming::with('pilon')->findOrFail($id);
        $pilons = Pilon::all();
        return view('vein_destemmings.edit', compact('vein_destemming', 'pilons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VeinDestemmingRequest $request, string $id): RedirectResponse
    {
        $vein_destemming = VeinDestemming::with('pilon')->findOrFail($id);
        $vein_destemming->update($request->validated());
        return redirect()->route('vein_destemmings.index')->with('success', 'Despalillo de venas actualizado correctamente.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vein_destemming = VeinDestemming::with('pilon')->findOrFail($id);
        $vein_destemming->delete();
        return redirect()->route('vein_destemmings.index')->with('success', 'Despalillo de venas eliminado correctamente.');
    }
}
