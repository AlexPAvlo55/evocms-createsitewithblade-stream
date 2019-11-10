@extends('layout.layout')
@section('content')
    {{$title}}
    {!! $documentObject['content'] !!}

@endsection