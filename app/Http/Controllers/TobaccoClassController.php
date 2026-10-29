<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TobaccoClass;
use App\Http\Requests\TobaccoClassRequest;

class TobaccoClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tobaccoClasses = TobaccoClass::orderByDesc("id")->get();
        return view("tobacco_classes.index", compact("tobaccoClasses"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tobaccoClass = new TobaccoClass();
        return view("tobacco_classes.create", compact("tobaccoClass"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TobaccoClassRequest $request)
    {
        TobaccoClass::create($request->validated());
        return redirect()->route("tobacco_classes.index")->with("success", "La clase de tabaco se ha registrado correctamente.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tobaccoClass = TobaccoClass::findOrFail($id);
        return view("tobacco_classes.show", compact("tobaccoClass"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tobaccoClass = TobaccoClass::findOrFail($id);
        return view("tobacco_classes.edit", compact("tobaccoClass"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TobaccoClassRequest $request, string $id)
    {
        $tobaccoClass = TobaccoClass::findOrFail($id);
        $tobaccoClass->update($request->validated());
        return redirect()->route("tobacco_classes.index")->with("success", "La clase de tabaco se ha actualizado correctamente.");
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tobaccoClass = TobaccoClass::findOrFail($id);
        $tobaccoClass->delete();
        return redirect()->route("tobacco_classes.index")->with("success", "La clase de tabaco se ha eliminado correctamente.");      
    }
}
