<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>WorkShield | Panel</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Íconos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        /* --- SIDEBAR --- */
        .sidebar {
            background-color: #212529;
            color: #fff;
            width: 250px;
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .sidebar h4 {
            color: #0d6efd;
            text-align: center;
            font-weight: bold;
            margin-top: 1rem;
        }

        .sidebar a {
            color: #ddd;
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            font-size: 0.95rem;
            transition: 0.3s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #343a40;
            color: #fff;
        }

        /* --- MAIN CONTENT --- */
        .main-content {
            margin-left: 250px;
            padding: 2rem;
            transition: margin-left 0.3s ease;
        }

        /* --- NAVBAR --- */
        .navbar {
            background-color: #0d6efd;
            position: fixed;
            top: 0;
            left: 250px;
            right: 0;
            z-index: 1050;
            height: 56px;
            display: flex;
            align-items: center;
            transition: left 0.3s ease;
        }

        .navbar .navbar-brand {
            color: white;
            font-weight: bold;
        }

        .navbar .btn-logout {
            border: 1px solid white;
            color: white;
            font-size: 0.9rem;
        }

        /* --- Responsive ajustes --- */
        @media (max-width: 991px) {
            .sidebar {
                left: -250px;
            }

            .sidebar.show {
                left: 0;
            }

            .navbar {
                left: 0;
            }

            .main-content {
                margin-left: 0;
                padding: 1rem;
            }

            #sidebarToggle {
                display: inline-block;
            }
        }

        #sidebarToggle {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.6rem;
            margin-left: 10px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebarMenu">
        <h4>WorkShield</h4>

        <!-- Enlace Empleados -->
        <a href="{{ route('employees.index') }}" class="{{ request()->routeIs('employees.*') ? 'active' : '' }}">
            👥 Empleados
        </a>

        <!-- Enlace Pagos -->
        <a href="{{ route('payments.index') }}" class="{{ request()->routeIs('payments.*') ? 'active' : '' }}">
            💵 Pagos
        </a>

        <!-- Botón cerrar sesión -->
        <form method="POST" action="{{ route('logout') }}" class="p-3 mt-3">
            @csrf
            <button type="submit" class="btn btn-outline-light w-100">
                <i class="bi bi-box-arrow-right"></i> Cerrar sesión
            </button>
        </form>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-dark">
        <button id="sidebarToggle"><i class="bi bi-list"></i></button>
        <span class="navbar-brand ms-3">Panel Administrativo - 404 Bros Found</span>
        <div class="ms-auto me-3 text-white d-flex align-items-center">
            <span class="me-3">{{ Auth::user()->name ?? 'Usuario' }}</span>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="main-content mt-5 pt-3">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.getElementById('sidebarMenu');
        const toggle = document.getElementById('sidebarToggle');
        toggle.addEventListener('click', () => {
            sidebar.classList.toggle('show');
        });
    </script>
</body>
</html>
