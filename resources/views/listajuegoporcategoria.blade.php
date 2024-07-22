<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@include('navbar')

<br>  

<!-- Main Content -->
<div class="p-4 " style="padding-left: 5%; padding-right: 5%;">
    <h2 class="text-4xl font-semibold mb-4 text-white text-center">Juegos</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-5 ">
            @foreach ($juego_por_categoria as $dato)
                <!-- Tarjeta de juego -->
                <a href="{{ route('clip.listaclipsporjuego', ['tipo_juego_id' => $dato->pk_tipo_juego]) }}">
                    <div class="bg-gray-600 rounded-lg overflow-hidden shadow-lg">
                        <img class="w-full h-48 object-cover" src="{{ Storage::url($dato->portada) }}" alt="{{$dato->nombre_tipo_juego}}">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold font-sans text-gray-200 truncate">{{$dato->nombre_tipo_juego}}</h3>
                            <p class="text-gray-400">Categoría: Social</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
</div>
</body>
</html>