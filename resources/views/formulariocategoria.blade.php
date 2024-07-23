<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            z-index: 1000; /* Asegura que la notificación esté en frente */
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
<body class="bg-slate-900">
@if(session('id'))
        @include("navbar")
@else
    <script>
        window.location.href="{{url('/')}}";
    </script>
@endif
<br><br><br><br><br><br><br><br><br>

<form id="formCategoria" action="{{ route('categoria.insertarcategoria') }}" method="post" class="max-w-sm mx-auto">
    @csrf
    <div class="mb-5">
        <label for="nombre_categoria" class="block mb-2 text-sm font-medium text-white">Nombre de la categoría</label>
        <input name="nombre_categoria" type="text" id="nombre_categoria" class="block w-full p-4 text-dark border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-violet-700 focus:border-violet-700 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Agrega la nueva categoría">
    </div>
    <label for="descripcion_categoria" class="block mb-2 text-sm font-medium text-white">Descripción</label>
    <textarea name="descripcion_categoria" id="descripcion_categoria" rows="4" class="block p-2.5 w-full text-sm text-dark bg-gray-50 rounded-lg border border-gray-300 focus:ring-violet-700 focus:border-violet-700 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Describe tu Descripción"></textarea>
    <br>
    <div style="display: flex; justify-content: center;">
        <button class="bg-gray-700 text-center text-white p-4 rounded-lg shadow-md cursor-pointer" type="submit">Guardar Cambios</button>
    </div>
</form>

<div id="cuadroNotificacion">
    <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
    <span id="mensajeNotificacion"></span>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#formCategoria').submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: '{{ route('categoria.insertarcategoria') }}',
                method: 'POST',
                data: {
                    '_token': $('input[name="_token"]').val(),
                    'nombre_categoria': $('#nombre_categoria').val(),
                    'descripcion_categoria': $('#descripcion_categoria').val()
                },
                success: function(response) {
                    $('#mensajeNotificacion').text(response.mensaje);
                    $('#cuadroNotificacion').fadeIn().delay(3000).fadeOut();
                    $('#formCategoria')[0].reset();
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
