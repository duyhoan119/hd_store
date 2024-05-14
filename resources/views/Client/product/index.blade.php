@extends('Client.index')
@section('title','Home')
@section('show_content')
    <div>
        @include('client.layouts.nav')
    </div>
    <div class="grid grid-cols-12 gap-4">
        @foreach ($products as $item)
            <a href="{{ route('show_detail', ['id'=>$item->id,'a'=>1]) }}" class="col-span-4 group">
                <div class="border-2 border-solid rounded-md py-3 space-y-3">
                    <div class="aspect-x-4 aspect-y-5 ">
                        <img class="w-full h-full group-hover:scale-105 transition object-cover" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQxCxnFfEgJWeou4r_iGaNJUEg3CflXWe04UmqlfUg4Ue4D5RBwO7_KNbsGfXLpammhAWs&usqp=CAU" alt="">
                    </div>
                    <p class="text-lg text-center group-hover:text-cyan-500 group-hover:text-xl transition">{{$item->name}}</p>
                </div>
            </a>
        @endforeach
    </div>
@endsection