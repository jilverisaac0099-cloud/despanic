<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\DestemmingDrawerRequest;
use App\Models\DestemmingDrawer;
use App\Models\Pilon;
use App\Models\TobaccoClass;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;   

class DestemmingDrawerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destemming_drawers = DestemmingDrawer::with(['pilon', 'tobacco_class'])->get();
        return view("destemming_drawers.index", compact("destemming_drawers"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $destemming_drawer = new DestemmingDrawer();
        $pilons = Pilon::all();
        $tobacco_classes = TobaccoClass::all();
        return view('destemming_drawers.create', compact('destemming_drawer', 'pilons', 'tobacco_classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DestemmingDrawerRequest $request)
    {
        DestemmingDrawer::create($request->validated());
        return redirect()->route('destemming_drawers.index')->with('success', 'Gaveta de despalillo creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DestemmingDrawer $destemming_drawer)
    {
        $destemming_drawer = DestemmingDrawer::with(['pilon', 'tobacco_class'])->findOrFail($destemming_drawer->id);
        return view('destemming_drawers.show', compact('destemming_drawer'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $destemming_drawer = DestemmingDrawer::with(['pilon', 'tobacco_class'])->findOrFail($id);
        $pilons = Pilon::all();
        $tobacco_classes = TobaccoClass::all();
        return view('destemming_drawers.edit', compact('destemming_drawer', 'pilons', 'tobacco_classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DestemmingDrawerRequest $request, string $id): RedirectResponse
    {
        $destemming_drawer = DestemmingDrawer::with(['pilon', 'tobacco_class'])->findOrFail($id);
        $destemming_drawer->update($request->validated());
        return redirect()->route('destemming_drawers.index')->with('success', 'Gaveta de despalillo actualizada correctamente.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $destemming_drawer = DestemmingDrawer::with(['pilon', 'tobacco_class'])->findOrFail($id);
        $destemming_drawer->delete();
        return redirect()->route('destemming_drawers.index')->with('success', 'Gaveta de despalillo eliminada correctamente.');
    }
}
