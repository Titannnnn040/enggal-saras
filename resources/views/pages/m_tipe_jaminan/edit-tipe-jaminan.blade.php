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
                  <h6 class="text-white text-capitalize ps-3">Edit Tipe Jaminan</h6>
                </div>
              </div>
              <div class="card-body px-5 pb-2">
                <div class="form"  style="background-color:#FDFEFD;">
                    <div class="content">
                        <form action="/tipe-jaminan/update-tipe-jaminan/{{$tipeJaminan->id}}" method="post" class="d-flex col-lg-12"> 
                            @csrf     
                            @method('put')
                            <div class="d-flex flex-column">

                                <div class="d-flex col-lg-12 mb-4">
                                    <div class="col-lg-12 col-xl-12 col-xxl-12 me-0 row">

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="code" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Kode Tipe Jaminan :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <input type="text" class="form-control @error('code_tipe_jaminan') is-invalid @enderror" id="code_tipe_jaminan" disabled name="code_tipe_jaminan" value="{{ $tipeJaminan->code_tipe_jaminan }}">
                                                    @error('code_tipe_jaminan')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="nama_tipe_jaminan" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Nama Tipe Jaminan :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <input type="text" class="form-control @error('nama_tipe_jaminan') is-invalid @enderror" id="nama_tipe_jaminan" name="nama_tipe_jaminan" value="{{ $tipeJaminan->nama_tipe_jaminan }}">
                                                    @error('nama_tipe_jaminan')
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
                                                            <option value="BPJS" {{ $tipeJaminan->tipe_jaminan == 'BPJS' ? 'selected' : '' }}>BPJS</option>
                                                            <option value="LAINYA" {{ $tipeJaminan->tipe_jaminan == 'LAINYA' ? 'selected' : '' }}>LAINYA</option>
                                                            <option value="PRIBADI" {{ $tipeJaminan->tipe_jaminan == 'PRIBADI' ? 'selected' : '' }}>PRIBADI</option>
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
                                    </div>
                                </div>   
                                <div class="col-lg-12">
                                    <a href="/bed/data-bed" class="btn btn-danger col-lg-2 ms-1">Cancel</a>
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