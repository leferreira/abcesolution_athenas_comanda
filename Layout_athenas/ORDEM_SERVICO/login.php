<html lang="pt-br">
	<head>
		<title>Sistema escolar - Diretoria</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--css-->		
		<link rel="stylesheet" href="css/grade.css">
		<link rel="stylesheet" href="css/auxiliar.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/style-m.css">
		<!--icones-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		
		 <script src="js/jquery.min.js"></script>
		 <script src="js/js.js"></script>
				
	</head>
	<body class="base-login">
		<div class="rows mx-0">
			<div class="caixa-login col-10 m-auto pt-4">
			<div class="rows">
			<div class="col-8 position-absolute">
				<img src="img/fundo-login.jpg" class="img-fluido">
				
			</div>
				<div class="col-4 position-absolute">
					<img src="img/logo-somar2.svg" class="img-fluido m-auto d-block" width="120">
					<h1 class="text-center pb-2">Entre com seu login</h1>
					<form action="{{route('login.logar')}}" method="POST" name="">
					
						<span class="label">Login</span>
						<input type="text" name="login" class="form-campo">
						
						<span class="label mt-2">Senha</span>				
						<input type="password" name="senha" class="form-campo">
						
						<input type="submit" value="entrar" class="btn btn-azul width-100 h5 mt-3">
						<a href="" class="senha py-3 d-block text-verde">Esqueci minha senha</a>
					</form>
					
					<div class="esquecisenha">
						<span class="senha">X</span>
						<h1 class="text-center pt-2 pb-0 h5">Esqueci minha senha</h1>
						<p class="text-center mb-3">Digite seu email no campo abaixo para recuperar sua senha</p>
						<form action="" method="POST" name="">
							<span class="label">Email</span>
							<input type="text" placeholder="Insira seu login" class="form-campo">
							<input type="submit" value="Enviar email" class="btn btn-azul width-100 h5 mt-3">
						</form>
					</div>
				</div>
				
			</div>
		</div>
			
			
		</div>
		
		
	</body>
</html>