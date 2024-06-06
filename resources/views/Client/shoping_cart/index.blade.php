@extends('Client.index')
@section('title','Shoping cart')
@section('show_content')
   @if (!$carts->isEmpty())
    <div>
        <h2 class="text-center text-2xl font-semibold">Shoping cart</h2>
        <table class="w-full">
            <thead>
                <tr class="grid grid-cols-12">
                    <th class="text-gray-500 col-span-8">Product</th>
                    <th class="text-gray-500 col-span-1">Price</th>
                    <th class="text-gray-500 col-span-1">Quantity order</th>
                    <th class="text-gray-500 col-span-1">Total price</th>
                    <th class="text-gray-500 col-span-1">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carts as $item)
                <tr class="py-4 grid grid-cols-12">
                    <td class="flex items-center col-span-8">
                    <img class="object-cover w-20" src="{{ asset($item->product->image) }}" alt="">
                    <a href="{{ route('show_detail', ['id'=>$item->product->product->id,'a'=>1]) }}"> <p class="">{{$item->product->product->name}} > {{$item->product->name}}</p></a>
                    </td>
                    <td class="text-center col-span-1 flex justify-center items-center">{{$item->price}}</td>
                    <td class="text-center col-span-1 flex justify-center items-center">{{$item->quantity_order}}</td>
                    <td class="text-center col-span-1 flex justify-center items-center">{{$item->price*$item->quantity_order}}</td>
                    <td class="text-center col-span-1 flex justify-center items-center">
                        <button onclick="handerDelete({{$item->id}})" class="mx-auto block font-semibold text-xl hover:text-red-600" type="button">X</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex justify-end items-center">
            <button class="border border-green-600 rounded-md px-2 bg-green-600 text-xl font-semibold" type="button">Pay</button>
        </div>
    </div>
   @else
       <div>
            <h1 class="text-center text-xl font-semibold" >You don't have any orders yet. <a href="{{ route('home') }}">Go to shopping page</a>!</h1>
       </div>
   @endif
@endsection
@section('js')
<script>
    function handerDelete(id){
        console.log(id);
        var url = location.origin+"/api/cart/"+id
        axios.delete(url).then(res=>{
            if (res.data.status === 200) {
                toastr.success(res.data.messages)
            }else{
                toastr.error(res.data.messages)
            }
            location.reload()
        })
    }
</script>
@endsection