<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario clip</title>
</head>
<body>
@include('navbar')
<br>
<br>
<form action="{{ route('clip.insertarclip') }}" method="post" enctype="multipart/form-data" class="max-w-sm mx-auto">
    @csrf
<h2 class="text-2xl font-bold mb-4 text-white">Subir Clips</h2>
  <h1></h1>
  <div class="mb-5">
      <label for="large-input" class="block mb-2 text-sm font-medium text-white dark:text-white">Titulo del Clip</label>
      <input name="titulo_clip" type="text" id="large-input" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-violet-700 focus:border-violet-700 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  </div>
  <div class="mb-5">
  <label for="message" class="block mb-2 text-sm font-medium text-white dark:text-white">Descripción</label>
  <textarea name="descripcion_clip" id="message" rows="4" class="block p-2.5 w-full text-sm text-dark bg-gray-50 rounded-lg border border-gray-300 focus:ring-violet-700 focus:border-violet-700 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Describe tu Descripción"></textarea>
  </div>
  <label for="categorias" class="block mb-2 text-sm font-medium text-white dark:text-white">Selecciona la categoría</label>
  <select name="categoria" id="categorias" class="bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg focus:ring-violet-700 focus:border-violet-700 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-violet-700 dark:focus:border-blue-500">

                            <option option value="" disabled selected>Categoria del juego</option>
                            @php
                                    use App\Models\Categoria;
                                    $datos_categoria = Categoria::all();
                            @endphp

                            @foreach ($datos_categoria as $dato)
                                    <option value="{{$dato->pk_categoria}}">{{$dato->nombre_cat}}</option>
                            @endforeach
  </select>
  <br>
  <label for="tipojuegos" class="block mb-2 text-sm font-medium text-white dark:text-white">Juego</label>
  <select name="tipojuego" id="tipojuegos" class="bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg focus:ring-violet-700 focus:border-violet-700 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-violet-700 dark:focus:border-blue-500">
                            <option value="" disabled selected>Selecciona el juego</option>
                            @php
                                    use App\Models\Tipo_juego;
                                    $dato_tipojuego = Tipo_juego::all();
                            @endphp

                            @foreach ($dato_tipojuego as $datotipojuego)
                                    <option value="{{$datotipojuego->pk_tipo_juego}}">{{$datotipojuego->nombre_tipo_juego}}</option>
                            @endforeach                      
  </select>
  <br>
  <label class="block mb-2 text-sm font-medium text-white dark:text-white" for="select_file">Seleccionar Archivo</label>
  <input name="clip" class="block w-full text-sm text-gray-900 border  border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="select_file_help" id="select_file" type="file">
  <br>
    <button type="submit" class="bg-gray-700 text-center text-white p-4 rounded-lg shadow-md cursor-pointer">Subir Clip</button>
</form>
</body>
</html>