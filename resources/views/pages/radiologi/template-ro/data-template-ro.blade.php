@extends('layouts/dashboard')
@section('dashboard')
<!-- Page Content  -->
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

  <h1 class="ms-3 mt-2 mb-0">Enggal Saras</h1>
  <div class="container-fluid py-4">
    
    <div class="container-fluid py-1">
      {{-- <div class="row">
        <div class="col-lg-12">
          <div class="card my-3">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Filter</h6>
              </div>
            </div>
            <div class="card-body px-5 pb-2">
              <div class="filter-data mb-3">
                <form action="" class="d-flex col-lg-12">
                  <div class="row col-lg-12">
                    <div class="search col-lg-6">
                      <h6>Kode Template PO</h6>
                      <input type="text" name="template_po_code">
                    </div>
                    <div class="search col-lg-6">
                      <h6>Nama Template PO</h6>
                      <input type="text" name="template_po_name">
                    </div>
                    <div class="submit-filter d-flex  justify-content-between mt-3">
                      <button type="submit" class="btn btn-success col-lg-1">Search</button>
                      <a href="{{route('data-template-po')}}" class="btn btn-danger col-lg-1">clear</a>
                    </div>
                  </div>
                </form>
              </div>
          </div>
          </div>
        </div>
      </div> --}}
      <div class="row">
        <div class="col-lg-12">
          <div class="card my-3">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-success shadow-success d-flex align-items-center justify-content-between border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 mb-0  d-flex align-items-center" style="margin-top:-9px;">Data Template RO</h6>
                <a href="{{route('create-template-ro')}}" class="my-0 me-3 btn-add-data d-flex align-items-center">
                  <i class="fa-solid fa-plus me-1"></i>
                  tambah data
                </a>
              </div>
            </div>
            <div class="card-body px-5 pb-2">
              <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0" id="myTables">
                      <thead>
                          <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Template</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dokter</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @php $num = 1 @endphp
                        @foreach ($data as $item)
                          <tr>
                            <td>{{$num++}}</td>
                            <td>{{$item->template_name}}</td>
                            <td>{{$item->dokter->nama_lengkap}}</td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bolder d-flex justify-content-center align-center">
                                <form action="{{ route('edit-template-ro', ['uuid' => $item->uuid]) }}">
                                  @csrf
                                  <button class="btn btn-outline-success" id="button-create-user" style="margin-top:10px;margin-bottom:10px;margin-right:10px;"><i class="fa-solid fa-user-pen"></i></button>
                                </form>
                                
                                <form action="{{ route('delete-template-ro', ['uuid' => $item->uuid]) }}" id="delete-form-{{$item->id}}" data-id="{{$item->id}}" method="post">
                                  @method('delete')
                                  @csrf
                                  <button type="button" class="btn btn-outline-danger button-delete" data-id="{{$item->id}}" style="margin-top:10px;margin-bottom:10px;margin-right:10px;">
                                      <i class="fa-solid fa-trash"></i>
                                  </button>
                                </form>  
                              </span>
                          </td>
                          </tr>
                        @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection


