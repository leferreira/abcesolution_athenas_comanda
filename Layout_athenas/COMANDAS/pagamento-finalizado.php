
<div class="col-12 m-auto">
<div class="pedido ordem fechar-conta pago">
	<div class="rows">
		<div class="col-4 ordem-left">
			<div class="caixa">
				<div class="rows rows2">
					<div class="col-12 p-1 px-4 h3 mb-0"><b>Comanda:</b> <span class="text-azul">3</span></div>
					<div class="col-6 mb-3">
						<span class="px-3"><b>Mesa:</b> 3</span>
						<span class="px-3"><b>ident.:</b> ident</span>
						<span class="px-3"><b>Garçon:</b> Anderson</span>
						<span class="px-3"><b>Tempo:</b> 00h:00m</span>
					</div>
					<div class="col-6 mb-3">
						<span class="d-block px-4 h3 mb-0 text-right"><b>Valor: </b>R$30,00</span>
						<small class="d-block px-4 h6 mb-0 text-cinza text-right">itens:R$30,00</small>
						<small class="d-block px-4 h6 mb-0 text-cinza text-right">Serviço:R$10,00</small>
					</div>

				</div>

				<div class="rows">
					<div class="col-12 p-1 px-4 h3 mb-0 text-center"><b>Conta paga <i class="fas fa-check"></i></b></div>
					<div class="col-12 mb-3 ">
						<div class="">
							<div class="pb-1 scroll-260" style="padding:0 5px;">
								<table class="tabela border limpa" width="100%" cellpadding="0" cellspacing="0">
									<thead>
										<tr class="bg-branco">
											<th align="left">Qtde</td>
											<th align="center">Item</td>
											<th align="right" width="250">Valor</td>
										</tr>
									</thead>
									<tbody>
										<tr class="bg-branco">
											<td class="text-center">1</td>
											<td class="text-left">Pizza calabresa  (+ borda)</td>
											<td class="text-right">
											<strong class="d-block">R$ 30,00</strong>
											</td>
										</tr>
										<tr class="bg-branco">
											<td class="text-center">1</td>
											<td class="text-left">Pizza calabresa  (+ borda)</td>
											<td class="text-right">
											<strong class="d-block">R$ 30,00</strong>
											</td>
										</tr>
										<tr class="bg-branco">
											<td class="text-center">1</td>
											<td class="text-left">Pizza calabresa  (+ borda)</td>
											<td class="text-right">
											<strong class="d-block">R$ 30,00</strong>
											</td>
										</tr>
									</tbody>
							</table>
							</div>

							<p class="p-1" style="display:none">Nenhum intem selecionado</p>
						</div>
					</div>
					<div class="col-12 mb-3 d-flex px-4 justify-content-space-between">
						<a href="index.php?link=5" class="btn btn-azul"><i class="fas fa-print"></i> Imprimir </a>
						<a href="index.php?link=3#tabs-1" class="btn btn-verde">Fechar mesa <i class="fas fa-check"></i></a>
					</div>

				</div>
			</div>
		</div>
		<div class="col-12 ordem-right">
			<div class="caixa p-2">
				<div class="rows">
					<div class="col-12">
						<div class="caixa px-3">
							<span class="d-block p-1 h5 mb-0 text-center"><b>Pagamentos</b></span>
							<div class="scroll-170">
							<table class="tabela limpa" width="100%" cellpadding="0" cellspacing="0">
									<tbody>
										<tr class="bg-branco">
											<td class="text-left">Pagamento 1</td>
											<td class="text-left">Cartão de crédito</td>
											<td class="text-right">	<strong class="d-block">R$ 30,00</strong></td>
											<td class="text-right"><a href="" class="btn btn-vermelho btn-medio d-inline-block"><i class="fas fa-trash"></i> </a></td>
										</tr>
										<tr class="bg-branco">
											<td class="text-left">Pagamento 2</td>
											<td class="text-left">Dinheiro</td>
											<td class="text-right">	<strong class="d-block">R$ 30,00</strong></td>
											<td class="text-right"><a href="" class="btn btn-vermelho btn-medio d-inline-block"><i class="fas fa-trash"></i> </a></td>
										</tr>
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
</div>


