@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">   
    <style>
        .choices {
            margin-bottom: 0px;
        }
    </style> 
@endsection

@section('page')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last"></div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('operator.guru') }}">Data Guru</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Guru</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-content">
                <a href="{{route('operator.guru')}}"><i class="bi bi-x-lg"></i></a>
                <form action="{{ route('operator.update_guru', $guru->id) }}" method="post" id="update-guru">
                    @csrf
                    @method('PATCH')
                    {{-- @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif --}}
        
                    {{-- @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    <div class="card-header"><h3 class="text-center">Edit Detail of {{ $guru->nama }}</h3></div>
                    <div class="card-body">
                        <div class="form-group row mb-3">
                            <label for="no_peserta" class="col-sm-3 col-form-label">No. Peserta: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="no_peserta" name="no_peserta" value="{{ $guru->no_peserta }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                @error('no_peserta')
                                    <div class="text-danger">*{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="nama" class="col-sm-3 col-form-label">Nama: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $guru->nama }}">
                                @error('nama')
                                    <div class="text-danger">*{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="nip" class="col-sm-3 col-form-label">NIP: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nip" name="nip" value="{{ $guru->nip }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                @error('nip')
                                    <div class="text-danger">*{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <h5 >Kepegawaian</h5>
                                <div class="form-group row mb-3">
                                    <label for="nrg" class="col-sm-3 col-form-label">NRG: </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nrg" name="nrg" value="{{ $guru->nrg }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        @error('nrg')
                                            <div class="text-danger">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                
                                <div class="form-group row mb-3">
                                    <label for="nuptk" class="col-sm-3 col-form-label">NUPTK: </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nuptk" name="nuptk" value="{{ $guru->nuptk }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        @error('nuptk')
                                            <div class="text-danger">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                
                                <div class="form-group row mb-3">
                                    <label for="no_sk" class="col-sm-3 col-form-label">No. SK: </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="no_sk" name="no_sk" value="{{ $guru->no_sk }}">
                                        @error('no_sk')
                                            <div class="text-danger">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                
                                <div class="form-group row mb-3">
                                    <label class="col-sm-3 col-form-label">Jenjang: </label>
                                    <div class="col-sm-9">
                                        <label class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" id="pengawas" name="jenjang" value="PENGAWAS" {{ ($guru->jenjang == 'PENGAWAS') ? 'checked' : ''}}> Pengawas <br/>
                                                <input type="radio" class="form-check-input" id="slb" name="jenjang" value="SLB" {{ ($guru->jenjang == 'SLB') ? 'checked' : ''}}> SLB <br/>
                                                <input type="radio" class="form-check-input" id="smk" name="jenjang" value="SMK" {{ ($guru->jenjang == 'SMK') ? 'checked' : ''}}> SMK <br/>
                                                <input type="radio" class="form-check-input" id="sma" name="jenjang" value="SMA" {{ ($guru->jenjang == 'SMA') ? 'checked' : ''}}> SMA <br/>
                                            </label>
                                        </label>
                                        @error('jenjang')
                                            <div class="text-danger">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                
                                <div class="form-group row mb-3">
                                    <label for="tempat_tugas" class="col-sm-3 col-form-label">Tempat Tugas: </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tempat_tugas" name="tempat_tugas" value="{{ $guru->tempat_tugas }}">
                                        @error('tempat_tugas')
                                            <div class="text-danger">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                
                                <div class="form-group row mb-3">
                                    <label for="kota" class="col-sm-3 col-form-label">Kabupaten/Kota: </label>
                                    <div class="col-sm-9">
                                        <select class="form-control choices" id="kota" name="kota" >
                                            @foreach($kota as $k)
                                                <option value="{{ $k->nama_kota }}" {{ $k->nama_kota == $guru->kota ? 'selected' : ''}}>{{ $k->nama_kota}}</option>
                                            @endforeach
                                        </select>
                                        @error('kota')
                                            <div class="text-danger">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <h5 >Rekening</h5>
                                <div class="form-group row mb-3">
                                    <label for="nama_bank" class="col-sm-3 col-form-label">Nama Bank: </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama_bank" name="nama_bank" value="{{ $guru->nama_bank }}">
                                        @error('nama_bank')
                                            <div class="text-danger">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                
                                <div class="form-group row mb-3">
                                    <label for="kantor_cabang" class="col-sm-3 col-form-label">Kantor Cabang: </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="kantor_cabang" name="kantor_cabang" value="{{ $guru->kantor_cabang }}">
                                        @error('kantor_cabang')
                                            <div class="text-danger">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                
                                <div class="form-group row mb-3">
                                    <label for="no_rek" class="col-sm-3 col-form-label">No. Rekening: </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="no_rek" name="no_rek" value="{{ $guru->no_rek }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        @error('no_rek')
                                            <div class="text-danger">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                
                                <div class="form-group row mb-3">
                                    <label for="nama_rek" class="col-sm-3 col-form-label">Nama Rekening: </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama_rek" name="nama_rek" value="{{ $guru->nama_rek }}">
                                        @error('nama_rek')
                                            <div class="text-danger">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-4" id="itung">   
                            <h5 >Pendapatan</h5>            
                            <div class="col">    
                                <div class="form-group row mb-3">
                                    <label for="pangkat" class="col-sm-3 col-form-label">Pangkat/ Golongan: </label>
                                    <div class="col-sm-9">
                                        <select class="form-control choices" id="pangkat" name="pangkat" >
                                            <option value="I/a" {{ $guru->pangkat == 'I/a' ? 'selected' : '' }}>I/A</option>
                                            <option value="I/b" {{ $guru->pangkat == 'I/b' ? 'selected' : '' }}>I/B</option>
                                            <option value="I/c" {{ $guru->pangkat == 'I/c' ? 'selected' : '' }}>I/C</option>
                                            <option value="I/d" {{ $guru->pangkat == 'I/d' ? 'selected' : '' }}>I/D</option>
                                            <option value="II/a" {{ $guru->pangkat == 'II/a' ? 'selected' : '' }}>II/A</option>
                                            <option value="II/b" {{ $guru->pangkat == 'II/b' ? 'selected' : '' }}>II/B</option>
                                            <option value="II/c" {{ $guru->pangkat == 'II/c' ? 'selected' : '' }}>II/C</option>
                                            <option value="II/d" {{ $guru->pangkat == 'II/d' ? 'selected' : '' }}>II/D</option>
                                            <option value="III/a" {{ $guru->pangkat == 'III/a' ? 'selected' : '' }}>III/A</option>
                                            <option value="III/b" {{ $guru->pangkat == 'III/b' ? 'selected' : '' }}>III/B</option>
                                            <option value="III/c" {{ $guru->pangkat == 'III/c' ? 'selected' : '' }}>III/C</option>
                                            <option value="III/d" {{ $guru->pangkat == 'III/d' ? 'selected' : '' }}>III/D</option>
                                            <option value="IV/a" {{ $guru->pangkat == 'IV/a' ? 'selected' : '' }}>IV/A</option>
                                            <option value="IV/b" {{ $guru->pangkat == 'IV/b' ? 'selected' : '' }}>IV/B</option>
                                            <option value="IV/c" {{ $guru->pangkat == 'IV/c' ? 'selected' : '' }}>IV/C</option>
                                            <option value="IV/d" {{ $guru->pangkat == 'IV/d' ? 'selected' : '' }}>IV/D</option>
                                        </select>
                                        @error('pangkat')
                                            <div class="text-danger">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                
                                <div class="form-group row mb-3">
                                    <label for="masa_kerja" class="col-sm-3 col-form-label">Masa Kerja: </label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="masa_kerja" name="masa_kerja" value="{{ $guru->masa_kerja }}">
                                        @error('masa_kerja')
                                            <div class="text-danger">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                
                                <div class="form-group row mb-3">
                                    <label for="gaji_pokok" class="col-sm-3 col-form-label">Gaji Pokok: </label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control itungan" id="gaji_pokok" name="gaji_pokok" value="{{ $guru->gaji_pokok }}">
                                        @error('gaji_pokok')
                                            <div class="text-danger">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="tw1-tab" data-bs-toggle="tab" href="#tw1" role="tab"
                                            aria-controls="tw1" aria-selected="true">TW 1</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="tw2-tab" data-bs-toggle="tab" href="#tw2" role="tab"
                                            aria-controls="tw2" aria-selected="false">TW 2</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="tw3-tab" data-bs-toggle="tab" href="#tw3" role="tab"
                                            aria-controls="tw3" aria-selected="false">TW 3</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="tw4-tab" data-bs-toggle="tab" href="#tw4" role="tab"
                                            aria-controls="tw4" aria-selected="false">TW 4</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="tw1" role="tabpanel" aria-labelledby="tw1-tab"><br>
                                        <div class="form-group row mb-3">
                                            <label for="jan" class="col-sm-4 col-form-label">Januari: </label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control itungan " id="jan" name="jan" value="{{ $guru->jan }}">
                                            </div>
                                        </div>
                    
                                        <div class="form-group row mb-3">
                                            <label for="feb" class="col-sm-4 col-form-label">Februari: </label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control itungan" id="feb" name="feb" value="{{ $guru->feb }}">
                                            </div>
                                        </div>
                    
                                        <div class="form-group row mb-3">
                                            <label for="mar" class="col-sm-4 col-form-label">Maret: </label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control itungan" id="mar" name="mar" value="{{ $guru->mar }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tw2" role="tabpanel" aria-labelledby="tw2-tab"><br>
                                        <div class="form-group row mb-3">
                                            <label for="apr" class="col-sm-4 col-form-label">April: </label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control itungan" id="apr" name="apr" value="{{ $guru->apr }}">
                                            </div>
                                        </div>
                    
                                        <div class="form-group row mb-3">
                                            <label for="mei" class="col-sm-4 col-form-label">Mei: </label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control itungan" id="mei" name="mei" value="{{ $guru->mei }}">
                                            </div>
                                        </div>
                    
                                        <div class="form-group row mb-3">
                                            <label for="jun" class="col-sm-4 col-form-label">Juni: </label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control itungan" id="jun" name="jun" value="{{$guru->jun }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tw3" role="tabpanel" aria-labelledby="tw3-tab"><br>
                                        <div class="form-group row mb-3">
                                            <label for="jul" class="col-sm-4 col-form-label">Juli: </label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control itungan" id="jul" name="jul" value="{{ $guru->jul }}">
                                            </div>
                                        </div>
                    
                                        <div class="form-group row mb-3">
                                            <label for="agu" class="col-sm-4 col-form-label">Agustus: </label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control itungan" id="agu" name="agu" value="{{ $guru->agu }}">
                                            </div>
                                        </div>
                    
                                        <div class="form-group row mb-3">
                                            <label for="sep" class="col-sm-4 col-form-label">September: </label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control itungan" id="sep" name="sep" value="{{ $guru->sep }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tw4" role="tabpanel" aria-labelledby="tw4-tab"><br>
                                        <div class="form-group row mb-3">
                                            <label for="okt" class="col-sm-4 col-form-label">Oktober: </label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control itungan" id="okt" name="okt" value="{{ $guru->okt }}">
                                            </div>
                                        </div>
                    
                                        <div class="form-group row mb-3">
                                            <label for="nov" class="col-sm-4 col-form-label">November: </label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control itungan" id="nov" name="nov" value="{{ $guru->nov }}">
                                            </div>
                                        </div>
                    
                                        <div class="form-group row mb-3">
                                            <label for="des" class="col-sm-4 col-form-label">Desember: </label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control itungan" id="des" name="des" value="{{ $guru->des }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <code><hr></code>
                        </div>

                        <div class="itungitung">
                            <div class="form-group row mb-3">
                                <label for="jumlah" class="col-sm-3 col-form-label">Jumlah: </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $guru->jumlah }}">
                                    @error('jumlah')
                                        <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="pajak" class="col-sm-3 col-form-label">Pajak (%): </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="pajak" name="pajak" value="{{ $guru->pajak }}">
                                    @error('pajak')
                                        <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="form-group row mb-3">
                                <label for="nom_pajak" class="col-sm-3 col-form-label">Nominal Pajak: </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="nom_pajak" name="nom_pajak" value="{{ $guru->nom_pajak }}">
                                    @error('nom_pajak')
                                        <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="form-group row mb-3">
                                <label for="bpjs" class="col-sm-3 col-form-label">BPJS (Max 1%): </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="bpjs" name="bpjs" value="{{ $guru->bpjs }}">
                                    @error('bpjs')
                                        <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="form-group row mb-3">
                                <label for="jumlah_diterima" class="col-sm-3 col-form-label">Jumlah Diterima: </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="jumlah_diterima" name="jumlah_diterima" value="{{ $guru->jumlah_diterima }}">
                                    @error('jumlah_diterima')
                                        <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <a class="btn btn-save btn-block mt-4" id="btnsubmit">Save</a>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        var gapok = document.getElementById('gaji_pokok');
        var tw = document.getElementById('triw');
        var jan = document.getElementById('jan');
        var feb = document.getElementById('feb');
        var mar = document.getElementById('mar');
        var apr = document.getElementById('apr');
        var mei = document.getElementById('mei');
        var jun = document.getElementById('jun');
        var jul = document.getElementById('jul');
        var agu = document.getElementById('agu');
        var sep = document.getElementById('sep');
        var okt = document.getElementById('okt');
        var nov = document.getElementById('nov');
        var des = document.getElementById('des');
        var jml = document.getElementById('jumlah');
        var pajak = document.getElementById('pajak');
        var nom = document.getElementById('nom_pajak');
        var bpjs = document.getElementById('bpjs');
        var diterima = document.getElementById('jumlah_diterima');

        $("#btnsubmit").on('click',function(e){
            swal({
                title: "Apakah anda yakin?",
                text: 'Data ini akan diubah secara permanen!',
                icon: "warning",
                buttons: ["Cancel", "Yes!"],
                dangerMode: true,
            })
            .then(function(value) {
                if (value) {
                    $('#update-guru').submit();
                }
            });
            return false;
        });

        if(jan.value != "" && feb.value != "" && mar.value != "") {
            var TW = 1;
        }
        else if(apr.value != "" && mei.value != "" && jun.value != "") {
            var TW = 2;
        }
        else if(jul.value != "" && agu.value != "" && sep.value != "") {
            var TW = 3;
        }
        else if(okt.value != "" && nov.value != "" && des.value != "") {
            var TW = 4;
        }
        else{
            var TW = 5;
        }

        $(".itungan").keyup(function(){
            switch(TW){
                case 1:
                    jan.value = feb.value = mar.value = Number(gapok.value);
                    jml.value = Number(jan.value) + Number(feb.value) + Number(mar.value) + Number(apr.value) + Number(mei.value) + Number(jun.value) + Number(jul.value) + Number(agu.value) + Number(sep.value) + Number(okt.value) + Number(nov.value) + Number(des.value);
                    break;
                case 2:
                    apr.value = mei.value = jun.value = Number(gapok.value);
                    jml.value = Number(jan.value) + Number(feb.value) + Number(mar.value) + Number(apr.value) + Number(mei.value) + Number(jun.value) + Number(jul.value) + Number(agu.value) + Number(sep.value) + Number(okt.value) + Number(nov.value) + Number(des.value);
                    break;
                case 3:
                    jul.value = agu.value = sep.value = Number(gapok.value);
                    jml.value = Number(jan.value) + Number(feb.value) + Number(mar.value) + Number(apr.value) + Number(mei.value) + Number(jun.value) + Number(jul.value) + Number(agu.value) + Number(sep.value) + Number(okt.value) + Number(nov.value) + Number(des.value);
                    break;
                case 4:
                    okt.value = nov.value = des.value = Number(gapok.value);
                    jml.value = Number(jan.value) + Number(feb.value) + Number(mar.value) + Number(apr.value) + Number(mei.value) + Number(jun.value) + Number(jul.value) + Number(agu.value) + Number(sep.value) + Number(okt.value) + Number(nov.value) + Number(des.value);
                    break;
            }
        }); 

        $(".itungitung").keyup(function(){
            nom.value = jml.value*pajak.value/100;
            diterima.value = Number(jml.value) - Number(nom.value) - Number(bpjs.value);
        }); 
    })
</script>    

@endsection