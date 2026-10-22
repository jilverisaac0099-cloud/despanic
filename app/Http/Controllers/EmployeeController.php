<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::orderByDesc("id")->get();
        return view("employees.index", compact("employees"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = new Employee();
        return view("employees.create", compact("employees"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        Employee::create($request->validated());
        return redirect()->route("employees.index")->with("success", "El empleado se ha creado correctamente.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view("employees.show", compact("employee"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view("employees.edit", compact("employee"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());
        return redirect()->route("employees.index")->with("success", "El empleado se ha actualizado correctamente.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route("employees.index")->with("success", "El empleado se ha eliminado correctamente.");
    }
}
