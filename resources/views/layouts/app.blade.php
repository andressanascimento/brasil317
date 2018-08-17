<html>
    <head>
        <title>Brasil317 - @yield('title')</title>
        <!--<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">-->
        <link href="{{ URL::asset('/css/app.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('/css/main.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('/css/dashboard.css') }}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" rel="stylesheet">
        <link href="{{ URL::asset('/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
        @yield('css')
    </head>    
    <body>
        @include('layouts.nav')

        <script src="{{ URL::asset('/js/app.js') }}"></script>
        <script src="{{ URL::asset('/js/popper.js') }}"></script>
        
        <script src="{{ URL::asset('/js/jquery-3.3.1.slim.min.js') }}"></script>
        <script src="{{ URL::asset('/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ URL::asset('/js/dataTables.bootstrap4.min.js') }}"></script>
        @yield('js')
    </body>
</html>
