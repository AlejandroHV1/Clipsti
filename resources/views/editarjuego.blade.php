<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar juego pa admin esto</title>
</head>
<body>
    <form action=" {{route('tipo_juego.actualizarjuego', $editarjuego->pk_tipo_juego)}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="nuevo_tipo_juego" value="{{$editarjuego->nombre_tipo_juego}}">
        <h4>imagen actual</h4>
        <img style="max-width: 150px" src="{{ Storage::url($editarjuego->portada) }}" alt="">
        <input type="file" name="nuevo_portada">

                    <select name="nuevo_categoria" id="">
                        <option value="selected">Categoria</option>
                        @php
                        use App\Models\Categoria;
                                $categorias = Categoria::
                                select('categoria.*')->where('estatus', '=', '1')
                                ->get();
                        @endphp
                        @foreach ($categorias as $dato)
                            <option value="{{ $dato->pk_categoria }}" {{ $dato->pk_categoria == $editarjuego->fk_categoria ? 'selected' : '' }}>
                                {{ $dato->nombre_cat }}
                            </option>
                        @endforeach
                    </select>

        <button type="submit">enviar</button>
    </form>
</body>
</html>