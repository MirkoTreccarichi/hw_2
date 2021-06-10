<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
          rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Smartket @yield('title')</title>

    @stack('styles')
    <link rel="stylesheet" href="{{asset("styles/validation.css")}}">
    @stack('scripts')
</head>

<body>

@yield('content')

<footer>
    <div id="logo">
        <img id="logoimg" src="img/Smartket/SmartketWhite.png" alt="">
        <div id="comp">Smartket&Co</div>
    </div>

    <div id="author">
        <p>Mirko Treccarichi</p>
        <p>O46002272</p>
    </div>
</footer>
</body>


</html>
