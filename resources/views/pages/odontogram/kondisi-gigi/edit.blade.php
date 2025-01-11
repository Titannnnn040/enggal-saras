@extends('layouts/form_layouts')
@section('form_layouts')
<!-- Page Content  -->
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden" >
    <div class="container-fluid py-1">
        <h1 class="fw-bolder m-1 " style="font-family: 'Roboto', 'Helvetica', 'Arial', 'sans-serif'; font-size:48px; color:#344767;">Enggal Saras</h1>
        <div class="row">
            <div class="mt-4"> 
                <div class="card my-3  border border-0">
                    <div class="card-header p-0 position-relative border border-0 mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Create Template</h6>
                        </div>
                    </div>
                    <div class="card-body px-5 pb-2">
                        <div class="form"  style="background-color:#FDFEFD;">
                            <div class="content">
                                <form action="{{route('update-kondisi-gigi', ['uuid' => $data->uuid])}}" method="post"> 
                                    @csrf     
                                    @method('PUT')
                                    <div class="d-flex flex-column">
                                        <div class="col-lg-12 mb-4">
                                            <div class="me-0 row">
                                                <div class="col-lg-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="jenis" class="form-label col-lg-1">Jenis :</label>
                                                        <div class="d-flex flex-column col-md-9">
                                                            <select class="form-select @error('jenis') is-invalid @enderror" name="jenis"  id="jenis">
                                                                <option value="">Please Select</option>
                                                                <option value="KEADAAN GIGI" {{$data->jenis == 'KEADAAN GIGI' ? 'selected' : ''}}>KEADAAN GIGI</option>
                                                                <option value="BAHAN RESTORASI" {{$data->jenis == 'BAHAN RESTORASI' ? 'selected' : ''}}>BAHAN RESTORASI</option>
                                                                <option value="RESTORASI" {{$data->jenis == 'RESTORASI' ? 'selected' : ''}}>RESTORASI</option>
                                                                <option value="PROTESA" {{$data->jenis == 'PROTESA' ? 'selected' : ''}}>PROTESA</option>
                                                            </select>          
                                                            @error('jenis')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="code" class="form-label col-lg-1">Kode :</label>
                                                        <div class="d-flex flex-column col-md-9">
                                                            <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ $data->code }}" placeholder="Kode Penyakit">
                                                            @error('code')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="arti" class="form-label col-lg-1">Arti :</label>
                                                        <div class="d-flex flex-column col-md-9">
                                                            <input type="text" class="form-control @error('arti') is-invalid @enderror" id="arti" name="arti" value="{{ $data->arti }}" placeholder="Jenis Penyakit">
                                                            @error('arti')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <div class="d-flex">
                                                            <label for="keterangan" class="form-label col-lg-1">Keterangan :</label>
                                                            <div class="d-flex flex-column col-md-9">
                                                                <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="" cols="30" rows="4" placeholder="Keterangan">{{ $data->keterangan }}</textarea>
                                                                @error('keterangan')
                                                                <div class="invalid-feedback d-block">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="warna" class="form-label col-lg-1">Warna :</label>
                                                        <div class="d-flex flex-column col-md-9">
                                                            <input type="color" class="form-control @error('warna') is-invalid @enderror" id="warna" name="warna" value="{{ $data->warna }}">
                                                            @error('warna')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <a href="{{route('data-kondisi-gigi')}}" class="btn btn-danger col-lg-1 ms-1">Cancel</a>
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