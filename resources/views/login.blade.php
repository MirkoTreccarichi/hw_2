@extends('layouts.validation')
@section('title', '| LOGIN')
@push('styles')
    <link rel="stylesheet" href="{{asset('styles/login.css')}}">
@endpush
@section('content')
    <section>
        <h1 class="comp">Benvenuto!</h1>
        <div class="logo">
            <img class="logoimg" src="img/Smartket/SmartketWhite.png">
            <div class="comp">Smartket</div>
        </div>

        <form name='login' method='post'>
            <div class="email">
                <label for='email'>Email</label>
                <input type='text' name='email'>
            </div>
            <div class="password">
                <label for='password'>Password</label>
                <input type='password' name='password'>
            </div>
            <div class="submit">
                <input type='submit' value="Accedi">
            </div>
        </form>
        <div class="signup">Non hai un account ? <a href="signup.php">Registrati !</a></div>
    </section>
@endsection
