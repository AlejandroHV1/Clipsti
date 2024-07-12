<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite(['resources/css/ap.css','resources/js/app.js'])
    <title>Perfil</title>
</head>
<body>
@include('navbar')
        <div class="max-w-sm mx-auto  mt-10 p-6 bg-black bg-opacity-25 text-white rounded-lg shadow-xl">
        <a href="{{ route('usuario.editarusuario', $dato->pk_usuario) }}" class="bg-blue-500 text-white px-2 py-1 rounded"style="float: right;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
        <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
        <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
        </svg>
        </a>
        <h1 class="text-3xl font-semibold text-center mb-6">Perfil de Usuario</h1>
        
        
        <div class="mb-5">
            <label for="username" class="block mb-2 text-lg text-blue-500 font-medium">Nombre de Usuario</label>
            <div id="username" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base">
            {{$dato->user}}
            </div>
        </div>

        <div class="mb-5">
            <label for="email" class="block mb-2 text-lg text-blue-500 font-medium">Correo</label>
            <div id="email" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base">
            {{$dato->email}}
            </div>
        </div>

        <div class="mb-5">
            <label for="password" class="block mb-2 text-lg text-blue-500 font-medium">Contraseña</label>
            <div id="password" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base">
            {{$dato->password}}
            </div>
        </div>

        <div>
            <h2 class="text-2xl font-semibold mb-4">Clips Subidos: {{$dato->cantidad_clips}}</h2>
            <ul class="space-y-4">
                <a href="{{ url('/clipusuario') }}">
                <li href="" class="bg-gray-700 p-4 rounded-lg shadow-md cursor-pointer"  onclick="toggleClipList()">Ver Clips Subidos</li>
                </a>
            </ul>
        </div>
        
    </div>


    
</body>
</html>