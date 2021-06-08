<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
              rel="stylesheet">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Smartket - @yield('title')</title>
        <link rel="stylesheet" href="{{asset("styles/app.css")}}"
        @stack('styles')
        @stack('scripts')
    </head>

    <body>
    <header>
        <nav>
            <div id="logo">
                <img id="logoimg" src="{{asset("img/Smartket/SmartketGreen.png")}}" alt="">
                <div id="comp">Smartket&Co</div>
            </div>

            <div class="link">
                {{--
                                <?php
                                $text = "login";
                                if(checkAuth())
                                    $text = "Area Personale";

                                echo "<a class='login' href='login.php'>$text</a>";
                                ?>
                               fixme rivedere questo meccanismo--}}


            </div>

            <div id="menu">
                <div></div>
                <div></div>
                <div></div>
            </div>

        </nav>

    </header>

        @yield('content')

        <footer>
            <div id="logo">
                <img id="logoimg" src="{{asset("img/Smartket/SmartketWhite.png")}}" alt="">
                <div id="comp">Smartket&Co</div>
            </div>

            <div id="social">

                <img src="{{asset("img/loghi/facebook.png")}}" alt="">
                <img src="{{asset("img/loghi/ig.png")}}" alt="">
                <img src="{{asset("img/loghi/whatsapp-128.png")}}" alt="">
                <img src="{{asset("img/loghi/youtube-128.png")}}" alt="">

            </div>

            <div id="author">
                <p>Mirko Treccarichi</p>
                <p>O46002272</p>
            </div>
        </footer>
    </body>


</html>
