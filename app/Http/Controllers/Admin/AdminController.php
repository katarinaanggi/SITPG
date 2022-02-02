<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function check(Request $request){
        //Validate input
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:8|max:30',
        ],[
            'email.exists' => 'Email tidak terdaftar sebagai admin'
        ]);

        $creds = $request->only('email','password');
        // $password = bcrypt($request->password);
        if(Auth::guard('admin')->attempt($creds)){
            return redirect()->route('admin.home');
        }
        else{
            return redirect()->route('admin.login')->with('fail','Incorrect credentials');
        }
    }

    function logout(){
        Auth::guard('admin')->logout();
        return redirect('/');
    }

    public function index(){
        $berita = Berita::latest()->get();
        return view('dashboard.admin.home',[
            'berita' => $berita]);
    }
}
