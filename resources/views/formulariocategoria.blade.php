<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-slate-900">
@if(session('id'))
        @include("navbar")
        <!-- El resto de tu contenido aquí... -->
        @else
            <script>
                window.location.href="{{url('/')}}";
            </script>
    @endif
<br>
<br>
<br>
<br>
<br>
<form action="{{ route('categoria.insertarcategoria') }}" method="post" class="max-w-sm mx-auto">
    @csrf
  <div class="mb-5">
      <label for="large-input" class="block mb-2 text-sm font-medium text-white dark:text-white">Nombre de la categoria</label>
      <input name="nombre_categoria" type="text" id="large-input" class="block w-full p-4 text-dark border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-violet-700 focus:border-violet-700 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Agrega la nueva categoría">
  </div>
 
    <label for="message" class="block mb-2 text-sm font-medium text-white dark:text-white">Descripción</label>
    <textarea name="descripcion_categoria" id="message" rows="4" class="block p-2.5 w-full text-sm text-dark bg-gray-50 rounded-lg border border-gray-300 focus:ring-violet-700 focus:border-violet-700 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Describe tu Descripción"></textarea>
    <br>
    <div style="display: flex; justify-content: center;">
        <button  class="bg-gray-700 text-center text-white p-4 rounded-lg shadow-md cursor-pointer " type="submit">Guardar Cambios</button>
    </div>

</form>



</body>
</html>
