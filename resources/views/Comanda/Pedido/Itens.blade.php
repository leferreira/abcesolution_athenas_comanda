@php
    if (session('tipo') == 'admin') {
        $extend = 'Comanda.Admin.template';
        $vendedor = $pedido->admin->nome ?? null;
    } elseif (session('tipo') == 'garcon') {
        $extend = 'Comanda.Garcon.template';
        $vendedor = $pedido->garcon->nome ?? null;
    }
@endphp

@extends($extend)
@section('conteudo')
    <div class="col-12 m-auto">
        <div class="pedido ordem">
            <div class="rows">
                <div class="col-4 ordem-left">
                    <div class="caixa">
                        <div class="rows rows2">
                            <div class="col-12 p-1 px-4 h3 mb-0"><b>Pedido:</b> <span
                                    class="text-azul">{{ $pedido->identificacao ?? null }}</span></div>
                            <div class="col-6 mb-3">
                                <span class="px-3"><b>Mesa:</b> {{ $pedido->mesa->nome ?? null }}</span>
                                <span class="px-3"><b>Garçon:</b> {{ $vendedor ?? null }}</span>
                                <span class="px-3"><b>Abertura:</b>{{ databr($pedido->data_abertura) }}
                                    {{ $pedido->hora_abertura }}</span>
                            </div>
                            <div class="col-6 mb-3">
                                <span class="d-block px-4 h3 mb-0"><b>Valor: </b>R$ {{ $pedido->total }}</span>
                            </div>
                        </div>
                        <div class="rows">
                            <div class="col-12 mb-3">
                                <div class="bg-normal">
                                    <span class="d-block p-1 px-4 h6 mb-0"><b>Ordem enviados para a cozinha</b></span>
                                    <div class="pb-1 scroll-260" style="padding:0 5px;">
                                        <table class="tabela border min limpa" width="100%" cellpadding="0"
                                            cellspacing="0">
                                            <thead>
                                                <tr class="bg-branco">
                                                    <th align="left">Item</td>
                                                    <th align="center">Qtde</td>
                                                    <th align="center">Vl. Unit.</td>
                                                    <th align="center">Ação</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pedido->itens as $item)
                                                    <tr class="bg-branco">
                                                        <td class="text-left">{{ $item->produto->nome }}</td>
                                                        <td class="text-center">{{ $item->quantidade }}</td>
                                                        <td class="text-center">{{ $item->valor }}</td>
                                                        <td class="text-right">
                                                            <a href="javascript:;" onclick="abrirModal('#add')"
                                                                class="fas fa-edit btn btn-azul mx-1" title="Excluir">
                                                            </a>
                                                            <a href="#"
                                                                onclick="confirm('Tem Certeza?') ? document.getElementById('apagar{{ $item->id }}').submit() : '';"
                                                                class="d-inline-block btn btn-vermelho btn-circulo btn-pequeno"
                                                                title="Excluir"><i class="fas fa-trash-alt"></i></a>
                                                            <form action="{{ route('itempedido.destroy', $item->id) }}"
                                                                method="POST" id="apagar{{ $item->id }}">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                {{ csrf_field() }}
                                                            </form>


                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>

                                    <p class="p-1" style="display:none">Nenhum intem selecionado</p>
                                </div>
                            </div>

                            <div class="col-12 mb-3 d-flex px-4 text-end">
                                @if ($pedido->status_id == config('constantes.status.ABERTO'))
                                    <a href="{{ route('pedido.enviarCozinha', $pedido->id) }}"
                                        class="btn btn-verde2">Enviar
                                        Pedido <i class="fas fa-arrow-right"></i></a>
                                @elseif($pedido->status_id == config('constantes.status.ENTREGUE'))
                                    <a href="{{ route('pedido.finalizarPedido', $pedido->id) }}"
                                        class="btn btn-vermelho">Finalizar
                                        Pedido <i class="fas fa-arrow-right"></i></a>
                                @endif
                                <a href="#" class="btn btn-roxo">Imprimir <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8 ordem-right">
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
                                                        <a href="avascript:;"
                                                            onclick="abrirQuantidade({{ $prod->id }})"
                                                            class="btn btn-gra-azul addicionar"
                                                            title="Adicionar completo"><i class="fas fa-plus-circle"></i>
                                                        </a>

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

