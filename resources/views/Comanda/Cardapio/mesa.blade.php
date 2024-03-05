@php
    if (session('tipo') == 'admin') {
        $extend = 'Comanda.Admin.template';
    } elseif (session('tipo') == 'garcon') {
        $extend = 'Comanda.Garcon.template';
    }

    $extend = 'Comanda.Garcon.template';
@endphp

@extends($extend)
@section('conteudo')
    <div class="col-12 py-3">

        <div class="rows rows2">

            @foreach ($mesas as $mesa)
                <div class="col-2 d-flex mb-3">
                    <div class="caixa {{ $mesa->status_id == config('constantes.status.ABERTO') ? 'comanda-ativo' : '' }} ">
                        <!-- Inserir QR Code aqui -->
                        <div class="qr-code">
                            {!! SimpleSoftwareIO\QrCode\Facades\QrCode::size(100)->generate(asset(route('pedido.novo', $mesa->id))) !!}
                        </div>
                        <div class="home-mesa">

                            <img src="{{ asset('assets/img/mesa.svg') }}" class="img-fluido">
                            <span class="tt">{{ $mesa->nome }}</span>

                        </div>
                        <div class="botoes">
                            <a href="{{ route('pedidocliente.novo', $mesa->id) }}" class="btn btn-azul"><i
                                    class="fas fa-plus-circle"></i> Novo Pedido</a>

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
