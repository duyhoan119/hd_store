@extends('admin.index')
@section('title', 'Add new category')
@section('show_content')
    <div>
        <div class="rounded-md relative">
            <h2 class="text-2xl text-center font-semibold">Add new category</h2>
            <form class="space-y-2" method="POST" action="{{ route('create_category') }}">
                @csrf
                <label for="name" class="text-black font-semibold">Name category</label>
                <input id="name" name="name" type="text"  class="border rounded-md w-full px-2">
                <div class="flex items-center space-x-4">
                    <div>
                        <label for="product" class="text-black font-semibold">Product</label>
                        <input id="product status" value="0" type="radio" name="status">
                    </div>
                    <div>
                        <label for="post" class="text-black font-semibold">Post</label>
                        <input id="post" value="1" type="radio" name="status">
                    </div>
                </div>
                <div class="flex space-x-2">
                    <button type="submit" class="block text-black px-2 font-semibold border-2 rounded-md">Submit</button>
                    <a class=" px-2 font-semibold border-2 rounded-md text-red-500" href="{{route('categories') }}"> Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
