@extends('layouts.app')
@section('title', 'Editar proveedor')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Editar proveedor</h1>
    <form action="{{ route('proveedores.update', $proveedor->id) }}" method="POST"
          class="card card-body mb-4">
        @csrf
        @method('PUT')
        @include('proveedores._form')
    </form>
</div>
@endsection