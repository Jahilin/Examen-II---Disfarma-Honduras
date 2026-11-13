<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use App\Models\Proveedor;
use App\Models\Empleado;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMedicamentos = Medicamento::count();
        $totalProveedores = Proveedor::where('estado', 'Activo')->count();
        $totalEmpleados = Empleado::count();

        $valorInventario = 0;
        foreach (Medicamento::all() as $m) {
            $valorInventario = $valorInventario + ($m->inventario * $m->precio);
        }

        return view('dashboard', compact(
            'totalMedicamentos', 'totalProveedores', 'totalEmpleados', 'valorInventario'
        ));
    }
}