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

      
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
      <ul class="flex flex-col font-medium p-5 md:p-0 mt-4 border border-gray-100 rounded-lg  md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-slate-950 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href=" {{url('/')}}" class="block py-2 px-3 text-white text-lg rounded hover:bg-violet-700 md:hover:bg-transparent md:hover:text-violet-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">ClipsTI</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


</body>


</html>


