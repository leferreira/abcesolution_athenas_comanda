<div class="Home enquete">
	<div class="conteudo">
		<div class="rows">
			<div class="col-12">
				<span class="titulo d-flex justify-content-space-between align-vertical-center">
					<span><i class="fas fa-circle"></i> Clientes / fornecedores</span> 
					<div class="d-flex align-vertical-center">
						<a href="index.php?link=4" class="btn btn-azul btn-min"><i class="fas fa-plus-circle"></i> Adicionar novo</a>
						<a href="" class="btn btn-verde btn-laranja ml-2 btn-min filtro"><i class="fas fa-filter"></i> Filtrar</a>
					</div>
				</span> 
			</div>
			<div class="col-12">
				<div class="caixa mostraFiltro mb-3">
					<div class="caixa">
						<div class="rows">
							<div class="col-12">
								<span class="titulo2 border-bottom">Pesquisar fornecedores</span>
							</div>
							<div class="col-12 mt-3">
								<div class="rows">
									<div class="col-6">
										<span class="text-label">Fornecedor</span>
										<select class="form-campo">
											<option >Fornecedor </option>
											<option	>Fornecedor  1</option>
											<option	>Fornecedor  2</option>
										</select>
									</div>
									<div class="col-2">
										<span class="text-label">Status</span>
										<select class="form-campo">
											<option selected>Status</option>
											<option	>Status 1</option>
											<option	>Status 2</option>
										</select>
									</div>
									<div class="col-4">
										<span class="text-label">Peíodo</span>
										<div class="d-flex">
											<input type="date" class="form-campo">
											<span class="px-2"></span>
											<input type="date" class="form-campo">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="caixa p-1">
					<div class="rows">
						<div class="col-12">
							<table cellpadding="0" cellspacing="0" class="tabela" id="dataTable">
								<thead>
									<tr>
										<th class="text-center">Cód.</th>
										<th class="text-center">Nome</th>
										<th class="text-center">CPF/CNPJ</th>
										<th class="text-center">Telefone</th>
										<th class="text-center">Email</th>
										<th class="text-center">Ação</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-center">1</td>
										<td class="text-center">JAIRO SOUSA NASCIMENTO</td>
										<td class="text-center">965.277.573-87	</td>
										<td class="text-center">(98)9990-2656</td>
										<td class="text-center">jairo.com2@gmail.com</td>
										<td class="text-center">
											<div class="d-flex">
												<a href="" class="btn btn-icon btn-cinza fas fa-key mr-1" title="Área do cliente"> </a>
												<a href="index.php?link=3" class="btn btn-icon btn-cinza fas fa-eye" title="Mais detalhes"> </a>
												<a href="" class="btn btn-icon btn-verde fas fa-edit ml-1" title="Editar"> </a>
												<a href="" class="btn btn-icon btn-vermelho fas fa-trash  ml-1" title="Excluir"> </a>
											</div>
										</td>
									</tr>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
		</div>
	</div>
</div>



<!--visualizar-->
<div class="window position-absolute" id="visualizar">	
		<div class="p-4 pt-0">
			<div class="titulo2 mb-4">Destinatários (1)</div>
			<form action="">
			<div class="rows mb-3">
				<div class="col-12">
					<fieldset class="mb-3">
									<legend>Comunicado</legend>
									<div class="rows border-bottom">
										<div class="col-1 mb-3 text-center">
											<i class="fas fa-check-circle text-verde h1 mb-0"></i>
										</div>
										<div class="col mb-3">
											<strong class="h5 mb-0">Teste</strong>
											<small class="d-block text-cinza"><b>Por:</b> Renê Santiago TI</small>
											<small class="d-block text-cinza"><b>Data de expiração:</b> 28/12/2021</small>
										</div>
									</div>
									<div class="rows py-4">
										<div class="col-4 radius-4 bg-padrao p-2 m-auto text-center">
											<i class="fas fa-paper-plane h4 mb-0"></i>
											<strong class="d-block">Responder enquete</strong>
										</div>
									</div>
									<div class="rows py-4 border-top">
										<div class="col-5">
											<img src="img/capa.svg" class="img-fluido">
										</div>
										<div class="col-7">
											<div class="border radius-4 p-2">
												Descrição aqui...
											</div>
										</div>
									</div>
								</fieldset>
								
								<fieldset class="mb-3">
									<legend>Enquete</legend>
									<div class="rows">
										<div class="col-12 mb-3">
											<strong class="h5 mb-2">Teste</strong>
											<p class="d-block text-cinza">Descrição da enquete</p>
										</div>
										<div class="col-12 mb-3">
											<div class="rows px-5">
												<div class="col-12 radius-4 border p-4" style="box-shadow:inset 4px 0 0px 0 #21928e70">
													<div class="rows px-1">
														<div class="col-12 radius-4 bg-cinza p-4 m-auto text-left">
															<p class="d-block  text-cinza">Descrição da enquete</p>
														</div>
														<div class="col-12 p-2">
															<strong class="d-block text-escuro">17 de 500 caracteres utilizado</strong>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</fieldset>
				</div>
			</div>
			<div class="tfooter end">
				<button type="" class="btn btn-claro fechar">Fechar</button>	
			</div>
		</div>
</div>

<div id="fundo_preto"></div>
