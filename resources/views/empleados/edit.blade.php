@extends('layouts.app')
@section('title', 'Editar empleado')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Editar empleado</h1>
    <form action="{{ route('empleados.update', $empleado->id) }}" method="POST"
        class="card card-body mb-4">
        @csrf
        @method('PUT')
        @include('empleados._form')
    </form>
</div>
@endsection