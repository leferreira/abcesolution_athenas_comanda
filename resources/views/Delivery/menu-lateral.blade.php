<div id="principal">
    <nav class="menu-esquerdo">
        <a href="{{ route('delivery.home') }}" class="fas fa-times mobmenu"></a>
        <ul>
            @foreach ($categorias as $categoria)
                <li><a href="{{ route('delivery.deliverycategoria.show', $categoria->id) }}">
                        {{ $categoria->categoria }}</a></li>
            @endforeach
        </ul>
    </nav>
</div>
