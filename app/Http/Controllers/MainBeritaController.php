<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;


class MainBeritaController extends Controller
{
    /**
     * Display a listing of berita.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $berita = Berita::get();
        return view('dashboard.berita.berita',[
            'title' => "Berita Dashboard",
            'berita' => $berita]);

        
    }

    /**
     * Display a listing of berita.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewDetail($id){
        $berita = Berita::find($id);
        return view('dashboard.berita.detail',[
            'title' => "Detail Berita",
            'berita' => $berita]);
    }

    /**
     * Show the form for creating a new berita.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(){
        return view('dashboard.berita.add_berita');
    }

    /**
     * Store a newly created berita in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $rules = [
			'judul' => 'required|string|max:50|min:5',
			'isi' => 'required|string|min:10',
		];
		$validator = Validator::make($request->all(),$rules,[
            'judul.required' => 'Judul berita harus diisi.',
            'judul.max' => 'Judul berita terlalu panjang, maksimal :max karakter.',
            'judul.min' => 'Judul berita terlalu pendek, minimal :min karakter.',
            'judul.string' => 'Judul berita bukan bertipe string.',
            'isi.required' => 'Isi berita harus diisi.',
            'isi.min' => 'Isi berita terlalu pendek, minimal :min karakter.',
            'isi.string' => 'Isi berita bukan bertipe string.'
        ]);

		if ($validator->fails()) {
			return redirect()->route('admin.add_berita')->withInput()->withErrors($validator)->with('error', 'Data belum berhasil ditambahkan');
		}
		else{
            $data = $request->input();
			try{
				$berita = new Berita;
                $berita->id_author = $data['author'];
                $berita->judul = $data['judul'];
                $berita->isi = $data['isi'];
                if($request->hasFile('file')){
                    $file = $request->file('file');
                    if ($validExt = Validator::make( [
                            'ext'      => $file,
                            'file' => strtolower($file->getClientOriginalExtension()),
                        ],[
                            'file'      => 'in:doc,csv,xlsx,xls,docx,ppt,zip,rar,pdf',
                        ])->fails()) {
                            return redirect()->route('admin.add_berita')->withInput()->with('file', 'Tipe file tidak didukung');
                    }
                    $fileName = time().'_'.$file->getClientOriginalName();
                    $filePath = $file->storeAs('uploads', $fileName, 'public');

                    $berita->nama_file = time().'_'.$file->getClientOriginalName();
                    $berita->file_path = '/storage/app/public/uploads' . $filePath;
                }
				$berita->save();
				return redirect()->route('admin.berita')->with('success', 'Data berhasil ditambahkan');
			}
			catch(Exception $e){
				return redirect()->route('admin.add_berita')->with('error', 'Data belum berhasil ditambahkan');
			}
		}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $Berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id){        
        $berita = DB::table('berita')->where('id', $id)->first();
        return view('dashboard.berita.edit_berita', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $Berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $value, $id){
        $rules = [
			'judul' => 'required|string|max:50|min:5',
			'isi' => 'required|string|min:10',
		];
		$validator = Validator::make($value->all(),$rules,[
            'judul.required' => 'Judul berita harus diisi.',
            'judul.max' => 'Judul berita terlalu panjang, maksimal :max karakter.',
            'judul.min' => 'Judul berita terlalu pendek, minimal :min karakter.',
            'judul.string' => 'Judul berita bukan bertipe string.',
            'isi.required' => 'Isi berita harus diisi.',
            'isi.min' => 'Isi berita terlalu pendek, minimal :min karakter.',
            'isi.string' => 'Isi berita bukan bertipe string.'
        ]);

		if ($validator->fails()) {
			return redirect()->route('admin.edit_berita',$value->id)->withInput()->withErrors($validator)->with('error', 'Data belum berhasil diubah');
		}
		else{
            $fileName = DB::table('berita')->where('id', $value->id)->value('nama_file');
            $filePath = DB::table('berita')->where('id', $value->id)->value('file_path');
			try{
                if($value->hasFile('file')){
                    Storage::disk('public')->delete('uploads/'.$fileName);
                    $file = $value->file('file');
                    if ($validExt = Validator::make( [
                            'file'      => $file,
                            'extension' => strtolower($file->getClientOriginalExtension()),
                        ],[
                            'extension'      => 'in:doc,csv,xlsx,xls,docx,ppt,odt,ods,odp,zip,rar,pdf',
                        ])->fails()) {
                            return redirect()->route('admin.edit_berita',$value->id)->withInput()->with('file', 'Tipe file tidak didukung');
                    }
                    $fileName = time().'_'.$file->getClientOriginalName();
                    $filePath = $file->storeAs('uploads', $fileName, 'public');
                }
                $current_timestamp = Carbon::now()->toDateTimeString();
                DB::table('berita')->where('id', $id)->update([
                    'judul' => $value->judul,
                    'isi' => $value->isi,
                    'nama_file' => $fileName,
                    'file_path' => $filePath,
                    'updated_at' => $current_timestamp
                ]);
				return redirect()->route('admin.berita')->with('success', 'Data berhasil diubah');
			}
			catch(Exception $e){
				return redirect()->route('admin.edit_berita',$value->id)->with('error', 'Data belum berhasil diubah');
			}
		}
    }

    
    /**
     * Download berita file from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function downloadFile($file_name){
        $path = storage_path().'/'.'app'.'/public/uploads/'.$file_name;
        return response()->download($path);
    }

    /**
     * Remove the specified resource from database.
     *
     * @param  \App\Models\Berita  $Berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Berita::find($id)->delete();
        return redirect()->route('admin.berita')->with('success','Data berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage with its file in storage.
     *
     * @param  \App\Models\Berita  $Berita
     * @return \Illuminate\Http\Response
     */
    public function destroyFile($id, $filename){
        Storage::disk('public')->delete('uploads/'.$filename);

        DB::delete('delete from berita where id = ?',[$id]);
        return redirect()->route('admin.berita')->with('success','Data berhasil dihapus');
    }
}
