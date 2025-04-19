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
                                <h6 class="text-white text-capitalize ps-3">CREATE TRACER REKAM MEDIS</h6>
                            </div>
                        </div>
                        <div class="card-body px-5 pb-2">
                            <div class="form"  style="background-color:#FDFEFD;">
                                <div class="content">                                 
                                    <div class="d-flex flex-column">
                                        <div class="d-flex col-lg-12 mb-4">
                                            <div class="col-lg-12 me-0 row">
                                                <div class="col-md-12 col-lg-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="address" class="form-label col-md-2">No Tracer :</label>
                                                        <div class="d-flex flex-column col-md-4">
                                                            <input type="text" placeholder="Autogenerate" class="form-control bg-gray-300" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex col-lg-12 mb-4">
                                                    <div class="col-lg-12 me-0 row">
                                                            <div class="d-flex">
                                                                <label for="date_now" class="form-label col-md-2">Tanggal & Jam :</label>
                                                                <div class="d-flex flex-column col-md-4">
                                                                    <div class="d-flex">
                                                                        <div class="col-md-8">
                                                                            <input type="date" class="form-control @error('date_now') is-invalid @enderror" id="date_now" name="date_now" value="{{date('Y-m-d')}}">      
                                                                        </div>
                                                                        <div class="col-lg-4 ms-2">
                                                                            <input type="" class="form-control @error('time_now') is-invalid @enderror" id="" name="time_now" value="{{date('H:i')}}" readonly>      
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="patient" class="form-label col-md-2">No RM / Nama Pasien :</label>
                                                        <div class="d-flex flex-column col-md-4">
                                                            <select name="patient" id="patient" class="form-select select2 @error('patient') is-invalid @enderror option-patient">
                                                                <option value="" data-toggle="select2">-- Please Select--</option>
                                                                @foreach ($data['dataPasien'] as $item)
                                                                    <option value="{{$item->no_rekam_medis}}">{{$item->no_rekam_medis . ' ' . $item->nama_lengkap}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('patient')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="pinjam" class="form-label col-md-2">Di Pinjamkan Ke :</label>
                                                        <div class="d-flex flex-column col-md-4">
                                                            <select name="pinjam" id="pinjam" class="form-select @error('pinjam') is-invalid @enderror">
                                                                <option value="">-- Please Select--</option>
                                                                @foreach ($data['dataLayanan'] as $item)
                                                                    <option value="{{$item->id}}">{{$item->nama_layanan}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('pinjam')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="penanggung_jawab" class="form-label col-md-2">Penanggung Jawab :</label>
                                                        <div class="d-flex flex-column col-md-4">
                                                            <select name="penanggung_jawab" id="penanggung_jawab" class="form-select @error('penanggung_jawab') is-invalid @enderror">
                                                                <option value="">-- Please Select--</option>
                                                                <option value="Budi">Budi</option>
                                                                <option value="Udin">Udin</option>
                                                            </select>
                                                            @error('penanggung_jawab')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="dokter" class="form-label col-md-2">Dokter :</label>
                                                        <div class="d-flex flex-column col-md-4">
                                                            <select name="dokter" id="dokter" class="form-select option-dokter @error('dokter') is-invalid @enderror">
                                                                <option value="">-- Please Select--</option>
                                                                @foreach ($data['dataDokter'] as $item)
                                                                    <option value="{{$item->id}}">{{$item->nama_lengkap}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('dokter')
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
                                            <a href="{{route('data-tracer-rekam-medis')}}" class="btn btn-danger col-lg-1 ms-1">Cancel</a>
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
@endsection