@extends('main')

@section('content')
    @include('form')
    <br>
    <div class="row" margin-top=>
        @include('list', ['agent' => $agentOne])
        @include('list', ['agent' => $agentTwo])
    </div>
@endsection
