@extends('Delivery.template')
@section('conteudo')
    <div class="col-6 m-auto">
        <div class="base-login">

            <div class="caixa-login ">
                @if (session('msg_erro'))
                    <div class="alert alert-danger">
                        <h2>{{ session('msg_erro') }}</h2>
                    </div>
                @endif
                <div class="caixa p-2 px-4">

                    <form action="{{ route('deliverylogin.logar') }}" method="post">
                        @csrf
                        <h1 class="h4">login</h1>
                        <label class="mb-3 d-block">
                            <span class="text-label label">Email</span>
                            <input type="text" name="email" placeholder="Digite seu email" class="form-campo">
                        </label>
                        <label class="mb-3 d-block">
                            <span class="text-label label">Senha</span>
                            <input type="password" name="password" placeholder="Digite sua senha" class="form-campo">
                        </label>
                        <input type="submit" value="Entrar" class="btn btn-gra-amarelo  m-auto">
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
