<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Disco sin espacio</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="pantalla">
    <div class="contenido">
        <div class="icon">:(</div>

        <h1>Disco sin espacio</h1>

        <p>
            Tu almacenamiento en disco solo soporta 3 canciones, si quieres descargar nuevas canciones
            deberás eliminar algunas de las anteriores.
        </p>

        <form action="{{ route('escritorio') }}" method="GET">
            <button type="submit" class="btn-inicio">Volver al Inicio</button>
        </form>
    </div>
</div>

</body>
</html>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

/* Pantalla completa */
.pantalla {
    width: 100%;
    height: 100vh;
    background-color: #2f5bd3; /* azul tipo error */
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Contenido interno */
.contenido {
    color: white;
    max-width: 800px;
}

/* Carita */
.icon {
    font-size: 90px;
    margin-bottom: 20px;
}

/* Título */
h1 {
    font-size: 42px;
    margin-bottom: 20px;
}

/* Texto */
p {
    font-size: 18px;
    margin-bottom: 40px;
    line-height: 1.5;
}

/* Botón */
button {
    background-color: #f1f1f1;
    border: none;
    padding: 12px 25px;
    cursor: pointer;
    font-weight: bold;
    color: #2f5bd3;
}

button:hover {
    background-color: #ddd;
}

</style>