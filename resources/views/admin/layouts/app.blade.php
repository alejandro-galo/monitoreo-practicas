<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>

    <!-- Bootstrap + FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
        body { margin: 0; font-family: 'Segoe UI', sans-serif; }

        .sidebar {
            width: 240px;
            background: #2f3542;
            color: #fff;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }

        .sidebar h3 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
            color: #f1f2f6;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #dcdde1;
            text-decoration: none;
            padding: 12px 20px;
            transition: background 0.3s, color 0.3s;
        }

        .sidebar a:hover {
            background: #57606f;
            color: #ffffff;
        }

        .sidebar a i {
            width: 20px;
            text-align: center;
        }

        .content {
            margin-left: 240px;
            padding: 30px;
            background: #f1f2f6;
            min-height: 100vh;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h3><i class="fa fa-cogs"></i> ADMIN</h3>
    <a href="{{ url('/admin/Trabajadores') }}"><i class="fa fa-users"></i> Usuarios</a>
    <a href="{{ url('/admin/docentes') }}"><i class="fa fa-user-circle"></i> Docentes</a>
    <a href="{{ url('/admin/estudiantes') }}"><i class="fa fa-users"></i> Estudiantes</a>
    <a href="{{ url('/admin/practicas') }}"><i class="fa fa-briefcase"></i> Prácticas</a>
    <a href="{{ url('/admin/empresas') }}"><i class="fa fa-building"></i> Empresas</a>
    <a href="{{ url('/admin/Facultad') }}"><i class="fa fa-bank"></i> Facultad</a>
    <a href="{{ url('/admin/Carreras') }}"><i class="fa fa-diamond"></i> Carrera</a>

    <a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Cerrar sesión</a>
</div>

<div class="content">
    @yield('contenido')
</div>

</body>
</html>
