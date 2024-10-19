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
                  <h6 class="text-white text-capitalize ps-3">Edit Distributor</h6>
                </div>
              </div>
              <div class="card-body px-5 pb-2">
                <div class="form"  style="background-color:#FDFEFD;">
                    <div class="content">
                        <form action="{{route('update-distributor', ['code' => $data->distributor_code])}}" method="post" class="d-flex col-lg-12"> 
                            @csrf    
                            @method('put') 
                            <div class="d-flex flex-column">
                                <div class="d-flex">
                                    <div class="col-lg-6 mb-4">
                                        <div class="col-lg-12 col-xl-12 col-xxl-12 me-0 row">
    
                                            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                <div class="d-flex">
                                                    <label for="code" class="form-label col-lg-3 me-2">Kode Distributor :</label>
                                                    <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                        <input type="text" class="form-control py-2" id="code" name="code" value="{{ $data->distributor_code }}" disabled>
                                                    </div>                                                </div>
                                            </div>
    
                                            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3" style="height:min-content">
                                                <div class="d-flex"  style="height:min-content">
                                                    <label for="distributor_name" class="form-label col-lg-3 me-2">Nama Distributor :</label>
                                                    <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                        <input type="text" class="form-control @error('distributor_name') is-invalid @enderror" id="distributor_name" name="distributor_name" value="{{ $data->distributor_name }}">
                                                        @error('distributor_name')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                <div class="d-flex">
                                                    <label for="address" class="form-label col-lg-3 me-2">Alamat :</label>
                                                    <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ $data->address }}">
                                                        @error('address')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                <div class="d-flex">
                                                    <label for="city" class="form-label col-lg-3 me-2">Kota :</label>
                                                    <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                        <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ $data->city }}">
                                                        @error('city')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-lg-6 mb-4">
                                        <div class="col-lg-12 col-xl-12 col-xxl-12 me-0 row"  style="height:min-content">
    
                                            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                <div class="d-flex">
                                                    <label for="contact_person" class="form-label col-lg-3 me-2">Contact Person :</label>
                                                    <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                        <input type="text" class="form-control @error('contact_person') is-invalid @enderror" id="contact_person" name="contact_person" value="{{ $data->contact_person }}">
                                                        @error('contact_person')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                <div class="d-flex">
                                                    <label for="phone_no" class="form-label col-lg-3 me-2">No. Handphone :</label>
                                                    <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                        <input type="text" class="form-control @error('phone_no') is-invalid @enderror" id="phone_no" name="phone_no" value="{{ $data->phone_no }}">
                                                        @error('phone_no')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                <div class="d-flex">
                                                    <label for="fax" class="form-label col-lg-3 me-2">Fax :</label>
                                                    <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                        <input type="text" class="form-control @error('fax') is-invalid @enderror" id="fax" name="fax" value="{{ $data->fax }}">
                                                        @error('fax')
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
                                    <a href="{{route('data-distributor')}}" class="btn btn-danger col-lg-1 ms-1">Cancel</a>
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