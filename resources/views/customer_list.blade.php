@extends("layouts.home")
@section('title', ' | LISTA')
@push('home_style')
    <link rel="stylesheet" href="{{asset("styles/reserved_area.css")}}"> {{--todo cambiare css--}}
@endpush
@push('scripts')
    <script src="{{asset('js/script_list.js')}}" defer></script> {{--todo cambiare script--}}
@endpush
@section('buttons')
    <div class="link">
        <a href="{{route('home')}}">home</a>
        <a class="login" href="{{route('logout')}}">logout</a>
    </div>
@endsection
