<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestión de Traslados</title>
    <link rel="stylesheet" href="/css/app.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body id="app">
    @include('inc.navbar')
    
    <div class="container-fluid">
        @if(Request::is('/'))
            @include('inc.showcase')
        @endif
        <div class="row">
            <div class="col-xs-12">
                @include('inc.messages')
                @yield('content')
            </div>
        </div>
    </div>

    <footer id="footer" class="text-center">
        <p>Copyright <?php echo date("Y"); ?> &copy; CIF</p>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</body>
</html>