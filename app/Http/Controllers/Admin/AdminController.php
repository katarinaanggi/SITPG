<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

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
            'title' => "Admin Dashboard",
            'berita' => $berita]);
    }

    function changeProfile(Request $request, $id){
        DB::table('admins')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);
        return redirect()->route('admin.profile')->with('success', 'Personal Information berhasil diubah');
    }

    function changePassword(Request $request, $id){
        if (!(Hash::check($request->get('oldpassword'), Auth::guard('admin')->user()->password))) {
            return redirect()->route('admin.home')->with("error","Your current password does not matches with the password.");
        }

        if(strcmp($request->get('oldpassword'), $request->get('newpassword')) == 0){
            return redirect()->route('admin.home')->with("error","New Password cannot be same as your current password.");
        }

        $validatedData = $request->validate([
            'oldpassword' => 'min:5|required',
            'newpassword' => 'min:5|required',
            'cnewpassword' => 'required|min:5|same:newpassword'
        ]);

        //Change Password
        $user = Auth::guard('admin')->user();
        $user->password = bcrypt($request->get('newpassword'));
        $user->save();

        return redirect()->route('admin.profile')->with("success","Password successfully changed!");
        
    }
}
