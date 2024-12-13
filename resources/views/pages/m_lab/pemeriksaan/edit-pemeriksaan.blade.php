@extends('layouts/form_layouts')
@section('form_layouts')
<!-- Page Content  -->
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden" >
    <style>
        .dataTables_wrapper .dataTables_paginate, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_length{
            display: none;
        }
    </style>
    <div class="container-fluid py-1">
        <h1 class="fw-bolder m-1 " style="font-family: 'Roboto', 'Helvetica', 'Arial', 'sans-serif'; font-size:48px; color:#344767;">Enggal Saras</h1>
        <div class="row">
          <div class="mt-4"> 
            <div class="card my-3  border border-0">
              <div class="card-header p-0 position-relative border border-0 mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">Edit Pemeriksaan Lab</h6>
                </div>
              </div>
              <div class="card-body px-5 pb-2">
                <div class="form"  style="background-color:#FDFEFD;">
                    <div class="content">
                        <form action="{{route('update-pemeriksaan-lab', ['uuid' => $data['dataPemeriksaanLab']->uuid])}}" method="post" class="d-flex col-lg-12"> 
                            @method('put')
                            @csrf     
                            <div class="d-flex flex-column">

                                <div class="d-flex col-lg-12 mb-4">
                                    <div class="col-lg-12 col-xl-12 col-xxl-12 me-0 row">

                                        <div class="col-md-9 col-lg-9 col-xl-9 col-xxl-9 mb-3">
                                            <div class="d-flex">
                                                <label for="code" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Kode Pemeriksaan Lab :</label>
                                                <div class="d-flex flex-column col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                    <input type="text" class="form-control" id="code" name="code" value="{{ $data['dataPemeriksaanLab']->code}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-9 col-lg-9 col-xl-9 col-xxl-9 mb-3">
                                            <div class="d-flex">
                                                <label for="name" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Nama Pemeriksaan Lab :</label>
                                                <div class="d-flex flex-column col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $data['dataPemeriksaanLab']->name}}">
                                                    @error('name')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-lg-9 col-xl-9 col-xxl-9 mb-3">
                                            <div class="d-flex">
                                                <label for="jenis" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Jenis :</label>
                                                <div class="d-flex flex-column col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                    <select class="form-select @error('jenis') is-invalid @enderror" name="jenis"  id="jenis">
                                                        <option value="">Please Select</option>
                                                        <option value="Pemeriksaan" {{$data['dataPemeriksaanLab']->jenis== 'Pemeriksaan' ? 'selected' : ''}}>Pemeriksaan</option>
                                                        <option value="Kelompok" {{$data['dataPemeriksaanLab']->jenis== 'Kelompok' ? 'selected' : ''}}>Kelompok</option>
                                                    </select>          
                                                    @error('jenis')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-lg-9 col-xl-9 col-xxl-9 mb-3">
                                            <div class="d-flex">
                                                <label for="kelompok" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Kelompok :</label>
                                                <div class="d-flex flex-column col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                    <select class="form-select @error('kelompok') is-invalid @enderror" name="kelompok"  id="kelompok">
                                                        <option value="">Please Select</option>
                                                        @foreach ($data['kelompok'] as $item)
                                                            <option value="{{$item->kelompok}}" {{$data['dataPemeriksaanLab']->kelompok== $item->kelompok ? 'selected' : ''}}>{{$item->kelompok}}</option>
                                                        @endforeach
                                                    </select>          
                                                    @error('kelompok')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-lg-9 col-xl-9 col-xxl-9 mb-3">
                                            <div class="d-flex">
                                                <label for="satuan" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Satuan :</label>
                                                <div class="d-flex flex-column col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                    <select class="form-select @error('satuan') is-invalid @enderror" name="satuan"  id="satuan">
                                                        <option value="">Please Select</option>
                                                        @foreach ($data['satuan'] as $item)
                                                            <option value="{{$item->satuan}}" {{$data['dataPemeriksaanLab']->satuan == $item->satuan ? 'selected' : ''}}>{{$item->satuan}}</option>
                                                        @endforeach
                                                    </select>          
                                                    @error('satuan')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-lg-9 col-xl-9 col-xxl-9 mb-3">
                                            <div class="d-flex">
                                                <label for="keterangan" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Keterangan :</label>
                                                <div class="d-flex flex-column col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                    <textarea name="keterangan" class="form-control" id="" cols="30" rows="2">{{$data['dataPemeriksaanLab']->keterangan}}</textarea>        
                                                    @error('keterangan')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-lg-9 col-xl-9 col-xxl-9 mb-3">
                                            <div class="d-flex">
                                                <label for="hasil_rahasia" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Hasil Bersifat Rahasian :</label>
                                                <div class="d-flex flex-column form-check form-switch col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                    <input type="checkbox" class="form-check-input @error('hasil_rahasia') is-invalid @enderror" id="hasil_rahasia" name="hasil_rahasia" value="1" {{$data['dataPemeriksaanLab']->hasil_rahasia== 1 ? 'checked' : ''}}>
                                                    @error('hasil_rahasia')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="change-form-lab" id="button-open-kuantitatif" {{$data['dataPemeriksaanLab']->tipe == 1 ? 'checked' : ''}} value="1">
                                                <label class="form-check-label" for="button-open-kuantitatif">
                                                    Kuantitatif
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="change-form-lab" id="button-open-kualitatif" {{$data['dataPemeriksaanLab']->tipe == 2 ? 'checked' : ''}}  value="2">
                                                <label class="form-check-label" for="button-open-kualitatif">
                                                    Kualitatif
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="change-form-lab" id="button-open-kualitatif-khusus" {{$data['dataPemeriksaanLab']->tipe == 3 ? 'checked' : ''}}  value="3">
                                                <label class="form-check-label" for="button-open-kualitatif-khusus">
                                                    Kualitatif Khusus
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="kuantitatif-form" style="display: none">
                                    <div class="row g-3">
                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label for="rentang_normal_kuantitatif" class="form-label">Rentang Normal:</label>
                                                <select class="form-select @error('rentang_normal_kuantitatif') is-invalid @enderror" name="rentang_normal_kuantitatif" id="rentang_normal_kuantitatif">
                                                    <option value="">Please Select</option>
                                                    @foreach ($data['rentangNormal'] as $item)
                                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('rentang_normal_kuantitatif')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label for="keterangan_kuantitatif" class="form-label">Keterangan:</label>
                                                <input type="text" class="form-control @error('keterangan_kuantitatif') is-invalid @enderror" id="keterangan_kuantitatif" name="keterangan_kuantitatif" value="{{ $data['dataPemeriksaanLab']->keterangan_kuantitatif}}">
                                                @error('keterangan_kuantitatif')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-1">
                                            <div class="mb-3">
                                                <label for="batas_bawah_kuantitatif" class="form-label">Batas Bawah:</label>
                                                <input type="number" class="form-control @error('batas_bawah_kuantitatif') is-invalid @enderror" id="batas_bawah_kuantitatif" name="batas_bawah_kuantitatif" value="{{ $data['dataPemeriksaanLab']->batas_bawah_kuantitatif}}">
                                                @error('batas_bawah_kuantitatif')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label for="antara_kuantitatif" class="form-label">Antara:</label>
                                                <input type="text" class="form-control @error('antara_kuantitatif') is-invalid @enderror" id="antara_kuantitatif" name="antara_kuantitatif" value="{{ $data['dataPemeriksaanLab']->antara_kuantitatif}}">
                                                @error('antara_kuantitatif')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-1">
                                            <div class="mb-3">
                                                <label for="batas_atas_kuantitatif" class="form-label">Batas Atas:</label>
                                                <input type="number" class="form-control @error('batas_atas_kuantitatif') is-invalid @enderror" id="batas_atas_kuantitatif" name="batas_atas_kuantitatif" value="{{ $data['dataPemeriksaanLab']->batas_atas_kuantitatif}}">
                                                @error('batas_atas_kuantitatif')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label for="keterangan2_kuantitatif" class="form-label">Keterangan:</label>
                                                <input type="text" class="form-control @error('keterangan2_kuantitatif') is-invalid @enderror" id="keterangan2_kuantitatif" name="keterangan2_kuantitatif" value="{{ $data['dataPemeriksaanLab']->keterangan2_kuantitatif}}">
                                                @error('keterangan2_kuantitatif')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <input type="hidden" id="hiddenKuantitatif" name="hiddenKuantitatif" value="[]">
                                        <div class="col-lg-2 mt-5">
                                                <button type="button" id="button-add-kuantitatif" class="btn btn-success col-lg-2"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-lg-12 mb-3">
                                            <div class="table-responsive p-0">
                                                <table class="table align-items-center mb-0 w-100" id="tableKuantitatif">
                                                    <thead class="bg-success">
                                                        <tr>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rentang Normal</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Batas Bawah</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Antara</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Batas Bawah</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                                        </tr>
                                                    </thead>
                                                    @foreach ($data['dataTestLabKuantitatif'] as $item)
                                                        <tbody>
                                                            <tr>
                                                                <td>{{$item->rentang_normal}}</td>
                                                                <td>{{$item->keterangan1}}</td>
                                                                <td>{{$item->batas_bawah}}</td>
                                                                <td>{{$item->antara}}</td>
                                                                <td>{{$item->batas_atas}}</td>
                                                                <td>{{$item->keterangan2}}</td>
                                                                <td><button type="button" class="btn btn-danger remove-row"><i class="fa fa-xmark"></i></button></td>
                                                            </tr>
                                                        </tbody>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="kualitatif-form"  style="display: none">
                                    <div class="row g-3">
                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label for="rentang_normal_kualitatif" class="form-label">Rentang Normal:</label>
                                                <select class="form-select @error('rentang_normal_kualitatif') is-invalid @enderror" name="rentang_normal_kualitatif" id="rentang_normal_kualitatif">
                                                    <option value="">Please Select</option>
                                                    @foreach ($data['rentangNormal'] as $item)
                                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('rentang_normal_kualitatif')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label for="keterangan_positif_kualitatif" class="form-label">Keterangan Positif:</label>
                                                <input type="text" class="form-control @error('keterangan_positif_kualitatif') is-invalid @enderror" id="keterangan_positif_kualitatif" name="keterangan_positif_kualitatif" value="{{ $data['dataPemeriksaanLab']->keterangan_positif_kualitatif}}">
                                                @error('keterangan_positif_kualitatif')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-1 mb-3">
                                            <label for="n_plus_kualitatif" class="form-label ms-5">N.( + ) :</label>
                                            <div class="d-flex flex-column form-check form-switch ms-5">
                                                <input type="checkbox" class="form-check-input @error('n_plus_kualitatif') is-invalid @enderror" id="n_plus_kualitatif" name="n_plus_kualitatif" value="1">
                                                @error('n_plus_kualitatif')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label for="keterangan_negatif_kualitatif" class="form-label">Keterangan Negatif:</label>
                                                <input type="text" class="form-control @error('keterangan_negatif_kualitatif') is-invalid @enderror" id="keterangan_negatif_kualitatif" name="keterangan_negatif_kualitatif" value="{{ $data['dataPemeriksaanLab']->keterangan_negatif_kualitatif}}">
                                                @error('keterangan_negatif_kualitatif')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-1 mb-3">
                                            <label for="n_min_kualitatif" class="form-label ms-5">N.( - ) :</label>
                                            <div class="d-flex flex-column form-check form-switch  ms-5">
                                                <input type="checkbox" class="form-check-input @error('n_min_kualitatif') is-invalid @enderror" id="n_min_kualitatif" name="n_min_kualitatif" value="1">
                                                @error('n_min_kualitatif')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <input type="hidden" id="hiddenKualitatif" name="hiddenKualitatif" value="[]">
                                        <div class="col-lg-2 mt-5">
                                                <button type="button" id="button-add-kualitatif" class="btn btn-success col-lg-2"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-lg-12 mb-3">
                                            <div class="table-responsive p-0">
                                                <table class="table align-items-center mb-0 w-100" id="tableKualitatif">
                                                    <thead class="bg-success">
                                                        <tr>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rentang Normal</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan Positif</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">N.(+)</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan Negatif</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">N.(-)</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                                        </tr>
                                                    </thead>
                                                    @foreach ($data['dataTestLabKualitatif'] as $item)
                                                        <tbody>
                                                            <tr>
                                                                <td>{{$item->rentang_normal}}</td>
                                                                <td>{{$item->keterangan_positif}}</td>
                                                                <td>{{$item->n_plus}}</td>
                                                                <td>{{$item->keterangan_negatif}}</td>
                                                                <td>{{$item->n_min}}</td>
                                                                <td><button type="button" class="btn btn-danger remove-row"><i class="fa fa-xmark"></i></button></td>
                                                            </tr>
                                                        </tbody>
                                                    @endforeach
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="kualitatif-khusus-form" style="display: none">
                                    <div class="row g-3">
                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label for="rentang_normal_kualitatif_khusus" class="form-label">Rentang Normal:</label>
                                                <select class="form-select @error('rentang_normal_kualitatif_khusus') is-invalid @enderror" name="rentang_normal_kualitatif_khusus" id="rentang_normal_kualitatif_khusus">
                                                    <option value="">Please Select</option>
                                                    @foreach ($data['rentangNormal'] as $item)
                                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('rentang_normal_kualitatif_khusus')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label for="normal_kualitatif_khusus" class="form-label">Normal:</label>
                                                <input type="text" class="form-control @error('normal_kualitatif_khusus') is-invalid @enderror" id="normal_kualitatif_khusus" name="normal_kualitatif_khusus" value="{{ $data['dataPemeriksaanLab']->normal_kualitatif_khusus}}">
                                                @error('normal_kualitatif_khusus')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label for="keterangan_tidak_normal_kualitatif_khusus" class="form-label">Keterangan Tidak Normal:</label>
                                                <input type="text" class="form-control @error('keterangan_tidak_normal_kualitatif_khusus') is-invalid @enderror" id="keterangan_tidak_normal_kualitatif_khusus" name="keterangan_tidak_normal_kualitatif_khusus" value="{{ $data['dataPemeriksaanLab']->keterangan_tidak_normal_kualitatif_khusus}}">
                                                @error('keterangan_tidak_normal_kualitatif_khusus')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <input type="hidden" id="hiddenKualitatifKhusus" name="hiddenKualitatifKhusus" value="[]">
                                        <div class="col-lg-2 mt-5">
                                                <button type="button" id="button-add-kualitatif-khusus" class="btn btn-success col-lg-2"><i class="fa fa-plus"></i></button>
                                        </div>
                                        
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-lg-12 mb-3">
                                            <div class="table-responsive p-0">
                                                <table class="table align-items-center mb-0 w-100" id="tableKualitatifKhusus">
                                                    <thead class="bg-success">
                                                        <tr>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rentang Normal</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Normal</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan Tidak Normal</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                                        </tr>
                                                    </thead>
                                                    @foreach ($data['dataTestLabKualitatifKhusus'] as $item)
                                                        <tbody>
                                                            <tr>
                                                                <td>{{$item->rentang_normal}}</td>
                                                                <td>{{$item->normal}}</td>
                                                                <td>{{$item->keterangan_tidak_normal}}</td>
                                                                <td><button type="button" class="btn btn-danger remove-row"><i class="fa fa-xmark"></i></button></td>
                                                            </tr>
                                                        </tbody>
                                                    @endforeach
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-lg-1 mb-5">
                                            <label for="skala_kualitatif_khusus" class="form-label">Skala Normal:</label>
                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input @error('skala_kualitatif_khusus') is-invalid @enderror" id="skala_kualitatif_khusus" name="skala_kualitatif_khusus" {{ $data['dataTestLabKualitatifKhusus'][0]->skala == 1 ? 'checked' : '' }} value="1">
                                                @error('skala_kualitatif_khusus')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    
                                        <!-- Hasil Narasi -->
                                        <div class="col-lg-1 mb-5">
                                            <label for="narasi_kualitatif_khusus" class="form-label">Hasil Narasi:</label>
                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input @error('narasi_kualitatif_khusus') is-invalid @enderror" id="narasi_kualitatif_khusus" name="narasi_kualitatif_khusus" {{$data['dataTestLabKualitatifKhusus'][0]->narasi == 1 ? 'checked' : ''}} value="1">
                                                @error('narasi_kualitatif_khusus')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                         <div class="col-lg-6">
                                            <div class="mb-5">
                                                <label for="keterangan_normal_kualitatif_khusus" class="form-label">Keterangan Normal:</label>
                                                <textarea name="keterangan_normal_kualitatif_khusus" class="form-control mt-2" id="keterangan_normal_kualitatif_khusus" cols="30" rows="2">{{$data['dataTestLabKualitatifKhusus'][0]->keterangan_normal}}</textarea>
                                                @error('keterangan_normal_kualitatif_khusus')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <a href="{{route('data-pemeriksaan-lab')}}" class="btn btn-danger col-lg-2 ms-1">Cancel</a>
                                    <button type="submit" class="btn btn-success col-lg-1" style="position:absolute; right:2%">Save</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
  
</main>


<script>
    function handleRadioChange() {
        ['kuantitatif-form', 'kualitatif-form', 'kualitatif-khusus-form'].forEach(id => {
            document.getElementById(id).style.display = 'none';
        });
        const selectedRadio = document.querySelector('input[name="change-form-lab"]:checked');
        if (selectedRadio) {
            document.getElementById(`${selectedRadio.id.replace('button-open-', '')}-form`).style.display = 'block';
        }
    }
    document.querySelectorAll('input[name="change-form-lab"]').forEach(radio => {
        radio.addEventListener('change', handleRadioChange);
    });
    handleRadioChange();
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        // Fungsi umum untuk menginisialisasi DataTables dan menambahkan event listener
        function initializeTable(tableId, buttonId, fields, hiddenInputId) {
            // Inisialisasi DataTables
            var table = $(tableId).DataTable();
            var hiddenInput = $(hiddenInputId); // Input hidden untuk menyimpan data
            
            var rowDataArray = []; // Menyimpan semua data dalam bentuk array

            // Event listener tombol Add
            $(buttonId).on('click', function () {
                var rowData = {};
                var valid = true;

                // Ambil nilai input dari form berdasarkan array fields
                fields.forEach(function (field) {
                    const value = $(field.id).is(':checkbox') 
                        ? ($(field.id).is(':checked') ? 'Aktif' : 'Tidak Aktif') 
                        : $(field.id).val();

                    if (!value) {
                        valid = false;
                    }

                    rowData[field.name] = value; // Simpan data dalam objek
                });

                if (!valid) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Semua input harus diisi.'
                    });
                    return;
                }

                // Tambahkan data ke tabel DataTables
                table.row.add([
                    ...fields.map(field => rowData[field.name]), // Ambil nilai input
                    `<button type="button" class="btn btn-danger remove-row"><i class="fa fa-xmark"></i></button>`
                ]).draw(false);

                // Tambahkan data ke array rowDataArray
                rowDataArray.push(rowData);
                updateHiddenInput(); // Update hidden input dengan array terbaru

                // Kosongkan input setelah ditambahkan
                fields.forEach(function (field) {
                    $(field.id).val('');
                    if ($(field.id).is(':checkbox')) $(field.id).prop('checked', false);
                });
            });

            // Event listener untuk tombol hapus row
            $(tableId + ' tbody').on('click', '.remove-row', function () {
                // Hapus baris dari tabel
                var row = table.row($(this).parents('tr'));
                var rowIndex = row.index();

                // Hapus data dari array rowDataArray berdasarkan index
                rowDataArray.splice(rowIndex, 1);
                updateHiddenInput(); // Update hidden input setelah data dihapus

                row.remove().draw(false); // Hapus row dari DataTable
            });

            // Fungsi untuk memperbarui nilai hidden input
            function updateHiddenInput() {
                hiddenInput.val(JSON.stringify(rowDataArray));
            }
        }

        // Inisialisasi untuk masing-masing tabel
        initializeTable('#tableKuantitatif', '#button-add-kuantitatif', [
            { id: '#rentang_normal_kuantitatif', name: 'rentang_normal_kuantitatif' },
            { id: '#keterangan_kuantitatif', name: 'keterangan_kuantitatif' },
            { id: '#batas_bawah_kuantitatif', name: 'batas_bawah_kuantitatif' },
            { id: '#antara_kuantitatif', name: 'antara_kuantitatif' },
            { id: '#batas_atas_kuantitatif', name: 'batas_atas_kuantitatif' },
            { id: '#keterangan2_kuantitatif', name: 'keterangan2_kuantitatif' }
        ], '#hiddenKuantitatif');
        initializeTable('#tableKualitatif', '#button-add-kualitatif', [
            { id: '#rentang_normal_kualitatif', name: 'rentang_normal_kualitatif' },
            { id: '#keterangan_positif_kualitatif', name: 'keterangan_positif_kualitatif' },
            { id: '#n_plus_kualitatif', name: 'n_plus_kualitatif' },
            { id: '#keterangan_negatif_kualitatif', name: 'keterangan_negatif_kualitatif' },
            { id: '#n_min_kualitatif', name: 'n_min_kualitatif' },
        ], '#hiddenKualitatif');
        initializeTable('#tableKualitatifKhusus', '#button-add-kualitatif-khusus', [
            { id: '#rentang_normal_kualitatif_khusus', name: 'rentang_normal_kualitatif_khusus' },
            { id: '#normal_kualitatif_khusus', name: 'normal_kualitatif_khusus' },
            { id: '#keterangan_tidak_normal_kualitatif_khusus', name: 'keterangan_tidak_normal_kualitatif_khusus' },
        ], '#hiddenKualitatifKhusus');

        // Tambahkan inisialisasi lain jika diperlukan
    });


</script>

@endsection