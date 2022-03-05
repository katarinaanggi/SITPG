<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Berita;
use App\Exports\GurusExport;
use App\Imports\GurusImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    function check(Request $request){
        //Validate input
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:8|max:30',
        ],[
            'email.exists' => 'Email tidak terdaftar sebagai admin',
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password terlalu pendek, minimal :min karakter',
            'password.max' => 'Password terlalu panjang, maksimum :max karakter'
        ]);

        $creds = $request->only('email','password');
        $password = bcrypt($request->password);
        if(Auth::guard('admin')->attempt($creds)){
            return redirect()->route('admin.home');
        }
        else{
            return redirect()->route('admin.login')->with('fail','Password salah, login gagal');
        }
    }

    function logout(){
        Auth::guard('admin')->logout();
        return redirect('/');
    }

    public function index(){
        $cari = Berita::latest("updated_at")->get();
        $berita = Berita::orderBy('judul', 'asc')->paginate(20);
        return view('dashboard.home',[
            'title' => "Admin Dashboard",
            'berita' => $berita,
            'cari' => $cari
        ]);
    }

    function changeProfile(Request $request, $id){
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ];
        $validator = Validator::make($request->all(),$rules,[
            'name.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'phone.required' => 'Phone harus diisi.'
        ]);

		if ($validator->fails()) {
			return redirect()->route('admin.profile')->withInput()->withErrors($validator)->with('error', 'Data belum berhasil diubah');
		}
		else{
            $current_timestamp = Carbon::now()->toDateTimeString();
            DB::table('admins')->where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'updated_at' => $current_timestamp
            ]);
            return redirect()->route('admin.profile')->with('success', 'Personal Information berhasil diubah');
        }
    }

    function changePassword(Request $request, $id){
        
        $rules = [
            'oldpassword' => 'min:5|required',
            'newpassword' => 'min:5|required',
            'cnewpassword' => 'required|min:5|same:newpassword'
        ];
        
        $validator = Validator::make($request->all(),$rules,[
            'oldpassword.min' => 'Password lama terlalu pendek, minimal :min karakter.',
            'newpassword.min' => 'Password baru terlalu pendek, minimal :min karakter.',
            'cnewpassword.min' => 'Konfirmasi password terlalu pendek, minimal :min karakter.',
            'oldpassword.required' => 'Password lama harus diisi.',
            'newpassword.required' => 'Password baru harus diisi.',
            'cnewpassword.required' => 'Konfirmasi password harus diisi.',
            'cnewpassword.same' => 'Konfirmasi password harus sama dengan password baru.'
        ]);
        
		if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with("tab", "Password");
		}
		else{
            if (!(Hash::check($request->get('oldpassword'), Auth::guard('admin')->user()->password))) {
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
            $user = Auth::guard('admin')->user();
            $user->password = bcrypt($request->get('newpassword'));
            $user->updated_at = $current_timestamp;
            $user->save();
            return redirect()->route('user.profile')->with("success","Password berhasil diubah!");
        }
    }

    function fileImport(Request $request){
        $file = $request->file('importfile');
        if ($validExt = Validator::make( [
                'ext'      => $file,
                'importfile' => strtolower($file->getClientOriginalExtension()),
            ],[
                'importfile'      => 'in:csv,xlsx,xls',
            ])->fails()) {
                return redirect()->route('operator.guru')->withInput()->with('file', 'Tipe file tidak didukung');
        }

        Excel::import(new GurusImport, $request->file('file')->store('temp'));
        return back()->with('success', 'Berhasil diimport');
    }

    public function fileExport(){
        return Excel::download(new GurusExport, 'SITPG_TW_I_2022.xlsx');
    }  
}
