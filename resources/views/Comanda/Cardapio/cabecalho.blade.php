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
                    <div class="thumb">
                        <img src="img/img-usuario.png">
                        <span>Nome de usuário</span>
                    </div>
                    <ul class="usuario">
                        <li><a href="{{ route('cardapio.index') }}"><i class="fas fa-home"></i> Home</a></li>


                        @if (!session()->has('cliente'))
                            <li><a href="{{ route('cliente.create') }}"><i class="fas fa-user-alt"></i> Cadastrar</a>
                            </li>
                            <li><a href="{{ route('login') }}"><i class="fas fa-user-alt"></i> Login</a></li>
                        @else
                            <li><a href="{{ route('pedidocliente.index') }}"><i class="fas fa-address-book"></i> Meus
                                    Pedidos</a>
                            </li>
                        @endif


                </li>

                <ul class="usuario">
                    <li>
                        @if (session()->has('cliente'))
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
            </ul>
            </li>
            </ul>
        </div>
    </div>
</header>
