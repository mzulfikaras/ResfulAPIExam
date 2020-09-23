<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RajaOngkir - Laravel 7</title>
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" /> --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.1/css/select2.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.1/js/select2.min.js"></script>
    </head>
    <body>
        <nav class='navbar navbar-dark bg-dark mb-3'>
            <div class='container'>
                <a href="/" class="navbar-brand">RajaOngkir | Laravel 7</a>
            </div>
        </nav>
        <div class="container">
            @yield('content')
        </div>
        <script src="{{ asset('js/app.js') }}" type="text/js"></script>
    </body>
</html>