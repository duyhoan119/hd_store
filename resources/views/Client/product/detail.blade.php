@extends('Client.index')
@section('title', $product->name)
@section('show_content')
    <div>
        {{$product->name}}
    </div>
@endsection
