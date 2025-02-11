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
                            <h6 class="text-white text-capitalize ps-3">Create Rentang Normal</h6>
                        </div>
                    </div>
                    <div class="card-body px-5 pb-2">
                        <div class="form"  style="background-color:#FDFEFD;">
                            <div class="content">
                                <form action="" method="post" class="d-flex col-lg-12"> 
                                    @csrf     
                                    <div class="d-flex flex-column">

                                        <div class="d-flex col-lg-12 mb-4">
                                            <div class="col-lg-12 col-xl-12 col-xxl-12 me-0 row">

                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="code" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Kode Rentang Normal :</label>
                                                        <label>autogenerate</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-9 col-lg-9 col-xl-9 col-xxl-9 mb-3">
                                                    <div class="d-flex">
                                                        <label for="name" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Nama Rentang Normal :</label>
                                                        <div class="d-flex flex-column col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
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
                                                        <label for="satuan_umur" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Satuan Umur :</label>
                                                        <div class="d-flex flex-column col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                            <select class="form-select @error('satuan_umur') is-invalid @enderror" name="satuan_umur"  id="satuan_umur">
                                                                <option value="">Please Select</option>
                                                                @foreach ($rentangUmur as $item)
                                                                    <option value="{{$item->waktu}}">{{$item->waktu}}</option>
                                                                @endforeach
                                                            </select>          
                                                            @error('satuan_umur')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-9 col-lg-9 col-xl-9 col-xxl-9 mb-3">
                                                    <div class="d-flex">
                                                        <label for="batas_bawah" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Batas Bawah :</label>
                                                        <div class="d-flex col-lg-12">
                                                            <input type="number" class="form-control @error('batas_bawah') is-invalid @enderror" id="batas_bawah" name="batas_bawah" value="{{ old('batas_bawah') }}">
                                                            <input type="number" class="ms-3 form-control @error('batas_bawah_hari') is-invalid @enderror" id="batas_bawah_hari" name="batas_bawah_hari" value="{{ old('batas_bawah_hari') }}" readonly>
                                                            <label for="bawah_hari" class="form-label m-2">Hari</label>
                                                        </div>
                                                        @error('batas_bawah')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-9 col-lg-9 col-xl-9 col-xxl-9 mb-3">
                                                    <div class="d-flex">
                                                        <label for="batas_atas" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Batas Atas :</label>
                                                        <div class="d-flex col-lg-12">
                                                            <input type="number" class="form-control @error('batas_atas') is-invalid @enderror" id="batas_atas" name="batas_atas" value="{{ old('batas_atas') }}">
                                                            <input type="number" class="ms-3 form-control @error('batas_atas_hari') is-invalid @enderror" id="batas_atas_hari" name="batas_atas_hari" value="{{ old('batas_atas_hari') }}" readonly>
                                                            <label for="bawah_hari" class="form-label m-2">Hari</label>
                                                        </div>
                                                        @error('batas_atas')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-9 col-lg-9 col-xl-9 col-xxl-9 mb-3">
                                                    <div class="d-flex">
                                                        <label for="gender" class="form-label col-lg-3 col-xl-4 col-xxl-3 me-2">Jenis Kelamin :</label>
                                                        <div class="d-flex flex-column col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                            <select class="form-select @error('gender') is-invalid @enderror" name="gender"  id="gender">
                                                                <option value="">Please Select</option>
                                                                <option value="LAKI-LAKI">LAKI-LAKI</option>
                                                                <option value="PEREMPUAN">PEREMPUAN</option>
                                                                <option value="SEMUA">SEMUA</option>
                                                            </select>          
                                                            @error('gender')
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
                                            <a href="{{route('data-rentang-normal')}}" class="btn btn-danger col-lg-2 ms-1">Cancel</a>
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