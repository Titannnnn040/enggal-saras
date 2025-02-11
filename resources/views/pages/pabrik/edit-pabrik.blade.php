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
                            <h6 class="text-white text-capitalize ps-3">Edit Pabrik / Principal</h6>
                        </div>
                    </div>
                    <div class="card-body px-5 pb-2">
                        <div class="form"  style="background-color:#FDFEFD;">
                            <div class="content">
                                <form action="{{route('update-pabrik', ['code' => $pabrik->pabrik_code])}}" method="post" class="d-flex col-lg-12"> 
                                    @csrf    
                                    @method('put') 
                                    <div class="d-flex flex-column">

                                        <div class="d-flex col-lg-12 mb-4">
                                            <div class="col-lg-12 col-xl-12 col-xxl-12 me-0 row">

                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="code" class="form-label col-lg-3 me-2">Kode Pabrik / Principal :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <input type="text" class="form-control " disabled id="code" name="code"  value="{{ $pabrik->pabrik_code }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="pabrik_name" class="form-label col-lg-3 me-2">Nama Pabrik / Principal :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <input type="text" style="text-transform: uppercase" class="form-control @error('pabrik_name') is-invalid @enderror" id="pabrik_name" name="pabrik_name" value="{{ $pabrik->pabrik_name }}">
                                                            @error('pabrik_name')
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
                                            <a href="{{route('data-pabrik')}}" class="btn btn-danger col-lg-2 ms-1">Cancel</a>
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