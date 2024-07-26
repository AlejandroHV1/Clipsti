<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar usuario</title>
</head>
<body>
@include('navbar')
<form action=" {{route('usuario.actualizarusuario', $editarusuario->pk_usuario)}}" method="post">
        @csrf
    <div class="max-w-sm mx-auto  mt-10 p-6 bg-black bg-opacity-25 text-white rounded-lg shadow-xl">
        <h1 class="text-3xl font-semibold text-center mb-6">Editar Perfil de Usuario</h1>
        
        
        <div class="mb-5">
        <label for="username" class="block mb-2 text-lg text-blue-500 font-medium">Nuevo nombre</label>
        <input name="nuevo_usuario" value="{{$editarusuario->user}}" id="username" type="text" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base" placeholder="Nuevo nombre">
    </div>

        <div class="mb-5">
        <label for="email" class="block mb-2 text-lg text-blue-500 font-medium">Nuevo Correo</label>
        <input  name="nuevo_correo" value="{{$editarusuario->email}}" id="email" type="email" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base" placeholder="usuario@example.com">
    </div>

    <!-- <div class="mb-5">
        <label for="password" class="block mb-2 text-lg text-blue-500 font-medium">Nueva Contraseña</label>
        <input id="password" type="password" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base" placeholder="********">
    </div> -->

        <button type="submit" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Guardar</button>

    </div>
</form>



    
</body>
</html>