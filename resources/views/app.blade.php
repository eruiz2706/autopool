<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>The King Of Rub</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/sb-admin-2.min.css') }}">
    </head>
    <body id="page-top">
        <div id="app"></div>
        <script>
            var BASE_URL = "{{URL::to('/')}}";
        </script>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ URL::asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ URL::asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <script src="{{ URL::asset('js/sb-admin-2.js') }}"></script>
        <script src="{{ URL::asset('js/app.js') }}"></script>
    </body>
</html>
