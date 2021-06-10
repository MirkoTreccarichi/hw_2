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
                <a class='login' href='{{route('login')}}'>@if(session('username')) Area Personale
                    @else Login @endif</a>
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


