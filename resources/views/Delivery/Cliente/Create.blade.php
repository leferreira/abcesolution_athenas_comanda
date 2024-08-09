@extends('Delivery.template')
@section('conteudo')
    <div class="col-12 m-auto">
        <div class="pedido border p-1 radius-4 bg-branco">
            <form action="{{ route('deliverycliente.store') }}" method="post">
                @csrf
                <div class="rows">
                    <div class="col-12">
                        <div class="p-0">
                            <div class="rows">
                                <div class="col-12">
                                    <div class="scroll mb-1 border bg-branco p-2">
                                        <div class="rows">
                                            <div class="col-6 mb-1">
                                                <span class="text-label">Nome</span>
                                                <input type="text" name="nome" required class="form-campo">
                                            </div>
                                            <div class="col-3 mb-1">
                                                <span class="text-label">Celular</span>
                                                <input type="text" name="celular" required
                                                    class="form-campo mascara-celular">
                                            </div>

                                            <div class="col-3 mb-1">
                                                <span class="text-label">Cep</span>
                                                <input type="text" name="cep"
                                                    class="form-campo busca_cep mascara-cep">
                                            </div>

                                            <div class="col-3 mb-1">
                                                <span class="text-label">Endereço</span>
                                                <input type="text" name="endereco" class="form-campo rua">
                                            </div>
                                            <div class="col-2 mb-1">
                                                <span class="text-label">Número</span>
                                                <input type="text" name="numero" class="form-campo">
                                            </div>

                                            <div class="col-3 mb-1">
                                                <span class="text-label">Bairro</span>
                                                <input type="text" name="bairro" class="form-campo bairro">
                                            </div>
                                            <div class="col-3 mb-1">
                                                <span class="text-label">Cidade</span>
                                                <input type="text" name="cidade" class="form-campo cidade">
                                            </div>

                                            <div class="col-3 mb-1">
                                                <span class="text-label">Email</span>
                                                <input type="email" name="email" required class="form-campo">
                                            </div>
                                            <div class="col-3 mb-1">
                                                <span class="text-label">Senha</span>
                                                <input type="password" name="senha" required class="form-campo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="botoes border-top alt">
                                        <input type="hidden" name="empresa_id" value="1">
                                        <input type="submit" value="Salvar" class="btn btn-verde d-block">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
