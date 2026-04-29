@extends('Fondo')

@section('content')
<div class="window-xp">
    <div class="title-bar">
        <div class="title-bar-text">Panel de control - Wilson XD</div>
        <div class="title-bar-controls">
            <button aria-label="Close" onclick="window.location.href='{{ route('escritorio') }}'"></button>
        </div>
    </div>

    <div class="window-body">
        <form action="{{ route('guardar_configuracion') }}" method="POST" id="configForm">
            @csrf

            {{-- SECCIÓN: FONDO DE ESCRITORIO --}}
            <section class="config-section">
                <h2 class="section-title">Fondo de escritorio</h2>
                <div class="grid-container">
                    @php
                        $fondos = ['kali.jpg', 'luna.jpg', 'todoestoeracampo.jpg', 'windowskiller.jpg'];
                        $currentWallpaper = Auth::user()->wallpaper;
                    @endphp
                    @foreach($fondos as $fondo)
                    <label class="item-card {{ $currentWallpaper == $fondo ? 'active' : '' }}">
                        <input type="radio" name="wallpaper" value="{{ $fondo }}"
                               style="display:none;" onchange="this.form.submit()">

                        <div class="image-placeholder" style="background-image: url('{{ asset('img/Wallpaper/' . $fondo) }}')"></div>

                        @if($currentWallpaper == $fondo)
                        <div class="status-label">Actual</div>
                        @endif
                    </label>
                    @endforeach
                </div>
            </section>

            {{-- SECCIÓN: AVATAR --}}
            <section class="config-section">
                <h2 class="section-title">Avatar de usuario</h2>
                <div class="grid-container-small">
                    @php
                        $avatares = ['duck.png', 'anonymus.png', 'emo.jpg', 'linux.jpg', 'PerfilBasico.jfif'];
                        $currentAvatar = Auth::user()->avatar;
                    @endphp
                    @foreach($avatares as $avatar)
                    <label class="item-card-small {{ $currentAvatar == $avatar ? 'active' : '' }}">
                        <input type="radio" name="avatar" value="{{ $avatar }}"
                               style="display:none;" onchange="this.form.submit()">
                        <img src="{{ asset('img/Avatar/' . $avatar) }}" class="avatar-img-view" alt="Avatar">
                        @if($currentAvatar == $avatar)
                        <div class="status-label">Actual</div>
                        @endif
                    </label>
                    @endforeach
                </div>
            </section>
        </form>

        <footer class="window-footer">
            <div class="storage-info">
                <span class="storage-text">Uso de disco</span>
                <div class="progress-container">
                    @php
                        $user = Auth::user();
                        $cant = method_exists($user, 'songs') ? $user->songs()->count() : 0;
                        $porcent = ($cant / 3) * 100;
                        // Color naranja/oro de tu imagen, cambia a rojo si llega a 100
                        $colorBarra = $porcent >= 100 ? '#FF0000' : '#FF9D3C';
                    @endphp
                    <div class="progress-bar" style="width: {{ $porcent }}%; background-color: {{ $colorBarra }};">
                        {{ round($porcent) }} %
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<style>
    .window-xp {
        width: 850px;
        margin: 20px auto;
        background-color: #ECE9D8;
        border: 3px solid #0055E5;
        border-radius: 8px 8px 0 0;
        box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.3);
        font-family: "Tahoma", sans-serif;
    }

    .title-bar {
        background: linear-gradient(to bottom, #0058e6 0%, #3a89fb 10%, #2976fd 34%, #0058e6 100%);
        padding: 4px 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: white;
        font-weight: bold;
        text-shadow: 1px 1px #000;
        border-radius: 5px 5px 0 0;
    }

    .title-bar-controls button {
        width: 21px;
        height: 21px;
        background-color: #E81123;
        border: 1px solid #FFF;
        color: white;
        font-weight: bold;
        cursor: pointer;
    }

    .title-bar-controls button::before { content: "X"; }

    .window-body { padding: 20px; position: relative; }

    .section-title {
        font-size: 1.1em;
        color: #333;
        margin-bottom: 15px;
        border-bottom: 1px solid #ADC6E5;
        padding-bottom: 5px;
    }

    .grid-container { display: flex; gap: 15px; margin-bottom: 30px; }

    .image-placeholder {
        width: 100%;
        height: 100px;
        background-color: #ddd;
        background-size: cover;
        background-position: center;
        border: 1px solid #919B9C;
    }

    .item-card {
        border: 1px solid #919B9C;
        background: white;
        padding: 4px;
        width: 180px;
        cursor: pointer;
    }

    .item-card.active, .item-card-small.active {
        border: 2px solid #0055E5;
        padding: 3px;
        background: #D7E5F2;
    }

    .status-label {
        background-color: #C02A2A;
        color: white;
        text-align: center;
        font-size: 0.85em;
        padding: 2px 0;
        margin-top: 4px;
    }

    .grid-container-small { display: flex; gap: 20px; }

    .item-card-small {
        width: 80px;
        border: 1px solid #919B9C;
        background: white;
        padding: 3px;
        cursor: pointer;
    }

    .avatar-img-view {
        width: 100%;
        height: 70px;
        object-fit: cover;
        display: block;
    }

    /* POSICIONAMIENTO DE LA BARRA DE DISCO */
    .window-footer {
        display: flex;
        justify-content: flex-end; /* Mueve todo a la derecha */
        margin-top: 30px;
        padding-bottom: 10px;
    }

    .storage-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .storage-text {
        font-size: 1.1em;
        color: #333;
    }

    .progress-container {
        width: 250px;
        height: 28px;
        background: #eee;
        border: 1px solid #848484;
        box-shadow: inset 1px 1px 2px rgba(0,0,0,0.1);
    }

    .progress-bar {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1em;
        font-weight: bold;
        color: black;
        transition: width 0.5s ease-in-out;
    }
</style>
@endsection