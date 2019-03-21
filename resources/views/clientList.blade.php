@extends('main')

@section('content')
    @include('form')
    <br>
    <div class="row" margin-top=>
        @include('list', ['clients' => $clients])
    </div>
@endsection
