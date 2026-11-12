@extends('layouts.app')
@section('title', 'Nuevo proveedor')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Nuevo proveedor</h1>
    <form action="{{ route('proveedores.store') }}" method="POST"
        class="card card-body mb-4">
        @csrf
        @include('proveedores._form')
    </form>
</div>
@endsection