@php
    if (session('tipo') == 'admin') {
        $extend = 'Comanda.Admin.template';
    } elseif (session('tipo') == 'garcon') {
        $extend = 'Comanda.Garcon.template';
    }
@endphp

@extends($extend)

@section('conteudo')
    <div class="col-12 m-auto">
        <div class="pedido border p-1 radius-4 bg-branco">
            <div class="rows">
                <div class="col-12">
                    <div class="p-0">
                        <div class="rows">
                            <div class="col-6">
                                <h1>Pedidos Mesa </h1>
                                <div class="scroll-130 border bg-normal px-0">
                                    <table class="tabela" width="100%" cellpadding="0" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th align="center">Cód.</th>
                                            <th align="center">Data</th>
                                            <th align="center">Hota</th>
                                            <th align="center">Status</th>
                                            <th align="center">total</th>
                                            <th align="center">opções</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($listaMesa as $p) {
                                            ?>
                                        <tr class="bg-branco">
                                            <td align="center"><?php echo $p->id; ?></td>
                                            <td align="center"><?php echo databr($p->data_abertura); ?></td>
                                            <td align="center"><?php echo $p->hora_abertura; ?></td>
                                            <td align="center"><?php echo $p->status->status; ?></td>
                                            <td align="center"><?php echo $p->total; ?></td>
                                            <td class="text-right">
                                                <a href="{{ route('pedido.edit', $p->id) }}"
                                                   class="fas fa-edit btn btn-azul mx-1" title="Excluir">
                                                </a>
                                                <a href="#"
                                                   onclick="confirm('Tem Certeza?') ? document.getElementById('apagar{{ $p->id }}').submit() : '';"
                                                   class="d-inline-block btn btn-vermelho btn-circulo btn-pequeno"
                                                   title="Excluir"><i class="fas fa-trash-alt"></i></a>
                                                <form action="{{ route('pedido.destroy', $p->id) }}" method="POST"
                                                      id="apagar{{ $p->id }}">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    {{ csrf_field() }}
                                                </form>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-6">
                                <h1>Pedidos Online </h1>
                                <div class="scroll-130 border bg-normal px-0">
                                    <table class="tabela" width="100%" cellpadding="0" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th align="center">Cód.</th>
                                            <th align="center">Data</th>
                                            <th align="center">Hota</th>
                                            <th align="center">Status</th>
                                            <th align="center">total</th>
                                            <th align="center">opções</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($listaOnline as $p) {
                                            ?>
                                        <tr class="bg-branco">
                                            <td align="center"><?php echo $p->id; ?></td>
                                            <td align="center"><?php echo databr($p->data_abertura); ?></td>
                                            <td align="center"><?php echo $p->hora_abertura; ?></td>
                                            <td align="center"><?php echo $p->status->status; ?></td>
                                            <td align="center"><?php echo $p->total; ?></td>
                                            <td class="text-right">
                                                @if ($p->status_id == config('constantes.status.NOVO'))
                                                    <a href="{{ route('pedido.enviarCozinha', $p->id) }}"> Enviar
                                                        Cozinha
                                                    </a>
                                                @endif
                                                <a href="{{ route('pedido.edit', $p->id) }}"
                                                   class="fas fa-edit btn btn-azul mx-1" title="Excluir">
                                                </a>
                                                <a href="#"
                                                   onclick="confirm('Tem Certeza?') ? document.getElementById('apagar{{ $p->id }}').submit() : '';"
                                                   class="d-inline-block btn btn-vermelho btn-circulo btn-pequeno"
                                                   title="Excluir"><i class="fas fa-trash-alt"></i></a>
                                                <form action="{{ route('pedido.destroy', $p->id) }}" method="POST"
                                                      id="apagar{{ $p->id }}">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    {{ csrf_field() }}
                                                </form>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-6">
                                <h1>Pedidos Delivery </h1>
                                <div class="scroll-130 border bg-normal px-0">
                                    <table class="tabela" width="100%" cellpadding="0" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th align="center">Cód.</th>
                                            <th align="center">Data</th>
                                            <th align="center">Hota</th>
                                            <th align="center">Status</th>
                                            <th align="center">total</th>
                                            <th align="center">opções</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($listaDelivery as $p) {
                                            ?>
                                        <tr class="bg-branco">
                                            <td align="center"><?php echo $p->id; ?></td>
                                            <td align="center"><?php echo databr($p->data_abertura); ?></td>
                                            <td align="center"><?php echo $p->hora_abertura; ?></td>
                                            <td align="center"><?php echo $p->status->status; ?></td>
                                            <td align="center"><?php echo $p->total; ?></td>
                                            <td class="text-right">
                                                @if ($p->status_id == config('constantes.status.NOVO'))
                                                    <a href="{{ route('pedido.enviarCozinha', $p->id) }}"> Enviar
                                                        Cozinha
                                                    </a>
                                                @endif
                                                {{--<a href="{{ route('pedido.edit', $p->id) }}" class="fas fa-edit btn btn-azul mx-1" title="Editar"></a>--}}
                                                <a href="#" onclick="confirm('Tem Certeza?') ? document.getElementById('apagar{{ $p->id }}').submit() : '';"
                                                   class="d-inline-block btn btn-vermelho btn-circulo btn-pequeno"
                                                   title="Excluir"><i class="fas fa-trash-alt"></i>
                                                </a>
                                                <form action="{{ route('pedido.destroy', $p->id) }}" method="POST"
                                                      id="apagar{{ $p->id }}">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    {{ csrf_field() }}
                                                </form>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
