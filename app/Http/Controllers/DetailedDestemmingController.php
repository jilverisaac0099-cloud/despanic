<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\DetailedDestemmingRequest;
use App\Models\DetailedDestemming;
use App\Models\DestemmingDelivery;
use App\Models\TobaccoClass;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;   

class DetailedDestemmingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detailed_destemmings = DetailedDestemming::with(['destemming_delivery', 'tobacco_class'])->get();
        return view("detailed_destemmings.index", compact("detailed_destemmings"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $detailed_destemming = new DetailedDestemming();
        $destemming_deliverys = DestemmingDelivery::all();
        $tobacco_classes = TobaccoClass::all();
        return view('detailed_destemmings.create', compact('detailed_destemming', 'destemming_deliverys', 'tobacco_classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DetailedDestemmingRequest $request)
    {
        DetailedDestemming::create($request->validated());
        return redirect()->route('detailed_destemmings.index')->with('success', 'Despalillo detallado creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailedDestemming $detailed_destemming)
    {
        $detailed_destemming = DetailedDestemming::with(['destemming_delivery', 'tobacco_class'])->findOrFail($detailed_destemming->id);
        return view('detailed_destemmings.show', compact('detailed_destemming'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $detailed_destemming = DetailedDestemming::with(['destemming_delivery', 'tobacco_class'])->findOrFail($id);
        $destemming_deliverys = DestemmingDelivery::all();
        $tobacco_classes = TobaccoClass::all();
        return view('detailed_destemmings.edit', compact('detailed_destemming', 'destemming_deliverys', 'tobacco_classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DetailedDestemmingRequest $request, string $id): RedirectResponse
    {
        $detailed_destemming = DetailedDestemming::with(['destemming_delivery', 'tobacco_class'])->findOrFail($id);
        $detailed_destemming->update($request->validated());
        return redirect()->route('detailed_destemmings.index')->with('success', 'Despalillo detallado actualizado correctamente.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detailed_destemming = DetailedDestemming::with(['destemming_delivery', 'tobacco_class'])->findOrFail($id);
        $detailed_destemming->delete();
        return redirect()->route('detailed_destemmings.index')->with('success', 'Despalillo detallado eliminado correctamente.');
    }
}
