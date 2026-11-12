@extends('layouts.app')
@section('title', 'Nuevo medicamento')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Nuevo medicamento</h1>
    <form action="{{ route('medicamentos.store') }}" method="POST"
          enctype="multipart/form-data" class="card card-body mb-4">
        @csrf
        @include('medicamentos._form')
    </form>
</div>
@endsection