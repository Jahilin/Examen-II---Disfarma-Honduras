@extends('layouts.app')

@section('title', 'Empleados')

@section('content')
@php
    $colores = [
        'Regente Farmacéutico' => 'bg-primary',
        'Asistente de Farmacia' => 'bg-info text-dark',
        'Jefe de Bodega' => 'bg-warning text-dark',
        'Despachador' => 'bg-secondary',
        'Cajero' => 'bg-success',
    ];
@endphp
<div class="container-fluid px-4">
    <h1 class="mt-4">Nómina y Personal Farmacéutico</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Empleados</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
            <span class="fw-bold"><i class="bi bi-people me-1"></i> Listado de personal</span>
            <a href="{{ route('empleados.create') }}" class="btn btn-sm btn-primary">
                <i class="bi bi-plus-lg"></i> Nuevo empleado
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th>DNI</th><th>Nombre</th><th>Correo</th><th>Cargo</th>
                            <th>Salario</th><th>Ingreso</th><th>Estado</th><th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($empleados as $e)
                        <tr>
                            <td>{{ $e->identidad }}</td>
                            <td>{{ $e->nombre }} {{ $e->apellido }}</td>
                            <td>{{ $e->correo }}</td>
                            <td><span class="badge {{ $colores[$e->cargo] }}">{{ $e->cargo }}</span></td>
                            <td>L. {{ number_format($e->salario, 2) }}</td>
                            <td>{{ date('d/m/Y', strtotime($e->fecha_ingreso)) }}</td>
                            <td>
                                @if ($e->estado == 'Activo')
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-secondary">Inactivo</span>
                                @endif
                            </td>
                            <td class="text-nowrap">
                                <a href="{{ route('empleados.edit', $e->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('empleados.destroy', $e->id) }}" method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('¿Seguro que desea eliminar este empleado?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="8" class="text-center text-muted">No hay empleados.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $empleados->links() }}
        </div>
    </div>
</div>
@endsection