@extends('admin.index')
@section('title', 'Add new product')
@section('show_content')
    <div>
        <div class="rounded-md relative">
            <h2 class="text-2xl text-center font-semibold">Add new product</h2>
            <form class="space-y-2" method="POST" enctype="multipart/form-data" action="{{ route('create_product') }}">
                @csrf
                <label for="name" class="text-black font-semibold">Name product</label>
                <input id="name" name="name" type="text" class="border rounded-md w-full px-2">
                <label for="category" class="text-black font-semibold">Category</label>
                <select class="border block rounded-md px-2" id="category" name="category_id">
                    @foreach ($categories as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                <label for="name" class="text-black font-semibold">Image</label>
                <input id="image" name="image" type="file">
                <div class="flex space-x-2">
                    <button type="submit" class="block text-black px-2 font-semibold border-2 rounded-md">Submit</button>
                    <a class=" px-2 font-semibold border-2 rounded-md text-red-500" href="{{ route('products') }}">
                        Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
