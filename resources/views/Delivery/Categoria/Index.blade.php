@extends('Delivery.template')
@section('conteudo')
    <div class="col-12 py-4">
        <div class="h4">Categoria: {{ $categoria->categoria }}</div>
    </div>
    <div class="col-3">
        @include('Delivery.menu-lateral')
    </div>

    <div class="col-9">

        <div class="rows">
            @foreach ($produtos as $p)
                <div class="col-4 d-flex mb-3">
                    <div class="caixa">
                        <div class="thumb">
                            <img src="{{ asset($p->produto->imagem) }}" class="img-fluido">
                        </div>
                        <span class="tt">{{ $p->produto->nome }}</span>
                        <div class="botoes border-bottom">
                            <small class="tt2">R$ {{ $p->produto->valor_venda }}</small>
                        </div>
                        <div class="botoes bg-normal">
                            <a href="index.php?link=2" class="btn btn-verde2">Atender</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
