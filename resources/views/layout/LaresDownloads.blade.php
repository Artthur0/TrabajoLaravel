@extends('Fondo')

@section('content')
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
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .window-body {
        padding: 12px;
        background-color: #ECE9D8;
    }

    .section-title {
        font-size: 18px;
        margin: 0 0 12px 0;
        color: #000;
        font-weight: normal;
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

    .xp-table td {
        padding: 6px 8px;
        border-right: 1px solid #F0F0F0;
        font-size: 12px;
        color: #000;
    }
    .window-footer {
        display: flex;
        justify-content: flex-end; 
        margin-top: 30px;
        padding-bottom: 10px;
    }

    .xp-table tbody tr:nth-child(even) {
        background-color: #F4F7FC;
    }

    /* Efecto de selección azul clásico de Windows */
    .xp-table tbody tr:hover {
        background-color: #316AC5;
        color: white;
    }

    .xp-table tbody tr:hover td {
        color: white;
    }

    .xp-button {
        background: #f0f0f0;
        border: 1px solid #003C74;
        padding: 1px 10px;
        font-size: 11px;
        box-shadow: inset -1px -1px #808080, inset 1px 1px #fff;
        cursor: pointer;
        color: black;
    }

    .xp-button:active {
        box-shadow: inset 1px 1px #808080;
    }

    .status-check {
        color: #008000; 
        font-weight: bold; 
    }
    
    .xp-table tr:hover .status-check {
        color: #afffaf; 
    }
</style>

<div class="window-xp">
    <div class="title-bar">
        <div class="title-bar-text">Reproductor de Música - Windows Media Player 2001</div>
        <div class="title-bar-controls">
            <button>X</button>
        </div>
    </div>

    <div class="window-body">
        <h2 class="section-title">Biblioteca de Música</h2>
        
        <table class="xp-table">
            <thead>
                <tr>
                    <th style="width: 35%;">Título</th>
                    <th style="width: 35%;">Artista</th>
                    <th style="width: 15%;">Año</th>
                    <th style="width: 15%;">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($canciones as $c)
                <tr>
                    <td style="font-weight: bold;">{{ $c->titulo }}</td>
                    <td>{{ $c->artista }}</td>
                    <td>{{ $c->fecha }}</td>
                    <td>
                        @if(in_array($c->id, $misCancionesIds))
                            <span class="status-check">[ ✔ ]</span>
                        @else
                            <form action="{{ route('musica.descargar', $c->id) }}" method="POST" style="margin: 0;">
                                @csrf
                                <button type="submit" class="xp-button">Descargar</button>
                            </form>
                        @endif
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
@endsection