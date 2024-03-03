@extends('Cardapio.template')
@section('conteudo')
    <div class="col-12 m-auto">
        <div class="pedido border p-1 radius-4 bg-branco">

            <div class="rows">
                <div class="col-12">
                    <div class="p-0">
                        <div class="rows">
                            <div class="col-12">
                                <div class="scroll mb-1 border bg-branco p-2">
                                    <div class="rows">
                                        <div class="col-6 mb-1">
                                            <span class="text-label">Nome</span>
                                            <input type="text" class="form-campo">
                                        </div>
                                        <div class="col-3 mb-1">
                                            <span class="text-label">Cel</span>
                                            <input type="text" class="form-campo">
                                        </div>

                                        <div class="col-3 mb-1">
                                            <span class="text-label">Endereço</span>
                                            <input type="text" class="form-campo">
                                        </div>
                                        <div class="col-3 mb-1">
                                            <span class="text-label">Bairro</span>
                                            <input type="text" class="form-campo">
                                        </div>
                                        <div class="col-3 mb-1">
                                            <span class="text-label">Cidade</span>
                                            <input type="text" class="form-campo">
                                        </div>


                                    </div>
                                </div>
                                <div class="botoes border-top alt">
                                    <a href="{{ route('cliente.store') }}" class="btn btn-verde2 d-block"> Salvar</a>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
