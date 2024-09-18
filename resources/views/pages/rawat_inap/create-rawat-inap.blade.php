@extends('layouts/form_layouts')
@section('form_layouts')
<!-- Page Content  -->
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden" >
    <div class="container-fluid py-1">
        <h1 class="fw-bolder m-1 " style="font-family: 'Roboto', 'Helvetica', 'Arial', 'sans-serif'; font-size:48px; color:#344767;">Enggal Saras</h1>
        <div class="row">
            <div class="mt-4"> 
                <form action="" method="post">
                    @csrf
                    <div class="card my-3  border border-0">
                        <div class="card-header p-0 position-relative border border-0 mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">CREATE RAWAT INAP</h6>
                            </div>
                        </div>
                        <div class="card-body px-5 pb-2">
                            <div class="form"  style="background-color:#FDFEFD;">
                                <div class="content">                                 
                                    <div class="d-flex flex-column">
                                        <div class="d-flex col-lg-12 mb-4">
                                            <div class="col-lg-12 col-xl-12 col-xxl-12 me-0 row">

                                                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                    <div class="d-flex">
                                                        <label for="date_now" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">Tanggal & Jam :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <div class="d-flex">
                                                                <div class="col-md-7 col-lg-9">
                                                                    <input type="date_now" class="form-control @error('date_now') is-invalid @enderror" id="date_now" name="date_now" value="" readonly>      
                                                                </div>
                                                                <div class="col-lg-3 ms-3">
                                                                    <input type="" class="form-control @error('time_now') is-invalid @enderror" id="time_now" name="time_now" value="" readonly>      
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 mb-3">
                                                    <div class="d-flex">
                                                        <label for="no_antrian" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">No Antrian :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <input type="text" class="form-control @error('no_antrian') is-invalid @enderror" id="no_antrian" name="no_antrian" value="{{$registPasien->no_antrian}}" readonly>
                                                            @error('no_antrian')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                        
                                            </div>

                                        </div>   
                                        <div class="d-flex col-lg-6 mb-4">
                                            <div class="col-lg-12 col-xl-12 col-xxl-12 me-0 row">

                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="code" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Kode Rawat Inap :</label>
                                                        <label>autogenerate</label>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="no_rm" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">Nomor Med. Record :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <input type="text" class="form-control @error('no_rm') is-invalid @enderror" id="no_rm" name="no_rm" value="{{$registPasien->no_rm}}" readonly>
                                                            @error('no_rm')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3 d-none">
                                                    <div class="d-flex">
                                                        <label for="regist_code" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">No Regist :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <input type="text" class="form-control @error('regist_code') is-invalid @enderror" id="regist_code" name="regist_code" value="{{$registPasien->regist_code}}" readonly>
                                                            @error('regist_code')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3 d-none">
                                                    <div class="d-flex">
                                                        <label for="no_reservasi" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">No Reservasi :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <input type="text" class="form-control @error('no_reservasi') is-invalid @enderror" id="no_reservasi" name="no_reservasi" value="{{$registPasien->no_reservasi}}" readonly>
                                                            @error('no_reservasi')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="pasien_name" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Nama Pasien :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <input type="text" class="form-control @error('pasien_name') is-invalid @enderror" id="pasien_name" name="pasien_name" value="{{$registPasien->pasien_name}}" readonly>
                                                            @error('pasien_name')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                    <div class="d-flex">
                                                        <label for="jaminan" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">Jaminan :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <select class="form-select @error('jaminan') is-invalid @enderror" name="jaminan"  id="jaminan">
                                                                <option value="">Please Select</option>
                                                                @foreach ($jaminan as $jaminan)
                                                                    <option value="{{$jaminan->nama_jaminan}}" {{$jaminan->nama_jaminan == $registPasien->jaminan ? 'selected' : ''}}>{{$jaminan->nama_jaminan}}</option>
                                                                @endforeach
                                                            </select>          
                                                            @error('jaminan')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                        
                                                {{-- <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                    <div class="d-flex">
                                                        <label for="layanan" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">Layanan :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <select class="form-select @error('layanan') is-invalid @enderror" name="layanan" id="layananSelect">
                                                                <option value="">Please Select</option>
                                                                @foreach ($layanan as $layanan)
                                                                    <option value="{{ $layanan->id }}" {{$layanan->nama_layanan == $registPasien->layanan ? 'selected' : ''}}>{{ $layanan->nama_layanan }}</option>
                                                                @endforeach
                                                            </select>          
                                                            @error('layanan')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                
                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                    <div class="d-flex">
                                                        <label for="layanan_id" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">Layanan :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <select class="form-select @error('layanan_id') is-invalid @enderror" name="layanan_id" id="layananSelect">
                                                                <option value="">Please Select</option>
                                                                @foreach ($layanan as $item)
                                                                    <option value="{{ $item->id }}" {{$item->kode_layanan == 'LM-00003' ? 'selected' : ''}}>{{ $item->nama_layanan }}</option>
                                                                @endforeach
                                                            </select>          
                                                            @error('layanan_id')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                    <div class="d-flex">
                                                        <label for="dokter_code" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">Dokter :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <select id="dokterSelect" class="form-select @error('dokter_code') is-invalid @enderror" name="dokter_code">
                                                                <option value="">Please Select</option>
                                                            </select>          
                                                            @error('dokter_code')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-xl-12 col-xxl-12 me-0 row">
                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="perawat_code" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Perawat :</label>
                                                        
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <select class="form-select @error('perawat_code') is-invalid @enderror" name="perawat_code" id="perawat_code">
                                                                <option value="">please select</option>
                                                                @foreach ($perawat as $perawat)
                                                                    <option value="{{$perawat->perawat_code}}">{{$perawat->nama_lengkap}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('perawat_code')
                                                                <div class="invalid-feedback d-block">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="no_bpjs" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">No. BPJS :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <input type="text" class="form-control @error('no_bpjs') is-invalid @enderror" id="no_bpjs" name="no_bpjs" value="{{$registPasien->no_bpjs}}" readonly>
                                                            @error('no_bpjs')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="tarif_pendaftaran" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Biaya Daftar :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <select class="form-select @error('tarif_pendaftaran') is-invalid @enderror" name="tarif_pendaftaran" id="tarif_pendaftaran">
                                                                <option value="">please select</option>
                                                                @foreach ($tarifPendaftaran as $tarif)
                                                                    <option value="{{ $tarif->code_pendaftaran }}" data-harga="{{ $tarif->total_tarif }}">{{ $tarif->nama_pendaftaran }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('tarif_pendaftaran')
                                                                <div class="invalid-feedback d-block">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="biaya" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Biaya :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <input type="text" class="form-control @error('biaya') is-invalid @enderror" id="biaya" name="biaya" value="" readonly>
                                                            @error('biaya')
                                                                <div class="invalid-feedback d-block">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="jam_praktek" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Jadwal Praktik :</label>
                                                        
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <select class="form-select @error('jam_praktek') is-invalid @enderror" name="jam_praktek" id="jam_praktek">
                                                                <option value="">please select</option>
                                                                <option value="PAGI" {{ old('jam_praktek') == 'PAGI' ? 'selected' : '' }}>PAGI</option>
                                                                <option value="SORE-MALAM" {{ old('jam_praktek') == 'SORE-MALAM' ? 'selected' : '' }}>SORE MALAM</option>
                                                            </select>
                                                            @error('jam_praktek')
                                                                <div class="invalid-feedback d-block">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="keterangan_rujukan" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Keterangan Rujukan :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <textarea class="form-control @error('keterangan_rujukan') is-invalid @enderror" id="keterangan_rujukan" name="keterangan_rujukan"cols="30" rows="2"></textarea>
                                                            @error('keterangan_rujukan')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card my-3  border border-0">
                        <div class="card-body px-5 pb-2">
                            <div class="form"  style="background-color:#FDFEFD;">
                                <div class="content">
                                    <div class="d-flex flex-column">
                                        <div class="col-lg-12 d-flex">
                                            <div class="d-flex col-lg-6 mb-4">
                                                <div class="col-lg-12 col-xl-12 col-xxl-12 me-0 row">
    
                                                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                        <div class="d-flex">
                                                            <label for="jenis_kunjungan" class="form-label col-lg-3 col-xl-3 col-xxl-3">Jenis Kunjungan :</label>
                                                            
                                                            <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                                <select class="form-select @error('jenis_kunjungan') is-invalid @enderror" name="jenis_kunjungan" id="jenis_kunjungan">
                                                                    <option value="">please select</option>
                                                                    <option value="Kunjungan Sakit">Kunjungan Sakit</option>
                                                                    <option value="Kunjungan Sehat">Kunjungan Sehat</option>
                                                                </select>
                                                                @error('jenis_kunjungan')
                                                                    <div class="invalid-feedback d-block">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                        <div class="d-flex gap-1">
                                                            <div class="col-lg-6 d-flex">
                                                                <label for="saturasi_oksigen" class="form-label col-lg-6 col-xl-6 col-xxl-6">Saturasi Oksigen(SpO2):</label>
                                                                <div class="d-flex col-lg-5">
                                                                    <input type="text" class="form-control  @error('saturasi_oksigen') is-invalid @enderror" style="border-radius:5px 0 0 5px;" id="saturasi_oksigen" name="saturasi_oksigen" value="{{ old('saturasi_oksigen') }}">
                                                                    <span class="input-group-text" style="border-radius:0 5px 5px 0;" id="addon-wrapping">%</span>
                                                                    @error('saturasi_oksigen')
                                                                    <div class="invalid-feedback d-block">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 d-flex">
                                                                <label for="suhu" class="form-label col-lg-3 col-xl-3 col-xxl-3">Suhu:</label>
                                                                <div class="d-flex col-lg-5">
                                                                    <input type="text" class="form-control  @error('suhu') is-invalid @enderror" style="border-radius:5px 0 0 5px;" id="suhu" name="suhu" value="{{ old('suhu') }}">
                                                                    <span class="input-group-text" style="border-radius:0 5px 5px 0;" id="addon-wrapping">&deg;C</span>
                                                                    @error('suhu')
                                                                    <div class="invalid-feedback d-block">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                        <div class="d-flex gap-1">
                                                            <div class="col-lg-6 d-flex">
                                                                <label for="tinggi_badan" class="form-label col-lg-6 col-xl-6 col-xxl-6">Tinggi Badan:</label>
                                                                <div class="d-flex col-lg-5">
                                                                    <input type="text" class="form-control  @error('tinggi_badan') is-invalid @enderror" style="border-radius:5px 0 0 5px;" id="tinggi_badan"  oninput="hitungIMT()" name="tinggi_badan" value="{{ old('tinggi_badan') }}">
                                                                    <span class="input-group-text" style="border-radius:0 5px 5px 0;" id="addon-wrapping">cm</span>
                                                                    @error('tinggi_badan')
                                                                    <div class="invalid-feedback d-block">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 d-flex">
                                                                <label for="berat_badan" class="form-label col-lg-3 col-xl-3 col-xxl-3">Berat Badan:</label>
                                                                <div class="d-flex col-lg-5">
                                                                    <input type="text" class="form-control  @error('berat_badan') is-invalid @enderror" style="border-radius:5px 0 0 5px;" id="berat_badan"  oninput="hitungIMT()" name="berat_badan" value="{{ old('berat_badan') }}">
                                                                    <span class="input-group-text" style="border-radius:0 5px 5px 0;" id="addon-wrapping">kg</span>
                                                                    @error('berat_badan')
                                                                    <div class="invalid-feedback d-block">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                    
                                                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                        <div class="d-flex gap-1">
                                                            <div class="col-lg-6 d-flex">
                                                                <label for="lingkar_perut" class="form-label col-lg-6 col-xl-6 col-xxl-6">Lingkat Perut:</label>
                                                                <div class="d-flex col-lg-5">
                                                                    <input type="text" class="form-control  @error('lingkar_perut') is-invalid @enderror" style="border-radius:5px 0 0 5px;" id="lingkar_perut" name="lingkar_perut" value="{{ old('lingkar_perut') }}">
                                                                    <span class="input-group-text" style="border-radius:0 5px 5px 0;" id="addon-wrapping">cm</span>
                                                                    @error('lingkar_perut')
                                                                    <div class="invalid-feedback d-block">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 d-flex">
                                                                <label for="imt" class="form-label col-lg-3 col-xl-3 col-xxl-3">IMT:</label>
                                                                <div class="d-flex col-lg-5">
                                                                    <input type="text" class="form-control  @error('imt') is-invalid @enderror" style="border-radius:5px 0 0 5px;" id="imt" name="imt" value="{{ old('imt') }}">
                                                                    <span class="input-group-text" style="border-radius:0 5px 5px 0;" id="addon-wrapping">kg/m2</span>
                                                                    @error('imt')
                                                                    <div class="invalid-feedback d-block">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>   
    
                                            <div class="d-flex col-lg-6 mb-4">
                                                <div class="col-lg-12 col-xl-12 col-xxl-12 me-0 row">
    
                                                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                        <div class="d-flex">
                                                            <label for="keluhan" class="form-label col-lg-3 col-xl-3 col-xxl-3">Keluhan :</label>
                                                            
                                                            <div class="d-flex flex-column  col-lg-7">
                                                                    <textarea class="form-control @error('keluhan') is-invalid @enderror" id="keluhan" name="keluhan"cols="25" rows="1"></textarea>
                                                                    @error('keluhan')
                                                                    <div class="invalid-feedback d-block">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                        <div class="d-flex gap-1">
                                                            <div class="col-lg-6 d-flex">
                                                                <label for="sistole" class="form-label col-lg-6 col-xl-6 col-xxl-6">Sistole:</label>
                                                                <div class="d-flex col-lg-5">
                                                                    <input type="text" class="form-control  @error('sistole') is-invalid @enderror" style="border-radius:5px 0 0 5px;" id="sistole" name="sistole" value="{{ old('sistole') }}">
                                                                    <span class="input-group-text" style="border-radius:0 5px 5px 0;" id="addon-wrapping">mmHg</span>
                                                                    @error('sistole')
                                                                    <div class="invalid-feedback d-block">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 d-flex">
                                                                <label for="diastole" class="form-label col-lg-3 col-xl-3 col-xxl-3">Diastole:</label>
                                                                <div class="d-flex col-lg-5">
                                                                    <input type="text" class="form-control  @error('diastole') is-invalid @enderror" style="border-radius:5px 0 0 5px;" id="diastole" name="diastole" value="{{ old('diastole') }}">
                                                                    <span class="input-group-text" style="border-radius:0 5px 5px 0;" id="addon-wrapping">&deg;mmHg</span>
                                                                    @error('diastole')
                                                                    <div class="invalid-feedback d-block">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                        <div class="d-flex gap-1">
                                                            <div class="col-lg-6 d-flex">
                                                                <label for="respiratory_rate" class="form-label col-lg-6 col-xl-6 col-xxl-6">Respiratory Rate:</label>
                                                                <div class="d-flex col-lg-5">
                                                                    <input type="text" class="form-control  @error('respiratory_rate') is-invalid @enderror" style="border-radius:5px 0 0 5px;" id="respiratory_rate" name="respiratory_rate" value="{{ old('respiratory_rate') }}">
                                                                    <span class="input-group-text" style="border-radius:0 5px 5px 0;" id="addon-wrapping">/minute</span>
                                                                    @error('respiratory_rate')
                                                                    <div class="invalid-feedback d-block">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 d-flex">
                                                                <label for="heart_rate" class="form-label col-lg-3 col-xl-3 col-xxl-3">Heart Rate
                                                                    :</label>
                                                                <div class="d-flex col-lg-5">
                                                                    <input type="text" class="form-control  @error('heart_rate') is-invalid @enderror" style="border-radius:5px 0 0 5px;" id="heart_rate" name="heart_rate" value="{{ old('heart_rate') }}">
                                                                    <span class="input-group-text" style="border-radius:0 5px 5px 0;" id="addon-wrapping">bpm</span>
                                                                    @error('heart_rate')
                                                                    <div class="invalid-feedback d-block">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                    
                                                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                        <div class="d-flex gap-1">
                                                            <div class="col-lg-6 d-flex">
                                                                <label for="lingkar_kepala" class="form-label col-lg-6 col-xl-6 col-xxl-6">Lingkar Kepala:</label>
                                                                <div class="d-flex col-lg-5">
                                                                    <input type="text" class="form-control  @error('lingkar_kepala') is-invalid @enderror" style="border-radius:5px 0 0 5px;" id="lingkar_kepala" name="lingkar_kepala" value="{{ old('lingkar_kepala') }}">
                                                                    <span class="input-group-text" style="border-radius:0 5px 5px 0;" id="addon-wrapping">cm</span>
                                                                    @error('lingkar_kepala')
                                                                    <div class="invalid-feedback d-block">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>   
                                        </div>
                                        <div class="col-lg-12">
                                            <a href="/pasien/data-regist-pasien" class="btn btn-danger col-lg-1 ms-1">Cancel</a>
                                            <button type="submit" class="btn btn-success col-lg-1" style="position:absolute; right:2%">Save</button>
                                        </div> 

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>

<style>
    .popup {
        display: none; /* Tersembunyi secara default */
        position: fixed;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 1300px;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0);
        border-radius: 8px;
        z-index: 1000;
        opacity: 0; /* Tambahkan opacity untuk transisi smooth */
        transition: opacity 0.5s ease; /* Transisi smooth selama 0.5 detik */
    }

    /* Background untuk overlay */
    .overlay {
        display: none; /* Tersembunyi secara default */
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 999;
        opacity: 0; /* Tambahkan opacity untuk transisi smooth */
        transition: opacity 0.5s ease; /* Transisi smooth selama 0.5 detik */
    }

    /* Tombol untuk menutup popup */
    .close-btn {
        background-color: red;
        color: white;
        padding: 5px 10px;
        border: none;
        cursor: pointer;
        float: right;
    }
</style>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#mySelect').select2({
            placeholder: "Please Select",
            });
    });

    function openPopup() {
        var popup = document.getElementById('popup');
        var overlay = document.getElementById('overlay');
        
        popup.style.display = 'block'; // Tampilkan popup
        overlay.style.display = 'block'; // Tampilkan overlay

        // Menggunakan setTimeout untuk memberi waktu transisi opacity
        setTimeout(function() {
            popup.style.opacity = '1';
            overlay.style.opacity = '1';
        }, 10); // Sedikit penundaan untuk memicu transisi
    }

    // JavaScript untuk menutup popup
    function closePopup() {
        var popup = document.getElementById('popup');
        var overlay = document.getElementById('overlay');
        
        popup.style.opacity = '0'; // Ubah opacity menjadi 0
        overlay.style.opacity = '0';

        // Setelah transisi selesai, sembunyikan elemen
        setTimeout(function() {
            popup.style.display = 'none';
            overlay.style.display = 'none';
        }, 500); // Pastikan ini sesuai dengan durasi transisi (0.5 detik)
    }

    $(document).ready(function() {
        $('#mySelect').select2({
            placeholder: "Please Select",
        });
    });
    // // Event handler untuk ketika opsi berubah
    $('#mySelect').on('change', function() {
        var noRekamMedis = $(this).val(); // Mendapatkan nilai yang dipilih
        
        // Cek jika ada nomor rekam medis yang dipilih
        if (noRekamMedis) {
            // AJAX untuk mengambil data pasien
            $.ajax({
                url: '/getPatientData/' + noRekamMedis, // Ganti dengan URL endpoint Laravel Anda
                method: 'GET',
                success: function(data) {
                    // Mengisi input fields dengan data yang diterima dari server
                    $('#pasien_name').val(data.nama_lengkap);
                    $('#address').val(data.alamat);
                    $('#phone_no').val(data.telepon);
                    $('#gender').val(data.jenis_kelamin);
                    $('#no_bpjs').val(data.no_bpjs_asuransi);
                },
                error: function(err) {
                    console.error('Error fetching data:', err);
                }
            });
        } else {
            // Kosongkan input fields jika tidak ada pilihan
            $('#pasien_name').val('');
            $('#address').val('');
            $('#phone_no').val('');
            $('#gender').val('');
        }
    });

    $(document).ready(function() {
        $('#dokter').select2({
            placeholder: "Pleas Select",
        });
    });
    
    $(document).ready(function() {
        // Mendapatkan ID layanan yang dipilih saat halaman dimuat
        var layananId = $('#layananSelect').val(); 

        // Jika layanan sudah dipilih (tidak kosong), panggil fungsi untuk mendapatkan dokter
        if (layananId) {
            getDoctorsByLayanan(layananId);
        }

        // Event listener untuk perubahan pada dropdown layanan
        $('#layananSelect').change(function() {
            layananId = $(this).val(); // Dapatkan ID layanan yang dipilih
            getDoctorsByLayanan(layananId); // Panggil fungsi untuk mendapatkan dokter
        });

        // Fungsi untuk mengambil dan menampilkan dokter berdasarkan layanan
        function getDoctorsByLayanan(layananId) {
            // AJAX request untuk mendapatkan data dokter berdasarkan layanan yang dipilih
            $.ajax({
                url: '/getDoctorsByLayanan/' + layananId, // Endpoint baru
                method: 'GET',
                success: function(data) {
                    // Kosongkan dropdown dokter terlebih dahulu
                    $('#dokterSelect').empty();

                    // Tambahkan opsi default kembali
                    $('#dokterSelect').append('<option value="">Please Select</option>');

                    // Isi dropdown dokter dengan data yang diterima dari server
                    data.forEach(function(dokter) {
                        $('#dokterSelect').append('<option value="' + dokter.no_dokter + '">' + dokter.nama_lengkap + '</option>');
                    });
                },
                error: function(err) {
                    console.error('Error fetching doctors:', err);
                }
            });
        }
    });


    document.addEventListener("DOMContentLoaded", function() {
        // Dapatkan tanggal dan waktu saat ini
        var now = new Date();
        
        // Format tanggal sebagai YYYY-MM-DD
        var date = now.toISOString().split('T')[0];
        
        // Format waktu sebagai HH:MM
        var time = now.toTimeString().split(' ')[0].slice(0, 5);

        // Set nilai input date dan time
        document.getElementById('date_now').value = date;
        document.getElementById('time_now').value = time;
    });

    $(document).ready(function() {
        // Fungsi untuk memformat angka menjadi format mata uang
        function formatRupiah(angka) {
            return 'Rp. ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        }

        // Saat pilihan pada dropdown tarif_pendaftaran berubah
        $('#tarif_pendaftaran').change(function() {
            // Ambil harga dari option yang dipilih
            var selectedOption = $(this).find('option:selected');
            var harga = selectedOption.data('harga'); // Menggunakan data-harga
            
            // Format harga ke format rupiah dan set nilai input biaya
            $('#biaya').val(formatRupiah(harga));
        });
    });

    function hitungIMT() {
        var beratBadan = parseFloat(document.getElementById('berat_badan').value);
        var tinggiBadan = parseFloat(document.getElementById('tinggi_badan').value);

        if (isNaN(beratBadan) || isNaN(tinggiBadan) || tinggiBadan <= 0) {
            // Jika input tidak valid, kosongkan nilai IMT
            document.getElementById('imt').value = '';
            return;
        }

        tinggiBadan = tinggiBadan / 100;
        var imt = beratBadan / (tinggiBadan * tinggiBadan);
        document.getElementById('imt').value = imt.toFixed(2);
    }

    $(document).ready(function() {
        function toggleJamPraktek(layananName) {
            if (layananName === 'RAWAT INAP') {
                $('#jam_praktek').prop('disabled', true);  // Nonaktifkan dropdown jam_praktek
            } else {
                $('#jam_praktek').prop('disabled', false); // Aktifkan dropdown jam_praktek
            }
        }

        // Pada saat halaman dimuat, cek apakah layanan yang dipilih adalah 'LM-00003'
        var selectedLayanan = $('#layananSelect option:selected').text(); 
        toggleJamPraktek(selectedLayanan.trim());

        // Event listener untuk perubahan pada dropdown layanan
        $('#layananSelect').change(function() {
            var layananName = $(this).find('option:selected').text().trim(); // Dapatkan kode layanan yang dipilih
            toggleJamPraktek(layananName); // Panggil fungsi untuk menonaktifkan/aktifkan jam_praktek
        });
    });
</script>
@endsection