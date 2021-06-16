@extends("layouts.home")
@push('home_style')
    <link rel="stylesheet" href="{{asset("styles/guest.css")}}">
@endpush
@push('scripts')
    <script src='{{ asset('js/api.js') }}' defer></script>
    <script type="text/javascript">
        const NEWS_API_ROUTE = '{{route('api/news')}}';
        const COMP_API_ROUTE = '{{route('api/comp',['symbol'])}}';
    </script>
@endpush
@section('buttons')
    <div class="link">
        <a class='login' href='{{route('login')}}'>@if(session('username')) Area Personale
            @else Login @endif</a>
    </div>
@endsection
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
@section("content")

    <article>
        <section id="news">
            <div>
                <img src="{{asset("img/news/saint-pierre-1633682_1920.jpg")}}" alt="">
                <h1>
                    Da oggi sempre più presenti in italia
                </h1>
            </div>
            <h2>
                Con oltre 150 punti vendita in più di 15 regioni diverse
            </h2>

            <div>
                <img src="{{asset("img/news/knifes-1839061_1920.jpg")}}" alt="">

            </div>
            <h2>
                Ogni giorno vi forniamo il meglio
            </h2>

            <div id="bio">
                <img src="{{asset("img/news/cows-2641195_1920.jpg")}}" alt="">
                <h1 id="bio">
                    The greener the better
                </h1>
            </div>
            <h2>
                Bio è meglio! Scopri una nuova linea rispettosa dell' ambiente
            </h2>
        </section>
    </article>

    <article class="info">
        <h1 class="title">Scopri le notizie a tema slowfood</h1>

        <section class="news grid" id="apiNews">

        </section>

        <h1 class="title">I nostri partners</h1>

        <section class="partners  grid" id="apiFinnhub">
        </section>

    </article>


@endsection
