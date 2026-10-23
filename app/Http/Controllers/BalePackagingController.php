<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\BalePackagingRequest;
use App\Models\BalePackaging;
use App\Models\BaleDrying;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;   

class BalePackagingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bale_packagings = BalePackaging::with(['bale_drying'])->get();
        return view("bale_packagings.index", compact("bale_packagings"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bale_packaging = new BalePackaging();
        $bale_dryings = BaleDrying::all();
        return view('bale_packagings.create', compact('bale_packaging', 'bale_dryings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BalePackagingRequest $request)
    {
        BalePackaging::create($request->validated());
        return redirect()->route('bale_packagings.index')->with('success', 'Empacado de fardo creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BalePackaging $bale_packaging)
    {
        $bale_packaging = BalePackaging::with(['bale_drying'])->findOrFail($bale_packaging->id);
        return view('bale_packagings.show', compact('bale_packaging'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bale_packaging = BalePackaging::with(['bale_drying'])->findOrFail($id);
        $bale_dryings = BaleDrying::all();
        return view('bale_packagings.edit', compact('bale_packaging', 'bale_dryings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BalePackagingRequest $request, string $id): RedirectResponse
    {
        $bale_packaging = BalePackaging::with(['bale_drying'])->findOrFail($id);
        $bale_packaging->update($request->validated());
        return redirect()->route('bale_packagings.index')->with('success', 'Empacado de fardo actualizado correctamente.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bale_packaging = BalePackaging::with(['bale_drying'])->findOrFail($id);
        $bale_packaging->delete();
        return redirect()->route('bale_packagings.index')->with('success', 'Empacado de fardo eliminado correctamente.');
    }
}
