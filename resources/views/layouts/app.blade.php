<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title')</title>
    <link rel="shortcut icon" href="./assets/img/hapo_logo.png" type="image/png" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" >
        <!-- Header -->
        @include('partials/header')
        <!-- Content -->
        @yield('content')
        <!-- Footer -->
        @include('partials/footer')
        <!-- Login-Register -->
        @yield('login-register')
        <!-- messenger -->
        @include('partials/messenger')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#courses').select2({
                placeholder: "Search..."
            });
        });
        // $(document).ready(function() {
        //     $('#teachers').on('change', function() {
        //         console.log('huy');

        //         var teachers = $(this).val();
        //        console.log(teachers);
        //         $.ajax({
        //            type: 'get',
        //            url: './course',
        //            data: {},
        //            success:function(data) {
        //                alert(data);
        //                console.log(data);
        //            },
        //            error: function(){
        //            }
        //         });
        //     });
        // });
        </script>
</body>
</html>
