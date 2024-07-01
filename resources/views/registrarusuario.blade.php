<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro</title>
</head>
<body>
    <form action="{{ route('usuario.registrar') }}" method="post">
        @csrf
        <input type="text" name="usuario" placeholder="nombre de ususario">
        <input type="text" name="correo" placeholder="correo">
        <input type="text" name="contrasena" placeholder="contraseña">
        <button type="submit">Registrarte</button>
    </form>
</body>
</html>