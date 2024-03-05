<header class="cabecalho">
    <div class="conteudo">
        <a href="" class="mobmenu"><i class="fas fa-bars"></i></a>
        <a href="" class="logo"></a>
        <div class="menu-topo-text d-none">
            @include('Comanda.menu')
        </div>
        <div class="menu-topo-text">
            <ul>
                <li class="sub">

                    <ul class="usuario">

                        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="{{ route('pedido.index') }}"> Pedidos</a></li>
                        <li><a href="{{ route('cozinha.index') }}"> Cozinha</a></li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</header>
