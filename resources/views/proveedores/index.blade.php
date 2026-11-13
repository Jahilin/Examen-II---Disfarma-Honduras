@extends('layouts.app')

@section('title', 'Proveedores')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Laboratorios y Proveedores Mayoristas</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Proveedores</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
            <span class="fw-bold"><i class="bi bi-truck me-1"></i> Listado de proveedores</span>
            <a href="{{ route('proveedores.create') }}" class="btn btn-sm btn-primary">
                <i class="bi bi-plus-lg"></i> Nuevo proveedor
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th>RTN</th><th>Empresa</th><th>Contacto</th><th>Teléfono</th>
                            <th>Categoría</th><th>Límite crédito</th><th>Plazo</th>
                            <th>Estado</th><th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($proveedores as $p)
                        <tr>
                            <td>{{ $p->rtn }}</td>
                            <td>{{ $p->empresa }}</td>
                            <td>{{ $p->contacto }}</td>
                            <td>{{ $p->telefono }}</td>
                            <td>{{ $p->categoria }}</td>
                            <td>L. {{ number_format($p->limite_credito, 2) }}</td>
                            <td><span class="badge bg-info text-dark">{{ $p->dias_credito }} días</span></td>
                            <td>
                                @if ($p->estado == 'Activo')
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-secondary">Inactivo</span>
                                @endif
                            </td>
                            <td class="text-nowrap">
                                <a href="{{ route('proveedores.edit', $p->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('proveedores.destroy', $p->id) }}" method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('¿Seguro que desea eliminar este proveedor?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="9" class="text-center text-muted">No hay proveedores.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $proveedores->links() }}
        </div>
    </div>
</div>
@endsection