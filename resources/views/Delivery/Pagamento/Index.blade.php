@extends('Delivery.template')
@section('conteudo')
    <div class="basecentral">
        <div class="checkout confirmar">
            <div class="conteudo">
                <span class="titulo mb-2 migalha">Loja <i class="seta"></i><span class="text-laranja">Formas de
                        pagamento</span></span>

                <div class="areaPagamento mt-4">

                    <div class="formaspagamento">
                        <a href="{{ route('delivery.cartao.ver', $pedido->id) }}"
                            class="itens {{ $tipo == 'cartao' ? 'ativo' : '' }}">
                            <svg width="35" height="22" viewBox="0 0 35 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M33.5 9.75H14M33.5 10.5H14M30.5 15.75H24.5M30.5 18H27.5M31.25 21H16.25C15.6533 21 15.081 20.7629 14.659 20.341C14.2371 19.919 14 19.3467 14 18.75V8.25C14 7.65326 14.2371 7.08097 14.659 6.65901C15.081 6.23705 15.6533 6 16.25 6H31.25C31.8467 6 32.419 6.23705 32.841 6.65901C33.2629 7.08097 33.5 7.65326 33.5 8.25V18.75C33.5 19.3467 33.2629 19.919 32.841 20.341C32.419 20.7629 31.8467 21 31.25 21Z"
                                    stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.25 0.25C2.45435 0.25 1.69129 0.566071 1.12868 1.12868C0.56607 1.69129 0.25 2.45435 0.25 3.25V4.75V5.5V13.75C0.25 14.5456 0.56607 15.3087 1.12868 15.8713C1.69129 16.4339 2.45435 16.75 3.25 16.75H12V15.25H3.25C2.85218 15.25 2.47064 15.092 2.18934 14.8107C1.90804 14.5294 1.75 14.1478 1.75 13.75V6.25H12.0945C12.4275 4.95608 13.6021 4 15 4H1.75V3.25C1.75 2.85218 1.90804 2.47064 2.18934 2.18934C2.47064 1.90804 2.85218 1.75 3.25 1.75H18.25C18.6478 1.75 19.0294 1.90804 19.3107 2.18934C19.592 2.47064 19.75 2.85218 19.75 3.25V4H21.25V3.25C21.25 2.45435 20.9339 1.69129 20.3713 1.12868C19.8087 0.566071 19.0457 0.25 18.25 0.25H3.25ZM4 10C3.58579 10 3.25 10.3358 3.25 10.75C3.25 11.1642 3.58579 11.5 4 11.5H5.5H7.5C7.91421 11.5 8.25 11.1642 8.25 10.75C8.25 10.3358 7.91421 10 7.5 10H5.5H4Z"
                                    fill="black" />
                            </svg>
                            Crédito/ Débito
                        </a>
                        <a href="{{ route('delivery.pix.ver', $pedido->id) }}"
                            class="itens {{ $tipo == 'pix' ? 'ativo' : '' }}">
                            <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <rect width="23" height="23" fill="url(#pattern0)" />
                                <defs>
                                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1"
                                        height="1">
                                        <use xlink:href="#image0_279_62" transform="scale(0.00515464)" />
                                    </pattern>
                                    <image id="image0_279_62" width="194" height="194"
                                        xlink:href="data:image/png;base64,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" />
                                </defs>
                            </svg>
                            Pix</a>


                    </div>

                    @if ($tipo == 'pix')
                        @include('Delivery.Pagamento.Pix')
                    @elseif ($tipo == 'cartao')
                        @include('Delivery.Pagamento.Cartao')
                    @endif



                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
