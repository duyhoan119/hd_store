@extends('Client.index')
@section('title', $product->name)
@section('show_content')
    <div class="grid grid-cols-12">
        <div class="col-span-8">
            <img id="image" class="object-cover w-full" src="{{ asset($product->image)}}" alt="">
        </div>
        <div class="col-span-4 space-y-5">
            <p class="text-2xl font-bold uppercase">{{$product->name}}</p>
            <div class="flex items-center space-x-2">
                <p class="text-xl">Quantity :</p>
                <p id="product_quantity" class="text-xl font-semibold">{{$product->variant[0]->quantity}}</p>
            </div>
            <div class="flex items-center space-x-2">
                <p class="text-xl">Price :</p>
                <p class="text-xl font-semibold text-red-600"> <span id="price"></span>{{$product->price}} đ</p>
            </div>
            <hr>
            <div class="space-y-4">
                <p>Select color to see price and images</p>
                @foreach ($product->variant as $item)
                <button onclick="handerData({{$item}})" class="border-2 rounded-md px-4 py-2 hover:bg-gray-100" type="button">{{$item->name}}</button>
                @endforeach
                <input type="number" class="border rounded-md px-2 py-1" min="1" name="quantity" id="quantity" placeholder="Quantity">
                <span id="error" class="block text-red-500"></span>
            </div>
            <div>
                <button onclick="action('addToCart')" class="text-xl font-semibold border rounded-md px-2 py-1 border-orange-600 bg-orange-600">Add to cart</button>
                <button onclick="action()" class="text-xl font-semibold border rounded-md px-2 py-1 border-red-600 bg-red-600">Buy now</button>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var product = []
        var selectedData={}
        function handerData(data){
            selectedData.data = {...data}
            product['variant_id'] = data.id 
            product['price'] = data.price 
            product['user_id'] = 1
            src = '{{asset('')}}'
            document.getElementById('image').src = src+data.image
            document.getElementById('price').innerHTML = data.price
            document.getElementById('product_quantity').innerHTML = data.quantity
        }
        function action(action='buy') {
            if (this.varidated()) {
               if (action ==='buy') {
                    console.log('buy now')
                } else {
                    console.log(product);
                    var url = "http://127.0.0.1:8000/api/cart"
                    axios.post(url,{...product}).then(res=>{
                       if(res.status===200){
                        toastr.success("Add to cart successfully !")
                        location.reload()
                       }
                    })
               }
            }
        }
        function varidated() {
            let varidate = true
            var quantity = document.getElementById('quantity')
            var error = document.getElementById('error')
            if(!product['variant_id']){
                alert('Please select color')
                varidate = false
            }
            if (quantity.value ==''||product['quantity']=='') {
                quantity.setAttribute("class", "border-red-500 border rounded-md px-2 py-1")
                varidate = false
                
            }if (!selectedData.data|| selectedData.data.quantity<quantity.value){
                varidate = false
                error.innerHTML="The quantity exceeds the existing quantity. <br> Please try again !"
                setTimeout(() => {
                    error.innerHTML=""
                }, 3000);
            }
            if(varidate === true){
                quantity.setAttribute("class", "border rounded-md px-2 py-1")
                product['quantity_order'] = quantity.value
            }
            return varidate 
        }
</script>
    
@endsection
