<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario clip</title>
</head>
<body>
<form action="{{ route('clip.insertarclip') }}" method="post" enctype="multipart/form-data">
    @csrf
    <h1>titulo</h1>
    <input type="text" name="titulo_clip" placeholder="titulo">
    <h1>clip</h1>
    <input type="file" name="clip" placeholder="selecciona tu clip">
    <h1>descripcion</h1>
    <input type="textbox" name="descripcion_clip" placeholder="descripcion">
    <h1>selecciona la categoria</h1>
        <select name = 'categoria' id="" class="" required>
                            <option value="" disabled selected>categoria del juego</option>
                            @php
                                    use App\Models\Categoria;
                                    $datos_categoria = Categoria::all();
                            @endphp

                            @foreach ($datos_categoria as $dato)
                                    <option value="{{$dato->pk_categoria}}">{{$dato->nombre_cat}}</option>
                            @endforeach
        </select>
    <h1>selecciona el tipo de juego</h1>
        <select name = 'tipojuego' id="" class="" required>
                            <option value="" disabled selected>Selecciona juego</option>
                            @php
                                    use App\Models\Tipo_juego;
                                    $dato_tipojuego = Tipo_juego::all();
                            @endphp

                            @foreach ($dato_tipojuego as $datotipojuego)
                                    <option value="{{$datotipojuego->pk_tipo_juego}}">{{$datotipojuego->nombre_tipo_juego}}</option>
                            @endforeach
        </select>
    <button type="submit">Enviar</button>
    </form>
</body>
</html>