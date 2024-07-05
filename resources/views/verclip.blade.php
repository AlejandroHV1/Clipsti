<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://vjs.zencdn.net/5.4.6/video-js.min.css" rel="stylesheet">
    <script src="https://vjs.zencdn.net/5.4.6/video.min.js"></script>
    <title>Visualizador de Clips</title>
    <style>
        .video-js {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            border-radius: 10px;
        }

        @media (min-width: 100px) {
            .video-js {
                max-width: 400px;
                max-height: 250px;
            }
        }

        @media (min-width: 600px) {
            .video-js {
                max-width: 500px;
                max-height: 350px;
            }
        }

        @media (min-width: 768px) {
            .video-js {
                max-width: 700px;
                max-height: 410px;
            }
        }

        @media (min-width: 1024px) {
            .video-js {
                max-width: 900px;
                max-height: 520px;
            }
        }
    </style>
</head>
<body>
    <video id="my-video" class="video-js" controls preload="auto" data-setup='{ "techOrder": ["html5", "flash"], "autoplay": true, "preload": "auto" }'>
        <source src="{{ asset('storage/' . $dato_clip->video) }}" type="video/mp4">
        <p class="vjs-no-js">
            To view this video please enable JavaScript, and consider upgrading to a web browser that
            <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
        </p>
    </video>
</body>
</html>
