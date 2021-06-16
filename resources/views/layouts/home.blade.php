@extends("layouts.app")

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

            @yield('buttons')


            <div id="menu">
                <div></div>
                <div></div>
                <div></div>
            </div>

        </nav>

        @yield('slogan')

    </header>
@endsection


