<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar categoria</title>
</head>
<body>
    <form action=" {{route('categoria.actualizarcategoria', $editarcategoria->pk_categoria)}}" method="post">
        @csrf
        <input type="text" name="nombre_categoria" value="{{$editarcategoria->nombre_cat}}">
        <input type="text" name="descripcion_categoria" value="{{$editarcategoria->descripcion_cat}}">
        <button type="submit">enviar</button>
    </form>
</body>
</html>