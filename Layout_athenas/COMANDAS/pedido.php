
<div class="col-12 m-auto">			
<div class="pedido border p-1 radius-4 bg-branco">		
	
	<div class="rows">	
		<div class="col-12">		
			<div class="p-0">		
			<div class="rows">		
			<div class="col-9">		
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
						<span class="text-label">Forma</span>
						<select class="form-campo">
							<option>Crédito</option>
							<option>Débito</option>
							<option>Á vista</option>
						</select>
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
						<span class="text-label">Entregadoor</span>
						<select class="form-campo">
							<option>Antônio</option>
						</select>
					</div>
					<div class="col-3 mb-1">
						<span class="text-label">Tempo estimado</span>
						<select class="form-campo">
							<option>3min</option>
							<option>5min</option>
							<option>15min</option>
						</select>
					</div>
				</div>
			</div>	
			<div class="scroll-130 border bg-normal px-0">		
				<table class="tabela" width="100%" cellpadding="0" cellspacing="0">
					<thead>
						<tr> 
                			<th align="center">Cód.</th>
                			<th align="center">Descrição</th> 									  
                			<th align="center">Valor</th> 									  
                			<th align="center">Qtde</th> 									  
                			<th align="center">total</th> 									  
                		</tr>
					</thead>
						<tbody>
							<tr class="bg-branco"> 
								<td align="center">1</td>
								<td align="center">Pizza 1</td> 									  
								<td align="center">19,90</td> 									  
								<td align="center">1</td> 									  
								<td align="center">19,90</td> 									  
							</tr>
							<tr class="bg-branco"> 
								<td align="center">1</td>
								<td align="center">Pizza 1</td> 									  
								<td align="center">19,90</td> 									  
								<td align="center">1</td> 									  
								<td align="center">19,90</td> 									  
							</tr>
						</tbody>
				</table>
			</div>
			
			</div>
			
		<div class="col-3 d-flex">		
			<div class="caixa">		
				<div class="thumb">		
					<img src="upload/pizza2.png" class="img-fluido">
				</div>
				<span class="tt">Pizza 1</span>
				<span class="tt2">Valor: 19,90</span>
				<div class="botoes border-top alt">
					<a href="javascript:;" onclick="abrirModal('#add')" class="btn btn-azul2"><i class="fas fa-plus-circle"></i> Adicional</a>
					<a href="index.php?link=1" class="btn btn-verde2 d-block"><i class="fas fa-arrow-left"></i> Novo</a>
				</div>
			</div>
		</div>	
			
			<div class="col-12">
				
			<div class="border mt-1 p-1 din">
				<div class="cx-valor col-2">
					<strong class="text-label h6">Sub total</strong>
					<input type="text" class="form-campo valor text-azul" value="38,00">
				</div>
				<div class="cx-valor col-1">
					<strong class="text-label h6">Taxa</strong>
					<input type="text" class="form-campo valor text-vermelho" value="5%">
				</div>
				<div class="cx-valor col-2">
					<strong class="text-label h6">Total</strong>
					<input type="text" class="form-campo valor text-verde" value="38,00">
				</div>
				<div class="cx-valor col-2">
					<strong class="text-label h6">Dinheiro</strong>
					<input type="text" class="form-campo valor text-verde" value="38,00">
				</div>
				<div class="cx-valor col-2">
					<strong class="text-label h6">Troco</strong>
					<input type="text" class="form-campo valor text-azul" value="38,00">
				</div>				
				<div class="fim col">
					<a href="index.php?link=3" class="btn btn-gra-amarelo width-100">Continuar <i class="fas fa-arrow-right"></i></a>
				</div>
			</div>
			</div>
			</div>
			
			</div>
		</div>	
				
	</div>

</div>
</div>
	

<div class="window form" id="add">
	<div class="px-4 px-ms-4 width-100 d-inline-block">
		<span class="d-block text-center h4 mb-0 p-2">Acrescentar opções</span>
		<div class="border mb-4 adicional">
			<div class="rows">
				<div class="col-4">
					<div class="thumb">		
						<img src="upload/pizza2.png" class="img-fluido">
					</div>	
				</div>
				<div class="col-8">
					<div class="rows pt-2 border-left">		
						<div class="col-6">		
							<span class="text-label">Produto</span>
							<strong class="text-label h6">Pizza 1</strong>
						</div>		
						<div class="col-3">		
							<span class="text-label">Valor</span>
							<strong class="text-label h6">39,00</strong>
						</div>	
						<div class="col-3">		
							<span class="text-label">Qtde</span>
							<strong class="text-label h6">1</strong>
						</div>
					</div>
					<div class="rows pt-2 border-top border-left pb-2">	
						<div class="col-6 mt-3">		
							<div class="caixa">		
								<strong class="text-label p-1 border-bottom bg-normal"><i class="fas fa-plus-circle"></i> Adicionar</strong>
								<div class="p-1">
									<select class="form-campo">
										<option selected>Selecione</option>
										<option>Com borda (+5,50)</option>
										<option>Com recheio (+5,50)</option>
										<option>Com queijo (+5,50)</option>
									</select>
								</div>
								<div class="p-1 position-relative">
									<a href="javascript:;" onclick="abrirModal('#novo')" class="link-laranja filtro"><i class="fas fa-plus"></i> Cadastrar novo</a>
								</div>	
							</div>	
						</div>	
						<div class="col-6 mt-3">		
							<div class="caixa">		
								<strong class="text-label p-1 border-bottom bg-red-18"><i class="fas fa-minus-circle"></i> Remover</strong>
								<div class="p-1">
									<select class="form-campo">
										<option selected>Selecione</option>
										<option>Sem borda (0,00)</option>
										<option>Sem recheio (0,00)</option>
										<option>Sem queijo (0,00)</option>
									</select>
								</div>
								<div class="p-1">
									<a href="javascript:;" onclick="abrirModal('#novo')"  class="link-vermelho"><i class="fas fa-plus"></i> Cadastrar novo</a>
								</div>
							</div>	
						</div>
						<div class="col-12 mt-3">
							<table class="tabela border" width="100%" cellpadding="0" cellspacing="0">
									<thead>
										<tr class="bg-branco"> 
											<th align="left">Adicionado</td>								  
											<th align="right">Valor total</td>								  
										</tr>
									</thead>
									<tbody>
										<tr class="bg-branco"> 
											<td class="text-left"  colspan="2"><span class="text-left text-vermelho h6 mb-0">Pizza 1 <strong>(Com borda)<strong></td>								  
										</tr>
										<tr class="bg-branco">
											<td align="center" colspan="2"><span class="text-right text-vermelho h4 mb-0">24,00<strong></td>								  
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
		<input type="submit" class="btn btn-verde2" value="Salvar alteração">
	</div>
</div>



<div class="window menor" id="novo">
	<div class="px-4 px-ms-4 pb-3 width-100 d-inline-block">
		<span class="d-block text-center h4 mb-0 p-2">Adicionar nova categoria</span>
		<span class="text-label">Nome</span>
		<input type="text" class="form-campo p-2 mb-3">
		
	</div>
	<div class="tfooter end">
		<a href="" class="fechar btn btn-neutro">Fechar</a>
		<input type="submit" class="btn btn-gra-amarelo" value="Adicionar">
	</div>
</div>
<div id="fundo_preto"></div>	