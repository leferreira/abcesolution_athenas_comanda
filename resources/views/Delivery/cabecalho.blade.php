<header class="cabecalho">
    <div class="conteudo">
        <a href="{{ route('delivery.home') }}" class="mobmenu"><i class="fas fa-bars"></i></a>
        <a href="{{ route('delivery.home') }}" class="logo"></a>
        <div class="menu-topo-text">
            <ul>
                <li class="sub">
                    <div class="thumb">
                        @if (Auth::check())
                            <span>{{ Auth::user()->nome }}</span>
                        @endif
                    </div>
                </li>
                <li><a href="{{ route('delivery.home') }}"><i class="fas fa-home"></i> Home</a></li>
                </li>
                @if (!session()->has('usuario_delivery_logado'))
                    <li><a href="{{ route('deliverycliente.create') }}"><i class="fas"></i> Cadastro</a>
                    </li>
                    <li><a href="{{ route('deliverylogin.login') }}"><i class="fas fa-user-alt"></i> Login</a>
                    </li>
                @else
                    <li><a href="{{ route('delivery.deliverypedido.index') }}"><i class="fas fa-address-book"></i>
                            Meus Pedidos</a>
                    </li>
                @endif


                <ul class="usuario">
                    <li>
                        @if (session()->has('usuario_delivery_logado'))
                            <a href="{{ route('deliverylogin.logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('deliverylogin.logout') }}" method="POST"
                                style="display: none;">
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
