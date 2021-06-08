@extends("layouts.app")
@section('home', ' | HOME')

@push('styles')
    <link rel="stylesheet" href="{{asset("/styles/home.css")}}">
@endpush
@stack('home_style')
@section('slogan')
    <div id="slogan">
        <h1>
            La spesa che ti piace
        </h1>
        <h2>
            il futuro è a un passo da te
        </h2>
    </div>

@endsection

