<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lista de juegos pal admin</title>
</head>
<body>
<h1>Juegos</h1>
    @foreach ($lista_juegos as $dato)
        <a href="">
            <h2>{{$dato->nombre_tipo_juego}}</h2>
            <h4>{{$dato->fk}}</h4>
        <img style="max-width: 150px" src="{{ Storage::url($dato->portada) }}" alt="">
        </a>
            <div>
                <a href="{{ route('tipo_juego.editarjuego', $dato->pk_tipo_juego) }}">editar</a>
                <br>
                <a href="{{route('tipo_juego.eliminarjuego', ['pk_tipo_juego' => $dato->pk_tipo_juego])}}">eliminar</a>
            </div>
        
    @endforeach
</body>
</html>