@extends("layouts.app")
@section('title', ' | HOME')

@push('styles')
    <link rel="stylesheet" href="{{asset("/styles/home.css")}}">
@endpush
@stack('home_style')
@section('header')
    <header>
        <nav>
            <div id="logo">
                <img id="logoimg" src="{{asset("img/Smartket/SmartketGreen.png")}}" alt="">
                <div id="comp">Smartket&Co</div>
            </div>

            <div class="link">
                @if(session('username'))
                    <a class='login' href={{-- fixme 'login.php'--}}>Area Personale</a>
                @else
                    <a class='login' href={{-- fixme 'login.php'--}}>Login</a>
                @endif
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

        @yield('slogan')

    </header>
@endsection


