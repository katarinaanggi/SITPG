<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Cabdin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = Datatables::of(User::query())->make(true);
        // $users = User::get();
        return view('dashboard.usermanagement.userManage', [
            'title' => "User Management"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cabdin = DB::select('select * from cabdin');
        // $kota = DB::select('select * from kota');
        return view('dashboard.usermanagement.add_user',[
            'title' => "Add User",
            'cabdin' => $cabdin
        ]);
    }

    /**
     * return kota list.
     *
     * @return json
     */
    public function getKota(Request $request)
    {
        $kota = DB::table('kota')
            ->where('id_cabdin', $request->id_cabdin)
            ->get();
        
        if (count($kota) > 0) {
            return response()->json($kota);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
			'name' => 'required|string|max:50|min:5',
			'email' => 'required|email|unique:users,email',
			'phone' => 'required|numeric|min:5',
			'cabdin' => 'required|in:1,2,3,4,5,6,7,8,9,10,11,12,13',
			'kota' => 'required',
			'password' => 'required|min:5',
            'cpassword' => 'required|min:5|same:password',
		];
		$validator = Validator::make($request->all(),$rules);

		if ($validator->fails()) {
			return redirect()->route('admin.add_user')->withInput()->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
				$user = new User;
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->phone = $data['phone'];
                $user->cabdin = $data['cabdin'];
                $user->kota = $data['kota'];
                $user->password = Hash::make($data['password']);
                
				$user->save();
				return redirect()->route('admin.userManagement')->with('success', 'Data berhasil ditambahkan');
			}
			catch(Exception $e){
				return redirect()->route('admin.add_user')->with('error', 'Data belum berhasil ditambahkan');
			}
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $name = $user->name;
        return view('dashboard.usermanagement.detail',[
            'title' => "Detail User ".$name,
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cabdin = DB::select('select * from cabdin'); 
        $user = DB::table('users')->where('id', $id)->first();
        return view('dashboard.usermanagement.edit_user', compact('user','cabdin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $value, $id)
    {
        $rules = [
			'name' => 'required|string|max:50|min:5',
			'email' => 'required|email|unique:users,email',
			'phone' => 'required|numeric|min:5',
			'cabdin' => 'required|in:1,2,3,4,5,6,7,8,9,10,11,12,13',
			'kota' => 'required',
		];
		$validator = Validator::make($value->all(),$rules);

		if ($validator->fails()) {
			return redirect()->route('admin.edit_user',$value->id)->withInput()->withErrors($validator);
		}
		else{
            try{
                $current_timestamp = Carbon::now()->toDateTimeString();
                DB::table('users')->where('id', $id)->update([
                    'name' => $value->name,
                    'email' => $value->email,
                    'phone' => $value->phone,
                    'cabdin' => $value->cabdin,
                    'kota' => $value->kota,
                    'updated_at' => $current_timestamp
                ]);
				return redirect()->route('admin.userManagement')->with('success', 'Data berhasil diubah');
			}
			catch(Exception $e){
				return redirect()->route('admin.edit_user',$value->id)->with('error', 'Data belum berhasil diubah');
			}
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from users where id = ?',[$id]);
        return redirect()->route('admin.userManagement')->with('success','Data berhasil dihapus');
    }

}
