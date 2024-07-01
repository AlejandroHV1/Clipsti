<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clips ocultos</title>
</head>
<body>
    <h1>Tus clips ocultos</h1>

        @foreach ($dato_clipsocultos as $clips)
            <a href="">
                <div>
                    <h2>{{$clips->nombre_clip}}</h2>
                    <label>{{$clips->descripcion_clip}}</label>
                </div>
            </a>
                    <br>
                    <a href="{{route('clip.borrarclip2', ['pkclip' => $clips->pk_clip])}}" data-method="post">borrar clip</a>
                    <br> 
                    <a href="">editar</a>
                    <br>
                    <a href="{{route('clip.desbloquearclip', ['pkclip' => $clips->pk_clip])}}">volver publico</a>
        @endforeach
        <br><br><br>
        <a href="{{ url('/clipusuario') }}">ver tus clips publicos</a>
</body>
</html>