<div class="window medio" id="add">
	<div class="px-4 px-ms-4 width-100 d-inline-block">
		<span class="d-block text-center h4 mb-0 p-2">Acrescentar opções</span>
		<div class="border mb-4 adicional p-2">
			<div class="rows">
				<div class="col-12">
					<div class="rows pb-2">
						<div class="col-6 mt-3">
							<div class="caixa">
								<strong class="text-label text-azul p-1 border-bottom bg-normal"><i class="fas fa-plus-circle"></i> Adicionar</strong>
								<div class="p-1">
									<select class="form-campo">
										<option selected>Selecione</option>
										<option>Com borda (+5,50)</option>
										<option>Com recheio (+5,50)</option>
										<option>Com queijo (+5,50)</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-6 mt-3">
							<div class="caixa">
								<strong class="text-label text-vermelho p-1 border-bottom bg-red-18"><i class="fas fa-minus-circle"></i> Remover</strong>
								<div class="p-1">
									<select class="form-campo">
										<option selected>Selecione</option>
										<option>Sem borda (0,00)</option>
										<option>Sem recheio (0,00)</option>
										<option>Sem queijo (0,00)</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-12 mt-3">
							<table class="tabela border" width="100%" cellpadding="0" cellspacing="0">
									<thead>
										<tr class="bg-branco">
											<th align="left">Adicionado</td>
											<th align="right">Excluir</td>
										</tr>
									</thead>
									<tbody>
										<tr class="bg-branco">
											<td class="text-left"><span class="text-left text-vermelho h6 mb-0">Pizza calabresa <strong>(Com borda)<strong></td>
											<td class="text-right">
												<a href="" class="fas fa-edit btn btn-azul mx-1" title="Excluir"></a>
												<a href="" class="fas fa-trash btn btn-vermelho mr-1" title="Editar"></a>
											</td>
										</tr>
										<tr class="bg-branco">
											<td align="right" colspan="2">Valor total: <span class="text-right text-vermelho h4 mb-0">24,00<strong></td>
										</tr>
									</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="tfooter end">
		<a href="" class="fechar btn btn-neutro">Fechar</a>
		<input type="submit" class="btn btn-gra-amarelo" value="Salvar alteração">
	</div>
</div>



<div class="window menor" id="dividir">
	<div class="px-4 px-ms-4 pb-3 width-100 d-inline-block">
		<span class="d-block text-center h4 mb-0 p-2">Dividir</span>
		<table class="tabela border" width="100%" cellpadding="0" cellspacing="0">
			<thead>
				<tr class="bg-branco">
					<th align="center">Valor total</td>
					<th align="center">Valor pago</td>
					<th align="center">Saldo</td>
				</tr>
			</thead>
			<tbody>
				<tr class="bg-branco">
					<td class="text-center"><span class="text-center h5 mb-0"> <strong>R$30,00<strong></td>
					<td class="text-center"><span class="text-center h5 mb-0"> <strong>R$30,00<strong></td>
					<td class="text-center"><span class="text-center h5 mb-0"> <strong>R$30,00<strong></td>

				</tr>
			</tbody>
		</table>

		<table class="tabela border mt-2" width="100%" cellpadding="0" cellspacing="0">
			<thead>
				<tr class="bg-branco">
					<th align="left" width="80%">Dividir</td>
					<th align="center">Valor</td>
				</tr>
			</thead>
			<tbody>
				<tr class="bg-branco">
					<td class="text-left">Dividir <b>R$30,00</b> por <input type="number" value="0" class="menor width-30 form-campo text-center"></td>
					<td class="text-center"><span class="text-center h5 mb-0"> <strong>R$30,00<strong></td>

				</tr>
			</tbody>
		</table>

	</div>
	<div class="tfooter end">
		<a href="" class="fechar btn btn-neutro">Fechar</a>
		<input type="submit" class="btn btn-gra-amarelo" value="Confirmar">
	</div>
</div>

<!-- Enviar para cozinha-->
<div class="window menor" id="enviar">
	<div class="px-4 px-ms-4 pb-3 width-100 d-inline-block">
		<div class="obrigado">
			<div class="rows">
				<div class="col-12 m-auto py-4">
					<i class="far fa-check-circle h1"></i>
					<h3 class="h3">Pedido Enviadio</h3>
					<h6 class="h6">Deseja imprimir?</h6>
				</div>
			</div>
		</div>

	</div>
	<div class="tfooter center">
		<a href="" class="fechar btn btn-neutro">Fechar</a>
		<a href="index.php?link=3#tabs-3" class="btn btn-azul2">Não Imprimir</a>
		<a href="index.php?link=3#tabs-3" class="btn btn-gra-amarelo"> Imprimir</a>
	</div>
</div>


<div id="fundo_preto"></div>
