@php
    $categorias = ['Fármacos', 'Material Quirúrgico', 'Equipos'];
    $dias = [15, 30, 45, 60];
    $estados = ['Activo', 'Inactivo'];
@endphp

<div class="row g-3">
    <div class="col-md-4">
        <label class="form-label">RTN (14 dígitos)</label>
        <input type="text" name="rtn" maxlength="14" value="{{ old('rtn', $proveedor->rtn ?? '') }}"
               class="form-control @error('rtn') is-invalid @enderror">
        @error('rtn') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-8">
        <label class="form-label">Empresa (razón social)</label>
        <input type="text" name="empresa" value="{{ old('empresa', $proveedor->empresa ?? '') }}"
               class="form-control @error('empresa') is-invalid @enderror">
        @error('empresa') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Contacto (asesor comercial)</label>
        <input type="text" name="contacto" value="{{ old('contacto', $proveedor->contacto ?? '') }}"
               class="form-control @error('contacto') is-invalid @enderror">
        @error('contacto') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Teléfono (8 dígitos)</label>
        <input type="text" name="telefono" maxlength="8" value="{{ old('telefono', $proveedor->telefono ?? '') }}"
               class="form-control @error('telefono') is-invalid @enderror">
        @error('telefono') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Categoría</label>
        <select name="categoria" class="form-select @error('categoria') is-invalid @enderror">
            <option value="">Seleccione...</option>
            @foreach ($categorias as $c)
                <option value="{{ $c }}" {{ old('categoria', $proveedor->categoria ?? '') == $c ? 'selected' : '' }}>{{ $c }}</option>
            @endforeach
        </select>
        @error('categoria') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Límite de crédito (L.)</label>
        <input type="number" step="0.01" name="limite_credito"
               value="{{ old('limite_credito', $proveedor->limite_credito ?? '') }}"
               class="form-control @error('limite_credito') is-invalid @enderror">
        @error('limite_credito') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Días de crédito</label>
        <select name="dias_credito" class="form-select @error('dias_credito') is-invalid @enderror">
            <option value="">Seleccione...</option>
            @foreach ($dias as $d)
                <option value="{{ $d }}" {{ old('dias_credito', $proveedor->dias_credito ?? '') == $d ? 'selected' : '' }}>{{ $d }} días</option>
            @endforeach
        </select>
        @error('dias_credito') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Estado</label>
        <select name="estado" class="form-select @error('estado') is-invalid @enderror">
            @foreach ($estados as $e)
                <option value="{{ $e }}" {{ old('estado', $proveedor->estado ?? 'Activo') == $e ? 'selected' : '' }}>{{ $e }}</option>
            @endforeach
        </select>
        @error('estado') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Fecha de registro</label>
        <input type="date" name="fecha_registro"
               value="{{ old('fecha_registro', $proveedor->fecha_registro ?? date('Y-m-d')) }}"
               class="form-control @error('fecha_registro') is-invalid @enderror">
        @error('fecha_registro') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mt-4">
    <button class="btn btn-primary"><i class="bi bi-save"></i> Guardar</button>
    <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Cancelar</a>
</div>