<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    private function reglas($id = 0)
    {
        return [
            'rtn' => 'required|digits:14|unique:proveedores,rtn,' . $id,
            'empresa' => 'required|max:150',
            'contacto' => 'required|max:150',
            'telefono' => ['required', 'regex:/^[2389][0-9]{7}$/'],
            'categoria' => 'required|in:Fármacos,Material Quirúrgico,Equipos',
            'limite_credito' => 'required|numeric|min:0',
            'dias_credito' => 'required|in:15,30,45,60',
            'estado' => 'required|in:Activo,Inactivo',
            'fecha_registro' => 'required|date',
        ];
    }

    private function mensajes()
    {
        return [
            'required' => 'Este campo es obligatorio.',
            'rtn.digits' => 'El RTN debe tener exactamente 14 dígitos.',
            'rtn.unique' => 'Este RTN ya está registrado.',
            'telefono.regex' => 'El teléfono debe tener 8 dígitos y empezar con 2, 3, 8 o 9.',
            'limite_credito.min' => 'El límite de crédito debe ser mayor o igual a 0.',
            'dias_credito.in' => 'Los días de crédito deben ser 15, 30, 45 o 60.',
        ];
    }

    public function index()
    {
        $proveedores = Proveedor::orderBy('empresa')->paginate(10);
        return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate($this->reglas(0), $this->mensajes());
        Proveedor::create($datos);

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor registrado correctamente.');
    }

    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        $datos = $request->validate($this->reglas($proveedor->id), $this->mensajes());
        $proveedor->update($datos);

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor actualizado correctamente.');
    }

    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor eliminado correctamente.');
    }
}
