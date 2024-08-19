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
                        <form action="/tenaga-medis/{{$dokter->id}}" method="post" class="d-flex col-lg-12"> 
                            @csrf     
                            @method('put')
                            <div class="d-flex flex-column">

                                <div class="d-flex col-lg-12 mb-4">
                                    <div class="col-lg-12 col-xl-12 col-xxl-12 me-0 row">

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="code" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">No.Petugas Medis :</label>
                                                <label>autogenerate</label>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="nama_lengkap" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Nama Lengkap :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ $dokter->nama_lengkap }}">
                                                    @error('nama_lengkap')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                        
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="code_bpjs" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Kode Dokter BPJS :</label>
                                                
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <input type="text" class="form-control @error('code_bpjs') is-invalid @enderror" id="code_bpjs" name="code_bpjs" value="{{ $dokter->code_bpjs }}">
                                                    @error('code_bpjs')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="sip" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Surat Izin Praktek (SIP) :</label>
                                                
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <input type="text" class="form-control @error('sip') is-invalid @enderror" id="sip" name="sip" value="{{ $dokter->sip }}">
                                                    @error('sip')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="end_date" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Berlaku Hingga :</label>
                                                
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ $dokter->end_date }}">
                                                    @error('end_date')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="layanan_id" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">Layanan :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <select class="form-select @error('layanan_id') is-invalid @enderror" name="layanan_id"  id="layanan_id">
                                                        <option value="">Please Select</option>
                                                        @foreach ($layanan as $item)
                                                            <option value="{{ $item->id }}" {{ $item->id == $dokter->layanan_id ? 'selected' : '' }}>{{ $item->nama_layanan }}</option>
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
                                                <label for="status" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">Status :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <select class="form-select @error('status') is-invalid @enderror" name="status"  id="status">
                                                        <option value="aktif" {{ $dokter->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                                        <option value="tidak aktif" {{ $dokter->status == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                                    </select>          
                                                    @error('status')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="nik_dokter" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">NIK Dokter :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <input type="text" class="form-control @error('nik_dokter') is-invalid @enderror" id="nik_dokter" name="nik_dokter" value="{{ $dokter->nik_dokter }}">
                                                    @error('nik_dokter')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                        
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="id_dokter" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">ID Dokter :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <input type="text" class="form-control @error('id_dokter') is-invalid @enderror" id="id_dokter" name="id_dokter" value="{{ $dokter->id_dokter }}" readonly>
                                                    @error('id_dokter')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="nama_petugas" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Nama :</label>
                                                
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <input type="text" class="form-control @error('nama_petugas') is-invalid @enderror" id="nama_petugas" name="nama_petugas" value="{{ $dokter->nama_petugas }}" readonly>
                                                    @error('nama_petugas')
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
                                    <a href="/tenaga-medis/data-tenaga-medis" class="btn btn-danger col-lg-1 ms-1">Cancel</a>
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