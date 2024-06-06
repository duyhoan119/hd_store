<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request){
        $check = $request->all();
        $user = User::query()->where('email',$request->email)->first();
        if (Auth::attempt($check)) {
            return redirect()->route('home');
        }
        return back()->withErrors(['The provided credentials do not match our records.'])->onlyInput('email');
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
