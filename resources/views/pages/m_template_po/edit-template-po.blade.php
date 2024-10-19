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
                  <h6 class="text-white text-capitalize ps-3">Edit Template PO</h6>
                </div>
              </div>
              <div class="card-body px-5 pb-2">
                <div class="form"  style="background-color:#FDFEFD;">
                    <div class="content">
                        <form action="{{route('update-template-po', ['code' => $data->template_po_code])}}" method="post"> 
                            @csrf    
                            @method('put') 
                            <div class="d-flex flex-column">

                                <div class="col-lg-12 mb-4">
                                    <div class="me-0 row">

                                        <div class="mb-3">
                                            <div class="d-flex">
                                                <label for="code" class="form-label col-lg-2 me-2">Kode Template PO :</label>
                                                <label>autogenerate</label>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="d-flex">
                                                <label for="template_po_name" class="form-label col-lg-2 me-2">Nama Template PO :</label>
                                                <div class="d-flex flex-column col-md-10">
                                                    <input type="text" class="form-control @error('template_po_name') is-invalid @enderror" id="template_po_name" name="template_po_name" value="{{ $data->template_po_name }}">
                                                    @error('template_po_name')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex">
                                                <label for="desc" class="form-label col-lg-2 me-2">Isi Template PO :</label>
                                                <div class="d-flex flex-column col-md-10">
                                                    <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror" id="" cols="30" rows="4">{{ $data->desc }}</textarea>
                                                    @error('desc')
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
                                    <a href="{{route('data-template-po')}}" class="btn btn-danger col-lg-1 ms-1">Cancel</a>
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