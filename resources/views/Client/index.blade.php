@extends('welcome')
@section('content')
    <div>
        @include('client.layouts.header')
    </div>
    <div class="max-w-7xl mx-auto p-4">
        @yield('show_content')
    </div>
    <div>
        @include('Client.layouts.footer')
    </div>
@endsection
