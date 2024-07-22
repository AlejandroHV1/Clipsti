<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    /* Añadir estilos específicos para manejar el desbordamiento del texto */
    #descrippreview {
      overflow-wrap: break-word;
      word-break: break-word;
    }
  </style>
</head>
<body class="bg-gray-900 text-white">
@include('navbar')

<br>
<br>
<div class="container mx-auto p-4 flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
    <div class="w-full md:w-2/3 shadow-md rounded-lg overflow-hidden bg-gradient-to-t from-blue-900 to-slate-800">
        <!-- Contenedor con relación de aspecto 16:9 -->
        <div class="relative" style="padding-top: 56.25%; /* 16:9 aspect ratio */">
            <video id="videopreview" class="absolute inset-0 w-full h-full object-contain bg-black" controls muted autoplay>
                <source src="{{ asset('storage/' . $dato_clip->video) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="p-4 space-y-2">
            <h2 id="titulopreview" class="text-lg text-white font-semibold">{{$dato_clip->nombre_clip}}</h2>
            <p id="descrippreview" class="text-gray-300">{{ $dato_clip->descripcion_clip }}</p>
        </div>
    </div>

    <!-- formulario -->
    <form action="{{ route('clip.actualizarclip', $dato_clip->pk_clip) }}" method="post" enctype="multipart/form-data"  class="w-full md:w-1/3 max-w-sm bg-gray-800 p-6 rounded-lg shadow-md space-y-4">
        @csrf
        <h2 class="text-2xl font-bold mb-4">¿Algo está mal?</h2>
        <h2 class="text-2xl font-bold mb-4">No problema, ¡EDITA TU CLIP!</h2>
        <div class="mb-5">
            <label for="titulo" class="block mb-2 text-sm font-medium">¿Cambiarás el Título?</label>
            <input name="nuevo_nombre_clip" value="{{$dato_clip->nombre_clip}}" type="text" id="titulo" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-violet-700 focus:border-violet-700" placeholder="Nuevo Nombre">
        </div>
        <div class="mb-5">
            <label for="descripcion" class="block mb-2 text-sm font-medium">¿Así tenías tu descripción 0.o?</label>
            <textarea name="nuevo_descripcion_clip" id="descripcion" rows="4" class="block p-2.5 w-full text-sm text-black bg-gray-50 rounded-lg border border-gray-300 focus:ring-violet-700 focus:border-violet-700" placeholder="Describe tu Nueva Descripción">{{$dato_clip->descripcion_clip}}</textarea>
        </div>
        <div class="mb-5">
            <label for="categoria" class="block mb-2 text-sm font-medium">¿Apoco te equivocaste de categoría?</label>
            <select  name="nuevo_categoria" id="categoria" class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-violet-700 focus:border-violet-700 block w-full p-2.5">
                <option disabled selected>Categoria del juego</option>
                @php
                    use App\Models\Categoria;
                    $datos_categoria = Categoria::select('categoria.*')->where('estatus', '=', '1')->get();
                @endphp
                @foreach ($datos_categoria as $dato)
                    <option value="{{$dato->pk_categoria}}">{{$dato->nombre_cat}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-5">
            <label for="tipojuego" class="block mb-2 text-sm font-medium">¿Juego Equivocado?</label>
            <select  name="nuevo_tipojuego" id="tipojuego" class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-violet-700 focus:border-violet-700 block w-full p-2.5">
                <option value="{{$dato_clip->fk_tipo_juego}}" disabled selected>Selecciona el juego</option>
                @php
                    use App\Models\Tipo_juego;
                    $dato_tipojuego = Tipo_juego::select('tipo_juego.*')->where('estatus', '=', '1')->get();
                @endphp
                @foreach ($dato_tipojuego as $datotipojuego)
                    <option value="{{$datotipojuego->pk_tipo_juego}}">{{$datotipojuego->nombre_tipo_juego}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium" for="select_file">¿Clip equivocado :c? Selecciona el correcto c:</label>
            <input name="nuevo_clip" id="video" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" aria-describedby="select_file_help" id="select_file" type="file">
        </div>
        <button type="submit" class="w-full text-white bg-violet-700 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Editar Clip</button>
    </form>
</div>

<script>
    document.getElementById('titulo').addEventListener('input', function(event) {
        document.getElementById('titulopreview').textContent = event.target.value;
    });

    document.getElementById('descripcion').addEventListener('input', function(event) {
        document.getElementById('descrippreview').textContent = event.target.value;
    });

    document.getElementById('video').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('videopreview');
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>

</body>
</html>
