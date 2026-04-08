@extends('Fondo')

<html>

<section>
    <div class="container" id="Juegos">
        <nav class="navbar" id="Navbar">
            <h1>Juegos</h1>
        </nav>

        <div class="row">
            @foreach($Juegos as $Juego)
            <div class="col-md-4">
                {{ $Juego }}
            </div>
            @endforeach
        </div>



    </div>
</section>

</html>


<style>
    .container {
        background-color: #f5f5f5;
        padding: 20px;
        border-radius: 10px;
    }
</style>