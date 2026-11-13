@php
    $cargos = ['Regente Farmacéutico', 'Asistente de Farmacia', 'Jefe de Bodega', 'Despachador', 'Cajero'];
    $estados = ['Activo', 'Inactivo'];
@endphp

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">DNI (13 dígitos, sin guiones)</label>
        <input type="text" name="identidad" maxlength="13" value="{{ old('identidad', $empleado->identidad ?? '') }}"
               class="form-control @error('identidad') is-invalid @enderror">
        @error('identidad') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Correo</label>
        <input type="email" name="correo" value="{{ old('correo', $empleado->correo ?? '') }}"
               class="form-control @error('correo') is-invalid @enderror">
        @error('correo') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', $empleado->nombre ?? '') }}"
               class="form-control @error('nombre') is-invalid @enderror">
        @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Apellido</label>
        <input type="text" name="apellido" value="{{ old('apellido', $empleado->apellido ?? '') }}"
               class="form-control @error('apellido') is-invalid @enderror">
        @error('apellido') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Cargo</label>
        <select name="cargo" class="form-select @error('cargo') is-invalid @enderror">
            <option value="">Seleccione...</option>
            @foreach ($cargos as $c)
                <option value="{{ $c }}" {{ old('cargo', $empleado->cargo ?? '') == $c ? 'selected' : '' }}>{{ $c }}</option>
            @endforeach
        </select>
        @error('cargo') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Salario base mensual (L.)</label>
        <input type="number" step="0.01" name="salario" value="{{ old('salario', $empleado->salario ?? '') }}"
               class="form-control @error('salario') is-invalid @enderror">
        @error('salario') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Fecha de ingreso</label>
        <input type="date" name="fecha_ingreso" value="{{ old('fecha_ingreso', $empleado->fecha_ingreso ?? '') }}"
               class="form-control @error('fecha_ingreso') is-invalid @enderror">
        @error('fecha_ingreso') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Estado</label>
        <select name="estado" class="form-select @error('estado') is-invalid @enderror">
            @foreach ($estados as $es)
                <option value="{{ $es }}" {{ old('estado', $empleado->estado ?? 'Activo') == $es ? 'selected' : '' }}>{{ $es }}</option>
            @endforeach
        </select>
        @error('estado') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mt-4">
    <button class="btn btn-primary"><i class="bi bi-save"></i> Guardar</button>
    <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
</div>