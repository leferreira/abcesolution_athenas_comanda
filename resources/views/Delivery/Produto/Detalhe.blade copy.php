@extends('Delivery.template')
@section('conteudo')
    <div class="col-12 m-auto">
        <div class="pedido border p-1 radius-4 bg-branco">

            <div class="rows">
                <div class="col-12">
                    <div class="p-0">
                        <div class="rows">
                            <div class="col-12">
                                @foreach ($opcoes as $op)
                                    <h2>{{ $op->opcao->nome }} <span
                                            id="qtde_min">0</span>/<span>{{ $op->opcao->qtde_max }}</span>
                                    </h2>

                                    @if ($op->opcao->qtde_min)
                                        <h3><span>Escolha {{ $op->opcao->qtde_min }} opção</span></h3>
                                        Obrigatório
                                    @else
                                        <h3><span>Escolha até {{ $op->opcao->qtde_max }} opção</span></h3>
                                    @endif
                                    <div class="scroll mb-1 border bg-branco p-2">
                                        <div class="rows">
                                            <div class="col-6 mb-1">
                                                @foreach ($op->opcao->itens as $it)
                                                    @if ($op->opcao->tipo_id == 1)
                                                        <span class="text-label">{{ $it->nome }}</span>
                                                        <input type="radio" name="" class="form-campo">
                                                    @elseif ($op->opcao->tipo_id == 2)
                                                        <span class="text-label">{{ $it->nome }}</span>
                                                        <input type="checkbox" name="" class="form-campo">
                                                    @elseif ($op->opcao->tipo_id == 3)
                                                        <span class="text-label">{{ $it->nome }}</span>
                                                        <input type="input" name="" class="form-campo">
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>



                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>







    <div id="fundo_preto"></div>
@endsection
