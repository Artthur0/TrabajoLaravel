@extends('Fondo')

<html>

<body>
    <section>
        <div class="container" id="Musica">
            <nav class="navbar" id="Navbar">
                <h1>Musica</h1>
                <div class="logo"></div>
                <div class="search-bar">
                    <input type="text" placeholder="Buscar productos...">
                    <button>🔍</button>
                </div>
                <div class="cart-icon" onclick="toggleCart()">

                </div>
            </nav>

            <div class="row">
                <div class="col-md-4">
                    <h3>Titulo</h3>
                    <ul>
                        @foreach ($Titulo as $item)
                        <img id="icono" src="https://cdn-icons-png.flaticon.com/128/876/876817.png" alt="">
                        {{ $item }} <br>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Artista</h3>
                    <ul>
                        @foreach ($Artista as $item)
                        {{ $item }} <br>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Fecha de creación</h3>
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
    #icono {
        width: 25px;
        height: 25px;
    }

    .container {
        background-color: #f5f5f5;
        padding: 20px;
        border-radius: 10px;

    }
</style>