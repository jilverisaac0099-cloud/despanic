<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\Pilon;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;   

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::with("pilon")->get();
        return view("events.index", compact("events"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $event = new Event();
        $pilons = Pilon::all();
        return view('events.create', compact('event', 'pilons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        Event::create($request->validated());
        return redirect()->route('events.index')->with('success', 'Evento creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $event = Event::with('pilon')->findOrFail($event->id);
        return view('events.show', compact('event'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::with('pilon')->findOrFail($id);
        $pilons = Pilon::all();
        return view('events.edit', compact('event', 'pilons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, string $id): RedirectResponse
    {
        $event = Event::with('pilon')->findOrFail($id);
        $event->update($request->validated());
        return redirect()->route('events.index')->with('success', 'Evento actualizado correctamente.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::with('pilon')->findOrFail($id);
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Evento eliminado correctamente.');
    }
}
