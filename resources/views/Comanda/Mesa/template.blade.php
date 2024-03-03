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
    <div class="site">
        @include('Admin.cabecalho')
        @include('inc.erros')
        @include('inc.msg')
        <div id="mostrarErros"></div>
        <div id="mostrarUmErro"></div>
        <div id="mostrarSucesso"></div>
        <div class="Home">
            <div class="conteudo">
                <div class="rows">
                    @yield('conteudo')
                </div>
            </div>
        </div>

        <div class="footer">
            <p>copyRigth - mjailton 2022</p>
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
