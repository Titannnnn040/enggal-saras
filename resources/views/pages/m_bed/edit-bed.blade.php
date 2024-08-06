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
                  <h6 class="text-white text-capitalize ps-3">Edit Kamar</h6>
                </div>
              </div>
              <div class="card-body px-5 pb-2">
                <div class="form"  style="background-color:#FDFEFD;">
                    <div class="content">
                        <form action="/bed/update-bed/{{ $bed->id }}" method="post" class="d-flex col-lg-12"> 
                            @csrf    
                            @method('put') 
                            <div class="d-flex flex-column">

                                <div class="d-flex col-lg-12 mb-4">
                                    <div class="col-lg-12 col-xl-12 col-xxl-12 me-0 row">

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="code" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Kode Bed :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <input type="text" class="form-control " disabled id="kode-bed" name="kode-bed"  value="{{ $bed->kode_bed }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="nama_bed" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Nama Bed :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <input type="text" class="form-control @error('nama_bed') is-invalid @enderror" id="nama_bed" name="nama_bed" value="{{ $bed->nama_bed }}">
                                                    @error('nama_bed')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                        
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                            <div class="d-flex">
                                                <label for="kamar_id" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">Nama Kamar :</label>
                                                <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                    <div class="">
                                                        <select class="form-select @error('kamar_id') is-invalid @enderror" name="kamar_id"  id="kamar_id">
                                                            <option value="">Please Select</option>
                                                            @foreach ($kamar as $item)
                                                                <option value="{{ $item->id }}" {{ $bed->kamar_id == $item->id ? 'selected' : '' }}>{{ $item->nama_kamar }}</option>
                                                            @endforeach
                                                        </select>          
                                                        @error('kamar_id')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="d-flex form-check form-switch mt-3">
                                                            <input type="checkbox" class="form-check-input @error('status') is-invalid @enderror" id="status" name="status" value="Aktif" {{ $bed->status == 'Aktif' ? 'checked' : '' }}>
                                                            <label for="status" class="form-label ms-2">Aktif</label>
                                                        </div>
                                                        <div class="d-flex form-check form-switch mt-3 ms-3">
                                                            <input type="checkbox" class="form-check-input @error('cadangan') is-invalid @enderror" id="cadangan" name="cadangan" value="Yes"{{ $bed->cadangan == 'Yes' ? 'checked' : '' }}> 
                                                            <label for="cadangan" class="form-label ms-2">Cadangan</label>
                                                        </div>
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