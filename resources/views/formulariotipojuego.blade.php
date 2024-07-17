<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipo Juego</title>
</head>
<body>
@include('navbar')
<br>
<br>
<br>
<br>
<br>
<form action="{{ route('tipo_juego.insertartipojuego') }}" method="POST" enctype="multipart/form-data" class="max-w-sm mx-auto">
    @csrf
    <div class="mb-5">
        <label for="large-input" class="block mb-2 text-sm font-medium text-white dark:text-white">Nombre del juego</label>
        <input name="nombre_tipo_juego" type="text" id="large-input" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-violet-700 focus:border-violet-700 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
        <label for="categorias" class="block mb-2 text-sm font-medium text-white dark:text-white">Selecciona la categoría</label>
        <select name = 'nombre_categoria' id="categorias" class="bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg focus:ring-violet-700 focus:border-violet-700 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-violet-700 dark:focus:border-blue-500">
                            <option value="" disabled selected>categoria del juego</option>
                            @php
                                    use App\Models\Categoria;
                                    $datos_categoria = Categoria::
                                    select('categoria.*')->where('estatus', '=', '1')
                                    ->get();
                            @endphp

                            @foreach ($datos_categoria as $dato)
                                    <option value="{{$dato->pk_categoria}}">{{$dato->nombre_cat}}</option>
                            @endforeach
        </select>
  <br>
  <label class="block mb-2 text-sm font-medium text-white dark:text-white" for="select_file">Selecciona Portada del juego</label>
  <input name="foto_tipo_juego" class="block w-full text-sm text-gray-900 border  border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="select_file_help" id="select_file" type="file">
  
    <br>  
    <div style="display: flex; justify-content: center;">
        <button  class="bg-gray-700 text-center text-white p-4 rounded-lg shadow-md cursor-pointer " type="submit">enviar</button>
    </div>
</form>


</body>
</html>



