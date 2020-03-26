<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{ asset('images/app/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="manifest" href="{{asset('manifest.json')}}">
    <title>TakeAway Cabo Largo</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--     Fonts and icons     -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet"/>
    @yield('styles')
</head>

<body id="general" class="" onload="addFile1()">
<div class="hidden">
    <script type="text/javascript">
        <!--//--><![CDATA[//><!--
        var images = new Array()
        function preload() {
            for (i = 0; i < preload.arguments.length; i++) {
                images[i] = new Image();
                images[i] = preload.arguments[i];
            }
        }
        preload(
            "{{ asset('/images/app/food/food0.jpg') }}",
            "{{ asset('/images/app/food/food1.jpg') }}",
            "{{ asset('/images/app/food/food2.jpg') }}",
            "{{ asset('/images/app/food/food3.jpg') }}",
            "{{ asset('/images/app/food/food4.jpg') }}",
            "{{ asset('/images/app/food/food5.jpg') }}",
            "{{ asset('/images/app/food/food6.jpg') }}",
            "{{ asset('/images/app/food/food7.jpg') }}",
            "{{ asset('/images/app/food/food8.jpg') }}",
            "{{ asset('/images/app/food/food9.jpg') }}",
            "{{ asset('/images/app/food/food10.jpg') }}",
            "{{ asset('/images/app/food/food11.jpg') }}",
            "{{ asset('/images/app/food/food12.jpg') }}",
            "{{ asset('/images/app/food/food13.jpg') }}",
            "{{ asset('/images/app/food/food14.jpg') }}",
        )
        //--><!]]>
    </script>
</div>
    @include('includes.navbar')

        @yield('content')

    @include('includes.footer')
</body>

    <!--   Core JS Files   -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    @yield('scripts')
    <script>
        const getRandomRango = (min,max) => {
            return Math.floor(Math.random()*(max-min)+min);
        }

        const getBackFile = () => {
            return `./images/app/food/${getRandomRango(0,14)}.jpg`;
        }

        const addBackFile = () => {
            return `url('${getBackFile()}')`;
        }

        const addFile = () => {
            let div = document.getElementById("general");
            let file = getBackFile();
            let algo = `url('${file}')`;
            div.style.backgroundImage = `url('${file}')`;
        }

        const addFile1 = () => {
            let div = document.getElementById("general");
            let file = images[`${getRandomRango(0,14)}`];
            div.style.backgroundImage = `url(${file})`;
        }

    </script>
<!--    <script src="{{asset('script.js')}}"></script>-->
</html>
