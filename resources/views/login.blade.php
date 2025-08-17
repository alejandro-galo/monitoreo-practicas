<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Monitoreo de prácticas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .video-bg {
            position: fixed;
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -2;
            object-fit: cover;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: -1;
        }

        .login-container {
            position: relative;
            z-index: 1;
        }

        .card {
            background: rgba(255, 255, 255, 0.95);
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center login-container">

    <!-- 🎬 Fondo animado con video oficial -->
    <video autoplay muted loop playsinline class="video-bg">
        <source src="https://www.utea.edu.pe/wp-content/uploads/2019/10/utea-presentacion.mp4" type="video/mp4">
    </video>
    <div class="overlay"></div>

    <!-- 🧾 Tarjeta de login -->
    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
        <div class="card-body text-center">
            <!-- 🎯 Icono representativo -->
            <i class="fa fa-graduation-cap text-warning fa-4x mb-3"></i>
            <h4 class="card-title text-primary mb-4">Monitoreo de prácticas</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="/login">
                @csrf

                <div class="mb-3 text-start">
                    <label for="email" class="form-label">Correo institucional</label>
                    <input type="email" class="form-control" id="email" name="email" required placeholder="ejemplo@institucion.edu.pe">
                </div>

                <div class="mb-3 text-start">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required placeholder="********">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-sign-in"></i> Iniciar sesión
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
