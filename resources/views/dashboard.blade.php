@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<style>
    .kpi-card { border: 0; border-left: 5px solid; border-radius: 12px; }
    .kpi-card:hover { transform: translateY(-3px); transition: 0.2s; }
    .kpi-icono {
        width: 55px; height: 55px; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.6rem;
    }
    .banner { background: linear-gradient(135deg, #11161d, #23bdd8); border-radius: 12px; }
</style>

<div class="container-fluid px-4">
    <div class="banner text-white p-4 mt-4 mb-4 shadow-sm">
        <h2 class="mb-1">Bienvenido, {{ auth()->user()->name }}</h2>
        <p class="mb-0">Panel gerencial de DISFARMA Honduras · {{ date('d/m/Y') }}</p>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card kpi-card shadow-sm h-100 border-primary">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted small">Medicamentos</div>
                        <div class="fs-2 fw-bold">{{ $totalMedicamentos }}</div>
                        <div class="small text-muted">en catálogo</div>
                    </div>
                    <div class="kpi-icono bg-primary bg-opacity-10 text-primary">
                        <i class="bi bi-capsule"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card kpi-card shadow-sm h-100 border-success">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted small">Proveedores</div>
                        <div class="fs-2 fw-bold">{{ $totalProveedores }}</div>
                        <div class="small text-muted">activos</div>
                    </div>
                    <div class="kpi-icono bg-success bg-opacity-10 text-success">
                        <i class="bi bi-truck"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card kpi-card shadow-sm h-100 border-warning">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted small">Empleados</div>
                        <div class="fs-2 fw-bold">{{ $totalEmpleados }}</div>
                        <div class="small text-muted">en nómina</div>
                    </div>
                    <div class="kpi-icono bg-warning bg-opacity-10 text-warning">
                        <i class="bi bi-people"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card kpi-card shadow-sm h-100 border-danger">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted small">Valor del inventario</div>
                        <div class="fs-3 fw-bold">L. {{ number_format($valorInventario, 2) }}</div>
                        <div class="small text-muted">inventario × precio</div>
                    </div>
                    <div class="kpi-icono bg-danger bg-opacity-10 text-danger">
                        <i class="bi bi-cash-coin"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white fw-bold">Accesos rápidos</div>
        <div class="card-body d-flex flex-wrap gap-2">
            <a href="{{ route('medicamentos.create') }}" class="btn btn-outline-primary">
                <i class="bi bi-plus-lg"></i> Nuevo medicamento
            </a>
            <a href="{{ route('proveedores.create') }}" class="btn btn-outline-success">
                <i class="bi bi-plus-lg"></i> Nuevo proveedor
            </a>
            <a href="{{ route('empleados.create') }}" class="btn btn-outline-warning">
                <i class="bi bi-plus-lg"></i> Nuevo empleado
            </a>
        </div>
    </div>

</div>
@endsection