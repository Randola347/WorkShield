<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión | WorkShield</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-card {
            width: 400px;
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 2rem;
        }
        .brand {
            text-align: center;
            color: #0d6efd;
            font-weight: bold;
            font-size: 1.5rem;
        }
        .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="brand mb-3">WorkShield | 404 Bros Found</div>
    <h4 class="text-center mb-4">Iniciar Sesión</h4>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input id="email" type="email" name="email" class="form-control" required autofocus>
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input id="password" type="password" name="password" class="form-control" required>
            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="remember" class="form-check-input" id="remember_me">
            <label for="remember_me" class="form-check-label">Recordarme</label>
        </div>

        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
</div>

</body>
</html>
