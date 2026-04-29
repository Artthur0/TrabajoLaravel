@extends('Fondo')

@section('content')

<div class="window-xp">
    <div class="title-bar">
        <div class="title-bar-text">Mis Canciones - Windows Media Player</div>
        <div class="title-bar-controls">
            <a href="{{ url('/escritorio') }}" style="text-decoration: none;">
                <button type="button" aria-label="Close">X</button>
            </a>
        </div>
    </div>

    <div class="window-body">
        <h2 class="section-title">Mi Colección Personal</h2>
        
        <table class="xp-table">
            <thead>
                <tr>
                    <th style="width: 30%;">Título</th>
                    <th style="width: 30%;">Artista</th>
                    <th style="width: 10%;">Año</th>
                    <th style="width: 30%;">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($canciones as $c)
                <tr>
                    <td style="font-weight: bold;">{{ $c->titulo }}</td>
                    <td>{{ $c->artista }}</td>
                    <td>{{ $c->fecha }}</td>
                    <td>
                        <form action="{{ route('musica.quitar', $c->id) }}" method="POST" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="xp-button-delete">Eliminar de mi colección</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
        width: 900px; 
        margin: 40px auto;
        background-color: #ECE9D8; 
        border: 3px solid #0055E5;
        border-radius: 8px 8px 0 0;
        box-shadow: 8px 8px 20px rgba(0, 0, 0, 0.5);
        font-family: "Tahoma", sans-serif;
    }

    .title-bar {
        background: linear-gradient(to bottom, #0058e6 0%, #3a89fb 10%, #2976fd 34%, #0058e6 100%);
        padding: 4px 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: white;
        height: 26px;
    }

    .title-bar-text {
        font-weight: bold;
        font-size: 13px;
        text-shadow: 1px 1px #000;
    }

    .title-bar-controls button {
        width: 21px;
        height: 21px;
        background: linear-gradient(135deg, #fb7d6a 0%, #e81123 50%, #b00e1a 100%);
        border: 1px solid #fff;
        border-radius: 2px;
        color: white;
        font-weight: bold;
        font-size: 13px;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: inset 1px 1px 1px rgba(255,255,255,0.5);
        padding: 0;
        line-height: 0;
    }

    .title-bar-controls button:hover {
        filter: brightness(1.2);
    }

    .window-body {
        padding: 12px;
        background-color: #ECE9D8;
    }

    .section-title {
        font-size: 18px;
        margin: 0 0 12px 0;
        color: #000;
    }

    .xp-table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border: 1px solid #7F9DB9;
    }

    .xp-table thead th {
        background: linear-gradient(to bottom, #f9f9f9, #dcdcdc);
        border-right: 1px solid #919B9C;
        border-bottom: 1px solid #919B9C;
        padding: 4px 8px;
        font-size: 11px;
        text-align: left;
        font-weight: normal;
        color: #000;
        box-shadow: inset 1px 1px 0px #fff;
    }
    .window-footer {
        display: flex;
        justify-content: flex-end; 
        margin-top: 30px;
        padding-bottom: 10px;
    }

    .xp-table td {
        padding: 6px 8px;
        border-right: 1px solid #F0F0F0;
        font-size: 12px;
    }

    .xp-table tbody tr:nth-child(even) {
        background-color: #F4F7FC;
    }

    .xp-button-delete {
        background: #f0f0f0;
        border: 1px solid #A00000;
        padding: 2px 10px;
        font-size: 11px;
        box-shadow: inset -1px -1px #808080, inset 1px 1px #fff;
        cursor: pointer;
        color: #A00000;
        font-weight: bold;
    }

    .xp-button-delete:hover {
        background-color: #ffeaea;
    }

    .xp-button-delete:active {
        box-shadow: inset 1px 1px #808080;
    }
</style>
@endsection