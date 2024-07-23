<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar juego pa admin esto</title>
    <style>
        .image-preview-container {
            max-width: 200px; /* Fija el ancho máximo del contenedor */
            height: auto; /* Mantén la altura automática */
        }
        .image-preview {
            width: 100%; /* Asegura que la imagen llene el contenedor */
            height: auto; /* Mantén la proporción de la imagen */
            object-fit: cover; /* Asegura que la imagen se ajuste al contenedor */
        }
    </style>
</head>
<body>
@include('navbar')
<br>

<form action="{{ route('tipo_juego.actualizarjuego', $editarjuego->pk_tipo_juego) }}" method="post" enctype="multipart/form-data" class="max-w-md mx-auto">
    @csrf
    <h2 class="text-2xl font-bold mb-4 text-white text-center">Editar Juego</h2>
    <div class="mb-5">
        <label for="large-input" class="block mb-2 text-sm font-medium text-white dark:text-white">Nombre del Juego</label>
        <input name="nuevo_tipo_juego" value="{{$editarjuego->nombre_tipo_juego}}" type="text" id="large-input" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-violet-700 focus:border-violet-700" placeholder="Nuevo Nombre">
    </div>
    <label for="categorias" class="block mb-2 text-sm font-medium text-white dark:text-white">Selecciona 1</label>
    <select id="categorias" name="nuevo_categoria" class="bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg focus:ring-violet-700 focus:border-violet-700 block w-full p-2.5">
        <option value="selected">Categoria</option>
        @php
            use App\Models\Categoria;
            $categorias = Categoria::select('categoria.*')->where('estatus', '=', '1')->get();
        @endphp
        @foreach ($categorias as $dato)
            <option value="{{ $dato->pk_categoria }}" {{ $dato->pk_categoria == $editarjuego->fk_categoria ? 'selected' : '' }}>
                {{ $dato->nombre_cat }}
            </option>
        @endforeach
    </select>

    <div class="my-5 flex flex-col sm:flex-row justify-between items-center">
        <div>
            <label for="current-game-image" class="block mb-2 text-sm font-medium text-white dark:text-white">Portada Actual del Juego</label>
            <img src="{{ Storage::url($editarjuego->portada) }}" alt="{{$editarjuego->nombre_tipo_juego}}" class="image-preview-container image-preview rounded-lg">
        </div>
        <div>
            <label for="new-game-image" class="block mb-2 text-sm font-medium text-white dark:text-white">Nueva Portada del Juego</label>
            <img id="new-game-image" src="https://i.pinimg.com/564x/6e/c6/ee/6ec6ee9ce557482524b13a1d7006c57c.jpg" alt="Nueva Imagen del Juego" class="image-preview-container image-preview rounded-lg">
        </div>
    </div>
    
    <label class="block mb-2 text-sm font-medium text-white dark:text-white" for="select_file">Seleccionar Archivo</label>
    <input name="nuevo_portada" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" aria-describedby="select_file_help" id="select_file" type="file">
    <div class="flex justify-center mt-4">
        <button type="submit" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Guardar</button>
    </div>
</form>  

<script>
    document.getElementById('select_file').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('new-game-image');
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
