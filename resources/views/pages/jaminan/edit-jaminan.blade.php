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
                  <h6 class="text-white text-capitalize ps-3">Edit Jaminan</h6>
                </div>
              </div>
              <div class="card-body px-5 pb-2">
                <div class="form"  style="background-color:#FDFEFD;">
                    <div class="content">
                        <form action="/jaminan/update-jaminan/{{$jaminan->id}}" method="post" class="d-flex col-lg-12"> 
                            @csrf     
                            @method('put')
                            <div class="d-flex flex-column">

                                <div class="d-flex col-lg-12 mb-4">
                                    <div class="col-lg-12 col-xl-12 col-xxl-12 me-0 row">

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="code" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Kode Jaminan :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <input type="text" class="form-control @error('code_jaminan') is-invalid @enderror" id="code_jaminan" disabled name="code_jaminan" value="{{ $jaminan->code_jaminan }}">
                                                    @error('code_jaminan')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="nama_jaminan" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Nama Jaminan :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <input type="text" style="text-transform: uppercase;" class="form-control @error('nama_jaminan') is-invalid @enderror" id="nama_jaminan" name="nama_jaminan" value="{{ $jaminan->nama_jaminan }}">
                                                    @error('nama_jaminan')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                        
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="tipe_jaminan" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">Tipe Jaminan :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <div class="">
                                                        <select class="form-select @error('tipe_jaminan') is-invalid @enderror" name="tipe_jaminan"  id="tipe_jaminan">
                                                            <option value="">Please Select</option>
                                                            <option value="BPJS" {{ $jaminan->tipe_jaminan == 'BPJS' ? 'selected' : '' }}>BPJS</option>
                                                            <option value="ASURANSI" {{ $jaminan->tipe_jaminan == 'ASURANSI' ? 'selected' : '' }}>ASURANSI</option>
                                                            <option value="PRIBADI/UMUM" {{ $jaminan->tipe_jaminan == 'PRIBADI/UMUM' ? 'selected' : '' }}>PRIBADI/UMUM</option>
                                                        </select>          
                                                        @error('tipe_jaminan')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="detail_harga" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Detail Harga di Kwitansi :</label>
                                                <div class="d-flex form-check form-switch">
                                                    <input type="checkbox" class="form-check-input @error('detail_harga') is-invalid @enderror" id="detail_harga" name="detail_harga" value="Yes" {{ $jaminan->detail_harga == 'Yes' ? 'checked' : '' }}>
                                                    <label for="detail_harga" class="form-label ms-2">Yes</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                                <div class="col-lg-12">
                                    <a href="/jaminan/data-jaminan" class="btn btn-danger col-lg-2 ms-1">Cancel</a>
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