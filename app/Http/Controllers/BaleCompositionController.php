<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\BaleCompositionRequest;
use App\Models\BaleComposition;
use App\Models\DryingReception;
use App\Models\BaleDrying;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;   

class BaleCompositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bale_compositions = BaleComposition::with(['drying_reception', 'bale_drying'])->get();
        return view("bale_compositions.index", compact("bale_compositions"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bale_composition = new BaleComposition();
        $drying_receptions = DryingReception::all();
        $bale_dryings = BaleDrying::all();
        return view('bale_compositions.create', compact('bale_composition', 'drying_receptions', 'bale_dryings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BaleCompositionRequest $request)
    {
        BaleComposition::create($request->validated());
        return redirect()->route('bale_compositions.index')->with('success', 'Composición de fardo creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BaleComposition $bale_composition)
    {
        $bale_composition = BaleComposition::with(['drying_reception', 'bale_drying'])->findOrFail($bale_composition->id);
        return view('bale_compositions.show', compact('bale_composition'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bale_composition = BaleComposition::with(['drying_reception', 'bale_drying'])->findOrFail($id);
        $drying_receptions = DryingReception::all();
        $bale_dryings = BaleDrying::all();
        return view('bale_compositions.edit', compact('bale_composition', 'drying_receptions', 'bale_dryings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BaleCompositionRequest $request, string $id): RedirectResponse
    {
        $bale_composition = BaleComposition::with(['drying_reception', 'bale_drying'])->findOrFail($id);
        $bale_composition->update($request->validated());
        return redirect()->route('bale_compositions.index')->with('success', 'Composición de fardo actualizada correctamente.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bale_composition = BaleComposition::with(['drying_reception', 'bale_drying'])->findOrFail($id);
        $bale_composition->delete();
        return redirect()->route('bale_compositions.index')->with('success', 'Composición de fardo eliminada correctamente.');
    }
}
