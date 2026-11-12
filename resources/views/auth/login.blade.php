<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar sesión | DISFARMA Honduras</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="{{ asset('sb_admin/css/styles.css') }}" rel="stylesheet">
</head>
<body class="bg-dark">
    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="col-lg-5 col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header text-center py-4">
                    <i class="bi bi-capsule-pill text-primary" style="font-size: 3rem;"></i>
                    <h3 class="mb-0">DISFARMA Honduras</h3>
                    <small class="text-muted">Droguería y Distribuidora Farmacéutica San Rafael</small>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Correo institucional</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                   placeholder="usuario@disfarma.hn"
                                   class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input type="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">Recordar mi sesión</label>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary">Iniciar sesión</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>