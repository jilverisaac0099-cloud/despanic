<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\DryingClosureRequest;
use App\Models\DryingClosure;
use App\Models\DryingReception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;   

class DryingClosureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drying_closures = DryingClosure::with(['drying_reception'])->get();
        return view("drying_closures.index", compact("drying_closures"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $drying_closure = new DryingClosure();
        $drying_receptions = DryingReception::all();
        return view('drying_closures.create', compact('drying_closure', 'drying_receptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DryingClosureRequest $request)
    {
        DryingClosure::create($request->validated());
        return redirect()->route('drying_closures.index')->with('success', 'Cierre de secado creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DryingClosure $drying_closure)
    {
        $drying_closure = DryingClosure::with(['drying_reception'])->findOrFail($drying_closure->id);
        return view('drying_closures.show', compact('drying_closure'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $drying_closure = DryingClosure::with(['drying_reception'])->findOrFail($id);
        $drying_receptions = DryingReception::all();
        return view('drying_closures.edit', compact('drying_closure', 'drying_receptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DryingClosureRequest $request, string $id): RedirectResponse
    {
        $drying_closure = DryingClosure::with(['drying_reception'])->findOrFail($id);
        $drying_closure->update($request->validated());
        return redirect()->route('drying_closures.index')->with('success', 'Cierre de secado actualizado correctamente.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $drying_closure = DryingClosure::with(['drying_reception'])->findOrFail($id);
        $drying_closure->delete();
        return redirect()->route('drying_closures.index')->with('success', 'Cierre de secado eliminado correctamente.');
    }
}
