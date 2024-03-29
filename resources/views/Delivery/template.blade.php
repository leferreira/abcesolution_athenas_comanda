<html lang="pt-br">

<head>
    <title>DELIVERY</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--css-->
    <link rel="stylesheet" href="{{ asset('assets/delivery/js/datatables/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/delivery/js/datatables/css/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" type="{{ asset('assets/delivery/text/css" href="js/datatables/css/style_dataTable.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/delivery/css/grade.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/delivery/css/auxiliar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/delivery/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/delivery/css/style-m.css') }}">
    <!--icones-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <script>
        var base_url = "{{ asset('') }}";
        var _token = "{{ csrf_token() }}";

        let prot = window.location.protocol;
        let host = window.location.host;
        const path = prot + "//" + host + "/public/admin/";
    </script>

</head>

<body>
    <div class="site">
        @include('Delivery.cabecalho')
        <div class="Home">
            <div class="conteudo">
                <div class="rows">
                    @yield('conteudo')
                </div>
            </div>
        </div>

        <div class="footer">
            <p>© Copyright 2024 abcesolution.com.br - All Rights Reserved</p>
        </div>
    </div>

    <script src="{{ asset('assets/delivery/js/jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



    <script src="{{ asset('assets/js/jquery.mask.js') }}"></script>

    <script src="{{ asset('assets/js/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/componentes/js/js_util.js') }}"></script>
    <script src="{{ asset('assets/componentes/js/js_mascara.js') }}"></script>
    <script src="{{ asset('assets/js/componentes/js_modal.js') }}"></script>
    <script src="{{ asset('assets/js/componentes/js_data_table.js') }}"></script>
    <script src="{{ asset('assets/js/js.js') }}"></script>


</body>

</html>
