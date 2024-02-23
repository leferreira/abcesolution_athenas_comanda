<header class="cabecalho">
    <div class="conteudo">
        <a href="" class="mobmenu"><i class="fas fa-bars"></i></a>
        <a href="" class="logo"></a>
        <div class="menu-topo-text d-none">
            @include('menu')
        </div>
        <div class="menu-topo-text">
            <ul>
                <li class="sub">

                <li>
                    <h2>Visão do Admin</h2>
                </li>
                <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="{{ route('pedido.index') }}"> Pedidos</a></li>
                <li><a href="{{ route('mesa.index') }}"> Mesas</a></li>
                <li><a href="{{ route('cozinha.index') }}"> Cozinha</a></li>
                <li>
                    @if (Auth::check())
                        <span>{{ Auth::user()->nome }}</span>
                    @endif
                </li>

                <ul class="usuario">
                    <li>
                        @if (Auth::check())
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endif

                    </li>
                </ul>
                </li>
            </ul>
        </div>
    </div>
</header>
