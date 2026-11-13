@extends('layouts.app')

@section('title', 'Medicamentos')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Catálogo de Medicamentos</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Medicamentos</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
            <span class="fw-bold"><i class="bi bi-capsule me-1"></i> Listado de medicamentos</span>
            <div class="d-flex flex-wrap gap-2">
                <form method="GET" action="{{ route('medicamentos.index') }}" class="d-flex gap-2">
                    <input type="text" name="buscar" value="{{ $buscar }}"
                           class="form-control form-control-sm" placeholder="Buscar por nombre o SKU">
                    <button class="btn btn-sm btn-outline-primary"><i class="bi bi-search"></i></button>
                </form>
                <a href="{{ route('medicamentos.create') }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-plus-lg"></i> Nuevo medicamento
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Foto</th><th>SKU</th><th>Nombre</th><th>Categoría</th>
                            <th>Precio</th><th>Stock</th><th>Existencia</th><th>Vence</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($medicamentos as $m)
                        <tr>
                            <td>
                                @if ($m->imagen)
                                    <img src="{{ asset('uploads/medicamentos/' . $m->imagen) }}"
                                         width="50" height="50" class="rounded">
                                @else
                                    <i class="bi bi-image text-muted fs-3"></i>
                                @endif
                            </td>
                            <td>{{ $m->codigo }}</td>
                            <td>{{ $m->nombre }}</td>
                            <td>{{ $m->categoria }}</td>
                            <td>L. {{ number_format($m->precio, 2) }}</td>
                            <td>{{ $m->inventario }}</td>
                            <td>
                                @if ($m->inventario > 20)
                                    <span class="badge bg-success">Óptimo</span>
                                @elseif ($m->inventario >= 10)
                                    <span class="badge bg-warning text-dark">Moderado</span>
                                @else
                                    <span class="badge bg-danger">¡Desabastecimiento!</span>
                                @endif
                            </td>
                            <td>{{ date('d/m/Y', strtotime($m->fecha_vencimiento)) }}</td>
                            <td class="text-nowrap">
                                <a href="{{ route('medicamentos.edit', $m->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('medicamentos.destroy', $m->id) }}" method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('¿Seguro que desea eliminar este medicamento?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="9" class="text-center text-muted">No hay medicamentos.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $medicamentos->links() }}
        </div>
    </div>
</div>
@endsection