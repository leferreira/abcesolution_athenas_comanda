@extends('Delivery.template2')
@section('conteudo')
    <style>
        #container-opcoes {
            height: 300px;
            /* Altura do contêiner */
            overflow-y: auto;
            /* Habilita a rolagem se o conteúdo for maior que a altura */
        }
    </style>

    <form id="frm_pedido" method="POST">
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
                <div class="base-check " id="container-opcoes">
                    @foreach ($opcoes as $op)
                        <div class="group" id="group-arroz" data-max="{{ $op->opcao->qtde_max }}"
                            data-obrigatorio="{{ $op->opcao->qtde_obrigatoria }}">
                            <div><span class="h5 mb-0">{{ $op->opcao->id }} - {{ $op->opcao->nome }}</span> <small
                                    class="d-block">Escolha
                                    {{ $op->opcao->qtde_min }}
                                    opção</small> </div>
                            <small class="d-block"
                                style="background:#000;color:#fff;border-radius:5px;padding:0 4px;margin-bottom:3px">
                                <span class="selection-count">0/{{ $op->opcao->qtde_max }}</span>
                                @if ($op->opcao->qtde_obrigatoria > 0)
                                    <span>{{ $op->opcao->qtde_obrigatoria }} Obrigatório</span>
                                @endif
                            </small>


                            @if ($op->opcao->tipo_id == 1)
                                <div class="check mb-3 radio">
                                    @foreach ($op->opcao->itens as $it)
                                        <label>{{ $it->nome }} <input type="radio" name="opcao_{{ $op->opcao->id }}"
                                                value="{{ $it->preco_adicional }}" class="item" data-price="5.00"
                                                data-item-id ="{{ $it->id }}"
                                                data-group="grupo-{{ $op->opcao->id }}" data-opcao-id={{ $op->opcao->id }}
                                                data-value="{{ $it->preco_adicional }}">
                                        </label>
                                    @endforeach
                                </div>
                            @elseif ($op->opcao->tipo_id == 2)
                                <div class="check mb-3">
                                    @foreach ($op->opcao->itens as $it)
                                        <label>{{ $it->nome }} <input type="checkbox"
                                                name="opcao_{{ $op->opcao->id }}" value="{{ $it->preco_adicional }}"
                                                class="item" data-price="5.00" data-item-id ="{{ $it->id }}"
                                                data-opcao-id={{ $op->opcao->id }} data-group="grupo-{{ $op->opcao->id }}"
                                                data-value="{{ $it->preco_adicional }}">
                                        </label>
                                    @endforeach
                                </div>
                            @elseif ($op->opcao->tipo_id == 3)
                                @foreach ($op->opcao->itens as $it)
                                    <div class="check alt mb-3">
                                        <label>{{ $it->nome }}
                                            @if ($it->preco_adicional > 0)
                                                <small>{{ $it->preco_adicional }}</small>
                                            @endif
                                            <div>

                                                <input type="number" min="{{ $op->opcao->qtde_min }}"
                                                    max="{{ $op->opcao->qtde_max }}" id="grupodd_{{ $it->id }}"
                                                    name="grupo-{{ $op->opcao->id }}" class="form-campo quantity"
                                                    data-item-id ="{{ $it->id }}" data-opcao-id={{ $op->opcao->id }}
                                                    data-value="{{ $it->preco_adicional }}" data-price-per-unit="10.00"
                                                    data-group="grupo-{{ $op->opcao->id }}">

                                            </div>
                                        </label>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    @endforeach



                    <div class="fw-700 text-uppercase px-1" style=" background: #44444463; border-radius: 7px;"><span
                            class="h5 mb-0">Alguma observação</small> </div>
                    <div class="mt-1">
                        <textarea rows="5" class="form-campo" id="observacao"></textarea>
                    </div>

                </div>

            </div>


            <div class="col-12">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="produto_id" id="produto_id" value="{{ $produto->id }}">
                <div class="d-flex justify-content-space-between">
                    <span class="d-flex" style="align-items:center;gap:10px">Quantidade <input type="text" name=""
                            value="0" class="form-campo"></span>
                    <span class="d-flex" style="align-items:center;gap:10px">Total: <input type="text" id="total"
                            value="0" class="form-campo"></span>
                    <span><a href="" class="btn btn-azul">R$27,00 | Adicionar</a></span>
                    <button type="submit" id="submit-order" class="btn btn-azul">Enviar Pedido</button>
                </div>
            </div>

    </form>



    </div>

    </div>

    <div id="fundo_preto"></div>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            // Função para atualizar a contagem, desabilitar/habilitar inputs e calcular o total
            function updateGroup(group) {
                var maxCount = parseFloat(group.data('max'), 10);
                var totalValue = 0;

                // Para rádio e checkboxes
                group.find('input[type="radio"]:checked, input[type="checkbox"]:checked').each(function() {
                    totalValue += parseFloat($(this).data('value'), 10);
                });

                // Para inputs numéricos
                group.find('input[type="number"]').each(function() {
                    var qty = parseFloat($(this).val(), 10) || 0;
                    totalValue += qty * parseFloat($(this).data('value'), 10);
                });

                // Atualiza o total global
                updateTotal();
            }

            // Atualiza o total de todos os grupos
            function updateTotal() {
                var total = 0;

                $('.group').each(function() {
                    // Soma os valores de cada grupo
                    $(this).find('input[type="radio"]:checked, input[type="checkbox"]:checked').each(
                        function() {
                            total += parseFloat($(this).data('value'), 10);
                        });

                    $(this).find('input[type="number"]').each(function() {
                        var qty = parseFloat($(this).val(), 10) || 0;
                        total += qty * parseFloat($(this).data('value'), 10);
                    });
                });

                // Exibe o total, formatando para garantir duas casas decimais

                $('#total').val(total.toFixed(2));
            }

            // Evento de mudança para todos os inputs
            $('.group input').on('change', function() {
                updateGroup($(this).closest('.group'));
            });

            // Inicialização no carregamento da página
            $('.group').each(function() {
                updateGroup($(this));
            });



            // Evento para quando os inputs mudarem
            $('.group input').change(function() {
                var group = $(this).closest('.group');
                updateSelectionCount(group);
            });

            // Inicializa a contagem e configuração de desabilitação quando a página carrega
            $('.group').each(function() {
                updateSelectionCount($(this));
            });

            $('#container-opcoes input[type=radio]').change(function() {
                var container = $('#container-opcoes');
                var nextGroup = $(this).closest('.group').next('.group');

                if (nextGroup.length) {
                    var scrollPosition = nextGroup.position().top + container.scrollTop();

                    container.animate({
                        scrollTop: scrollPosition
                    }, 500);
                }
            });

            // Função para atualizar a contagem
            // Função para atualizar a contagem e desabilitar/habilitar inputs
            // Função para atualizar a contagem e desabilitar/habilitar inputs
            function updateSelectionCount(group) {
                var countSpan = group.find('.selection-count');
                var obrigadoCount = parseInt(group.data('obrigatorio'), 10);
                var maxCount = parseInt(group.data('max'), 10); // Pega o valor máximo do atributo data-max
                var selectedCount = 0;

                // Para radio buttons
                if (group.find('input[type="radio"]').length) {
                    selectedCount = group.find('input[type="radio"]:checked').length;
                    countSpan.text(selectedCount + '/' + maxCount);
                }

                // Para checkboxes
                if (group.find('input[type="checkbox"]').length) {
                    selectedCount = group.find('input[type="checkbox"]:checked').length;
                    countSpan.text(selectedCount + '/' + maxCount);
                    group.find('input[type="checkbox"]').not(':checked').prop('disabled', selectedCount >=
                        maxCount);
                }

                // Para inputs numéricos
                if (group.find('input[type="number"]').length) {
                    var totalValue = 0;
                    group.find('input[type="number"]').each(function() {
                        totalValue += parseInt($(this).val(), 10) || 0;
                    });
                    countSpan.text(totalValue + '/' + maxCount);
                    group.find('input[type="number"]').each(function() {
                        if (totalValue >= maxCount && parseInt($(this).val(), 10) === 0) {
                            $(this).prop('disabled', true);
                        } else {
                            $(this).prop('disabled', false);
                        }
                    });
                }

            }

            // Evento para quando os inputs mudarem
            $('.group input').change(function() {
                var group = $(this).closest('.group');
                updateSelectionCount(group);
            });

            // Inicializa a contagem quando a página carrega
            $('.group').each(function() {
                updateSelectionCount($(this));
            });


            $('#frm_pedido').on('submit', function(e) {
                e.preventDefault(); // Impede o envio do formulário tradicional
                // Objeto para armazenar os dados do formulário
                var formData = {
                    _token: '{{ csrf_token() }}',
                    produto_id: $("#produto_id").val(),
                    observacao: $("#observacao").val(),
                    inputs: [],
                    checkboxes: [],
                    radios: [],
                    valores: [],
                };


                // Coleta dados dos inputs
                // Coleta dados dos inputs
                $('input[type="number"]').each(function() {
                    var item_id = $(this).data(
                        'item-id'); // Assume que você adicionou data-id aos seus inputs
                    var opcao_id = $(this).data('opcao-id');
                    var qtde = $(this).val();
                    var value = $(this).data('value');

                    if ($.isNumeric(qtde) && Number(qtde) > 0) {
                        formData.inputs.push({
                            item_id: item_id,
                            opcao_id: opcao_id,
                            qtde: qtde,
                            value: value,
                        });
                        formData.valores.push({
                            tipo_id: 3,
                            item_id: item_id,
                            opcao_id: opcao_id,
                            qtde: qtde,
                            value: value,
                        });
                    }
                });

                // Coleta dados dos checkboxes marcados
                $('input[type="checkbox"]:checked').each(function() {
                    var item_id = $(this).data(
                        'item-id'); // Assume que você adicionou data-id aos seus checkboxes
                    var opcao_id = $(this).data('opcao-id');
                    var value = $(this).val();
                    formData.checkboxes.push({
                        item_id: item_id,
                        opcao_id: opcao_id,
                        qtde: 1,
                        value: value
                    });
                    formData.valores.push({
                        tipo_id: 2,
                        item_id: item_id,
                        opcao_id: opcao_id,
                        qtde: 1,
                        value: value,
                    });
                });

                // Coleta dados do rádio button selecionado
                $('input[type="radio"]:checked').each(function() {
                    var item_id = $(this).data(
                        'item-id'); // Assume que você adicionou data-id aos seus rádio buttons
                    var opcao_id = $(this).data('opcao-id');
                    var value = $(this).val();
                    formData.radios.push({
                        item_id: item_id,
                        opcao_id: opcao_id,
                        qtde: 1,
                        value: value
                    });
                    formData.valores.push({
                        tipo_id: 1,
                        item_id: item_id,
                        opcao_id: opcao_id,
                        qtde: 1,
                        value: value,
                    });
                });


                // Se tudo estiver preenchido, colete os dados do formulário

                // Faça a solicitação AJAX para o servidor
                $.ajax({
                    url: base_url +
                        "delivery/deliverypedido/salvar", // Substitua pela URL do seu método no servidor
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(formData),
                    success: function(response) {

                        if (response.tem_erro == true) {
                            alert(response.erro)
                        } else {
                            alert('tudo ok')
                        }
                    },
                    error: function(xhr, status, error) {
                        // Trate aqui os erros
                        alert('Ocorreu um erro ao salvar os dados: ' + error);
                    }
                });

                return false;
            });




        });
    </script>
@endsection
