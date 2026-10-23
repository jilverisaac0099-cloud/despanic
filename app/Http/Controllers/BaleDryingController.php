<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\BaleDryingRequest;
use App\Models\BaleDrying;
use App\Models\TobaccoClass;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;   

class BaleDryingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bale_dryings = BaleDrying::with(['tobacco_class'])->get();
        return view("bale_dryings.index", compact("bale_dryings"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bale_drying = new BaleDrying();
        $tobacco_classes = TobaccoClass::all();
        return view('bale_dryings.create', compact('bale_drying', 'tobacco_classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BaleDryingRequest $request)
    {
        BaleDrying::create($request->validated());
        return redirect()->route('bale_dryings.index')->with('success', 'Fardo de secado creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BaleDrying $bale_drying)
    {
        $bale_drying = BaleDrying::with(['tobacco_class'])->findOrFail($bale_drying->id);
        return view('bale_dryings.show', compact('bale_drying'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bale_drying = BaleDrying::with(['tobacco_class'])->findOrFail($id);
        $tobacco_classes = TobaccoClass::all();
        return view('bale_dryings.edit', compact('bale_drying', 'tobacco_classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BaleDryingRequest $request, string $id): RedirectResponse
    {
        $bale_drying = BaleDrying::with(['tobacco_class'])->findOrFail($id);
        $bale_drying->update($request->validated());
        return redirect()->route('bale_dryings.index')->with('success', 'Fardo de secado actualizado correctamente.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bale_drying = BaleDrying::with(['tobacco_class'])->findOrFail($id);
        $bale_drying->delete();
        return redirect()->route('bale_dryings.index')->with('success', 'Fardo de secado eliminado correctamente.');
    }
}
