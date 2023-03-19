<html>
    <head>
        <title> @yield('title')</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body> 
        <div class="container">
            @yield('content')
            @yield('scripts')
        </div>
    </body>
</html>