<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  @vite(['resources/css/ap.css','resources/js/app.js'])
  <style>
    .carousel-container {
      max-width: 800px;
      margin: 0 auto;
    }
    .carousel-button-prev, .carousel-button-next {
      width: 40px;
      height: 40px;
      background-color: rgba(255, 255, 255, 0.5);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background-color 0.3s;
    }
    .carousel-button-prev:hover, .carousel-button-next:hover {
      background-color: rgba(255, 255, 255, 0.8);
    }
    .carousel-button-prev {
      left: -50px;
    }
    .carousel-button-next {
      right: -50px;
    }
    .carousel-card {
      position: absolute;
      top: 0px;
      background: rgba(0, 0, 0, 0.7);
      color: white;
      padding: 15px 20px;
      border-radius: 5px;
      font-size: 14px;
      width: 200px;
    }
    .carousel-card-title {
      font-size: 15px;
      font-weight: bold;
      margin-bottom: 5px;
    }
    .carousel-card-user {
      font-size: 14px;
    }
  </style>
  <script>
    function toggleVideos() {
      var extraVideos = document.getElementById("extra-videos");
      extraVideos.classList.toggle("hidden");
    }
  </script>
</head>
<body>
@include('navbar')
<br>
<br>
<div id="controls-carousel" class="relative w-full carousel-container" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
        <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <video class="w-full h-full" autoplay muted controls>
                <source src="{{ asset('videos/MeetBunny.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="carousel-card">
                <div class="carousel-card-title">Título de la Imagen 1</div>
                <div class="carousel-card-user">Subido por: Usuario1</div>
            </div>
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
            <video class="w-full h-full" autoplay muted controls>
                <source src="{{ asset('videos/Devorador.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="carousel-card">
                <div class="carousel-card-title">Título de la Imagen 2</div>
                <div class="carousel-card-user">Subido por: Usuario2</div>
            </div>
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <video class="w-full h-full" autoplay muted controls>
                <source src="{{ asset('videos/halov2.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="carousel-card">
                <div class="carousel-card-title">Título del Video</div>
                <div class="carousel-card-user">Subido por: Usuario3</div>
            </div>
        </div>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-1/2 start-0 z-30 carousel-button-prev" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-1/2 end-0 z-30 carousel-button-next" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
<br>
<br>
<div class="text-5xl text-gray-300 text-center">Clips que te pueden gustar</div>
<div class="container mx-auto p-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- video 1 -->
        <div class="shadow-md rounded-lg overflow-hidden bg-gradient-to-t from-blue-900 to to-slate-800">
            <video class="w-full h-90" controls>
                <source src="{{ asset('videos/halov1.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="p-4">
                <h2 class="text-lg text-white font-semibold">EL PRONITE</h2>
                <p class="text-gray-300">BY: ITZ_MaNy</p>
                <div class="flex justify-end space-x-2 mt-4"></div>
            </div>
        </div>
        <!-- video 2 -->
        <div class="bg-gradient-to-t from-blue-900 to to-slate-800 shadow-md rounded-lg overflow-hidden">
            <video class="w-full h-90" controls>
                <source src="{{ asset('videos/Chivalry.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="p-4">
                <h2 class="text-lg text-white font-semibold">Gano la world cup</h2>
                <p class="text-gray-300">Yo soy el mejor del mundo de fortnite</p>
                <div class="flex justify-end space-x-2 mt-4"></div>
            </div>
        </div>
        <!-- video 3 -->
        <div class="bg-gradient-to-t from-blue-900 to to-slate-800 shadow-md rounded-lg overflow-hidden">
            <video class="w-full h-90" controls>
                <source src="{{ asset('videos/lego.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="p-4">
                <h2 class="text-lg text-white font-semibold">LVL 100</h2>
                <p class="text-gray-300">Llegué Al Nivel 100 de Backrooms Y Es Terrible</p>
                <div class="flex justify-end space-x-2 mt-4"></div>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-6">
        <button class="px-4 py-2 bg-blue-500 text-white rounded" onclick="toggleVideos()">Mostrar más videos</button>
    </div>
    <div id="extra-videos" class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4 hidden">
        <!-- video 4 -->
        <div class="shadow-md rounded-lg overflow-hidden bg-gradient-to-t from-blue-900 to to-slate-800">
            <video class="w-full h-90" controls>
                <source src="{{ asset('videos/lara.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="p-4">
                <h2 class="text-lg text-white font-semibold">Título del Video 4</h2>
                <p class="text-gray-300">Descripción del video 4</p>
                <div class="flex justify-end space-x-2 mt-4"></div>
            </div>
        </div>
        <!-- video 5 -->
        <div class="shadow-md rounded-lg overflow-hidden bg-gradient-to-t from-blue-900 to to-slate-800">
            <video class="w-full h-90" controls>
                <source src="{{ asset('videos/halov3.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="p-4">
                <h2 class="text-lg text-white font-semibold">Título del Video 5</h2>
                <p class="text-gray-300">Descripción del video 5</p>
                <div class="flex justify-end space-x-2 mt-4"></div>
            </div>
        </div>
        <!-- video 6 -->
        <div class="shadow-md rounded-lg overflow-hidden bg-gradient-to-t from-blue-900 to to-slate-800">
            <video class="w-full h-90" controls>
                <source src="{{ asset('videos/halov4.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="p-4">
                <h2 class="text-lg text-white font-semibold">Título del Video 6</h2>
                <p class="text-gray-300">Descripción del video 6</p>
                <div class="flex justify-end space-x-2 mt-4"></div>
            </div>
        </div>
    </div>
