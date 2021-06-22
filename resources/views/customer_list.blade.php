@extends("layouts.home")
@section('title', ' | LISTA')
@push('home_style')
    <link rel="stylesheet" href="{{asset("styles/customer_list.css")}}">
    <link rel="stylesheet" href="{{asset("styles/reserved_area.css")}}">
@endpush
@push('scripts')
    <script src="{{asset('js/script_list.js')}}" defer></script>
@endpush
@section('buttons')
    <div class="link">
        <a href="{{route('home')}}">home</a>
        <a class="login" href="{{route('logout')}}">logout</a>
    </div>
@endsection
@section('content')


    <section class="poster">


        <h1>Pensaci oggi ritira domani !<a href="{{route('customer_area')}}">Oppure torna indietro</a></h1>

        <div class="list @if(!isset($products)) hidden @endif">
            <h3>La tua lista <img src="img/buttons/round_delete_grey_24dp.png" alt="" class="button"></h3>
            <ul class="lista">
            @foreach($products as $prod)
                    <li value="{{$prod['codice']}}">
    {{--                    todo implementare meccanismo per rimozione della lista--}}
                        {{$prod['nome'].' '.$prod['produttore'].' X '.$prod['quantita_prodotto']}}
                    </li>
                @endforeach
        </ul>
        </div>

        <hr>

        <div class="lists hidden">
            <h3>Le tue liste</h3>

            <div class="grid">

            </div>
        </div>


        <div class="choosen hidden">
            <h3>Le tue scelte</h3>
            <input type="button" value="Salva">
            <div class="grid">

            </div>
        </div>

        <div class="choices">
            <h3>Clicca sul carrello</h3>
            <label>
                Cerca i tuoi prodotti
                <input type="search">
            </label>

            <div class="grid">

            </div>
        </div>

    </section>


@endsection
