<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorar</title>
</head>
<body>
    <h1>Categorias</h1>
        @foreach ($dato_categorias as $dato)
            <div>
                <a href="{{ route('tipo_juego.listajuegoporcategoria', ['categoria_id' => $dato->pk_categoria]) }}">{{$dato->nombre_cat}}</a>
            </div>
        @endforeach

    <h1>juegos</h1>
        @foreach ($dato_tipos_juego as $dato_juego)
            <div>
                <a href="{{ route('clip.listaclipsporjuego', ['tipo_juego_id' => $dato_juego->pk_tipo_juego]) }}">
                    {{ $dato_juego->nombre_tipo_juego }}
                </a>

                <img src="{{ Storage::url($dato_juego->portada) }}" alt="no se cargo la imagen">
            </div>
        @endforeach
</body>
</html>