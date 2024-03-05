@extends('Comanda.Cozinha.template')
@section('conteudo')
    <div class="col-12 m-auto">
        <div class="pedido ordem">
            <div class="rows">
                <div class="col-4 ordem-left">
                    <div class="caixa">

                        <div class="rows">
                            <div class="col-12 mb-3 ">
                                <div class="bg-normal">
                                    <span class="d-block p-1 px-4 h6 mb-0"><b>Itens do Pedido</b></span>
                                    <div class="pb-1 scroll-260" style="padding:0 5px;">
                                        <table class="tabela border min limpa" width="100%" cellpadding="0"
                                            cellspacing="0">
                                            <thead>
                                                <tr class="bg-branco">
                                                    <th align="left">id</td>
                                                    <th align="left">Mesa</td>
                                                    <th align="center">Hora da Abertura</td>
                                                    <th align="center">Ação</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pedidos as $ped)
                                                    <tr class="bg-branco">
                                                        <td class="text-left">{{ $ped->id }}</td>
                                                        <td class="text-center">{{ $ped->mesa->nome ?? null }}</td>
                                                        <td class="text-center">{{ $ped->hora_abertura }}</td>
                                                        <td class="text-right">
                                                            <a href="{{ route('cozinha.show', $ped->id) }}"
                                                                class="fas fa-edit btn btn-azul mx-1" title="Excluir">
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>

                                    <p class="p-1" style="display:none">Nenhum intem selecionado</p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-8 ordem-right">
                    <div class="caixa">
                        <div class="rows rows2">
                            <div class="col-12 p-1 px-4 h3 mb-0"><b>Pedido:</b> <span
                                    class="text-azul">{{ $pedido->id ?? null }}</span></div>
                            <div class="col-12 mb-3">
                                <span class="px-3"><b>Mesa:</b> {{ $pedido->mesa->nome ?? null }}</span>
                                <span class="px-3"><b>Garçon:</b> {{ $pedido->vendedor->nome ?? null }}</span>
                                <span class="px-3"><b>Abertura:</b>{{ databr($pedido->data_abertura) }}
                                    {{ $pedido->hora_abertura }}</span>
                            </div>
                        </div>

                        <div id="tabs" class="p-2">
                            @php $cont = 1 @endphp

                            <div>
                                <div class="rows rows2">
                                    @foreach ($pedido->itens as $item)
                                        <div class="col-2 d-flex mb-3">
                                            <div class="caixa">
                                                <span class="tt2">Qtde: {{ $item->quantidade }}</span>
                                                <div class="home-mesa">
                                                    <span class="tt">{{ $item->produto->nome }}</span>
                                                </div>
                                                @foreach ($item->opcoes as $opcao)
                                                    <p><small>{{ $opcao->quantidade }}
                                                            {{ $opcao->opcaoItem->nome }}</small></p>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-12 mb-3 d-flex px-4 text-end">
                                <a href="{{ route('pedido.pedidoPronto', $pedido->id) }}" class="btn btn-verde2">Pedido
                                    Pronto <i class="fas fa-arrow-right"></i></a>
                            </div>
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

<form action="{{ route('itempedido.store') }}" method="POST">
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
