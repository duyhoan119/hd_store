@extends('Client.index')
@section('title', $new->title)
@section('show_content')
<div class="space-y-10">
    <p class="text-3xl font-bold uppercase">{{$new->title}}</p>
    <div class="grid grid-cols-12">
        <div class="col-span-8">
            <div class="flex items-center justify-center">
                <img class="aspect-auto" id="image" class="object-cover w-full" src="{{ asset($new->image)}}" alt="">
            </div>
            <div>
                {{$new->body}}
            </div>
        </div>
        <div class="col-span-4">
            @foreach ($news as $item )
                <a class="flex items-center justify-between" href="{{ route('new', ['id'=>$item->id,'a'=>1]) }}">
                    <div>
                        <img class="w-10 h-10 object-cover" src="{{ asset($item->image) }}" alt="">
                    </div>
                    <p class="text-base font-semibold hover:text-cyan-500 line-clamp-2">{{$item->title}}</p>
                </a>
            @endforeach
        </div>
    </div>     
</div>   
@endsection
