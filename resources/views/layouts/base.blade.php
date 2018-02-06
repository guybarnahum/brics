<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Brics</title>

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

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

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
    </head>
    <body>
        <div id="content" role="main">

            <!-- header -->
            @yield('header')

            <!-- content -->
            @yield('content')

            <!-- footer -->
            @yield('footer')
        </div>

        <!-- more scripts.. -->

        <script>
            @yield('scripts')
        </script>

    </body>
</html>
