@extends('Comanda.Cardapio.template')
@section('conteudo')
    <div class="col-12 m-auto">
        <div class="pedido ordem">
            <div class="rows">



                <div class="col-12 ordem-right">
                    <div class="caixa">
                        <div id="tabs" class="p-2">
                            <ul>
                                @php $cont = 1 @endphp
                                @foreach ($categorias as $categoria)
                                    <li><a href="#tabs-{{ $cont++ }}">{{ $categoria->categoria }}</a></li>
                                @endforeach
                            </ul>
                            @php $cont = 1 @endphp
                            @foreach ($categorias as $cat)
                                <div id="tabs-{{ $cont++ }}">
                                    <div class="rows rows2">
                                        @foreach ($cat->produtos as $prod)
                                            <div class="col-2 d-flex mb-3">
                                                <div class="caixa">
                                                    <div class="home-mesa">
                                                        <span class="tt">{{ $prod->nome }}</span>
                                                    </div>
                                                    <span class="tt2">R$ {{ $prod->valor_venda }}</span>

                                                    <div class="botoes alt">
                                                        @if (Auth::check())
                                                            <a href="javascript:;"
                                                                onclick="abrirQuantidade({{ $prod->id }})"
                                                                class="btn btn-gra-azul addicionar"
                                                                title="Adicionar completo"><i
                                                                    class="fas fa-plus-circle"></i>
                                                            </a>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function abrirQuantidade(id) {
        $("#produto_id").val(id);
        abrirModal('#modalQtde')
    }
</script>

<form action="{{ route('pedidocliente.store') }}" method="POST">
    @csrf
    <div class="window menor" id="modalQtde">
        <div class="px-4 px-ms-4 pb-3 width-100 d-inline-block">
            <span class="d-block text-center h4 mb-0 p-2">Inserir Item</span>
            <span class="text-label">Digite quantidade</span>
            <input type="text" class="form-campo p-2 mb-3" name="quantidade">

        </div>
        <div class="tfooter end">
            <a href="" class="fechar btn btn-neutro">Fechar</a>
            <input type="hidden" name="produto_id" id="produto_id">
            <input type="submit" value="Inserir Item" class="btn btn-gra-amarelo">
        </div>
    </div>
</form>

<div id="fundo_preto"></div>
