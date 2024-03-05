<div class="resultado">
    <span class="titulo mb-2">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M10 19V10.75M13.75 19V10.75M6.25 19V10.75M1 7L10 1L19 7M17.5 19V8.332C15.0189 7.94356 12.5113 7.74897 10 7.75C7.449 7.75 4.944 7.95 2.5 8.332V19M1 19H19M10 4.75H10.008V4.758H10V4.75Z"
                stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        Pagar com Depósito bancário
    </span>
    <div class="rows">
        <div class="col-12"> <small>Segue abaixo uma das nossas contas bancárias para transferência</small>
        </div>
        <div class="col-12">
            <ul class="opcoesPix alt">
                <li class="cx alt d-block">
                    <div class="bancos">
                        <img src="{{ asset('assets/loja/img/logo-itau.png') }}" class="img-fluido">
                        <div>
                            <span class="d-block">Banco: 123 - Itaú Unibanco</span>
                            <span class="d-block">Agência: 4567</span>
                            <span class="d-block">Conta: 12345-0</span>
                            <span class="d-block">Nome completo: Nome do Cliente</span>
                            <span class="d-block">CNPJ: 00.000.000/000-00</span>
                        </div>
                    </div>
                    <div class="bancos">
                        <img src="{{ asset('assets/loja/img/logo-bb.png') }}" class="img-fluido">
                        <div>
                            <span class="d-block">Banco: 123 - Banco do Brasil</span>
                            <span class="d-block">Agência: 4567</span>
                            <span class="d-block">Conta: 12345-0</span>
                            <span class="d-block">Nome completo: Nome do Cliente</span>
                            <span class="d-block">CNPJ: 00.000.000/000-00</span>
                        </div>
                    </div>
                    <div class="bancos">
                        <img src="{{ asset('assets/loja/img/logo-bradesco.png') }}" class="img-fluido">
                        <div>
                            <span class="d-block">Banco: 123 - Banco Bradesco</span>
                            <span class="d-block">Agência: 4567</span>
                            <span class="d-block">Conta: 12345-0</span>
                            <span class="d-block">Nome completo: Nome do Cliente</span>
                            <span class="d-block">CNPJ: 00.000.000/000-00</span>
                        </div>
                    </div>
                    <div class="bancos">
                        <img src="{{ asset('assets/loja/img/caixa-logo.svg') }} class="img-fluido">
                        <div>
                            <span class="d-block">Banco: 123 - Caixa econômica</span>
                            <span class="d-block">Agência: 4567</span>
                            <span class="d-block">Conta: 12345-0</span>
                            <span class="d-block">Nome completo: Nome do Cliente</span>
                            <span class="d-block">CNPJ: 00.000.000/000-00</span>
                        </div>
                    </div>

                    <div>
                        <small class="d-block mt-3">Após o cocnluir o deposito envie o comprovante para <a
                                href="mailto:email@email.com.br"> email.com.br</a></small>
                    </div>
                </li>

            </ul>
        </div>
        <div class="col-12 m-auto text-center ">
            <a href="{{ route('deposito.finalizar', $pedido->id) }}" class="btn btn-vermelho d-inline-block">Finalizar
                Pagamento</a>
        </div>
    </div>
</div>
