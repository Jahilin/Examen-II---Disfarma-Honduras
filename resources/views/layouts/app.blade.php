<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | DISFARMA Honduras</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('sb_admin/css/styles.css') }}" rel="stylesheet">
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="{{ route('dashboard') }}">DISFARMA Honduras</a>
        <button class="btn btn-link btn-sm me-4" id="sidebarToggle" type="button">
            <i class="bi bi-list"></i>
        </button>
        <ul class="navbar-nav ms-auto me-3 flex-row align-items-center">
            <li class="nav-item text-light me-3">
                <i class="bi bi-person-circle"></i> {{ auth()->user()->name }}
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-outline-light btn-sm">Cerrar sesión</button>
                </form>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="text-center py-3">
                            <i class="bi bi-capsule-pill text-info" style="font-size: 2.5rem;"></i>
                            <div class="text-white fw-bold">DISFARMA Honduras</div>
                        </div>

                        <div class="sb-sidenav-menu-heading">Principal</div>
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                           href="{{ route('dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-speedometer2"></i></div>
                            Dashboard
                        </a>

                        <div class="sb-sidenav-menu-heading">Módulos</div>
                        <a class="nav-link {{ request()->routeIs('medicamentos.*') ? 'active' : '' }}"
                           href="{{ route('medicamentos.index') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-capsule"></i></div>
                            Medicamentos
                        </a>
                        <a class="nav-link {{ request()->routeIs('proveedores.*') ? 'active' : '' }}"
                           href="{{ route('proveedores.index') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-truck"></i></div>
                            Proveedores
                        </a>
                        <a class="nav-link {{ request()->routeIs('empleados.*') ? 'active' : '' }}"
                           href="{{ route('empleados.index') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-people"></i></div>
                            Empleados
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Sesión iniciada como:</div>
                    {{ auth()->user()->name }}
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                @if (session('success'))
                    <div class="container-fluid px-4 pt-3">
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    </div>
                @endif

                @yield('content')
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4 text-center small text-muted">
                    &copy; {{ date('Y') }} Droguería y Distribuidora Farmacéutica San Rafael S. de R.L.
                    (DISFARMA Honduras) · Tegucigalpa y San Pedro Sula
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('sb_admin/js/scripts.js') }}"></script>
</body>
</html>