<!DOCTYPE html>
<html>
<head>
    <title>Panel Administrador</title>
</head>
<body>
    <h2>Bienvenido, ADMINISTRADOR: {{ session('nombre') }}</h2>
    <a href="/logout">Cerrar sesión</a>
</body>
</html>
