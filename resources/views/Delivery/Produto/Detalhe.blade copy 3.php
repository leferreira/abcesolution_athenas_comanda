@extends('Delivery.template2')
@section('conteudo')
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
                <div class="base-check">
                    @foreach ($opcoes as $op)
                        <div class="fw-700 text-uppercase px-1 d-flex justify-content-space-between"
                            style="align-items:center; background: #44444463; border-radius: 7px;">

                            @if ($op->opcao->qtde_min)
                                <div><span class="h5 mb-0">{{ $op->opcao->nome }}</span> <small class="d-block">Escolha
                                        {{ $op->opcao->qtde_min }}
                                        opção</small>
                                </div>
                                <div class="d-block text-right obrigatorio " data-group="grupo_{{ $op->opcao->id }}">
                                    <small class="d-block"
                                        style="background:#000;color:#fff;border-radius:5px;padding:0 4px;margin-bottom:3px"><span
                                            id="count-grupo_{{ $op->opcao->id }}"
                                            data-required="{{ $op->opcao->qtde_min }}">0/{{ $op->opcao->qtde_max }}</span></small>
                                    <small class="d-block"
                                        style="background:#000;color:#fff;border-radius:5px;padding:0 4px">Obrigatório</small>

                                </div>
                        </div>
                    @else
                        <div class = "group"><span class="h5 mb-0">{{ $op->opcao->nome }}</span> <small
                                class="d-block">Escolha até
                                {{ $op->opcao->qtde_max }} opção</small>
                        </div>
                        <div class="d-block text-right">
                            <small class="d-block"
                                style="background:#000;color:#fff;border-radius:5px;padding:0 4px;margin-bottom:3px">0/{{ $op->opcao->qtde_max }}</small>
                        </div>
                    @endif
                </div>
                @if ($op->opcao->tipo_id == 1)
                    <div class="check mb-3 radio">
                        @foreach ($op->opcao->itens as $it)
                            <label>{{ $it->nome }} <input type="radio" name="opcao_{{ $op->opcao->id }}"
                                    value="{{ $it->id }}" class="item" data-price="5.00"
                                    data-id ="{{ $it->id }}" data-group="grupo_{{ $op->opcao->id }}">
                            </label>
                        @endforeach
                    </div>
                @elseif ($op->opcao->tipo_id == 2)
                    <div class="check mb-3">
                        @foreach ($op->opcao->itens as $it)
                            <label>{{ $it->nome }} <input type="checkbox" name="opcao_{{ $op->opcao->id }}"
                                    value="{{ $it->id }}" class="item" data-price="5.00"
                                    data-id ="{{ $it->id }}" data-group="grupo_{{ $op->opcao->id }}">
                            </label>
                        @endforeach
                    </div>
                @elseif ($op->opcao->tipo_id == 3)
                    @foreach ($op->opcao->itens as $it)
                        <div class="check alt mb-3">
                            <label>{{ $it->nome }} <div><input type="number" id="grupodd_{{ $it->id }}"
                                        name="grupo_{{ $op->opcao->id }}" class="form-campo quantity"
                                        data-id ="{{ $it->id }}" data-price-per-unit="10.00"
                                        data-group="grupo_{{ $op->opcao->id }}">
                                </div>
                            </label>
                        </div>
                    @endforeach
                @endif
                @endforeach



                <div class="fw-700 text-uppercase px-1" style=" background: #44444463; border-radius: 7px;"><span
                        class="h5 mb-0">Alguma observação</small> </div>
                <div class="mt-1">
                    <textarea rows="5" class="form-campo"></textarea>
                </div>

            </div>

        </div>


        <div class="col-12">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="d-flex justify-content-space-between">
                <span class="d-flex" style="align-items:center;gap:10px">Quantidade <input type="number" name=""
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

            $('input, select').change(function() {
                // Verifica se o próximo grupo de opções existe
                var nextGroup = $(this).closest('.group').next('.group');
                if (nextGroup.length) {
                    // Scroll suave para o próximo grupo de opções
                    $('html, body').animate({
                        scrollTop: nextGroup.offset().top
                    }, 500); // 500 é o tempo em milissegundos para a animação
                }
            });


            // Atualiza os contadores e o total assim que a página carrega
            //  updateAllCounters();
            calculateTotal();
            // Evento de mudança para rádio buttons e checkboxes
            $('input[type=radio], input[type=checkbox]').on('change', function() {
                updateCounter($(this).attr('name'));
                calculateTotal();
            });

            // Evento de mudança para inputs numéricos
            $('input[type=number]').on('change', function() {
                updateCounter($(this).attr('name'));
                calculateTotal();
            });

            function updateAllCounters() {
                // Atualiza os contadores de todos os grupos
                $('input[type=radio], input[type=checkbox]').each(function() {
                    updateCounter($(this).attr('name'));
                });
                $('input[type=number]').each(function() {
                    updateCounter($(this).attr('name'));
                });
            }

            function updateCounter(group) {
                var selectedCount = 0;

                // Conta os rádio buttons selecionados
                $('input[type=radio][name="' + group + '"]:checked').each(function() {
                    selectedCount++;
                });

                // Conta os checkboxes marcados
                $('input[type=checkbox][name="' + group + '"]:checked').each(function() {
                    selectedCount++;
                });

                // Soma os valores dos inputs numéricos
                $('input[type=number][name="' + group + '"]').each(function() {
                    var val = parseInt($(this).val(), 10);
                    selectedCount += isNaN(val) ? 0 : val;
                });

                // Atualiza o contador na tela
                var requerido = $('#count-' + group).data('required');
                $('#count-' + group).text(selectedCount + '/' + requerido);
                console.log(requerido);
                // Verifica se todos os obrigatórios foram preenchidos
                checkAllRequiredFilled();
            }

            function calculateTotal() {
                var total = 0;

                // Soma o valor dos rádio buttons e checkboxes selecionados
                $('input[type=radio]:checked, input[type=checkbox]:checked').each(function() {
                    var price = parseFloat($(this).data('price'));
                    if (!isNaN(price)) { // Verifica se o preço é um número
                        total += price;
                    }
                });

                // Soma o valor dos inputs de quantidade
                $('input[type=number]').each(function() {
                    var quantity = parseInt($(this).val(), 10);
                    var pricePerUnit = parseFloat($(this).data('price-per-unit'));
                    if (!isNaN(quantity) && !isNaN(pricePerUnit)) { // Verifica se ambos são números
                        total += quantity * pricePerUnit;
                    }
                });

                // Atualiza o total na tela
                $('#total').val('Total: $' + total.toFixed(2));
            }

            function checkAllRequiredFilled() {
                var allFilled = true;
                $('.obrigatorio').each(function() {
                    var group = $(this).data('group');
                    var required = $(this).data('required');
                    var selected = $('#count-' + group).text().split('/')[0];
                    if (parseInt(selected, 10) < required) {
                        allFilled = false;
                        return false; // sai do loop
                    }
                });

                if (allFilled) {
                    // Todos os campos obrigatórios foram preenchidos
                    console.log('Todos os campos obrigatórios foram preenchidos!');
                }
            }


            $('#frm_pedido').on('submit', function(e) {
                e.preventDefault(); // Impede o envio do formulário tradicional
                // Objeto para armazenar os dados do formulário
                var formData = {
                    _token: '{{ csrf_token() }}',
                    inputs: [],
                    checkboxes: [],
                    radios: []
                };

                // Verifica se todos os campos obrigatórios foram preenchidos
                /*      if (!checkAllRequiredFilled()) {
                                    alert('Por favor, preencha todos os campos obrigatórios.');
                                    return; // Interrompe a função se nem todos os campos obrigatórios estão preenchidos
                                }
                */
                //   var formData = $(this).serialize();

                // Coleta dados dos inputs
                // Coleta dados dos inputs
                $('input[type="number"].opcoes, input[type="text"].opcoes').each(function() {
                    var id = $(this).data(
                        'id'); // Assume que você adicionou data-id aos seus inputs
                    var value = $(this).val();
                    if (value) { // Verifica se algum valor foi realmente digitado
                        formData.inputs.push({
                            id: id,
                            value: value
                        });
                    }
                });

                // Coleta dados dos checkboxes marcados
                $('input[type="checkbox"]:checked').each(function() {
                    var id = $(this).data(
                        'id'); // Assume que você adicionou data-id aos seus checkboxes
                    var value = $(this).val();
                    formData.checkboxes.push({
                        id: id,
                        value: value
                    });
                });

                // Coleta dados do rádio button selecionado
                $('input[type="radio"]:checked').each(function() {
                    var id = $(this).data(
                        'id'); // Assume que você adicionou data-id aos seus rádio buttons
                    var value = $(this).val();
                    formData.radios.push({
                        id: id,
                        value: value
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
                        // Trate aqui o retorno do sucesso
                        alert('Dados salvos com sucesso!');
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
