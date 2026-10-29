<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\LotsDetailRequest;
use App\Models\LotsDetail;
use App\Models\LotsReception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;   


class LotsDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lots_details = LotsDetail::with("lots_reception")->get();
        return view("lots_details.index", compact("lots_details"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lot_detail = new LotsDetail();
        $lots_receptions = LotsReception::all();
        return view('lots_details.create', compact('lot_detail', 'lots_receptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LotsDetailRequest $request)
    {
        LotsDetail::create($request->validated());
        return redirect()->route('lots_details.index')->with('success', 'Detalles del lote creados correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lot_detail = LotsDetail::with('lots_reception')->findOrFail($id);
        return view('lots_details.show', compact('lot_detail'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lot_detail = LotsDetail::with('lots_reception')->findOrFail($id);
        $lots_receptions = LotsReception::all();
        return view('lots_details.edit', compact('lot_detail', 'lots_receptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LotsDetailRequest $request, string $id): RedirectResponse
    {
        $lot_detail = LotsDetail::with('lots_reception')->findOrFail($id);
        $lot_detail->update($request->validated());
        return redirect()->route('lots_details.index')->with('success', 'Detalles del lote actualizados correctamente.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lot_detail = LotsDetail::with('lots_reception')->findOrFail($id);
        $lot_detail->delete();
        return redirect()->route('lots_details.index')->with('success', 'Detalles del lote eliminados correctamente.');
    }
}
