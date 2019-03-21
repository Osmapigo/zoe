@extends('main')

@section('content')
    @include('form', ['agents' => $agents])
@endsection
