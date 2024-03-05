<div class="resultado">
    <span class="titulo mb-4">
        <svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M33.5 9.75H14M33.5 10.5H14M30.5 15.75H24.5M30.5 18H27.5M31.25 21H16.25C15.6533 21 15.081 20.7629 14.659 20.341C14.2371 19.919 14 19.3467 14 18.75V8.25C14 7.65326 14.2371 7.08097 14.659 6.65901C15.081 6.23705 15.6533 6 16.25 6H31.25C31.8467 6 32.419 6.23705 32.841 6.65901C33.2629 7.08097 33.5 7.65326 33.5 8.25V18.75C33.5 19.3467 33.2629 19.919 32.841 20.341C32.419 20.7629 31.8467 21 31.25 21Z"
                stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M3.25 0.25C2.45435 0.25 1.69129 0.566071 1.12868 1.12868C0.56607 1.69129 0.25 2.45435 0.25 3.25V4.75V5.5V13.75C0.25 14.5456 0.56607 15.3087 1.12868 15.8713C1.69129 16.4339 2.45435 16.75 3.25 16.75H12V15.25H3.25C2.85218 15.25 2.47064 15.092 2.18934 14.8107C1.90804 14.5294 1.75 14.1478 1.75 13.75V6.25H12.0945C12.4275 4.95608 13.6021 4 15 4H1.75V3.25C1.75 2.85218 1.90804 2.47064 2.18934 2.18934C2.47064 1.90804 2.85218 1.75 3.25 1.75H18.25C18.6478 1.75 19.0294 1.90804 19.3107 2.18934C19.592 2.47064 19.75 2.85218 19.75 3.25V4H21.25V3.25C21.25 2.45435 20.9339 1.69129 20.3713 1.12868C19.8087 0.566071 19.0457 0.25 18.25 0.25H3.25ZM4 10C3.58579 10 3.25 10.3358 3.25 10.75C3.25 11.1642 3.58579 11.5 4 11.5H5.5H7.5C7.91421 11.5 8.25 11.1642 8.25 10.75C8.25 10.3358 7.91421 10 7.5 10H5.5H4Z"
                fill="black" />
        </svg>Pagar com crédito
    </span>

    <input type="hidden" id="cliente_id" value="<?php echo $pedido->cliente_id ?? null; ?>">
    <input type="hidden" id="pedido_id" value="<?php echo $pedido->id ?? null; ?>">
    <input type="hidden" id="valor" value="<?php echo $pedido->valor_liquido ?? 0; ?>">

    <form id="form-checkout">
        <div class="rows">
            <div class="mb-3 col-12">
                <small class="text-uppercase mb-1 d-block">Número do cartão</small>
                <input type="text" name="cardNumber" placeholder="Inserir" class="form-campo"
                    id="form-checkout__cardNumber">
            </div>
            <div class="mb-3 col-12">
                <small class="text-uppercase mb-1 d-block">Nome do titular</small>
                <input type="text" name="cardholderName" id="form-checkout__cardholderName" placeholder="Inserir"
                    class="form-campo">
            </div>

            <div class="col-2 mb-3">
                <strong class="text-label">Validade(MM/YYYY)</strong>
                <input type="text" name="cardExpirationDate" id="form-checkout__cardExpirationDate"
                    class="form-campo" />
            </div>
            <div class="mb-3 col-4">
                <small class="text-uppercase mb-1 d-block">CVV</small>
                <input type="text" name="securityCode" id="form-checkout__securityCode" placeholder="Inserir"
                    class="form-campo clica">
            </div>

            <select name="issuer" id="form-checkout__issuer" class="form-campo" style="display:none"></select>
            <div class="col-6 mb-3">
                <strong class="text-label">Email</strong>
                <input type="email" name="cardholderEmail" id="form-checkout__cardholderEmail" class="form-campo" />
            </div>

            <div class="col-3 mb-3">
                <strong class="text-label">Tipo Documento</strong>
                <select name="identificationType" id="form-checkout__identificationType" class="form-campo"></select>
            </div>

            <div class="col-12">
                <label class="text-label">Número de parcela</label>
                <select class="form-campo" name="installments" id="form-checkout__installments">
                </select>
            </div>
            <div class="col-12">
                <progress value="0" class="progress-bar" style="width:100%">Carregando...</progress>
            </div>

        </div>
        <div class="col-12 m-auto text-center ">
            <a href="#" class="btn btn-vermelho d-inline-block">Finalizar
                Pagamento</a>

            <a href="{{ route('delivery.pagamento.finalizarPedido', $pedido->id) }}"
                class="btn btn-vermelho d-inline-block">Finalizar Pedido</a>
        </div>
    </form>
</div>