<form action="{{ route('itempedidocliente.store') }}" method="POST">
    @csrf
    <div class="window menor" id="modalQtde">
        <div class="px-4 px-ms-4 pb-3 width-100 d-inline-block">
            <span class="d-block text-center h4 mb-0 p-2">Inserir Item</span>
            <span class="text-label">Digite quantidade</span>
            <input type="text" class="form-campo p-2 mb-3" name="quantidade" value="1">

        </div>
        <div class="tfooter end">
            <a href="" class="fechar btn btn-neutro">Fechar</a>
            <input type="hidden" name="produto_id" id="produto_id">
            <input type="hidden" name="pedido_id" id="pedido_id" value="{{ $pedido->id }}">
            <input type="submit" value="Inserir Item" class="btn btn-gra-amarelo">
        </div>
    </div>
</form>


<div class="window medio" id="add">
    <div class="px-4 px-ms-4 width-100 d-inline-block">
        <span class="d-block text-center h4 mb-0 p-2">Acrescentar opções</span>
        <div class="border mb-4 adicional p-2">
            <div class="rows">
                <div class="col-12">
                    <div class="rows pb-2">
                        <div class="col-6 mt-3">
                            <div class="caixa">
                                <strong class="text-label text-azul p-1 border-bottom bg-normal"><i
                                        class="fas fa-plus-circle"></i> Adicionar</strong>
                                <div class="p-1">
                                    <select class="form-campo">
                                        <option selected>Selecione</option>
                                        <option>Com borda (+5,50)</option>
                                        <option>Com recheio (+5,50)</option>
                                        <option>Com queijo (+5,50)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="caixa">
                                <strong class="text-label text-vermelho p-1 border-bottom bg-red-18"><i
                                        class="fas fa-minus-circle"></i> Remover</strong>
                                <div class="p-1">
                                    <select class="form-campo">
                                        <option selected>Selecione</option>
                                        <option>Sem borda (0,00)</option>
                                        <option>Sem recheio (0,00)</option>
                                        <option>Sem queijo (0,00)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <table class="tabela border" width="100%" cellpadding="0" cellspacing="0">
                                <thead>
                                    <tr class="bg-branco">
                                        <th align="left">Adicionado</td>
                                        <th align="right">Excluir</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-branco">
                                        <td class="text-left"><span class="text-left text-vermelho h6 mb-0">Pizza
                                                calabresa <strong>(Com borda)<strong></td>
                                        <td class="text-right">
                                            <a href="" class="fas fa-edit btn btn-azul mx-1"
                                                title="Excluir"></a>
                                            <a href="" class="fas fa-trash btn btn-vermelho mr-1"
                                                title="Editar"></a>
                                        </td>
                                    </tr>
                                    <tr class="bg-branco">
                                        <td align="right" colspan="2">Valor total: <span
                                                class="text-right text-vermelho h4 mb-0">24,00<strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tfooter end">
        <a href="" class="fechar btn btn-neutro">Fechar</a>
        <input type="submit" class="btn btn-gra-amarelo" value="Salvar alteração">
    </div>
</div>



<div class="window menor" id="novo">
    <div class="px-4 px-ms-4 pb-3 width-100 d-inline-block">
        <span class="d-block text-center h4 mb-0 p-2">Adicionar nova categoria</span>
        <span class="text-label">Nome</span>
        <input type="text" class="form-campo p-2 mb-3">

    </div>
    <div class="tfooter end">
        <a href="" class="fechar btn btn-neutro">Fechar</a>
        <input type="submit" class="btn btn-gra-amarelo" value="Adicionar">
    </div>
</div>

<!-- Enviar para cozinha-->
<div class="window menor" id="enviar">
    <div class="px-4 px-ms-4 pb-3 width-100 d-inline-block">
        <div class="obrigado">
            <div class="rows">
                <div class="col-12 m-auto py-4">
                    <i class="far fa-check-circle h1"></i>
                    <h3 class="h3">Pedido Enviadio</h3>
                    <h6 class="h6">Deseja imprimir?</h6>
                </div>
            </div>
        </div>

    </div>
    <div class="tfooter center">
        <a href="" class="fechar btn btn-neutro">Fechar</a>
        <a href="index.php?link=3#tabs-3" class="btn btn-azul2">Não Imprimir</a>
        <a href="index.php?link=3#tabs-3" class="btn btn-gra-amarelo"> Imprimir</a>
    </div>
</div>


<div id="fundo_preto"></div>
