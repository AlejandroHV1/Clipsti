<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>
<body>
    <h1>nombre de usuario</h1>
    <span>{{$dato->user}}</span>
    <h1>email</h1>
    <span>{{$dato->email}}</span>
    <h1>contraseña</h1>
    <span>{{$dato->password}}</span>
    <h1>videos subidos</h1>
    <span>{{$dato->cantidad_clips}}</span>
    <a href="{{ url('/clipusuario') }}">ver tus clips</a>
</body>
</html>