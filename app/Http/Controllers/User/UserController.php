<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function check(Request $request){
        //Validate input
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|max:30',
        ],[
            'email.exists' => 'Email tidak terdaftar'
        ]);

        $creds = $request->only('email','password');
        if(Auth::attempt($creds)){
            return redirect()->route('user.home');
        }
        else{
            return redirect()->route('user.login')->with('fail','Incorrect credentials');
        }
    }
}
