@extends('layouts/dashboard')
@section('dashboard')
<!-- Page Content  -->
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

  <h1 class="ms-3 mt-2 mb-0">Enggal Saras</h1>
  <div class="container-fluid py-4">
    
    <div class="container-fluid py-1">
      <div class="row">
        <div class="col-lg-12">
          <div class="card my-3">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-success shadow-success d-flex align-items-center justify-content-between border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 mb-0  d-flex align-items-center" style="margin-top:-9px;">Data Kondisi Gigi</h6>
                <a href="{{route('create-kondisi-gigi')}}" class="my-0 me-3 btn-add-data d-flex align-items-center">
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
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Arti</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Warna</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @php $num = 1 @endphp
                        @foreach ($data as $item)
                          <tr>
                            <td>{{$num++}}</td>
                            <td>{{$item->jenis}}</td>
                            <td>{{$item->code}}</td>
                            <td>{{$item->arti}}</td>
                            <td>{{$item->keterangan}}</td>
                            <td  style="background-color:{{$item->warna}};width:2px;padding:unset;height:2px"></td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bolder d-flex justify-content-center align-center">
                                <form action="{{ route('edit-kondisi-gigi', ['uuid' => $item->uuid]) }}">
                                  @csrf
                                  <button class="btn btn-outline-success" id="button-create-user" style="margin-top:10px;margin-bottom:10px;margin-right:10px;"><i class="fa-solid fa-user-pen"></i></button>
                                </form>
                                
                                <form action="{{ route('delete-kondisi-gigi', ['uuid' => $item->uuid]) }}" id="delete-form-{{$item->id}}" data-id="{{$item->id}}" method="post">
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


