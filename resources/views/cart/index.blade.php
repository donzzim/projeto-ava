@extends('site.layout')

@section('title', 'Carrinho de Compras')

@section('content')
    @if (isset($items) && count($items) > 0)
        <p>{{ $item->name }} - {{ $item->price }}</p>
    @endif
@endsection
