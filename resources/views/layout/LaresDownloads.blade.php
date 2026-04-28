@extends('Fondo')
@foreach($canciones as $c)
<tr>
    <td>{{ $c->titulo }}</td>
    <td>
        @if(in_array($c->id, $misCancionesIds))
        <span style="color: green;">✔ Adquirida</span>
        @else
        <form action="{{ route('musica.descargar', $c->id) }}" method="POST">
            @csrf
            <button type="submit">Descargar</button>
        </form>
        @endif
    </td>
</tr>
@endforeach