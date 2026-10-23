<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\DrawersEntryRequest;
use App\Models\DrawersEntry;
use App\Models\TobaccoClass;
use App\Models\DryingReception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;   

class DrawersEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drawers_entrys = DrawersEntry::with(['tobacco_class', 'drying_reception'])->get();
        return view("drawers_entrys.index", compact("drawers_entrys"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $drawers_entry = new DrawersEntry();
        $tobacco_classes = TobaccoClass::all();
        $drying_receptions = DryingReception::all();
        return view('drawers_entrys.create', compact('drawers_entry', 'tobacco_classes', 'drying_receptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DrawersEntryRequest $request)
    {
        DrawersEntry::create($request->validated());
        return redirect()->route('drawers_entrys.index')->with('success', 'Entrada de gaveta creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DrawersEntry $drawers_entry)
    {
        $drawers_entry = DrawersEntry::with(['tobacco_class', 'drying_reception'])->findOrFail($drawers_entry->id);
        return view('drawers_entrys.show', compact('drawers_entry'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $drawers_entry = DrawersEntry::with(['tobacco_class', 'drying_reception'])->findOrFail($id);
        $tobacco_classes = TobaccoClass::all();
        $drying_receptions = DryingReception::all();
        return view('drawers_entrys.edit', compact('drawers_entry', 'tobacco_classes', 'drying_receptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DrawersEntryRequest $request, string $id): RedirectResponse
    {
        $drawers_entry = DrawersEntry::with(['tobacco_class', 'drying_reception'])->findOrFail($id);
        $drawers_entry->update($request->validated());
        return redirect()->route('drawers_entrys.index')->with('success', 'Entrada de gaveta actualizada correctamente.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $drawers_entry = DrawersEntry::with(['tobacco_class', 'drying_reception'])->findOrFail($id);
        $drawers_entry->delete();
        return redirect()->route('drawers_entrys.index')->with('success', 'Entrada de gaveta eliminada correctamente.');
    }
}
