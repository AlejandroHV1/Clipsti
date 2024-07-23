<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar categoria</title>
</head>
<body>
    @include('navbar')

    <br>
    <br>

    <br>
    <form action=" {{route('categoria.actualizarcategoria', $editarcategoria->pk_categoria)}}" method="post" class="max-w-sm mx-auto">
    @csrf
    <div class="mb-5">
        <label for="editarcategoria" class="block mb-2 text-sm font-medium text-white dark:text-white">Editar la Categoría</label>
        <input name="nombre_categoria" value="{{$editarcategoria->nombre_cat}}" type="text" id="editarcategoria" class="block w-full p-4 text-dark border border-gray-300 rounded-lg bg-gray-50 text-base " placeholder="">
    </div>
    
    <!-- comentario dato curtioso, para que muestre el valor que tenia en los tex area
      no se pone el value se pone entre las etiquetas de apertura y cierre del <textarea> -->

    <label for="editardescripcion" class="block mb-2 text-sm font-medium text-white dark:text-white">Editar la Descripción</label>
    <textarea type="text" name="descripcion_categoria" value="" id="editarcategoria" rows="4" class="block p-2.5 w-full text-sm text-dark bg-gray-50 rounded-lg border border-gray-300 focus:ring-violet-700 focus:border-violet-700 " placeholder="Describe tu nueva Descripción">{{$editarcategoria->descripcion_cat}}</textarea>
    
    <br>

    <div style="display: flex; justify-content: center;">
        <button  class="bg-gray-700 text-center text-white p-4 rounded-lg shadow-md cursor-pointer " type="submit">Guardar Cambios</button>
    </div>
    </form>

</body>
</html>