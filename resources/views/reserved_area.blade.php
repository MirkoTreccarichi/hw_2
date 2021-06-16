@extends("layouts.home")
@section('title', ' | HOME')
@push('home_style')
    <link rel="stylesheet" href="{{asset("styles/reserved_area.css")}}">
@endpush
@push('scripts')
    <script src="{{asset('js/script.js')}}" defer></script>
@endpush
@section('buttons')
    <div class="link">
        <a href="{{route('home')}}">home</a>
        <a class="login" href="{{route('logout')}}">logout</a>
    </div>
@endsection
@section('content')
    <article>

        <section class="poster">

            <h1> <a href="{{route('list')}}">Fai la lista , ritira dopo ! </a> </h1>
{{--            todo view lista prodotti--}}


        </section>


        <section class="poster">


            <h1>Scegli il tuo punto vendita preferito</h1>


            <div class="favorites hidden">
                <h3>I tuoi preferiti</h3>

                <div class="grid">

                </div>
            </div>

            <div class="choices">
                <h3>Clicca sul mi piace</h3>
                <span>Cerca i tuoi preferiti </span><label>
                    <input type="search">
                </label>

                <div class="grid">

                </div>
            </div>

        </section>



    </article>
@endsection

