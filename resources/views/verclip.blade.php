<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>visualizador de clips</title>
</head>
<body>
    <!-- <video src="{{ asset('storage/' . $dato_clip->video) }}" type="video/mp4"></video> -->
    
    <video id="my-video" class="video-js" controls preload="auto" width="600" height="300" data-setup='{ "techOrder": ["html5", "flash"], "autoplay": true, "preload": "auto" }'>
    <source src="{{ asset('storage/' . $dato_clip-1`>video) }}" type="video/mp4">
    <p class="vjs-no-js">
        To view this video please enable JavaScript, and consider upgrading to a web browser that
        <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
    </p>
    
</video>
</body>
</html>