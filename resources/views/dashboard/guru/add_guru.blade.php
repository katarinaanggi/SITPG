@extends('layouts.main')

@section('page')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last"></div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.guru') }}">Data Guru</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Guru</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
    <form action="{{ route('admin.store_guru') }}" method="post">
        @csrf
        @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <strong>{{ $message }}</strong>
            </div>
        @endif

        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-content">
                    <a href="{{route('admin.guru')}}"><i class="bi bi-x-lg"></i></a>
                    <div class="card-header"><h3 class="text-center">Create New Guru</h3></div>
                    <div class="card-body">
                        <div class="form-group row mb-3">
                            <label for="nrg" class="col-sm-3 col-form-label">NRG: </label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="nrg" name="nrg" value="{{ old('nrg') }}">
                                @error('nrg')
                                    <div class="text-danger">*{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="no_peserta" class="col-sm-3 col-form-label">No. Peserta: </label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="no_peserta" name="no_peserta" value="{{ old('no_peserta') }}">
                                @error('no_peserta')
                                    <div class="text-danger">*{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="nuptk" class="col-sm-3 col-form-label">NUPTK: </label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="nuptk" name="nuptk" value="{{ old('nuptk') }}">
                                @error('nuptk')
                                    <div class="text-danger">*{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="no_sk" class="col-sm-3 col-form-label">No. SK: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="no_sk" name="no_sk" value="{{ old('no_sk') }}">
                                @error('no_sk')
                                    <div class="text-danger">*{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="nama" class="col-sm-3 col-form-label">Nama: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="text-danger">*{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label">Jenjang: </label>
                            <div class="col-sm-9">
                                <label class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" id="s1" name="jenjang" value="pengawas" {{ (old('jenjang') == 'pengawas') ? 'checked' : ''}}> Pengawas <br/>
                                        <input type="radio" class="form-check-input" id="s2" name="jenjang" value="slb" {{ (old('jenjang') == 'slb') ? 'checked' : ''}}> SLB <br/>
                                        <input type="radio" class="form-check-input" id="s3" name="jenjang" value="smk" {{ (old('jenjang') == 'smk') ? 'checked' : ''}}> SMK <br/>
                                        <input type="radio" class="form-check-input" id="s3" name="jenjang" value="sma" {{ (old('jenjang') == 'sma') ? 'checked' : ''}}> SMA <br/>
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
                                <input type="text" class="form-control" id="tempat_tugas" name="tempat_tugas" value="{{ old('tempat_tugas') }}">
                                @error('tempat_tugas')
                                    <div class="text-danger">*{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="kota" class="col-sm-3 col-form-label">Kabupaten/Kota: </label>
                            <div class="col-sm-9">
                                <select class="form-control choices" id="kota" name="kota" >
                                    <option value="">--pilih wilayah kabupaten/kota--</option>
                                    @foreach($kota as $k)
                                        <option value="{{ $k->id }}" {{ old('kota') == $k->id ? 'selected' : ''}}>{{ $k->nama_kota}}</option>
                                    @endforeach
                                </select>
                                @error('kota')
                                    <div class="text-danger">*{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="nip" class="col-sm-3 col-form-label">NIP: </label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="nip" name="nip" value="{{ old('nip') }}">
                                @error('nip')
                                    <div class="text-danger">*{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="nama_bank" class="col-sm-3 col-form-label">Nama Bank: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_bank" name="nama_bank" value="{{ old('nama_bank') }}">
                                @error('nama_bank')
                                    <div class="text-danger">*{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="kantor_cabang" class="col-sm-3 col-form-label">Kantor Cabang: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="kantor_cabang" name="kantor_cabang" value="{{ old('kantor_cabang') }}">
                                @error('kantor_cabang')
                                    <div class="text-danger">*{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="no_rek" class="col-sm-3 col-form-label">No. Rekening: </label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="no_rek" name="no_rek" value="{{ old('no_rek') }}">
                                @error('no_rek')
                                    <div class="text-danger">*{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="nama_rek" class="col-sm-3 col-form-label">Nama Rekening: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_rek" name="nama_rek" value="{{ old('nama_rek') }}">
                                @error('nama_rek')
                                    <div class="text-danger">*{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="pangkat" class="col-sm-3 col-form-label">Pangkat/Golongan: </label>
                            <div class="col-sm-9">
                                <select class="form-control choices" id="pangkat" name="pangkat" >
                                    <option value="">--pilih pangkat/golongan--</option>
                                    <option value="ii/a" {{ old('pangkat') == 'ii/a' ? 'selected' : '' }}>II/A</option>
                                    <option value="ii/b" {{ old('pangkat') == 'ii/b' ? 'selected' : '' }}>II/B</option>
                                    <option value="ii/c" {{ old('pangkat') == 'ii/c' ? 'selected' : '' }}>II/C</option>
                                    <option value="ii/d" {{ old('pangkat') == 'ii/d' ? 'selected' : '' }}>II/D</option>
                                    <option value="iii/a" {{ old('pangkat') == 'iii/a' ? 'selected' : '' }}>III/A</option>
                                    <option value="iii/b" {{ old('pangkat') == 'iii/b' ? 'selected' : '' }}>III/B</option>
                                    <option value="iii/c" {{ old('pangkat') == 'iii/c' ? 'selected' : '' }}>III/C</option>
                                    <option value="iii/d" {{ old('pangkat') == 'iii/d' ? 'selected' : '' }}>III/D</option>
                                    <option value="iv/a" {{ old('pangkat') == 'iv/a' ? 'selected' : '' }}>IV/A</option>
                                    <option value="iv/b" {{ old('pangkat') == 'iv/b' ? 'selected' : '' }}>IV/B</option>
                                    <option value="iv/c" {{ old('pangkat') == 'iv/c' ? 'selected' : '' }}>IV/C</option>
                                    <option value="iv/d" {{ old('pangkat') == 'iv/d' ? 'selected' : '' }}>IV/D</option>
                                </select>
                                @error('pangkat')
                                    <div class="text-danger">*{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="masa_kerja" class="col-sm-3 col-form-label">Masa Kerja: </label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="masa_kerja" name="masa_kerja" value="{{ old('masa_kerja') }}">
                                @error('masa_kerja')
                                    <div class="text-danger">*{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="itung">

                            <div class="form-group row mb-3">
                                <label for="gaji_pokok" class="col-sm-3 col-form-label">Gaji Pokok: </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok" value="{{ old('gaji_pokok') }}">
                                    @error('gaji_pokok')
                                        <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="triw" class="col-sm-3 col-form-label">Triwulan: </label>
                                <div class="col-sm-9">
                                    <select class="form-control choices" id="triw" name="triw" >
                                        <option value="">--pilih triwulan--</option>
                                        <option value="1" {{ old('triw') == '1' ? 'selected' : '' }}>I</option>
                                        <option value="2" {{ old('triw') == '2' ? 'selected' : '' }}>II</option>
                                        <option value="3" {{ old('triw') == '3' ? 'selected' : '' }}>III</option>
                                        <option value="4" {{ old('triw') == '4' ? 'selected' : '' }}>IV</option>
                                    </select>
                                    @error('triw')
                                        <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="tw-I">
                                <div class="form-group row mb-3">
                                    <label for="jan" class="col-sm-3 col-form-label">Januari: </label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="jan" name="jan" value="{{ old('jan') }}">
                                        @error('gaji_pokok')
                                            <div class="text-danger">*Gaji for Januari is required</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="feb" class="col-sm-3 col-form-label">Februari: </label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="feb" name="feb" value="{{ old('feb') }}">
                                        @error('gaji_pokok')
                                            <div class="text-danger">*Gaji for Februari is required</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="mar" class="col-sm-3 col-form-label">Maret: </label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="mar" name="mar" value="{{ old('mar') }}">
                                        @error('gaji_pokok')
                                            <div class="text-danger">*Gaji for Maret is required</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="tw-II" style="display: none">
                                <div class="form-group row mb-3">
                                    <label for="apr" class="col-sm-3 col-form-label">April: </label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="apr" name="apr" value="{{ old('apr') }}">
                                        @error('gaji_pokok')
                                            <div class="text-danger">*Gaji for April is required</div>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row mb-3">
                                    <label for="mei" class="col-sm-3 col-form-label">Mei: </label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="mei" name="mei" value="{{ old('mei') }}">
                                        @error('gaji_pokok')
                                            <div class="text-danger">*Gaji for Mei is required</div>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row mb-3">
                                    <label for="jun" class="col-sm-3 col-form-label">Juni: </label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="jun" name="jun" value="{{ old('jun') }}">
                                        @error('gaji_pokok')
                                            <div class="text-danger">*Gaji for Juni is required</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="tw-III" style="display: none">
                                <div class="form-group row mb-3">
                                    <label for="jul" class="col-sm-3 col-form-label">Juli: </label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="jul" name="jul" value="{{ old('jul') }}">
                                        @error('gaji_pokok')
                                            <div class="text-danger">*Gaji for Juli is required</div>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row mb-3">
                                    <label for="agu" class="col-sm-3 col-form-label">Agustus: </label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="agu" name="agu" value="{{ old('agu') }}">
                                        @error('gaji_pokok')
                                            <div class="text-danger">*Gaji for Agustus is required</div>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row mb-3">
                                    <label for="sep" class="col-sm-3 col-form-label">September: </label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="sep" name="sep" value="{{ old('sep') }}">
                                        @error('gaji_pokok')
                                            <div class="text-danger">*Gaji for September is required</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="tw-IV" style="display: none">
                                <div class="form-group row mb-3">
                                    <label for="okt" class="col-sm-3 col-form-label">Oktober: </label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="okt" name="okt" value="{{ old('okt') }}">
                                        @error('gaji_pokok')
                                            <div class="text-danger">*Gaji for Oktober is required</div>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row mb-3">
                                    <label for="nov" class="col-sm-3 col-form-label">November: </label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="nov" name="nov" value="{{ old('nov') }}">
                                        @error('gaji_pokok')
                                            <div class="text-danger">*Gaji for November is required</div>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row mb-3">
                                    <label for="des" class="col-sm-3 col-form-label">Desember: </label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="des" name="des" value="{{ old('des') }}">
                                        @error('gaji_pokok')
                                            <div class="text-danger">*Gaji for Desember is required</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="jumlah" class="col-sm-3 col-form-label">Jumlah: </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah') }}">
                                    @error('jumlah')
                                        <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="pajak" class="col-sm-3 col-form-label">Pajak (%): </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="pajak" name="pajak" value="{{ old('pajak') }}">
                                    @error('pajak')
                                        <div class="text-danger">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="form-group row mb-3">
                            <label for="nom_pajak" class="col-sm-3 col-form-label">Nominal Pajak: </label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="nom_pajak" name="nom_pajak" value="{{ old('nom_pajak') }}">
                                @error('nom_pajak')
                                    <div class="text-danger">*{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="bpjs" class="col-sm-3 col-form-label">BPJS (Max 1%): </label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="bpjs" name="bpjs" value="{{ old('bpjs') }}">
                                @error('bpjs')
                                    <div class="text-danger">*{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="jumlah_diterima" class="col-sm-3 col-form-label">Jumlah Diterima: </label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="jumlah_diterima" name="jumlah_diterima" value="{{ old('jumlah_diterima') }}">
                                @error('jumlah_diterima')
                                    <div class="text-danger">*{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" name="submit" class="btn btn-save btn-block mt-4">
                            Add New User
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        // Format mata uang.
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

        $(".itung").keyup(function(){
            var triw = $('#triw').find(":selected").text();
            switch(triw){
                case 'I':
                    $(".tw-I").show();
                    $(".tw-II").hide();
                    $(".tw-III").hide();
                    $(".tw-IV").hide();
                    jan.value = feb.value = mar.value = gapok.value;
                    apr.value = mei.value = jun.value = jul.value = agu.value = sep.value = okt.value = nov.value = des.value = 0;
                    jml.value = Number(jan.value) + Number(feb.value) + Number(mar.value);
                    break;
                case 'II':
                    $(".tw-I").hide();
                    $(".tw-II").show();
                    $(".tw-III").hide();
                    $(".tw-IV").hide();
                    apr.value = mei.value = jun.value = gapok.value;
                    jan.value = feb.value = mar.value = jul.value = agu.value = sep.value = okt.value = nov.value = des.value = 0;
                    jml.value = Number(apr.value) + Number(mei.value) + Number(jun.value);
                    break;
                case 'III':
                    $(".tw-I").hide();
                    $(".tw-II").hide();
                    $(".tw-III").show();
                    $(".tw-IV").hide();
                    jul.value = agu.value = sep.value = gapok.value;
                    jan.value = feb.value = mar.value = apr.value = mei.value = jun.value = okt.value = nov.value = des.value = 0;
                    jml.value = Number(jul.value) + Number(agu.value) + Number(sep.value);
                    break;
                case 'IV':
                    $(".tw-I").hide();
                    $(".tw-II").hide();
                    $(".tw-III").hide();
                    $(".tw-IV").show();
                    okt.value = nov.value = des.value = gapok.value;
                    jan.value = feb.value = mar.value = apr.value = mei.value = jun.value = jul.value = agu.value = sep.value = 0;
                    jml.value = Number(okt.value) + Number(nov.value) + Number(des.value);
                    break;
            }
            nom.value = jml.value*pajak.value/100;
            diterima.value = Number(jml.value) - Number(nom.value) - Number(bpjs.value);
        });
        $("#triw").change(function(){
            var triw = $('#triw').find(":selected").text();
            switch(triw){
                case 'I':
                    $(".tw-I").show();
                    $(".tw-II").hide();
                    $(".tw-III").hide();
                    $(".tw-IV").hide();
                    jan.value = feb.value = mar.value = gapok.value;
                    apr.value = mei.value = jun.value = jul.value = agu.value = sep.value = okt.value = nov.value = des.value = 0;
                    jml.value = Number(jan.value) + Number(feb.value) + Number(mar.value);
                    break;
                case 'II':
                    $(".tw-I").hide();
                    $(".tw-II").show();
                    $(".tw-III").hide();
                    $(".tw-IV").hide();
                    apr.value = mei.value = jun.value = gapok.value;
                    jan.value = feb.value = mar.value = jul.value = agu.value = sep.value = okt.value = nov.value = des.value = 0;
                    jml.value = Number(apr.value) + Number(mei.value) + Number(jun.value);
                    break;
                case 'III':
                    $(".tw-I").hide();
                    $(".tw-II").hide();
                    $(".tw-III").show();
                    $(".tw-IV").hide();
                    jul.value = agu.value = sep.value = gapok.value;
                    jan.value = feb.value = mar.value = apr.value = mei.value = jun.value = okt.value = nov.value = des.value = 0;
                    jml.value = Number(jul.value) + Number(agu.value) + Number(sep.value);
                    break;
                case 'IV':
                    $(".tw-I").hide();
                    $(".tw-II").hide();
                    $(".tw-III").hide();
                    $(".tw-IV").show();
                    okt.value = nov.value = des.value = gapok.value;
                    jan.value = feb.value = mar.value = apr.value = mei.value = jun.value = jul.value = agu.value = sep.value = 0;
                    jml.value = Number(okt.value) + Number(nov.value) + Number(des.value);
                    break;
            }
        });
        $("#bpjs").keyup(function(){
            diterima.value = Number(jml.value) - Number(nom.value) - Number(this.value);
        });        
    })
</script>    
@endsection