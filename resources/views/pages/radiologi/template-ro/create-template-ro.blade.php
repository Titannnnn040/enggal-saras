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
                            <h6 class="text-white text-capitalize ps-3">Create Template</h6>
                        </div>
                    </div>
                    <div class="card-body px-5 pb-2">
                        <div class="form"  style="background-color:#FDFEFD;">
                            <div class="content">
                                <form action="" method="post"> 
                                    @csrf     
                                    <div class="d-flex flex-column">
                                        <div class="col-lg-12 mb-4">
                                            <div class="me-0 row">
                                                <div class="col-lg-4 mb-3">
                                                    <div class="d-flex">
                                                        <label for="template_name" class="form-label col-lg-3 me-2">Nama Template PO :</label>
                                                        <div class="d-flex flex-column col-md-9">
                                                            <input type="text" class="form-control @error('template_name') is-invalid @enderror" id="template_name" name="template_name" value="{{ old('template_name') }}">
                                                            @error('template_name')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-3">
                                                    <div class="d-flex">
                                                        <label for="dokter" class="form-label col-lg-3 me-2 ">Dokter :</label>
                                                        <div class="d-flex flex-column col-md-9">
                                                            <select id="mySelect" class="form-select @error('dokter') is-invalid @enderror" name="dokter"  id="dokter">
                                                                <option value="">Please Select</option>
                                                                @foreach ($dokter as $item)
                                                                    <option value="{{$item->no_dokter}}">{{$item->nama_lengkap}}</option>
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
                                            <div class="mb-3">
                                                <div class="d-flex">
                                                    <label for="content" class="form-label col-lg-1">Isi Template PO :</label>
                                                    <div class="d-flex flex-column col-md-10">
                                                        <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" id="" cols="30" rows="4">{{ old('content') }}</textarea>
                                                        @error('content')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <a href="{{route('data-template-ro')}}" class="btn btn-danger col-lg-1 ms-1">Cancel</a>
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
<script>
    $(document).ready(function() {
        $('#mySelect').select2({
            placeholder: "Please Select",
            });
    });
</script>
@endsection