@extends('Delivery.template2')
@section('conteudo')
    <div class="rows montagem mt-4">
        <div class="col-12">
            <h3 class="h3 text-uppercase">Monte seu marmitex</h3>
        </div>
        <div class="col-6 mb-3 d-flex">
            <div class="caixa" style=" align-items: center; width:100%">

                <div class="thumb">
                    <img src="{{ asset($produto->imagem) }}" class="img-fluido">
                </div>
                <span class="h5">Monte seu marmitex do seu jeito! Peso aproximado de 700 a 750
                    gramas.</span>
            </div>

        </div>
        <div class="col-6">
            <div class="base-check">

                @foreach ($opcoes as $op)
                    <div class="fw-700 text-uppercase px-1" style=" background: #44444463; border-radius: 7px;">
                        <span class="h5 mb-0">{{ $op->opcao->nome }}</span>
                        @if ($op->opcao->qtde_min)
                            <small class="d-block">Escolha {{ $op->opcao->qtde_min }} opção</small>
                        @else
                            <small class="d-block">Escolha até {{ $op->opcao->qtde_max }} opção</small>
                        @endif
                    </div>
                    @if ($op->opcao->tipo_id == 1)
                        <div class="check mb-3 radio">
                            @foreach ($op->opcao->itens as $it)
                                <label>{{ $it->nome }}<input type="radio" name="arroz" value="branco"></label>
                            @endforeach
                        </div>
                    @elseif ($op->opcao->tipo_id == 2)
                        <div class="check mb-3">
                            @foreach ($op->opcao->itens as $it)
                                <label>{{ $it->nome }} <input type="checkbox" name="feijao" value="caldeado"></label>
                            @endforeach
                        </div>
                    @elseif ($op->opcao->tipo_id == 3)
                        @foreach ($op->opcao->itens as $it)
                            <div class="check alt mb-3">
                                <label>{{ $it->nome }} <div><input type="number" name="" value="0"
                                            class="form-campo"></div></label>
                            </div>
                        @endforeach
                    @endif
                @endforeach

                <div class="fw-700 text-uppercase px-1" style=" background: #44444463; border-radius: 7px;">
                    <span class="h5 mb-0">Alguma observação</small>
                </div>
                <div class="mt-1">
                    <textarea rows="5" class="form-campo"></textarea>
                </div>

            </div>

        </div>
        <div class="col-12">
            <div class="d-flex justify-content-space-between">
                <span class="d-flex" style="align-items:center;gap:10px">Quantidade <input type="number" name=""
                        value="0" class="form-campo"></span>
                <span><a href="" class="btn btn-azul">R$27,00 | Adicionar</a></span>
            </div>
        </div>




    </div>

    </div>

    <div id="fundo_preto"></div>
@endsection
