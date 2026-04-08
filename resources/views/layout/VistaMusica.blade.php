@extends('Fondo')

<html>

<body>
    <section>
        <div class="container" id="Musica">
            <nav class="navbar" id="Navbar">
                <h1>Musica</h1>
                <div class="logo"></div>
                <div class="search-bar">
                    <form action="{{ route('musica_b') }}" method="get">
                        <input type="text" name="buscar" placeholder="Buscar por Titulo">
                        <input type="submit">
                    </form>
                </div>
                <div class="cart-icon" onclick="toggleCart()">

                </div>
            </nav>

            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Titulo</th>
                        <th>Artista</th>
                        <th>Fecha de creación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($canciones as $cancion)
                    <tr>
                        <td>
                            🎵
                        </td>
                        <td>
                            {{ $cancion->Titulo }}
                        </td>
                        <td>
                            {{ $cancion->Artista }}
                        </td>
                        <td>
                            {{ $cancion->Fecha }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
        padding: 30px;
        border-radius: 10px;
        margin-top: 250px;
        width: 80%;
        height: 40%;
    }
</style>