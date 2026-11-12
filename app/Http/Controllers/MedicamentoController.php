<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    private function reglas($id = 0)
    {
        return [
            'codigo' => 'required|max:50|unique:medicamentos,codigo,' . $id,
            'nombre' => 'required|max:150',
            'categoria' => 'required|in:Antibióticos,Analgésicos,Sueros,Material Quirúrgico,Vitaminas',
            'precio' => 'required|numeric|gt:0',
            'costo' => 'required|numeric|min:0',
            'inventario' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'laboratorio' => 'required|max:150',
            'fecha_vencimiento' => 'required|date',
            'fecha_registro' => 'required|date',
            'numero_lote' => 'required|max:50',
        ];
    }

    private function mensajes()
    {
        return [
            'required' => 'Este campo es obligatorio.',
            'codigo.unique' => 'Este código (SKU) ya existe.',
            'precio.gt' => 'El precio debe ser mayor que 0.',
            'inventario.min' => 'El stock no puede ser negativo.',
            'imagen.mimes' => 'La imagen debe ser jpg, png o webp.',
            'imagen.max' => 'La imagen no puede pasar de 5 MB.',
        ];
    }
    
    public function index(Request $request)
    {
        $buscar = $request->buscar;

        $consulta = Medicamento::orderBy('nombre');

        if ($buscar) {
            $consulta->where('nombre', 'like', '%' . $buscar . '%')
                     ->orWhere('codigo', 'like', '%' . $buscar . '%');
        }

        $medicamentos = $consulta->paginate(10)->appends(['buscar' => $buscar]);

        return view('medicamentos.index', compact('medicamentos', 'buscar'));
    }

    public function create()
    {
        return view('medicamentos.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate($this->reglas(0), $this->mensajes());

        if ($request->hasFile('imagen')) {
            $archivo = $request->file('imagen');
            $nombre = time() . '.' . $archivo->extension();
            $archivo->move(public_path('uploads/medicamentos'), $nombre);
            $datos['imagen'] = $nombre;
        }

        Medicamento::create($datos);

        return redirect()->route('medicamentos.index')
            ->with('success', 'Medicamento registrado correctamente.');
    }

    public function edit(Medicamento $medicamento)
    {
        return view('medicamentos.edit', compact('medicamento'));
    }

    public function update(Request $request, Medicamento $medicamento)
    {
        $datos = $request->validate($this->reglas($medicamento->id), $this->mensajes());

        if ($request->hasFile('imagen')) {
            if ($medicamento->imagen) {
                unlink(public_path('uploads/medicamentos/' . $medicamento->imagen));
            }
            $archivo = $request->file('imagen');
            $nombre = time() . '.' . $archivo->extension();
            $archivo->move(public_path('uploads/medicamentos'), $nombre);
            $datos['imagen'] = $nombre;
        }

        $medicamento->update($datos);

        return redirect()->route('medicamentos.index')
            ->with('success', 'Medicamento actualizado correctamente.');
    }

    public function destroy(Medicamento $medicamento)
    {
        if ($medicamento->imagen) {
            unlink(public_path('uploads/medicamentos/' . $medicamento->imagen));
        }
        $medicamento->delete();

        return redirect()->route('medicamentos.index')
            ->with('success', 'Medicamento eliminado correctamente.');
    }
}