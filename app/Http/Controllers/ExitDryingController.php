<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ExitDryingRequest;
use App\Models\ExitDrying;
use App\Models\DryingReception;
use App\Models\TobaccoClass;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;   

class ExitDryingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exit_dryings = ExitDrying::with(['drying_reception', 'tobacco_class'])->get();
        return view("exit_dryings.index", compact("exit_dryings"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $exit_drying = new ExitDrying();
        $drying_receptions = DryingReception::all();
        $tobacco_classes = TobaccoClass::all();
        return view('exit_dryings.create', compact('exit_drying', 'drying_receptions', 'tobacco_classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExitDryingRequest $request)
    {
        ExitDrying::create($request->validated());
        return redirect()->route('exit_dryings.index')->with('success', 'Salida de secado creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ExitDrying $exit_drying)
    {
        $exit_drying = ExitDrying::with(['drying_reception', 'tobacco_class'])->findOrFail($exit_drying->id);
        return view('exit_dryings.show', compact('exit_drying'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $exit_drying = ExitDrying::with(['drying_reception', 'tobacco_class'])->findOrFail($id);
        $drying_receptions = DryingReception::all();
        $tobacco_classes = TobaccoClass::all();
        return view('exit_dryings.edit', compact('exit_drying', 'drying_receptions', 'tobacco_classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExitDryingRequest $request, string $id): RedirectResponse
    {
        $exit_drying = ExitDrying::with(['drying_reception', 'tobacco_class'])->findOrFail($id);
        $exit_drying->update($request->validated());
        return redirect()->route('exit_dryings.index')->with('success', 'Salida de secado actualizada correctamente.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exit_drying = ExitDrying::with(['drying_reception', 'tobacco_class'])->findOrFail($id);
        $exit_drying->delete();
        return redirect()->route('exit_dryings.index')->with('success', 'Salida de secado eliminada correctamente.');
    }
}
