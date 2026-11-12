@php
    $categorias = ['Antibióticos', 'Analgésicos', 'Sueros', 'Material Quirúrgico', 'Vitaminas'];
@endphp

<div class="row g-3">
    <div class="col-md-4">
        <label class="form-label">Código (SKU)</label>
        <input type="text" name="codigo" value="{{ old('codigo', $medicamento->codigo ?? '') }}"
               class="form-control @error('codigo') is-invalid @enderror">
        @error('codigo') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-8">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', $medicamento->nombre ?? '') }}"
               class="form-control @error('nombre') is-invalid @enderror">
        @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Categoría</label>
        <select name="categoria" class="form-select @error('categoria') is-invalid @enderror">
            <option value="">Seleccione...</option>
            @foreach ($categorias as $c)
                <option value="{{ $c }}"
                    {{ old('categoria', $medicamento->categoria ?? '') == $c ? 'selected' : '' }}>
                    {{ $c }}
                </option>
            @endforeach
        </select>
        @error('categoria') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Precio (L.)</label>
        <input type="number" step="0.01" name="precio" value="{{ old('precio', $medicamento->precio ?? '') }}"
               class="form-control @error('precio') is-invalid @enderror">
        @error('precio') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Costo (L.)</label>
        <input type="number" step="0.01" name="costo" value="{{ old('costo', $medicamento->costo ?? '') }}"
               class="form-control @error('costo') is-invalid @enderror">
        @error('costo') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Inventario (stock)</label>
        <input type="number" name="inventario" value="{{ old('inventario', $medicamento->inventario ?? '') }}"
               class="form-control @error('inventario') is-invalid @enderror">
        @error('inventario') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Laboratorio</label>
        <input type="text" name="laboratorio" value="{{ old('laboratorio', $medicamento->laboratorio ?? '') }}"
               class="form-control @error('laboratorio') is-invalid @enderror">
        @error('laboratorio') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Número de lote</label>
        <input type="text" name="numero_lote" value="{{ old('numero_lote', $medicamento->numero_lote ?? '') }}"
               class="form-control @error('numero_lote') is-invalid @enderror">
        @error('numero_lote') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Fecha de vencimiento</label>
        <input type="date" name="fecha_vencimiento"
               value="{{ old('fecha_vencimiento', $medicamento->fecha_vencimiento ?? '') }}"
               class="form-control @error('fecha_vencimiento') is-invalid @enderror">
        @error('fecha_vencimiento') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Fecha de registro</label>
        <input type="date" name="fecha_registro"
               value="{{ old('fecha_registro', $medicamento->fecha_registro ?? date('Y-m-d')) }}"
               class="form-control @error('fecha_registro') is-invalid @enderror">
        @error('fecha_registro') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <label class="form-label">Imagen (jpg, png o webp, máx. 5 MB)</label>
        <input type="file" name="imagen" class="form-control @error('imagen') is-invalid @enderror">
        @error('imagen') <div class="invalid-feedback">{{ $message }}</div> @enderror
        @if (isset($medicamento) && $medicamento->imagen)
            <img src="{{ asset('uploads/medicamentos/' . $medicamento->imagen) }}" width="80" class="rounded mt-2">
        @endif
    </div>
</div>

<div class="mt-4">
    <button class="btn btn-primary"><i class="bi bi-save"></i> Guardar</button>
    <a href="{{ route('medicamentos.index') }}" class="btn btn-secondary">Cancelar</a>
</div>