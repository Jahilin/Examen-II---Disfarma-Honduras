<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    private function reglas($id = 0)
    {
        return [
            'identidad' => 'required|digits:13|unique:empleados,identidad,' . $id,
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
            'correo' => 'required|email|max:150',
            'cargo' => 'required|in:Regente Farmacéutico,Asistente de Farmacia,Jefe de Bodega,Despachador,Cajero',
            'salario' => 'required|numeric|gt:0',
            'fecha_ingreso' => 'required|date',
            'estado' => 'required|in:Activo,Inactivo',
        ];
    }

    private function mensajes()
    {
        return [
            'required' => 'Este campo es obligatorio.',
            'identidad.digits' => 'El DNI debe tener exactamente 13 dígitos numéricos.',
            'identidad.unique' => 'Este DNI ya está registrado.',
            'salario.gt' => 'El salario debe ser mayor que 0.',
            'fecha_ingreso.date' => 'Ingrese una fecha de ingreso válida.',
            'cargo.required' => 'El cargo es obligatorio.',
        ];
    }

    public function index()
    {
        $empleados = Empleado::orderBy('apellido')->paginate(10);
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate($this->reglas(0), $this->mensajes());
        Empleado::create($datos);

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado registrado correctamente.');
    }

    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $datos = $request->validate($this->reglas($empleado->id), $this->mensajes());
        $empleado->update($datos);

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado actualizado correctamente.');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado eliminado correctamente.');
    }
}