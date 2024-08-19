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
                  <h6 class="text-white text-capitalize ps-3">Create Dokter</h6>
                </div>
              </div>
              <div class="card-body px-5 pb-2">
                <div class="form"  style="background-color:#FDFEFD;">
                    <div class="content">
                        <form action="/tenaga-medis/update-jadwal-dokter/{{ $penjadwalanDokter->id }}" method="post" class="d-flex col-lg-12"> 
                            @method('put');
                            @csrf     
                            <div class="d-flex flex-column">

                                <div class="d-flex col-lg-12 mb-4">
                                    <div class="col-lg-12 col-xl-12 col-xxl-12 me-0 row">

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="layanan_id" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Layanan :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <select class="form-select @error('layanan_id') is-invalid @enderror" name="layanan_id"  id="layanan_id">
                                                        <option value="">Please Select</option>
                                                            @foreach ($layanan as $item)
                                                            <option value="{{ $item->id }}" {{ $item->id == $penjadwalanDokter->layanan_id ? 'selected' : '' }}>{{ $item->nama_layanan }}</option>
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
                        
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="dokter_id" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Dokter :</label>
                                                
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <select class="form-select @error('dokter_id') is-invalid @enderror" name="dokter_id"  id="dokter_id">
                                                        <option value="">Please Select</option>
                                                            @foreach ($dokter as $item)
                                                                <option value="{{ $item->id }}" {{ $item->id == $penjadwalanDokter->dokter_id ? 'selected' : '' }}>{{ $item->nama_lengkap }}</option>
                                                            @endforeach
                                                    </select> 
                                                    @error('dokter_id')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="jadwal_praktik" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Jadwal Praktik :</label>
                                                
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <select class="form-select @error('jadwal_praktik') is-invalid @enderror" name="jadwal_praktik"  id="jadwal_praktik">
                                                        <option value="">please select</option>
                                                        <option value="pagi" {{ $penjadwalanDokter->jadwal_praktik == 'pagi' ? 'selected' : ''}}>PAGI</option>
                                                        <option value="sore-malam" {{ $penjadwalanDokter->jadwal_praktik == 'sore-malam' ? 'selected' : ''}}>SORE MALAM</option>
                                                    </select> 
                                                    @error('jadwal_praktik')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Hari :</label>
                                                
                                                <div class="d-flex form-check form-switch mt-3">
                                                    {{-- <div class="">
                                                        <input type="checkbox" class="form-check-input @error('medical_checkup') is-invalid @enderror" id="medical_checkup" name="medical_checkup" value="yes"{{ $penjadwalanDokter->selasa == '-' ? '' : 'checked' }}>
                                                        <label for="medical_checkup" class="form-label me-2">Medical Check Up</label>
                                                    </div> --}}
                                                    <div class="">
                                                        <input type="checkbox" class="form-check-input @error('senin') is-invalid @enderror" id="senin" name="senin" value="yes" {{ $penjadwalanDokter->senin == '-' ? '' : 'checked' }}>
                                                        <label for="senin" class="form-label me-2">SENIN</label>
                                                    </div>
                                                    <div class="ms-5">
                                                        <input type="checkbox" class="form-check-input @error('selasa') is-invalid @enderror" id="selasa" name="selasa" value="yes" {{ $penjadwalanDokter->selasa == '-' ? '' : 'checked' }}>
                                                        <label for="selasa" class="form-label me-2">SELASA</label>
                                                    </div>
                                                    <div class="ms-5">
                                                        <input type="checkbox" class="form-check-input @error('rabu') is-invalid @enderror" id="rabu" name="rabu" value="yes" {{ $penjadwalanDokter->rabu == '-' ? '' : 'checked' }}>
                                                        <label for="rabu" class="form-label me-2">RABU</label>
                                                    </div>
                                                    <div class="ms-5">
                                                        <input type="checkbox" class="form-check-input @error('kamis') is-invalid @enderror" id="kamis" name="kamis" value="yes" {{ $penjadwalanDokter->kamis == '-' ? '' : 'checked' }}>
                                                        <label for="kamis" class="form-label me-2">KAMIS</label>
                                                    </div>
    
                                                    <div class="ms-5">
                                                        <input type="checkbox" class="form-check-input @error('jumat') is-invalid @enderror" id="jumat" name="jumat" value="yes"{{ $penjadwalanDokter->jumat == '-' ? '' : 'checked' }}>
                                                        <label for="jumat" class="form-label me-2">JUM'AT</label>
                                                    </div>
                                                    <div class="ms-5">
                                                        <input type="checkbox" class="form-check-input @error('sabtu') is-invalid @enderror" id="sabtu" name="sabtu" value="yes"{{ $penjadwalanDokter->sabtu == '-' ? '' : 'checked' }}>
                                                        <label for="sabtu" class="form-label me-2">SABTU</label>
                                                    </div>
                                                    <div class="ms-5">
                                                        <input type="checkbox" class="form-check-input @error('minggu') is-invalid @enderror" id="minggu" name="minggu" value="yes"{{ $penjadwalanDokter->minggu == '-' ? '' : 'checked' }}>
                                                        <label for="minggu" class="form-label me-2">MINGGU</label>
                                                    </div>
                                                </div>

                                                <div class="d-flex col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">Jam Praktik :</label>
                                                <div class="d-flex col-md-7 col-lg-4 col-xl-4 col-xxl-1">

                                                    <div class="">
                                                        <label for="start">Mulai:</label>
                                                        <input type="time" id="start" name="start" value="{{ $penjadwalanDokter->start }}" >
                                                    </div>
                                                    @error('start')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror

                                                    <div class="ms-3">
                                                        <label for="finish">Selesai:</label>
                                                        <input type="time" id="finish" name="finish" value="{{ $penjadwalanDokter->finish }}">
                                                    </div>
                                                    @error('finish')
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
                                    <a href="/tenaga-medis/jadwal-dokter" class="btn btn-danger col-lg-1 ms-1">Cancel</a>
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