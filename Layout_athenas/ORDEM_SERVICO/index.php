<html lang="pt-br">
	<head>
		<title>SOMAR - AGENDA</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="img/ico-athenas.svg" type="image/x-icon" rel="icon" />
		<link href="img/ico-athenas.svg" type="image/x-icon" rel="shortcut icon" />
		<link href="img/ico-athenas.svg" rel="apple-touch-icon" />
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
			<?php
					@$link = $_GET["link"];
					
					$pag[1] = "home.php";
					$pag[2] = "lst-clientes.php";
					$pag[3] = "detalhe-cliente.php";
					$pag[4] = "form-cliente.php";
					
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
					
			<?php //include"rodape.php"?>		
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