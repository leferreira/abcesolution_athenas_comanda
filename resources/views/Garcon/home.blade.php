@extends('Garcon.template')
@section('conteudo')
    <div class="col-12 py-3">

        <div class="rows rows2">

            @foreach ($mesas as $mesa)
                <div class="col-2 d-flex mb-3">
                    <div class="caixa {{ $mesa->status_id == config('constantes.status.ABERTO') ? 'comanda-ativo' : '' }} ">
                        <div class="home-mesa">
                            <img src="{{ asset('assets/img/mesa.svg') }}" class="img-fluido">
                            <span class="tt">{{ $mesa->nome }}</span>
                        </div>
                        <div class="botoes">
                            @if (
                                $mesa->status_id == config('constantes.status.ABERTO') ||
                                    $mesa->status_id == config('constantes.status.ENVIADO_PARA_COZINHA'))
                                <a href="{{ route('pedido.show', $mesa->id) }}" class="btn btn-verde"><i
                                        class="fas fa-plus-circle"></i> Ver Comanda</a>
                            @elseif($mesa->status_id == config('constantes.status.PEDIDO_PRONTO'))
                                <a href="{{ route('pedido.entegarPedido', $mesa->id) }}" class="btn btn-vermelho"><i
                                        class="fas fa-plus-circle"></i> Pedido Pronto</a>
                            @elseif($mesa->status_id == config('constantes.status.ENTREGUE'))
                                <a href="{{ route('pedido.show', $mesa->id) }}" class="btn btn-roxo"><i
                                        class="fas fa-plus-circle"></i> Entregue</a>
                            @else
                                <a href="{{ route('pedido.novo', $mesa->id) }}" class="btn btn-azul"><i
                                        class="fas fa-plus-circle"></i> Novo Pedido</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <form action="{{ route('pedido.store') }}" method="POST">
        @csrf
        <div class="window menor" id="novo">
            <div class="px-4 px-ms-4 pb-3 width-100 d-inline-block">
                <span class="d-block text-center h4 mb-0 p-2">Abertura da comanda</span>
                <span class="text-label">Digite o número ou nome da comanda</span>
                <input type="text" class="form-campo p-2 mb-3" name="identificacao">

            </div>
            <div class="tfooter end">
                <a href="" class="fechar btn btn-neutro">Fechar</a>
                <input type="hidden" name="mesa_id" id="mesa_id">
                <input type="submit" value="Abrir Comanda" class="btn btn-gra-amarelo">
            </div>
        </div>
    </form>
    <div id="fundo_preto"></div>
@endsection

<script>
    function abrirComanda(id) {
        $("#mesa_id").val(id);
        abrirModal('#novo')
    }
</script>
