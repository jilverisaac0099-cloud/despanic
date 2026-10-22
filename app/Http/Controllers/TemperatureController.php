<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TemperatureRequest;
use App\Models\Temperature;
use App\Models\Pilon;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;   

class TemperatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $temperatures = Temperature::with("pilon")->get();
        return view("temperatures.index", compact("temperatures"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $temperature = new Temperature();
        $pilons = Pilon::all();
        return view('temperatures.create', compact('temperature', 'pilons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TemperatureRequest $request)
    {
        Temperature::create($request->validated());
        return redirect()->route('temperatures.index')->with('success', 'Temperatura creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Temperature $temperature)
    {
        $temperature = Temperature::with('pilon')->findOrFail($temperature->id);
        return view('temperatures.show', compact('temperature'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $temperature = Temperature::with('pilon')->findOrFail($id);
        $pilons = Pilon::all();
        return view('temperatures.edit', compact('temperature', 'pilons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TemperatureRequest $request, string $id): RedirectResponse
    {
        $temperature = Temperature::with('pilon')->findOrFail($id);
        $temperature->update($request->validated());
        return redirect()->route('temperatures.index')->with('success', 'Temperatura actualizada correctamente.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $temperature = Temperature::with('pilon')->findOrFail($id);
        $temperature->delete();
        return redirect()->route('temperatures.index')->with('success', 'Temperatura eliminada correctamente.');
    }
}
