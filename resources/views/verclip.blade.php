<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite(['resources/css/ap.css','resources/js/app.js'])
</head>
<body>
@include('navbar')
  <!-- Container -->
  <div class="container mx-auto p-4 flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-4">
    
    <!-- Video Section -->
    <div class="w-full lg:w-2/3 bg-slate-950 p-4 rounded-lg shadow-lg">
      <div class="aspect-w-16 aspect-h-9">
        <video class="w-full h-full" controls>
        <source src="{{ asset('storage/' . $dato_clip->video) }}" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>
      <div class="mt-4">
        <h2 class="text-xl font-semibold text-white">Conoce a BUNNY</h2>
        <p class="text-gray-400">The First Descendants</p>
      </div>
    </div>
    
    <!-- Comments Section -->
    <div class="w-full lg:w-1/3 bg-slate-300 p-4 rounded-lg shadow-lg flex flex-col justify-between">
      <div>
        <h3 class="text-lg font-semibold mb-4 text-center">Comentarios</h3>
        <div id="comments" class="space-y-4 overflow-y-scroll h-96 pr-2">
          <!-- Comment -->
          @foreach ($dato_comentario as $dato)
          <div class="flex items-start space-x-2">
            <div class="bg-gray-700 rounded-full h-8 w-8 flex items-center justify-center text-gray-400">
              <span>E</span>
            </div>
            
            <div>
              <p class="text-sm"><span class="font-semibold">{{$dato->user}}</span> {{ $dato->nombre_com }}</p>
            </div>
            
          </div>
          @endforeach 
        </div>
      </div>
      <div class="mt-4">
            <form action="{{ route('comentario.agregarcomentario') }}" method="POST">
                @csrf
                <input type="hidden" name="pk_clip" value="{{ $dato_clip->pk_clip }}">
                <input type="text" name="comentario" placeholder="Escribe tu mensaje..." class="w-full bg-gray-700 p-2 rounded-lg text-white focus:outline-none"">
                <button type="submit"></button>
            </form>
         </div>
    </div>
  
  </div>




    
</body>
</html>
