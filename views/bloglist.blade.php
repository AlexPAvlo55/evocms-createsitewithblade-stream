@extends('layout.layout')
@section('content')
    <form method="POST">
        <input type="hidden" name="formid" value="testform">
        <input type="text" name="text">
        <input type="submit" >
    </form>

    @foreach($dataFromTable->items() as $item)
        {{$item->text}}
        @endforeach
    {!! $paginate !!}


    {!! $blognews !!}


    <p>Showing <strong>{{$modx->getPlaceholder('from')}}</strong> of <strong>{{$modx->getPlaceholder('to')}}</strong> Pages</p>
    {!! $modx->getPlaceholder('pages') !!}


@endsection