@foreach($canciones as $c)
<tr>
    <td>{{ $c->titulo }}</td>
    <td>
        <form action="{{ route('musica.quitar', $c->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar de mi colección</button>
        </form>
    </td>
</tr>
@endforeach