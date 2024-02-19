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
                    <div class="thumb">
                        <img src="img/img-usuario.png">
                        <span>Nome de usuário</span>
                    </div>
                    <ul class="usuario">
                        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
                        <!--<li><a href="index.php?link=5"><i class="fas fa-user-alt"></i> Login</a></li> -->
                        <li><a href="{{ route('cozinha.index') }}"><i class="fas fa-address-book"></i> Cozinha</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</header>