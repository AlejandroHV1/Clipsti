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
<br>
<div class="text-5xl font-semibold text-gray-300 text-center">{{$juego->nombre_tipo_juego}}</div>
<br>
<div class="container mx-auto p-4">
    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
        @foreach ($clipsporjuego as $dato)
            <a href="{{ route('clip.verclip', ['pk_clip' => $dato->pk_clip]) }}">
                <div class="shadow-md rounded-lg overflow-hidden bg-gradient-to-t from-blue-900 to-slate-800">
                    <!-- Contenedor con relación de aspecto 16:9 -->
                    <div class="relative" style="padding-top: 56.25%; /* 16:9 aspect ratio */">
                        <video class="absolute inset-0 w-full h-full object-cover" >
                            <source src="{{ asset('storage/' . $dato->video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="p-4">
                        <h2 class="text-lg text-white font-semibold">{{$dato->nombre_clip}}</h2>
                        <p class="text-gray-300">{{$dato->descripcion_clip}}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>



    
</body>
</html>