</div>
<div class="p-4">
  <a href="#" class="block text-2xl font-bold mb-4 text-white hover:text-violet-500 cursor-pointer">
  <h2>Categorías</h2>
</a>

    
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
    <!-- Tarjeta de juego -->
    <a href="#" class="block bg-gray-600 rounded-lg overflow-hidden shadow-lg">
        <img class="w-full h-48 object-cover" src="https://i.pinimg.com/564x/bc/08/3d/bc083d04be54e2d9f586d166aa51cbb4.jpg" alt="Just Chatting">
        <div class="p-4">
            <h3 class="text-lg font-semibold font-sans text-gray-200">Solo chateando</h3>
        </div>
    </a>
    <!-- Repetir la estructura de la tarjeta para cada juego -->
    <!-- Ejemplo de tarjeta repetida -->
    <a href="#" class="block bg-gray-600 rounded-lg overflow-hidden shadow-lg">
        <img class="w-full h-48 object-cover" src="https://i.pinimg.com/736x/a8/7d/fe/a87dfeba31b8e4c2356a0bb10bafef47.jpg" alt="League of Legends">
        <div class="p-4">
            <h3 class="text-lg font-semibold font-sans text-gray-200">League of Legends</h3>
        </div>
    </a>
    <!-- Añadir más tarjetas aquí -->
    <!-- Repite el contenido para demostrar más tarjetas -->
    <a href="#" class="block bg-gray-600 rounded-lg overflow-hidden shadow-lg">
        <img class="w-full h-48 object-cover" src="https://i.pinimg.com/564x/44/fa/dd/44fadd528805a6aa343d25409a7390ce.jpg" alt="GTAV">
        <div class="p-4">
            <h3 class="text-lg font-semibold font-sans text-gray-200">GTAV</h3>
        </div>
    </a>
    <a href="#" class="block bg-gray-600 rounded-lg overflow-hidden shadow-lg">
        <img class="w-full h-48 object-cover" src="https://i.pinimg.com/564x/be/f6/a6/bef6a69578831baa17d74d58684f2c6d.jpg" alt="FORTNITE">
        <div class="p-4">
            <h3 class="text-lg font-semibold font-sans text-gray-200">FORTNITE</h3>
        </div>
    </a>
    <a href="#" class="block bg-gray-600 rounded-lg overflow-hidden shadow-lg">
        <img class="w-full h-48 object-cover" src="https://i.pinimg.com/564x/94/1e/75/941e7589a56f6943b17b2fddbfc3e759.jpg" alt="CSGO">
        <div class="p-4">
            <h3 class="text-lg font-semibold font-sans text-gray-200">CSGO</h3>
        </div>
    </a>
    <a href="#" class="block bg-gray-600 rounded-lg overflow-hidden shadow-lg">
        <img class="w-full h-48 object-cover" src="https://i.pinimg.com/564x/44/fa/dd/44fadd528805a6aa343d25409a7390ce.jpg" alt="GTAV">
        <div class="p-4">
            <h3 class="text-lg font-semibold font-sans text-gray-200">GTAV</h3>
        </div>
    </a>
</div>



</body>
</html>
