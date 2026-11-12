@extends('layouts.app')
@section('title', 'Editar medicamento')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Editar medicamento</h1>
    <form action="{{ route('medicamentos.update', $medicamento->id) }}" method="POST"
          enctype="multipart/form-data" class="card card-body mb-4">
        @csrf
        @method('PUT')
        @include('medicamentos._form')
    </form>
</div>
@endsection