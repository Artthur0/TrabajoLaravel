<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mi Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    @foreach($usuarios as $user)
    <img src="{{ asset('.img/Wallpapers/' . $user->wallpaper) }}" alt="Fondo" class="wallpaper">
    @endforeach
</body>

<div class="taskbar">
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn-logout">Cerrar Sesión de {{ Auth::user()->username }}</button>
    </form>
    <form action="{{ route('escritorio') }}" method="GET">
        <button type="submit" class="btn-inicio">Inicio</button>
    </form>
</div>

</html>


<style>
    .column {
        background-color: #00008b;
        display: flex;
        /* Cambiamos de row a column para que los items bajen */
        flex-direction: column;
        /* Alineamos al centro de la columna */
        align-items: center;
        padding: 20px 10px;

        /* ESTO ES LO IMPORTANTE: */
        width: 150px;
        /* Le damos un ancho fijo */
        height: 100vh;
        /* Hacemos que ocupe todo el alto de la pantalla */
        position: fixed;
        /* La dejamos fija a la izquierda */
        left: 0;
        top: 0;
    }

    /* Ajuste para los enlaces para que no se vean azules/subrayados */
    .column a {
        text-decoration: none;
        text-align: center;
        margin-bottom: 20px;
        /* Espacio entre botones */
    }

    img[name="icon"] {
        width: 50px;
        height: 50px;
        display: block;
        margin: 0 auto;
    }

    h3 {
        font-size: 20px;
        /* Un poco más pequeño para que quepa bien */
        background-color: white;
        color: black;
        width: 120px;
        text-align: center;
        margin-top: 5px;
    }

    .logo img {
        width: 80px;
        margin-bottom: 30px;
    }

    .taskbar {
        position: fixed;
        bottom: 0;
        width: 100%;
        background: linear-gradient(to bottom, #245edb 0%, #3f8cf3 9%, #245edb 18%, #245edb 92%, #333 100%);
        padding: 10px;
        display: flex;
        justify-content: flex-start;
    }

    .btn-logout {
        background-color: #cc0000;
        color: white;
        border: 1px solid white;
        padding: 5px 15px;
        cursor: pointer;
        font-weight: bold;
    }
</style>