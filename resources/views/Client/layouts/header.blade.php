<div class="bg-cyan-500">
    <div class="grid grid-cols-12 px-4">
        <a class="col-span-2 text-3xl font-semibold" href="#">
            HD STORE
        </a>
        <div class="col-span-8 flex items-center justify-evenly space-x-4">
            <a class="text-lg font-semibold hover:text-xl transition text-gray-200" href="{{ route('home') }}" >Home</a>
            <a class="text-lg font-semibold hover:text-xl transition text-gray-200" href="{{ route('list',['a'=>1]) }}" >Product</a>
            <a class="text-lg font-semibold hover:text-xl transition text-gray-200" href="{{ route('news') }}" >News</a>
            <a class="text-lg font-semibold hover:text-xl transition text-gray-200" href="{{ route('contact') }}" >Contact</a>
        </div>
        <div class="col-span-2 right-0 flex justify-end items-center space-x-4">
            <a class="text-lg font-semibold hover:text-xl transition text-gray-200" href="{{ route('cart', ['user_id'=>1]) }}">Cart</a>
            <div>
                <a class="border bg-yellow-300 rounded-md text-lg font-semibold transition text-cyan-500 px-2" href="{{ route('login')}}">Login</a>
                <a class="border bg-yellow-300 rounded-md text-lg font-semibold transition text-cyan-500 px-2" href="{{ route('login')}}">Logout</a>
            </div>
        </div>
    </div>
</div>