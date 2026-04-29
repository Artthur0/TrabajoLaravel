@extends('Fondo')

<div class="desktop-icons">
    <a href="{{ route('musica_d') }}" class="icon-link">
        <img src="https://cdn-icons-png.flaticon.com/128/876/876817.png" alt="Musica">
        <h3>MI MÚSICA</h3>
    </a>

    <a href="{{ route('lares_downloads') }}" class="icon-link">
        <img src="https://cdn-icons-png.flaticon.com/128/3043/3043665.png" alt="Lares">
        <h3>LARES</h3>
    </a>

    <a href="{{ route('paneldecontrol') }}" class="icon-link">
        <img src="https://cdn-icons-png.flaticon.com/128/13516/13516779.png" alt="Juegos">
        <h3>Panel de Control</h3>
    </a>
</div>



<style>
    .desktop-icons {
        display: flex;
        gap: 40px;
        padding: 50px;
    }

    .icon-link {
        text-decoration: none;
        text-align: center;
        display: block;
        width: 150px;
    }

    .icon-link img {
        width: 60px;
        height: 60px;
        transition: transform 0.2s;
    }

    .icon-link:hover img {
        transform: scale(1.1);
    }

    .icon-link h3 {
        font-size: 18px;
        background-color: rgba(255, 255, 255, 0.8);
        color: black;
        margin-top: 10px;
        padding: 5px;
        border-radius: 5px;
        text-transform: uppercase;
    }
</style>