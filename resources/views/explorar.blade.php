<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorar</title>
</head>
<body>
@include('navbar')

<div class="flex flex-wrap justify-center space-x-4 p-8">
    @foreach ($dato_categorias as $dato)
        <a href="{{ route('tipo_juego.listajuegoporcategoria', ['categoria_id' => $dato->pk_categoria]) }}">
            <div class="bg-purple-600 px-4 py-2 rounded-full flex items-center space-x-2 text-white text-lg font-semibold">
                <span class="material-icons"></span>
                <span>{{$dato->nombre_cat}}</span>
                <!-- <img src="{{ asset('img/games.png') }}" alt="juegos" class="h-8 w-auto"> -->
            </div>
        </a>
    @endforeach
</div>


<!-- Main Content -->
<div class="p-4 ">
    <h2 class="text-2xl font-bold mb-4 text-white">Juegos</h2>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5 ">
        @foreach ($dato_tipos_juego as $dato_juego)
            <a href="{{ route('clip.listaclipsporjuego', ['tipo_juego_id' => $dato_juego->pk_tipo_juego]) }}">
            <div class="bg-gray-600 rounded-lg overflow-hidden shadow-lg">
                <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $dato_juego->portada) }}" alt="{{ $dato_juego->nombre_tipo_juego }}">
                <div class="p-4">
                    <h3 class="text-lg font-semibold font-sans text-gray-200">{{ $dato_juego->nombre_tipo_juego }}</h3>
                </div>
            </div>
            </a>
        @endforeach 
    </div>
</div>

   
</body>
</html>