@extends('layouts.app')
@section('title', 'Nuevo empleado')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Nuevo empleado</h1>
    <form action="{{ route('empleados.store') }}" method="POST"
          class="card card-body mb-4">
        @csrf
        @include('empleados._form')
    </form>
</div>
@endsection