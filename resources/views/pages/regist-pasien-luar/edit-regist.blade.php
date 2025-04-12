@extends('layouts/form_layouts')
@section('form_layouts')
<!-- Page Content  -->
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden" >
    <div class="container-fluid py-1">
        <h1 class="fw-bolder m-1 " style="font-family: 'Roboto', 'Helvetica', 'Arial', 'sans-serif'; font-size:48px; color:#344767;">Enggal Saras</h1>
        <div class="row">
            <div class="mt-4"> 
                <form action="{{route('update-registrasi-pasien-luar', ['id' => $data['registPasien']->id])}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card my-3  border border-0">
                        <div class="card-header p-0 position-relative border border-0 mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">CREATE REGIST PASIEN</h6>
                            </div>
                        </div>
                        <div class="card-body px-5 pb-2">
                            <div class="form"  style="background-color:#FDFEFD;">
                                <div class="content">                                 
                                    <div class="d-flex flex-column">
                                        <div class="d-flex col-lg-12 mb-4">
                                            <div class="col-lg-12 me-0 row">
                                                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                    <div class="d-flex">
                                                        <label for="date_now" class="form-label col-md-2">Tanggal & Jam :</label>
                                                        <div class="d-flex flex-column col-md-10">
                                                            <div class="d-flex">
                                                                <div class="col-md-7 col-lg-9">
                                                                    <input type="date_now" class="form-control @error('date_now') is-invalid @enderror" id="date_now" name="date_now" value="{{$data['registPasien']->created_at->format('Y-h-d')}}" readonly>      
                                                                </div>
                                                                <div class="col-lg-3 ms-3">
                                                                    <input type="" class="form-control @error('time_now') is-invalid @enderror" id="" name="" value="{{$data['registPasien']->created_at->format('H:i')}}" readonly>      
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                        <div class="d-flex col-lg-12 mb-4">
                                            <div class="col-lg-12 me-0 row">
                                                <div class="col-md-12 col-lg-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="patient" class="form-label col-md-1">Nama Pasien :</label>
                                                        <div class="d-flex flex-column col-md-10">
                                                            <select name="patient" id="patient" class="form-select select2 @error('patient') is-invalid @enderror option-patient">
                                                                <option value="" data-toggle="select2">-- Please Select--</option>
                                                                @foreach ($data['patient'] as $item)
                                                                    <option value="{{$item->id}}" {{$data['registPasien']->patient == $item->id ? 'selected' : ''}}>{{$item->nama_lengkap}}</option>
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
                                                        <label for="address" class="form-label col-md-1">Alamat :</label>
                                                        <div class="d-flex flex-column col-md-10">
                                                            <input type="text" name="address" value="{{$data['registPasien']->address}}" class="form-control bg-gray-300 @error('address') is-invalid @enderror" id="address" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="dob" class="form-label col-md-1">Tanggal Lahir :</label>
                                                        <div class="d-flex flex-column col-md-10">
                                                            <input type="date" name="dob" id="dob" value="{{$data['registPasien']->dob}}" class="@error('dob') is-invalid @enderror form-control bg-gray-300" readonly>
                                                            @error('dob')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="jaminan" class="form-label col-md-1">Jaminan :</label>
                                                        <div class="d-flex flex-column col-md-10">
                                                            <select name="jaminan" id="jaminan" class="form-select @error('jaminan') is-invalid @enderror">
                                                                <option value="">-- Please Select--</option>
                                                                <option value="BPJS" {{$data['registPasien']->jaminan == 'BPJS' ? 'selected' : ''}}>BPJS</option>
                                                                <option value="UMUM" {{$data['registPasien']->jaminan == 'UMUM' ? 'selected' : ''}}>UMUM</option>
                                                            </select>
                                                            @error('jaminan')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="layanan" class="form-label col-md-1">Layanan :</label>
                                                        <div class="d-flex flex-column col-md-10">
                                                            <select name="layanan" id="layanan" class="form-select option-layanan @error('layanan') is-invalid @enderror">
                                                                <option value="">-- Please Select--</option>
                                                                @foreach ($data['layanan'] as $item)
                                                                    <option value="{{$item->id}}" {{$data['registPasien']->layanan == $item->id ? 'selected' : ''}}>{{$item->nama_layanan}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('layanan')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="dokter" class="form-label col-md-1">Dokter :</label>
                                                        <div class="d-flex flex-column col-md-10">
                                                            <select name="dokter" id="dokter" class="form-select option-dokter @error('dokter') is-invalid @enderror">
                                                                <option value="">-- Please Select--</option>
                                                                @foreach ($data['dokter'] as $item)
                                                                    <option value="{{$item->id}}" {{$item->id == $data['registPasien']->dokter ? 'selected' : ''}}>{{$item->nama_lengkap}}</option>
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
                                            <a href="{{route('data-registrasi-pasien-luar')}}" class="btn btn-danger col-lg-1 ms-1">Cancel</a>
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