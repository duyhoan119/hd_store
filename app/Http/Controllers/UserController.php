<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request){
        $user = User::query()->where('email',$request->email)->first();
        if (isset($user)) {
            if (Hash::check($request->password,$user->password)) {
                
                return redirect()->route('home');
            }
            return redirect()->route('login');
        }
    }

    public function store(Request $request){
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        if (User::query()->create($data)) {
            return redirect('login');
        }
        return "Register falses";
    }
}
