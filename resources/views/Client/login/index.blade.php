@extends('welcome')
@section('content')
   <div class="flex-col justify-center items-center">
        <div id="login">
            <div class="max-w-xl mx-auto p-4 rounded-md bg-cyan-500 space-y-4">
                <p class="text-2xl text-center font-semibold">Login</p>
                <form class="space-y-4" action="{{ route('sign_in') }}" method= "POST">
                    @csrf
                    <div>
                        <label for="email">Email</label>
                        <input class="w-full rounded-md px-2" id="email" name="email" type="email" required>
                    </div>
                    <div>
                        <label for="password">Password</label >
                        <input class="w-full rounded-md px-2" id="password" name="password" type="password" required>
                    </div>
                    <button class="border-cyan-50 rounded-md mx-auto block py-2 px-8 text-xl font-semibold bg-white" type="submit">Login</button>
                </form>
                <a href="#" class="text-base text-center font-semibold">Forgot your password !</a>
                <p class="text-base text-center font-semibold">You don't have account. <span onclick="change_view('register')">Go to register !</span></p>
            </div>
        </div>
       <div id="register" class="hidden">
            <div id="register" class="max-w-xl rounded-md mx-auto p-4 bg-cyan-500 space-y-4">
                <p class="text-2xl text-center font-semibold">Register</p>
                <form class="space-y-4" action="{{ route('register') }}" method= "POST">
                    @csrf
                    <div>
                        <label for="name">Name</label>
                        <input class="w-full rounded-md px-2" name="name" id="name" type="text" required>
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input class="w-full rounded-md px-2" name="email" id="email" type="email" required>
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input class="w-full rounded-md px-2" name="password" id="password" type="password" required>
                    </div>
                    <button class="border-cyan-50 rounded-md mx-auto block py-2 px-8 text-xl font-semibold bg-white" type="submit">Submit</button>
                </form>
                <p class="text-base text-center font-semibold" onclick="change_view('login')">Back to login !</p>
            </div>
       </div>
   </div>
@endsection
@section('js')
    <script>
        function change_view(view){
            if (view === 'login') {
                document.getElementById('register').setAttribute('class','hidden')
                document.getElementById('login').setAttribute('class','block')
            }else{
                document.getElementById('login').setAttribute('class','hidden')
                document.getElementById('register').setAttribute('class','block')
            }
        }
    </script>
@endsection
