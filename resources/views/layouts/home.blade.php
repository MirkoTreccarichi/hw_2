@extends("layouts.app")
@section('home', ' | HOME')
@section('style')
    <link rel="stylesheet" href="resources/styles/home.css"
    @yield('other_style')
@endsection

@section('content')

    <div id="slogan">
        <h1>
            La spesa che ti piace
        </h1>
        <h2>
            il futuro è a un passo da te
        </h2>
    </div>

    @yield('home_content')

@endsection
