<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action=" {{route('usuario.actualizarusuario', $editarusuario->pk_usuario)}}" method="post">
        @csrf
        <input type="text" name="nuevo_usuario" value="{{$editarusuario->user}}">
        <input type="text" name="nuevo_correo" value="{{$editarusuario->email}}">
        <button type="submit">enviar</button>
    </form>
</body>
</html>