@extends('Fondo')

<div class="window-xp">
    <div class="title-bar">
        <div class="title-bar-text">Panel de control</div>
        <div class="title-bar-controls">
            <button aria-label="Close"></button>
        </div>
    </div>

    <div class="window-body">
        <section class="config-section">
            <h2 class="section-title">Fondo de escritorio</h2>
            <div class="grid-container">
                @php
                $wallpapers = ['kali.jpg', 'luna.jpg', 'todoestoeracampo.jpg', 'windowskiller.jpg'];
                @endphp

                @foreach($wallpapers as $wall)
                <form action="{{ route('perfil.actualizar') }}" method="POST" style="display: contents;">
                    @csrf
                    <input type="hidden" name="wallpaper" value="{{ $wall }}">
                    <div class="item-card {{ Auth::user()->wallpaper == $wall ? 'active' : '' }}" onclick="this.parentElement.submit()">
                        <div class="image-placeholder"
                            style="background-image: url('{{ asset('.img/Wallpaper/' . $wall) }}');">
                        </div>
                        @if(Auth::user()->wallpaper == $wall)
                        <div class="status-label">Actual</div>
                        @endif
                    </div>
                </form>
                @endforeach
            </div>
        </section>

        <section class="config-section">
            <h2 class="section-title">Avatar</h2>
            <div class="grid-container-small">
                @php
                $avatars = ['anonymus.png', 'duck.png', 'emo.jpg', 'linux.jpg', 'PerfilBasico.jfif'];
                @endphp

                @foreach($avatars as $av)
                <form action="{{ route('perfil.actualizar') }}" method="POST" style="display: contents;">
                    @csrf
                    <input type="hidden" name="avatar" value="{{ $av }}">
                    <div class="item-card-small {{ Auth::user()->avatar == $av ? 'active' : '' }}" onclick="this.parentElement.submit()">
                        <div class="avatar-placeholder"
                            style="background-image: url('{{ asset('.img/Avatar/' . $av) }}');">
                        </div>
                        @if(Auth::user()->avatar == $av)
                        <div class="status-label">Actual</div>
                        @endif
                    </div>
                </form>
                @endforeach
            </div>
        </section>

        <footer class="window-footer">
            <div class="storage-info">
                <span>Uso de disco</span>
                <div class="progress-container">
                    <div class="progress-bar" style="width: 80%;">80 %</div>
                </div>
            </div>
        </footer>
    </div>
</div>

<style>
    /* Estilos nuevos para interactividad */
    .item-card,
    .item-card-small {
        cursor: pointer;
        transition: transform 0.1s;
    }

    .item-card:hover,
    .item-card-small:hover {
        transform: scale(1.03);
        border-color: #0055E5;
    }

    /* Tus estilos originales */
    .image-placeholder,
    .avatar-placeholder {
        width: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .config-section {
        margin-bottom: 30px;
    }

    .window-xp {
        width: 850px;
        margin: 20px auto;
        background-color: #ECE9D8;
        border: 3px solid #0055E5;
        border-radius: 8px 8px 0 0;
        font-family: "Tahoma", sans-serif;
    }

    .title-bar {
        background: linear-gradient(to bottom, #0058e6 0%, #3a89fb 10%, #2976fd 34%, #0058e6 100%);
        padding: 4px 10px;
        display: flex;
        justify-content: space-between;
        color: white;
        font-weight: bold;
    }

    .item-card {
        border: 1px solid #919B9C;
        background: white;
        padding: 4px;
        width: 150px;
    }

    .item-card.active,
    .item-card-small.active {
        border: 2px solid #0055E5;
    }

    .status-label {
        background-color: #C02A2A;
        color: white;
        text-align: center;
        font-size: 0.85em;
        padding: 2px;
        margin-top: 4px;
    }

    .grid-container,
    .grid-container-small {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    .item-card-small {
        width: 80px;
        border: 1px solid #919B9C;
        background: white;
        padding: 3px;
    }

    .avatar-placeholder {
        height: 70px;
    }

    .image-placeholder {
        height: 80px;
    }

    /* Barra de progreso */
    .window-footer {
        display: flex;
        justify-content: flex-end;
        margin-top: 20px;
        padding-right: 10px;
    }

    .storage-info {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .progress-container {
        width: 200px;
        height: 20px;
        background: #eee;
        border: 1px solid #848484;
    }

    .progress-bar {
        height: 100%;
        background-color: #FF9D3C;
        text-align: center;
        line-height: 20px;
        font-size: 0.8em;
        color: black;
    }
</style>