<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(UserRequest $request){
        $check_user = $request->validated();
        if (Auth::attempt($check_user)) {
            return redirect()->route('home');
        }
        return back()->withErrors(['The provided credentials do not match our records.'])->onlyInput('email');
    }

    public function log_out(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();

        return redirect()->route('home');
        
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
