<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipo Juego</title>
</head>
<body>
<form action="{{ route('tipo_juego.insertartipojuego') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="nombre_tipo_juego" placeholder="nombre del jeugo" required>
    <input type="file" name="foto_tipo_juego" id="">
    <select name = 'nombre_categoria' id="" class="" required>
                        <option value="" disabled selected>categoria del juego</option>
                        @php
                                use App\Models\Categoria;
                                $datos_categoria = Categoria::all();
                        @endphp

                        @foreach ($datos_categoria as $dato)
                                <option value="{{$dato->pk_categoria}}">{{$dato->nombre_cat}}</option>
                        @endforeach
    </select>

    <button type="submit">enviar</button>
    </form>
</body>
</html>



