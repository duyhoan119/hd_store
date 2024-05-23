@extends('Client.index')
@section('title','News')
@section('show_content')
    <div>
        @include('client.layouts.nav')
    </div>
    <div class="grid grid-cols-12 gap-4">
        @foreach ($news as $item)
            <a href="{{ route('new', ['id'=>$item->id,'a'=>1]) }}" class="col-span-4 group">
                <div class="border-2 border-solid rounded-md py-3 space-y-3">
                    <div class="aspect-x-4 aspect-y-5 ">
                        <img class="w-full h-full object-cover" src="{{ asset($item->image) }}" alt="">
                    </div>
                    <p class="text-lg text-center group-hover:text-cyan-500 group-hover:text-xl transition">{{$item->title}}</p>
                </div>
            </a>
        @endforeach
    </div>
@endsection