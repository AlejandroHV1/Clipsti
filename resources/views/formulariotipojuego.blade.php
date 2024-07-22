<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipo Juego</title>
    <style>
        /* Estilos para el cuadro de notificación */
        #cuadroNotificacion {
            display: none;
            position: absolute;
            top: 25%;
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

<br><br><br><br><br><br><br><br><br>


<form id="formjuego" action="{{ route('tipo_juego.insertartipojuego') }}" method="POST" enctype="multipart/form-data" class="max-w-sm mx-auto">
    @csrf
    <div class="mb-5">
        <label for="large-input" class="block mb-2 text-sm font-medium text-white dark:text-white">Nombre del juego</label>
        <input name="nombre_tipo_juego" type="text" id="nombre_tipo_juego" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-violet-700 focus:border-violet-700 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
        <label for="categorias" class="block mb-2 text-sm font-medium text-white dark:text-white">Selecciona la categoría</label>
        <select name = 'nombre_categoria' id="nombre_categoria" class="bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg focus:ring-violet-700 focus:border-violet-700 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-violet-700 dark:focus:border-blue-500">
                            <option value="" disabled selected>categoria del juego</option>
                            @php
                                    use App\Models\Categoria;
                                    $datos_categoria = Categoria::
                                    select('categoria.*')->where('estatus', '=', '1')
                                    ->get();
                            @endphp

                            @foreach ($datos_categoria as $dato)
                                    <option value="{{$dato->pk_categoria}}">{{$dato->nombre_cat}}</option>
                            @endforeach
        </select>
  <br>
  <label class="block mb-2 text-sm font-medium text-white dark:text-white" for="select_file">Selecciona Portada del juego</label>
  <input name="foto_tipo_juego" id="foto_tipo_juego" class="block w-full text-sm text-gray-900 border  border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="select_file_help" id="select_file" type="file">
  
    <br>  
    <div style="display: flex; justify-content: center;">
        <button  class="bg-gray-700 text-center text-white p-4 rounded-lg shadow-md cursor-pointer " type="submit">enviar</button>
    </div>
</form>

<!-- cuadro de la notificacion -->
<div id="cuadroNotificacion">
    <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
    <span id="mensajeNotificacion"></span>
</div>

<!-- script de la notificacion -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#formjuego').submit(function(event) {
            event.preventDefault();

            // para forms con archivos es diferente aqui como lo hice a comparaciond de categoria

            var formData = new FormData();  

            formData.append('_token', $('input[name="_token"]').val());
            formData.append('nombre_tipo_juego', $('#nombre_tipo_juego').val());
            formData.append('nombre_categoria', $('#nombre_categoria').val());
            formData.append('foto_tipo_juego', $('#foto_tipo_juego')[0].files[0]); // Agregar archivo


            $.ajax({
                url: '{{ route('tipo_juego.insertartipojuego') }}',
                method: 'POST',

                // esto es otro cambio a diferencia de categoria
                data: formData, // Usar FormData para enviar datos
                processData: false, // No procesar los datos
                contentType: false, // No establecer el tipo de contenido

                success: function(response) {
                    $('#mensajeNotificacion').text(response.mensaje);
                    $('#cuadroNotificacion').fadeIn().delay(3000).fadeOut();
                    $('#formjuego')[0].reset();
                },
                error: function(xhr, status, error) {
                    console.error('Error en la solicitud AJAX:', error);
                }
            });
        });
    });
</script>
</body>
</html>



