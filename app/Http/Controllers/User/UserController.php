<?php

namespace App\Http\Controllers\User;

use App\Models\Kota;
use App\Models\User;
use App\Models\Berita;
use App\Models\Cabdin;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    function check(Request $request){
        //Validate input
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|max:30',
        ],[
            'email.exists' => 'Email tidak terdaftar',
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password terlalu pendek, minimal :min karakter',
            'password.max' => 'Password terlalu panjang, maksimum :max karakter'
        ]);

        $creds = $request->only('email','password');
        if(Auth::guard('web')->attempt($creds)){
            return redirect()->route('user.home');
        }
        else{
            return redirect()->route('user.login')->with('fail','Incorrect credentials');
        }
    }

    function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }

    public function index(){
        $cari = Berita::latest("updated_at")->get();
        $berita = Berita::orderBy('judul', 'asc')->paginate(20);
        return view('dashboard.home',[
            'title' => "Operator Dashboard",
            'berita' => $berita,
            'cari' => $cari
        ]);
    }

    public function show(){
        $kota = Kota::get();
        $cabdin = Cabdin::get();
        return view('dashboard.user.profile',[
            'title' => "User Profile",
            'kota' => $kota,
            'cabdin' => $cabdin
        ]);
    }

    function changeProfile(Request $request, $id){
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'cabdin' => 'required',
            'kota' => 'required'
        ];
        $validator = Validator::make($request->all(),$rules,[
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'phone.required' => 'Phone harus diisi',
            'cabdin.required' => 'Cabang dinas harus diisi',
            'kota.required' => 'Kota/kabupaten harus diisi'
        ]);

		if ($validator->fails()) {
			return redirect()->route('user.profile')->withInput()->withErrors($validator);
		}
		else{
            $current_timestamp = Carbon::now()->toDateTimeString();
            DB::table('users')->where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'cabdin' => $request->cabdin,
                'kota' => $request->kota,
                'updated_at' => $current_timestamp
            ]);
            return redirect()->route('user.profile')->with('success', 'Personal Information berhasil diubah');
        }
    }

    function changePassword(Request $request, $id){
        
        $rules = [
            'oldpassword' => 'min:5|required',
            'newpassword' => 'min:5|required',
            'cnewpassword' => 'required|min:5|same:newpassword'
        ];
        
        $validator = Validator::make($request->all(),$rules,[
            'oldpassword.min' => 'Password lama terlalu pendek, minimal :min karakter',
            'newpassword.min' => 'Password baru terlalu pendek, minimal :min karakter',
            'cnewpassword.min' => 'Konfirmasi password terlalu pendek, minimal :min karakter',
            'oldpassword.required' => 'Password lama harus diisi',
            'newpassword.required' => 'Password baru harus diisi',
            'cnewpassword.required' => 'Konfirmasi password harus diisi',
            'cnewpassword.same' => 'Konfirmasi password harus sama dengan password baru'
        ]);
        
		if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with("tab", "Password");
		}
		else{
            if (!(Hash::check($request->get('oldpassword'), Auth::guard('web')->user()->password))) {
                return redirect()->back()->with("error","Password tidak sesuai.")
                                         ->with("tab", "Password");
            }
    
            if(strcmp($request->get('oldpassword'), $request->get('newpassword')) == 0){
                return redirect()->back()
                                 ->with("error","Password baru tidak boleh sama dengan password saat ini.")
                                 ->with("tab", "Password");
            }
            //Change Password
            $current_timestamp = Carbon::now()->toDateTimeString();
            $user = Auth::guard('web')->user();
            $user->password = bcrypt($request->get('newpassword'));
            $user->updated_at = $current_timestamp;
            $user->save();
            return redirect()->route('user.profile')->with("success","Password berhasil diubah!");
        }
    }
}
