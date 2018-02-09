<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Icons -->

        <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicons/favicon.ico') }}" />
        <link rel="icon" type="image/png" href="{{ asset('assets/images/favicons/favicon.png') }}" />
            <!-- For iPhone 4 Retina display: -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('assets/images/favicons/apple-touch-icon-114x114-precomposed.png') }}">
            <!-- For iPad: -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('assets/images/favicons/apple-touch-icon-72x72-precomposed.png') }}">
            <!-- For iPhone: -->
        <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/images/favicons/apple-touch-icon-60x60-precomposed.png') }}">

        <!-- Fonts -->
        <link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,400italic" rel="stylesheet" type="text/css">

        <!-- jquery DISABLED -->
        <!--
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        -->

        <!-- bootstrap -->

        <!-- DISABLED
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
        -->
        <!--
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

        -->

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
        .slider-size {
            height:400px; /* This is your slider height */
            width:100%;
        }
        .carousel {
            width:100%;
            margin:0 auto; /* center your carousel if other than 100% */
        }
        </style>

        <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        </style>

    </head>
    <body>
        <div id="content" role="main">

            @include('layouts.nav')

            <!-- header -->
            @yield('header')

            <!-- content -->
            @yield('content')

            <!-- footer -->
            @yield('footer')
        </div>

        <!-- more scripts.. -->

        <script src="{{ asset('js/app.js') }}"></script>

        <script>
            @yield('scripts')
        </script>

    </body>
</html>
