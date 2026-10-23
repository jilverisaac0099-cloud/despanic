<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\DestemmingDeliveryRequest;
use App\Models\DestemmingDelivery;
use App\Models\DestemmingPreparation;
use App\Models\Pilon;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;   

class DestemmingDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destemming_deliverys = DestemmingDelivery::with(['destemming_preparation', 'pilon'])->get();
        return view("destemming_deliverys.index", compact("destemming_deliverys"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $destemming_delivery = new DestemmingDelivery();
        $destemming_preparations = DestemmingPreparation::all();
        $pilons = Pilon::all();
        return view('destemming_deliverys.create', compact('destemming_delivery', 'destemming_preparations', 'pilons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DestemmingDeliveryRequest $request)
    {
        DestemmingDelivery::create($request->validated());
        return redirect()->route('destemming_deliverys.index')->with('success', 'Entrega de despalillo creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DestemmingDelivery $destemming_delivery)
    {
        $destemming_delivery = DestemmingDelivery::with(['destemming_preparation', 'pilon'])->findOrFail($destemming_delivery->id);
        return view('destemming_deliverys.show', compact('destemming_delivery'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $destemming_delivery = DestemmingDelivery::with(['destemming_preparation', 'pilon'])->findOrFail($id);
        $destemming_preparations = DestemmingPreparation::all();
        $pilons = Pilon::all();
        return view('destemming_deliverys.edit', compact('destemming_delivery', 'destemming_preparations', 'pilons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DestemmingDeliveryRequest $request, string $id): RedirectResponse
    {
        $destemming_delivery = DestemmingDelivery::with(['destemming_preparation', 'pilon'])->findOrFail($id);
        $destemming_delivery->update($request->validated());
        return redirect()->route('destemming_deliverys.index')->with('success', 'Entrega de despalillo actualizada correctamente.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $destemming_delivery = DestemmingDelivery::with(['destemming_preparation', 'pilon'])->findOrFail($id);
        $destemming_delivery->delete();
        return redirect()->route('destemming_deliverys.index')->with('success', 'Entrega de despalillo eliminada correctamente.');
    }
}
