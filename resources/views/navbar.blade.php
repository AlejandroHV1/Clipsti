<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  @vite(['resources/css/app.css','resources/js/app.js'])
  <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</head>
<body class="bg-gradient-to-t from-slate-800 to to-blue-900 min-h-screen">

<nav class="bg-slate-950 border-gray-200 dark:bg-gray-900">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="{{url('/')}}" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="{{ asset('img/clipstilogo.png') }}" class="h-8" alt="Flowbite Logo" />
      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"></span>
    </a>
    <div class="flex items-center md:order-2 space-x-3 md:space-x-6 rtl:space-x-reverse">
    <!-- Botón de login -->
    @if(session ('fk_tipo_usuario') == null)
      <a href="{{url('/iniciarsesion')}}" class="block px-3 py-2 text-lg  text-white rounded-lg bg-violet-700 hover:bg-violet-900 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Iniciar sesión / Registrarse</a>
    @endif
      <!-- Dropdown menu del usuario -->
      <button type="button" class="flex text-sm  bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        <img class="w-8 h-8 rounded-full" src="{{ asset('img/clipstilogo.png') }}" alt="user photo">
      </button>
      <!-- Dropdown del usuario -->
      <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
        <div class="px-4 py-3 bg-slate-950">
        @if(session ('fk_tipo_usuario') == 1)
          <span class="block text-sm text-gray-500 dark:text-white">Administrador</span>
          <span class="block text-sm text-gray-500 dark:text-white">Aqui va el nombre de usuario</span>
          <span class="block text-sm text-gray-500 truncate dark:text-gray-400">Aqui va el correo</span>
        @endif
        @if(session ('fk_tipo_usuario') == 2)
          <span class="block text-sm text-gray-500 dark:text-white">Aqui va el nombre de usuario</span>
          <span class="block text-sm text-gray-500 truncate dark:text-gray-400">Aqui va el correo</span>
        @endif 
        @if(session ('fk_tipo_usuario') == null)
          <span class="block text-sm text-gray-500 dark:text-white"><a href="{{url('/iniciarsesion')}}" style="color: red">INICIA SESION</a></span>
          <span class="block text-sm text-gray-500 truncate dark:text-gray-400">para poder subir clips</span>
        @endif
        </div>
        <ul class=" bg-slate-950  py-2" aria-labelledby="user-menu-button" >
        @if(session ('fk_tipo_usuario') == 1) 
          <li>
            <a href="{{ url('/formulariocategoria') }}" class="block px-4 py-2 text-sm bg-slate-950 text-white hover:bg-violet-700 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Agregar Categoria</a>
          </li>
          <li>
            <a href="{{ url('/formulariotipojuego') }}" class="block px-4 py-2 text-sm bg-slate-950 text-white hover:bg-violet-700 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Agregar Juego</a>
          </li>
          <li>
            <a href="#" class="block px-4 py-2 text-sm bg-slate-950 text-white hover:bg-violet-700 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Agregar Categoria</a>
          </li>
          <li>
            <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm bg-slate-950 text-white hover:bg-violet-700 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
          </li>
        @endif
        @if(session ('fk_tipo_usuario') == 2) 
          <li>
            <a href="{{ url('/vermiperfil') }}" class="block px-4 py-2 text-sm bg-slate-950 text-white hover:bg-violet-700 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Perfil</a>
          </li>
          <li>
            <a href="{{ url('/formularioclips') }}" class="block px-4 py-2 text-sm bg-slate-950 text-white hover:bg-violet-700 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Subir Clip</a>
          </li>
          <li>
            <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm bg-slate-950 text-white hover:bg-violet-700 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
          </li>
        @endif  
        </ul>
      </div>
      
      <!-- Botón para toggle del menú en dispositivos móviles -->
      <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
      <ul class="flex flex-col font-medium p-5 md:p-0 mt-4 border border-gray-100 rounded-lg  md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-slate-950 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href=" {{url('/explorar')}}" class="block py-2 px-3 text-white text-lg rounded hover:bg-violet-700 md:hover:bg-transparent md:hover:text-violet-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Explorar</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


</body>


</html>


