<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario clip</title>
    <style>
        /* Estilos para el cuadro de notificación */
        #cuadroNotificacion {
            display: none;
            position: absolute;
            top: 13%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #4CAF50; /* Verde */
            color: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
            font-size: 14px;
            z-index: 1000; /* esto hace que se asegure que la notificación esté en frente */
        }
        .close-btn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 16px;
            cursor: pointer;
            transition: 0.5s;
        }
        .close-btn:hover {
            color: black;
        }
    </style>
</head>
<body>
@include('navbar')

<br><br><br><br>

<form id="formclip" action="{{ route('clip.insertarclip') }}" method="post" enctype="multipart/form-data" class="max-w-sm mx-auto">
    @csrf
<h2 class="text-2xl font-bold mb-4 text-white">Subir Clips</h2>
  <h1></h1>
  <div class="mb-5">
      <label for="large-input" class="block mb-2 text-sm font-medium text-white dark:text-white">Titulo del Clip</label>
      <input name="titulo_clip" type="text" id="titulo_clip" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-violet-700 focus:border-violet-700 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  </div>
  <div class="mb-5">
  <label for="message" class="block mb-2 text-sm font-medium text-white dark:text-white">Descripción</label>
  <textarea name="descripcion_clip" id="descripcion_clip" rows="4" class="block p-2.5 w-full text-sm text-dark bg-gray-50 rounded-lg border border-gray-300 focus:ring-violet-700 focus:border-violet-700 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Describe tu Descripción"></textarea>
  </div>
  <label for="categorias" class="block mb-2 text-sm font-medium text-white dark:text-white">Selecciona la categoría</label>
  <select name="categoria" id="categoria" class="bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg focus:ring-violet-700 focus:border-violet-700 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-violet-700 dark:focus:border-blue-500">

                            <option option value="" disabled selected>Categoria del juego</option>
                            @php
                                    use App\Models\Categoria;
                                    $datos_categoria = Categoria::select('categoria.*')->where('estatus', '=', '1')->get();
                            @endphp

                            @foreach ($datos_categoria as $dato)
                                    <option value="{{$dato->pk_categoria}}">{{$dato->nombre_cat}}</option>
                            @endforeach
  </select>
  <br>
  <label for="tipojuegos" class="block mb-2 text-sm font-medium text-white dark:text-white">Juego</label>
  <select name="tipojuego" id="tipojuego" class="bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg focus:ring-violet-700 focus:border-violet-700 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-violet-700 dark:focus:border-blue-500">
                            <option value="" disabled selected>Selecciona el juego</option>
                            @php
                                    use App\Models\Tipo_juego;
                                    $dato_tipojuego = Tipo_juego::select('tipo_juego.*')->where('estatus', '=', '1')->get();
                            @endphp

                            @foreach ($dato_tipojuego as $datotipojuego)
                                    <option value="{{$datotipojuego->pk_tipo_juego}}">{{$datotipojuego->nombre_tipo_juego}}</option>
                            @endforeach                      
  </select>
  <br>
  <label class="block mb-2 text-sm font-medium text-white dark:text-white" for="select_file">Seleccionar Archivo</label>
  <input name="clip" id="clip" class="block w-full text-sm text-gray-900 border  border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="select_file_help" id="select_file" type="file">
  <br>
  <div style="display: flex; justify-content: center;">
    <button id='submitButton' type="submit" class="bg-gray-700 text-center text-white p-4 rounded-lg shadow-md cursor-pointer">Subir Clip</button>
  </div>
</form>

<!-- cuadro de la notificacion -->
<div id="cuadroNotificacion">
    <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
    <span id="mensajeNotificacion"></span>
</div>

<div id="cuadrofallido">
    <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
    <span id="">No se subio el clip</span>
</div>

<!-- script de la notificacion -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#formclip').submit(function(event) {
            event.preventDefault();

            //esto deactiva el botn caundo le das
            $('#submitButton').prop('disabled', true);

            // para forms con archivos es diferente aqui como lo hice a comparaciond de categoria

            var formData = new FormData();  

            formData.append('_token', $('input[name="_token"]').val());
            formData.append('titulo_clip', $('#titulo_clip').val());
            formData.append('descripcion_clip', $('#descripcion_clip').val());
            formData.append('categoria', $('#categoria').val());
            formData.append('tipojuego', $('#tipojuego').val());
            formData.append('clip', $('#clip')[0].files[0]); // Agregar archivo


            $.ajax({ 
                url: '{{ route('clip.insertarclip') }}',
                method: 'POST',

                // esto es otro cambio a diferencia de categoria
                data: formData, // Usar FormData para enviar datos
                processData: false, // No procesar los datos
                contentType: false, // No establecer el tipo de contenido

                success: function(response) {
                    $('#mensajeNotificacion').text(response.mensaje);
                    $('#cuadroNotificacion').fadeIn().delay(3000).fadeOut();
                    $('#formclip')[0].reset();
                    $('#submitButton').prop('disabled', false); 
                },
                error: function(xhr, status, error) {
                    console.error('Error en la solicitud AJAX:', error);
                    $('#cuadrofallido').fadeIn().delay(3000).fadeOut();
                    $('#submitButton').prop('disabled', false);
                }
            });
        });
    });
</script>
</body>
</html>