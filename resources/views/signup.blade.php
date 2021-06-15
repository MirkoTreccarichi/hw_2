@extends('layouts.validation')
@section('title', '| SIGNUP')
@push('styles')
{{--    <link rel="stylesheet" href="{{asset('styles/signup.css')}}">--}}
@endpush
@push('scripts')
    <script defer src = '{{asset('js/signup.js')}}'></script>
@endpush
@push('styles')
    <link rel="stylesheet" href="{{asset('styles/signup.css')}}">
@endpush
@section('content')
    <!-- SECTION -->
    <section>
        <h1 class="comp">Registrati!</h1>
        <div class="logo">
            <img class="logoimg" src="img/Smartket/SmartketWhite.png" alt="">
            <div class="comp">Smartket</div>
        </div>

       <!-- FORM -->
       <form name='signup' method='post'>
           <!-- NAME -->
           <div class="name">
               <label for="name">Nome
               <input type="text" name="name">
               </label>
           </div>
           <!-- SURNAME -->
           <div class="surname">
               <label for="surname">Cognome
               <input type="text" name="surname">
               </label>
           </div>
           <!-- BIRTHDATE -->
           <div class="birthdate">
               <label for="birthdate">Data di Nascita
               <input type="date" name="birthdate">
               </label>
           </div>
           <!-- EMAIL -->
           <div class="email">
               <label for="email">Email
               <input type="text" name="email">
               </label>
           </div>
           <!-- PASSWORD  -->
           <div class="password">
               <label for='password'>Password
               <input type='password' name='password'>
               </label>
           </div>
           <!-- CONFIRM PASSWORD  -->
           <div class="confirm_password">
               <label for='confirm_password'>Ripeti la Password</label>
               <input type='password' name='confirm_password'>
           </div>
           <div class="submit">
               <input type='submit' value="Registrati">
           </div>
       </form>
       <div class="error_display hidden"></div>
       <div class="signup">Hai già un account ? <a href=" {{ route('login') }} ">Fai il login !</a></div>

    </section>
@endsection
