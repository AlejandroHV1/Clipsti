<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite(['resources/css/ap.css','resources/js/app.js'])
    <title>todas las categorias pal admin</title>
</head>
<body>
    @include('navbar')
    <br><br>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-white">
                <thead class="text-xs text-white uppercase bg-slate-800">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Categoria
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Descripción
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acción
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($todo_categorias as $dato)
                    <tr class="bg-slate-800 border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap dark:text-white">
                        {{$dato->nombre_cat}}
                        </th>
                        <td class="px-6 py-4">
                        {{$dato->descripcion_cat}}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('categoria.editarcategoria', $dato->pk_categoria) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar Categoria </a>
                            <a href="{{route('categoria.eliminarcategoria', ['pk_categoria' => $dato->pk_categoria])}}" class="font-medium text-red-600 dark:text-red-500 hover:underline ml-4">Eliminar Categoria</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
</body>
</html>