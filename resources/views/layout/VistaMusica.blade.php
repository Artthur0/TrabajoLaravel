@extends('Fondo')

<html>

<body>
    <section>
        <div class="container" id="Musica">
            <div class="row">
                <div class="col-md-4">
                    <h1>Titulo</h1>
                    <ul>
                        @foreach ($Titulo as $item)
                        {{ $item }} <br>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-4">
                    <h1>Artista</h1>
                    <ul>
                        @foreach ($Artista as $item)
                        {{ $item }} <br>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-4">
                    <h1>Fecha de creación</h1>
                    <ul>
                        @foreach ($Fecha as $item)
                        {{ $item }} <br>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
</body>

</html>


<style>
    .container {
        background-color: #f5f5f5;
        padding: 20px;
        border-radius: 10px;

    }
</style>