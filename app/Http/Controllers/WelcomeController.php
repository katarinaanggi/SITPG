<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index() {
        $cari = Berita::latest("updated_at")->get();
        $berita = Berita::orderBy('judul', 'asc')->paginate(2);
        return view('welcome',[
            'berita' => $berita,
            'cari' => $cari]);
    }

    public function search(Request $request){
       if($request->ajax()){
            $berita = DB::table('berita')
                        ->where('judul', 'like', '%'.$request->search.'%')
                        ->orWhere('isi', 'like', '%'.$request->search.'%')
                        ->orWhere('nama_file', 'like', '%'.$request->search.'%')
                        ->orderBy('updated_at')
                        ->get();
            if($request->login == "yes"){
                return view('dashboard.hasil', [
                    'berita' => $berita]);
            }else{
                return view('search', [
                    'berita' => $berita]);
            }
        }
    }

    public function detailBerita ($id) {
        $berita = Berita::find($id);
        return view('dashboard.detail',[
            'title' => "Detail Berita",
            'berita' => $berita]);
    }
}
