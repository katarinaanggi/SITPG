<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Gaji;
use App\Models\Guru;
use App\Models\Kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gurus = Guru::get();
        return view('dashboard.guru.guru', [
            'title' => "Data Guru",
            'gurus' => $gurus
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kota = Kota::get();
        return view('dashboard.guru.add_guru', [
            'title' => "Add Guru",
            'kota' => $kota
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //nuptk dll must number
    {
        $rules = [
			'nrg' => 'required',
			'no_peserta' => 'required',//number
			'nuptk' => 'required|unique:gurus,nuptk',
			'no_sk' => 'required',
			'nama' => "required",
			'jenjang' => 'required|in:PENGAWAS,SLB,SMA,SMK',
			'tempat_tugas' => 'required',
			'kota' => 'required',
			'nip' => 'required|unique:gurus,nip',
			'nama_bank' => 'required',
			'kantor_cabang' => 'required',
			'no_rek' => 'required',
			'nama_rek' => 'required',
			'pangkat' => 'required|in:I/a,I/b,I/c,I/d,II/a,II/b,II/c,II/d,III/a,III/b,III/c,III/d,IV/a,IV/b,IV/c,IV/d',
			'masa_kerja' => 'required',
			'gaji_pokok' => 'required',
			'triw' => 'required|in:1,2,3,4',
			'jumlah' => 'required',
			'pajak' => 'required',
			'nom_pajak' => 'required',
			'bpjs' => 'required',
			'jumlah_diterima' => 'required',
		];
		$validator = Validator::make($request->all(),$rules);

		if ($validator->fails()) {
			return redirect()->route('admin.add_guru')->withInput()->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
				$guru = new Guru;
                $guru->nrg = $data['nrg'];
                $guru->no_peserta = $data['no_peserta'];
                $guru->nuptk = $data['nuptk'];
                $guru->no_sk = $data['no_sk'];
                $guru->nama = $data['nama'];
                $guru->jenjang = $data['jenjang'];
                $guru->tempat_tugas = $data['tempat_tugas'];
                $guru->kota = $data['kota'];
                $guru->nip = $data['nip'];
                $guru->nama_bank = $data['nama_bank'];
                $guru->kantor_cabang = $data['kantor_cabang'];
                $guru->no_rek = $data['no_rek'];
                $guru->nama_rek = $data['nama_rek'];
                $guru->pangkat = $data['pangkat'];
                $guru->masa_kerja = $data['masa_kerja'];
                $guru->gaji_pokok = $data['gaji_pokok'];
                switch ($data['triw']) {
                    case '1':
                        $guru->jan = $data['jan'];
                        $guru->feb = $data['feb'];
                        $guru->mar = $data['mar'];
                        break;
                    
                    case '2':
                        $guru->apr = $data['apr'];
                        $guru->mei = $data['mei'];
                        $guru->jun = $data['jun'];
                        break;
                    
                    case '3':
                        $guru->jul = $data['jul'];
                        $guru->agu = $data['agu'];
                        $guru->sep = $data['sep'];
                        break;
                    
                    case '4':
                        $guru->okt = $data['okt'];
                        $guru->nov = $data['nov'];
                        $guru->des = $data['des'];
                        break;
                    
                };
                $guru->jumlah = $data['jumlah'];
                $guru->pajak = $data['pajak'];
                $guru->nom_pajak = $data['nom_pajak'];
                $guru->bpjs = $data['bpjs'];
                $guru->jumlah_diterima = $data['jumlah_diterima'];
                
				$guru->save();
				return redirect()->route('admin.guru')->with('success', 'Data berhasil ditambahkan');
			}
			catch(Exception $e){
				return redirect()->route('admin.add_guru')->with('error', 'Data belum berhasil ditambahkan');
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
        $guru = Guru::find($id);
        $name = $guru->nama;
        // dd($guru);
        return view('dashboard.guru.detail',[
            'title' => "Detail Guru ".$name,
            'guru' => $guru
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
        $kota = Kota::get();
        $guru = Guru::find($id);
        // dd($guru);
        $title = "Edit Guru ".$guru->nama;
        return view('dashboard.guru.edit_guru', compact('guru','kota','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $guru, $id) //nuptk dll must number
    {
        $rules = [
			'nrg' => 'required',
			'no_peserta' => 'required',
			'nuptk' => 'required',
			'no_sk' => 'required',
			'nama' => "required",
			'jenjang' => 'required|in:PENGAWAS,SLB,SMA,SMK',
			'tempat_tugas' => 'required',
			'kota' => 'required',
			'nip' => 'required',
			'nama_bank' => 'required',
			'kantor_cabang' => 'required',
			'no_rek' => 'required',
			'nama_rek' => 'required',
			'pangkat' => 'required|in:I/a,I/b,I/c,I/d,II/a,II/b,II/c,II/d,III/a,III/b,III/c,III/d,IV/a,IV/b,IV/c,IV/d',
			'masa_kerja' => 'required',
			'gaji_pokok' => 'required',
			'jumlah' => 'required',
			'pajak' => 'required',
			'nom_pajak' => 'required',
			'bpjs' => 'required',
			'jumlah_diterima' => 'required',
		];
		$validator = Validator::make($guru->all(),$rules);

		if ($validator->fails()) {
			return redirect()->route('admin.edit_guru',$guru->id)->withInput()->withErrors($validator);
		}
		else{
            try{
                Guru::where('id', $id)->update([
                    'nrg' => $guru->nrg,
                    'no_peserta' => $guru->no_peserta,
                    'nuptk' => $guru->nuptk,
                    'no_sk' => $guru->no_sk,
                    'nama' => $guru->nama,
                    'jenjang' => $guru->jenjang,
                    'tempat_tugas' => $guru->tempat_tugas,
                    'kota' => $guru->kota,
                    'nip' => $guru->nip,
                    'nama_bank' => $guru->nama_bank,
                    'kantor_cabang' => $guru->kantor_cabang,
                    'no_rek' => $guru->no_rek,
                    'nama_rek' => $guru->nama_rek,
                    'pangkat' => $guru->pangkat,
                    'masa_kerja' => $guru->masa_kerja,
                    'gaji_pokok' => $guru->gaji_pokok,
                    'jan' => $guru->jan,
                    'feb' => $guru->feb,
                    'mar' => $guru->mar,
                    'apr' => $guru->apr,
                    'mei' => $guru->mei,
                    'jun' => $guru->jun,
                    'jul' => $guru->jul,
                    'agu' => $guru->agu,
                    'sep' => $guru->sep,
                    'okt' => $guru->okt,
                    'nov' => $guru->nov,
                    'des' => $guru->des,
                    'jumlah' => $guru->jumlah,
                    'pajak' => $guru->pajak,
                    'nom_pajak' => $guru->nom_pajak,
                    'bpjs' => $guru->bpjs,
                    'jumlah_diterima' => $guru->jumlah_diterima
                ]);
                return redirect()->route('admin.guru')->with('success', 'Data berhasil diubah');
			}
			catch(Exception $e){
				return redirect()->route('admin.edit_guru',$guru->id)->with('error', 'Data belum berhasil ditambahkan');
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
        Gurus::find($id)->delete();
        return redirect()->route('admin.guru')->with('success','Data berhasil dihapus');
    }

    /**
     * Remove All resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyAll()
    {
        DB::delete('delete from gurus');
        return redirect()->route('admin.guru')->with('success','Data berhasil dihapus');
    }
}
