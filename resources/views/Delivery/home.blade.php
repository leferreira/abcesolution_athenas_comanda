@extends('Delivery.template')
@section('conteudo')
    <div class="col-12 py-4">
        <div class="h4">SEJA BEM VINDO SELECIONE UMA CATEGORIA ABAIXO E FAÇA SEU PEDIDO</div>
    </div>
    <div class="col-2">
        @include('Delivery.menu-lateral')
    </div>

    <div class="col-8">
        @foreach ($categorias as $cat)
            <div class="rows">
                <div class="col-12">
                    <h3 class="h3">{{ $cat->categoria }}</h3>
                </div>
                @foreach ($cat->produtos as $prod)
                    <div class="col-4 d-flex mb-3">
                        <a href="{{ route('delivery.deliveryproduto.detalhe', $prod->id) }}" class="caixa"
                            style=" align-items: center;">
                            <div>
                                <div class="fw-700 text-uppercase">{{ $prod->nome }}</div>
                                <div>Peso aproximado de 700 a 750 gramas.</div>
                                <span class="produto-preco"><span class="fw-700 d-block mt-3"> R$
                                        {{ $prod->valor_venda }}</span></span>
                            </div>

                            <div class="thumb">
                                <img src="{{ $prod->imagem }}" class="img-fluido">
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        @endforeach

    </div>

    @if ($pedido)
        <div class="col-2 fixed-bar">
            <div class="scroll-item">
                @foreach ($pedido->itens as $item)
                    <div class="cx">
                        <strong>{{ $item->produto->nome }}</strong>
                        <div class="itens">
                            <div class="border-right">
                                @foreach ($item->opcoes as $opcao)
                                    <small>{{ $opcao->opcaoItem->nome }}</small>
                                @endforeach
                            </div>
                            <div>
                                <span class="fw-700 d-block text-center">R$ {{ $pedido->total }}</span>
                            </div>
                        </div>
                        <div class="add">


                            <a href="#"
                                onclick="confirm('Tem Certeza?') ? document.getElementById('apagar{{ $item->id }}').submit() : '';"
                                title="Ecluir"><i class="fas fa-trash text-vermelho"></i></a>
                            <form action="{{ route('delivery.deliveryitempedido.destroy', $item->id) }}" method="POST"
                                id="apagar{{ $item->id }}">
                                <input type="hidden" name="_method" value="DELETE">
                                {{ csrf_field() }}
                            </form>
                            </td>

                            <span>1</span>
                            <a href="" class="fas fa-plus-circle text-azul"></a>
                        </div>
                    </div>
                @endforeach





            </div>
            <a href="{{ route('delivery.deliverypedido.pagamento', $pedido->id) }}" class="btn btn-azul mt-4 ">Finalizar
                pedido</a>
        </div>
    @endif
@endsection
