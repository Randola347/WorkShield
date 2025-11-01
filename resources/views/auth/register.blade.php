<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrarse | WorkShield</title>
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
        .register-card {
            width: 420px;
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
        .btn-success {
            width: 100%;
        }
    </style>
</head>
<body>

<div class="register-card">
    <div class="brand mb-3">WorkShield | 404 Bros Found</div>
    <h4 class="text-center mb-4">Crear Cuenta</h4>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre completo</label>
            <input id="name" type="text" name="name" class="form-control" required autofocus>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input id="email" type="email" name="email" class="form-control" required>
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input id="password" type="password" name="password" class="form-control" required>
            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Registrarse</button>

        <div class="text-center mt-3">
            <small>¿Ya tienes cuenta? <a href="{{ route('login') }}">Iniciar sesión</a></small>
        </div>
    </form>
</div>

</body>
</html>
