<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        @foreach ($clipsporjuego as $dato)
            <a href="">
                <div>
                    <h2>{{$dato->nombre_clip}}</h2>
                    <img src="{{ Storage::url($dato->portada) }}" alt="">
                    
                </div>
            </a>
        @endforeach
    </div>
</body>
</html>