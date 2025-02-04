@extends('layouts/form_layouts')
@section('form_layouts')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden" >
    <div class="container-fluid py-1">
        <h1 class="fw-bolder m-1 " style="font-family: 'Roboto', 'Helvetica', 'Arial', 'sans-serif'; font-size:48px; color:#344767;">Enggal Saras</h1>
        <div class="row">
            <div class="mt-4"> 
                <div class="card my-3  border border-0">
                    <div class="card-header p-0 position-relative border border-0 mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Create Layanan</h6>
                        </div>
                    </div>
                    <div class="card-body px-5 pb-2">
                        <div class="form"  style="background-color:#FDFEFD;">
                            <div class="content">
                                <form action="/layanan/update-layanan/{{ $layanan->id }}" method="post" class="d-flex col-lg-12"> 
                                    @csrf     
                                    @method('put')
                                    <div class="d-flex flex-column">

                                        <div class="d-flex col-lg-12 mb-4">
                                            <div class="col-lg-12 col-xl-12 col-xxl-12 me-0 row">

                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="code" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Kode Layanan :</label>
                                                        <label>autogenerate</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="nama_layanan" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Nama Layanan :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <input type="text" class="form-control @error('nama_layanan') is-invalid @enderror" id="nama_layanan" name="nama_layanan" value="{{ $layanan->nama_layanan }}">
                                                            @error('nama_layanan')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                
                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="jenis_layanan" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">Jenis Layanan :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <select class="form-select @error('jenis_layanan') is-invalid @enderror" name="jenis_layanan"  id="jenis_layanan">
                                                                <option value="">Please Select</option>
                                                                <option value="RAWAT JALAN" {{$layanan->jenis_layanan == 'RAWAT JALAN' ? 'selected' : ''}}>RAWAT JALAN</option>
                                                                <option value="KAMAR BERSALIN" {{$layanan->jenis_layanan == 'KAMAR BERSALIN' ? 'selected' : ''}}>KAMAR BERSALIN</option>
                                                                <option value="PENUNJANG" {{$layanan->jenis_layanan == 'PENUNJANG' ? 'selected' : ''}}>PENUNJANG</option>
                                                                <option value="RAWAT INAP" {{$layanan->jenis_layanan == 'RAWAT INAP' ? 'selected' : ''}}>RAWAT INAP</option>
                                                                <option value="UGD"  {{$layanan->jenis_layanan == 'UGD' ? 'selected' : ''}}>UGD</option>
                                                            </select>          
                                                            @error('jenis_layanan')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="kode_layanan_bpjs" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Kode Layanan BPJS :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <input type="text" class="form-control @error('kode_layanan_bpjs') is-invalid @enderror" id="kode_layanan_bpjs" name="kode_layanan_bpjs" value="{{ $layanan->kode_layanan_bpjs }}">
                                                            @error('kode_layanan_bpjs')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="id_satu_sehat" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">ID Layanan Satu Sehat :</label>
                                                        <div class="col-lg-12">
                                                            <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                                <input type="text" class="form-control @error('id_satu_sehat') is-invalid @enderror" id="id_satu_sehat" name="id_satu_sehat" value="{{ $layanan->id_satu_sehat }}" disabled>
                                                            </div>
                                                            <div class="d-flex form-check form-switch mt-3">
                                                                <div class="">
                                                                    <input type="checkbox" class="form-check-input @error('medical_checkup') is-invalid @enderror" id="medical_checkup" name="medical_checkup" value="yes" {{ $layanan->medical_checkup == 'yes' ? 'checked' : '' }}>
                                                                    {{-- @if (old('medical_checkup', $medicalCheckupYes ?? false))@endif --}}
                                                                    <label for="medical_checkup" class="form-label me-2">Medical Check Up</label>
                                                                    @error('medical_checkup')
                                                                    <div class="invalid-feedback d-block">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="ms-5">
                                                                    <input type="checkbox" class="form-check-input @error('ibu_hamil') is-invalid @enderror" id="ibu_hamil" name="ibu_hamil" value="yes"  {{ $layanan->ibu_hamil == 'yes' ? 'checked' : '' }}>
                                                                    {{-- @if (old('ibu_hamil', $ibuhamilYes ?? false))@endif --}}
                                                                    <label for="ibu_hamil" class="form-label me-2">Kohort Ibu Hamil</label>
                                                                    @error('ibu_hamil')
                                                                    <div class="invalid-feedback d-block">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3 ms-5">
                                                    
                                                </div>

                                            </div>
                                        </div>   

                                        <div class="col-lg-12">
                                            <a href="/layanan/data-layanan" class="btn btn-danger col-lg-1 ms-1">Cancel</a>
                                            <button type="submit" class="btn btn-success col-lg-1" style="position:absolute; right:2%">Save</button>
                                        </div> 

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
@endsection