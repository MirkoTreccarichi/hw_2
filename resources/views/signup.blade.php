@extends('layouts.validation')
@section('title', '| SIGNUP')
@push('styles')
    <link rel="stylesheet" href="{{asset('styles/signup.css.css')}}">
@endpush
@section('content')
    <!-- SECTION -->
    <section>
        <h1 class="comp">Registrati!</h1>
        <div class="logo">
            <img class="logoimg" src="img/Smartket/SmartketWhite.png">
            <div class="comp">Smartket</div>
        </div>
        <!-- FORM -->
        <form name='signup' method='post'>
            <!-- NAME -->
            <div class="name">
                <label for="name">Nome</label>
                <input type="text" name="name">
            </div>
            <!-- SURNAME -->
            <div class="surname">
                <label for="surname">Cognome</label>
                <input type="text" name="surname">
            </div>
            <!-- BIRTHDATE -->
            <div class="birthdate">
                <label for="birthdate">Data di Nascita</label>
                <input type="date" name="birthdate">
            </div>
            <!-- EMAIL -->
            <div class="email">
                <label for="email">Email</label>
                <input type="text" name="email">
            </div>
            <!-- PASSWORD  -->
            <div class="password">
                <label for='password'>Password</label>
                <input type='password' name='password'>
            </div>
            <!-- CONFIRM PASSWORD  -->
            <div class="confirm_password">
                <label for='confirm_password'>Ripeti la Password</label>
                <input type='password' name='confirm_password'>
            </div>
            <!-- REMEMBER CHECKBOX  -->
            <div class="remember">
                <label for='remember'></label>Ricorda l'accesso</label>
                <input type='checkbox' name='remember' value="1">
            </div>
            <div class="submit">
                <input type='submit' value="Registrati">
            </div>
        </form>
        <div class="error_display hidden"></div>
        <div class="signup">Hai già un account ? <a href="login.php ">Fai il login !</a></div>
    </section>
@endsection
