<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>todas las categorias pal admin</title>
</head>
<body>
    <h1>CATEGORIAS</h1>
    @foreach ($todo_categorias as $dato)
        <a href="">
            <h2>{{$dato->nombre_cat}}</h2>
            <h4>{{$dato->descripcion_cat}}</h4>
        </a>
            <div>
                <a href="{{ route('categoria.editarcategoria', $dato->pk_categoria) }}">editar</a>
                <br>
                <a href="{{route('categoria.eliminarcategoria', ['pk_categoria' => $dato->pk_categoria])}}">eliminar</a>
            </div>
        
    @endforeach
</body>
</html>