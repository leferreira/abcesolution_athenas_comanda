@extends('Comanda.template')
@section('conteudo')
    <div class="col-6 m-auto">
        <div class="base-login">

            <div class="caixa-login position-relative">
                <div class="caixa p-2 px-4">
                    <form action="{{ route('login.logar') }}" method="post">
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
    @endsection
