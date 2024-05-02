@extends('Client.index')
@section('title', $product->name)
@section('show_content')
    <div class="grid grid-cols-12">
        <div class="col-span-9">
            <img class="object-cover w-full" src="{{$product->image}}" alt="">
        </div>
        <div class="col-span-3">
            <p class="text-xl font-semibold uppercase">{{$product->name}}</p>
        </div>
    </div>
@endsection
