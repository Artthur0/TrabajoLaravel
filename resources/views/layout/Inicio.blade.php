@extends('Fondo')
<a href="{{ url('/musica') }}">
    <img name="icon" src="https://cdn-icons-png.flaticon.com/128/876/876817.png" alt="">
    <h3>MUSICA</h3>
</a>
<a href="{{ url('/juegos') }}">
    <img name="icon" src="https://cdn-icons-png.flaticon.com/128/13516/13516779.png" alt="">
    <h3>JUEGOS</h3>
</a>


<style>
    img[name="icon"] {
        width: 50px;
        height: 50px;
    }

    h3 {
        font-size: 30px;
        background-color: white;
        color: black;
        width: 120px;
        height: 50px;
    }
</style>