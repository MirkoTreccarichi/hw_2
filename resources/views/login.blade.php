@extends('layouts.validation')
@section('title', '| LOGIN')
@push('styles')
    <link rel="stylesheet" href="{{asset('styles/login.css')}}">
@endpush
@section('content')
    <section>
        <h1 class="comp">Benvenuto!</h1>
        <div class="logo">
            <img class="logoimg" src="{{asset('img/Smartket/SmartketWhite.png')}}" alt="">
            <div class="comp">Smartket</div>
        </div>

        <form name='login' method='post'>
            @csrf
            <div class="email">
                <label for='email'>Email
                <input type='text' name='email'>
                </label>
            </div>
            <div class="password">
                <label for='password'>Password
                <input type='password' name='password'>
                </label>
            </div>
            <div class="submit">
                <input type='submit' value="Accedi">
            </div>
        </form>
        <div class="signup">Non hai un account ? <a href="{{route('registra')}}">Registrati !</a></div>
    </section>
@endsection
