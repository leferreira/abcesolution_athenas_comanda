@extends('Comanda.Cardapio.template')
@section('conteudo')
    <div class="col-12 m-auto">
        <div class="pedido border p-1 radius-4 bg-branco">
            <h1>Meus Pedidos </h1>
            <div class="rows">
                <div class="col-12">
                    <div class="p-0">
                        <div class="rows">
                            <div class="col-12">

                                <div class="scroll-130 border bg-normal px-0">
                                    <table class="tabela" width="100%" cellpadding="0" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th align="center">Cód.</th>
                                                <th align="center">Data</th>
                                                <th align="center">Hota</th>
                                                <th align="center">Status</th>
                                                <th align="center">total</th>
                                                <th align="center">opções</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach ($lista as $p) {
                                            ?>
                                            <tr class="bg-branco">
                                                <td align="center"><?php echo $p->id; ?></td>
                                                <td align="center"><?php echo databr($p->data_abertura); ?></td>
                                                <td align="center"><?php echo $p->hora_abertura; ?></td>
                                                <td align="center"><?php echo $p->status->status; ?></td>
                                                <td align="center"><?php echo $p->total; ?></td>
                                                <td class="text-right">
                                                    <a href="{{ route('pedidocliente.edit', $p->id) }}"
                                                        class="fas fa-edit btn btn-azul mx-1" title="Excluir">
                                                    </a>
                                                    <a href="#"
                                                        onclick="confirm('Tem Certeza?') ? document.getElementById('apagar{{ $p->id }}').submit() : '';"
                                                        class="d-inline-block btn btn-vermelho btn-circulo btn-pequeno"
                                                        title="Excluir"><i class="fas fa-trash-alt"></i></a>
                                                    <form action="{{ route('pedido.destroy', $p->id) }}" method="POST"
                                                        id="apagar{{ $p->id }}">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        {{ csrf_field() }}
                                                    </form>


                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>




                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection

<div class="window form" id="add">
    <div class="px-4 px-ms-4 width-100 d-inline-block">
        <span class="d-block text-center h4 mb-0 p-2">Acrescentar opções</span>
        <div class="border mb-4 adicional">
            <div class="rows">
                <div class="col-4">
                    <div class="thumb">
                        <img src="upload/pizza2.png" class="img-fluido">
                    </div>
                </div>
                <div class="col-8">
                    <div class="rows pt-2 border-left">
                        <div class="col-6">
                            <span class="text-label">Produto</span>
                            <strong class="text-label h6">Pizza 1</strong>
                        </div>
                        <div class="col-3">
                            <span class="text-label">Valor</span>
                            <strong class="text-label h6">39,00</strong>
                        </div>
                        <div class="col-3">
                            <span class="text-label">Qtde</span>
                            <strong class="text-label h6">1</strong>
                        </div>
                    </div>
                    <div class="rows pt-2 border-top border-left pb-2">
                        <div class="col-6 mt-3">
                            <div class="caixa">
                                <strong class="text-label p-1 border-bottom bg-normal"><i
                                        class="fas fa-plus-circle"></i> Adicionar</strong>
                                <div class="p-1">
                                    <select class="form-campo">
                                        <option selected>Selecione</option>
                                        <option>Com borda (+5,50)</option>
                                        <option>Com recheio (+5,50)</option>
                                        <option>Com queijo (+5,50)</option>
                                    </select>
                                </div>
                                <div class="p-1 position-relative">
                                    <a href="javascript:;" onclick="abrirModal('#novo')" class="link-laranja filtro"><i
                                            class="fas fa-plus"></i> Cadastrar novo</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="caixa">
                                <strong class="text-label p-1 border-bottom bg-red-18"><i
                                        class="fas fa-minus-circle"></i> Remover</strong>
                                <div class="p-1">
                                    <select class="form-campo">
                                        <option selected>Selecione</option>
                                        <option>Sem borda (0,00)</option>
                                        <option>Sem recheio (0,00)</option>
                                        <option>Sem queijo (0,00)</option>
                                    </select>
                                </div>
                                <div class="p-1">
                                    <a href="javascript:;" onclick="abrirModal('#novo')" class="link-vermelho"><i
                                            class="fas fa-plus"></i> Cadastrar novo</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <table class="tabela border" width="100%" cellpadding="0" cellspacing="0">
                                <thead>
                                    <tr class="bg-branco">
                                        <th align="left">Adicionado</td>
                                        <th align="right">Valor total</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-branco">
                                        <td class="text-left" colspan="2"><span
                                                class="text-left text-vermelho h6 mb-0">Pizza 1 <strong>(Com
                                                    borda)<strong></td>
                                    </tr>
                                    <tr class="bg-branco">
                                        <td align="center" colspan="2"><span
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
        <input type="submit" class="btn btn-verde" value="Salvar alteração">
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
<div id="fundo_preto"></div>
