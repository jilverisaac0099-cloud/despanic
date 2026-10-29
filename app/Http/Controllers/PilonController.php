<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pilon;
use App\Http\Requests\PilonRequest;

class PilonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pilons = Pilon::orderByDesc("id")->get();
        return view("pilons.index", compact("pilons"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pilon = new Pilon();
        return view("pilons.create", compact("pilon"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PilonRequest $request)
    {
        Pilon::create($request->validated());
        return redirect()->route("pilons.index")->with("success", "El pilón se ha creado correctamente.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pilon = Pilon::findOrFail($id);
        return view("pilons.show", compact("pilon"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pilon = Pilon::findOrFail($id);
        return view("pilons.edit", compact("pilon"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PilonRequest $request, Pilon $pilon)
    {
        $pilon->update($request->validated());
        return redirect()->route("pilons.index")->with("success", "El pilón se ha actualizado correctamente.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pilon = Pilon::findOrFail($id);
        $pilon->delete();
        return redirect()->route("pilons.index")->with("success", "El pilón se ha eliminado correctamente.");
    }
}
