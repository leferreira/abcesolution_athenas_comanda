<html lang="pt-br">

<head>
    <title>COMANDAS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--css-->
    <link rel="stylesheet" href="{{ asset('assets/js/datatables/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/datatables/css/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/datatables/css/style_dataTable.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/grade.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/auxiliar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style-m.css') }}">
    <!--icones-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>

<body>

    <div class="col-6 m-auto">
        <div class="base-login">

            <div class="caixa-login position-relative">
                <div class="caixa p-2 px-4">
                    <form action="{{ route('login.logar') }}" method="post">
                        @csrf
                        <h1 class="h4">login</h1>
                        <label class="mb-3 d-block">
                            <span class="text-label label">Email</span>
                            <input type="text" name="email" placeholder="Digite seu email" class="form-campo">
                        </label>
                        <label class="mb-3 d-block">
                            <span class="text-label label">Senha</span>
                            <input type="password" name="password" placeholder="Digite sua senha" class="form-campo">
                        </label>
                        <input type="submit" value="Entrar" class="btn btn-gra-amarelo  m-auto">
                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="{{ asset('assets/js/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/js.js') }}"></script>
    <script src="{{ asset('assets/js/componentes/js_modal.js') }}"></script>
    <script src="{{ asset('assets/js/componentes/js_data_table.js') }}"></script>


</body>

</html>
