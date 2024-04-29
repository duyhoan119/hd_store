@extends('welcome')
@section('content')
    <div>
        @include('admin.layouts.header')
    </div>
    <div class="px-4">
        <div class="grid grid-cols-12">
            <div class="col-span-2">
                @include('admin.layouts.nav')
            </div>
            <div class="col-span-10">
                @yield('show_content')
            </div>
        </div>
    </div>
@endsection
