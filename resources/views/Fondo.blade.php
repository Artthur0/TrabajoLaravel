<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Wilson XD - Escritorio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        .desktop-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("{{ asset('img/Wallpaper/' . Auth::user()->wallpaper) }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: -1;
            /* Se mantiene detrás de todo */
        }

        .taskbar {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 40px;
            background: linear-gradient(to bottom, #245edb 0%, #3f8cf3 9%, #245edb 100%);
            display: flex;
            align-items: center;
            padding: 0 10px;
            z-index: 1000;
        }

        .btn-inicio {
            background-color: #388e3c;
            color: white;
            border: none;
            padding: 5px 15px;
            font-weight: bold;
            margin-right: 10px;
            border-radius: 0 10px 10px 0;
        }
    </style>
</head>

<body>
    <div class="desktop-background"></div>

    <div class="container-fluid">
        @yield('content')
    </div>

    <div class="taskbar">
        <form action="{{ route('escritorio') }}" method="GET">
            <button type="submit" class="btn-inicio">Inicio</button>
        </form>

        <div class="ms-auto">
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-sm btn-danger">Cerrar Sesión de {{ Auth::user()->username }}</button>
            </form>
        </div>
    </div>
</body>

</html>