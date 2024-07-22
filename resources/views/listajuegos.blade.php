<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lista de juegos pal admin</title>
</head>
<body>
@include('navbar')

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-center text-white">
        <thead class="text-base text-white uppercase bg-slate-800">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Juego
                </th>
                <th scope="col" class="px-6 py-3">
                    categoria
                </th>
                <th scope="col" class="px-6 py-3">
                    Imagen
                </th>
                <th scope="col" class="px-6 py-3">
                    Acción
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach ($lista_juegos as $dato)
            <tr class="bg-slate-800 border-b">
                <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap ">
                {{$dato->nombre_tipo_juego}}
                </th>
                <td class="px-6 py-4 font-medium text-white whitespace-nowrap ">
                {{$dato->nombre_cat}}
                </td>
                <td class="px-6 py-4 flex justify-center items-center">
                    <img src="{{ Storage::url($dato->portada) }}" alt="{{$dato->nombre_tipo_juego}}" class="h-12 w-12 sm:h-16 sm:w-16 md:h-24 md:w-24 lg:h-32 lg:w-32 object-cover">
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('tipo_juego.editarjuego', $dato->pk_tipo_juego) }}" class="flex justify-center items-center font-medium text-blue-600 dark:text-blue-500 hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                        Editar Juego
                    </a>
                    <a href="{{route('tipo_juego.eliminarjuego', ['pk_tipo_juego' => $dato->pk_tipo_juego])}}" class="flex justify-center items-center font-medium text-red-600 dark:text-red-500 hover:underline ml-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                        Eliminar Juego
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>



</body>
</html>