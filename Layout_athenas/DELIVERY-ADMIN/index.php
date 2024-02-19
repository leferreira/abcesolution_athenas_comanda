<html lang="pt-br">
	<head>
		<title>DELIVERY</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--css-->
		<link rel="stylesheet" href="js/datatables/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="js/datatables/css/responsive.dataTables.min.css">
		<link rel="stylesheet" type="text/css" href="js/datatables/css/style_dataTable.css">
		
		<link rel="stylesheet" href="css/grade.css">
		<link rel="stylesheet" href="css/auxiliar.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/style-m.css">
		<!--icones-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		
	</head>
	<body>
		<div class="site">				
			<?php include"cabecalho.php"?>
		<div class="Home">	
			<div class="conteudo">	
				<div class="rows">	
							
					<?php
							@$link = $_GET["link"];
							
							$pag[1] = "home.php";
							$pag[2] = "pedido.php";
							$pag[3] = "finalizar.php";
							$pag[4] = "obrigado.php";
							$pag[5] = "Login.php";
							
							if(!empty($link))
							{
								if (file_exists($pag[$link]))
								{
									include $pag[$link];
								}
								else
								{
									include "home.php";
								}
							}
								else
								{
									include "home.php";
								}
							
							?>
									
				</div>
			</div>
		</div>
		
		<div class="footer">
			<p>copyRigth - mjailton 2022</p>
		</div>
		</div>
		
		<script src="js/jquery.min.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		 
		<script src="js/datatables/js/jquery.dataTables.min.js"></script>
		<script src="js/datatables/js/dataTables.responsive.min.js"></script>
		<script src="js/js.js"></script>
		<script src="js/componentes/js_modal.js"></script>
		<script src="js/componentes/js_data_table.js"></script>
		
		
	</body>
</html>