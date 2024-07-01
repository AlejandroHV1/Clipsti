<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        @foreach ($juego_por_categoria as $dato)
        <a href="{{ route('clip.listaclipsporjuego', ['tipo_juego_id' => $dato->pk_tipo_juego]) }}">
                <div>
                    
                    <h2>{{$dato->nombre_tipo_juego}}</h2>
                    <img src="{{ Storage::url($dato->portada) }}" alt="no se cargo la imagen">
                </div>
            </a>
        @endforeach
</body>
</html>