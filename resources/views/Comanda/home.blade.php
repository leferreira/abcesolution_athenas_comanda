@extends('Comanda.template')
@section('conteudo')
    <div class="col-12 m-auto">
        <div class="pedido border p-1 radius-4 bg-branco">
            <h1>Página inicial do sistema</h1>
            <div class="rows">
                <div class="col-12">
                    <div class="p-0">
                        <div class="rows">
                            <div class="col-12">
                                <div class="border mt-1 p-1 din">
                                    <div class="fim col">
                                        <a href="{{ route('admin.index') }}" class="btn btn-gra-amarelo width-100">Admin </a>
                                    </div>
                                    <div class="fim col">
                                        <a href="{{ route('garcon.index') }}" class="btn btn-gra-amarelo width-100">Garçon
                                        </a>
                                    </div>
                                    <div class="fim col">
                                        <a href="{{ route('cozinha.index') }}" class="btn btn-gra-amarelo width-100">Cozinha
                                        </a>
                                    </div>
                                    <div class="fim col">
                                        <a href="{{ route('cardapio.index') }}"
                                            class="btn btn-gra-amarelo width-100">Cliente
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>






    <div id="fundo_preto"></div>
@endsection
