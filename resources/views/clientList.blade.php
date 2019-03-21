@extends('main')

@section('content')
    @include('form')
    <div class="row">
        @include('list', ['agent' => $agentOne])
        @include('list', ['agent' => $agentTwo])
    </div>
@endsection
