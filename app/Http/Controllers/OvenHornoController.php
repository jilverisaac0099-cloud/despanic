<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\OvenHornoRequest;
use App\Models\OvenHorno;
use App\Models\DryingReception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;   

class OvenHornoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $oven_hornos = OvenHorno::with(['drying_reception'])->get();
        return view("oven_hornos.index", compact("oven_hornos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $oven_horno = new OvenHorno();
        $drying_receptions = DryingReception::all();
        return view('oven_hornos.create', compact('oven_horno', 'drying_receptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OvenHornoRequest $request)
    {
        OvenHorno::create($request->validated());
        return redirect()->route('oven_hornos.index')->with('success', 'Horno creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(OvenHorno $oven_horno)
    {
        $oven_horno = OvenHorno::with(['drying_reception'])->findOrFail($oven_horno->id);
        return view('oven_hornos.show', compact('oven_horno'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $oven_horno = OvenHorno::with(['drying_reception'])->findOrFail($id);
        $drying_receptions = DryingReception::all();
        return view('oven_hornos.edit', compact('oven_horno', 'drying_receptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OvenHornoRequest $request, string $id): RedirectResponse
    {
        $oven_horno = OvenHorno::with(['drying_reception'])->findOrFail($id);
        $oven_horno->update($request->validated());
        return redirect()->route('oven_hornos.index')->with('success', 'Horno actualizado correctamente.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $oven_horno = OvenHorno::with(['drying_reception'])->findOrFail($id);
        $oven_horno->delete();
        return redirect()->route('oven_hornos.index')->with('success', 'Horno eliminado correctamente.');
    }
}
