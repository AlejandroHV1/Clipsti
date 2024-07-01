<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clips del usuario</title>
</head>
<body>
    <h1>Tienes buenos clips {{$usuario->user}} c:</h1>
    
    @foreach ($dato as $clips)
        <a href="">
            <div>
                <h2>{{$clips->nombre_clip}}</h2>
                <label>{{$clips->descripcion_clip}}</label>
            </div>
        </a>
                <br>
                <a href="{{route('clip.borrarclip', ['pkclip' => $clips->pk_clip])}}" data-method="post">borrar clip</a>
                <br> 
                <a href="">editar</a>
                <br>
                <a href="{{route('clip.esconderclip', ['pkclip' => $clips->pk_clip])}}">volver privado</a>
    @endforeach
    <br><br><br>
    <a href="{{ url('/clipsocultos') }}">ver tus clips privados</a>
</body>
</html>