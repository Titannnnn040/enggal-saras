@extends('layouts/dashboard')
@section('dashboard')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <h1 class="ms-3 mt-2 mb-0">Enggal Saras</h1>
  <div class="container-fluid py-4">
    <div class="row">
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
                    <h6>Kode Pemeriksaan Lab</h6>
                    <input type="text" name="code">
                  </div>
                  <div class="search col-lg-6">
                    <h6>Nama Pemeriksaan Lab</h6>
                    <input type="text" name="name">
                  </div>
                  <div class="submit-filter d-flex  justify-content-between mt-3">
                    <button type="submit" class="btn btn-success col-lg-1">Search</button>
                    <a href="{{route('data-pemeriksaan-lab')}}" class="btn btn-danger col-lg-1">clear</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card my-3">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-success shadow-success d-flex align-items-center justify-content-between border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3 mb-0  d-flex align-items-center" style="margin-top:-9px;">Data Pemeriksaan Lab</h6>
              <a href="{{route('create-pemeriksaan-lab')}}" class="my-0 me-3 btn-add-data d-flex align-items-center">
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
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Code</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pemeriksaan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kelompok</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Satuan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipe</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                </thead>
                <?php $num = 1 ?>
                <tbody>
                  @foreach ($data as $item)
                    <tr>
                      <td class="align-middle text-center text-xs">
                          <h6 class="mb-0 text-xs">{{ $num++ }}</h6>
                      </td>
                      <td class="align-middle text-center text-xs">
                          <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->code }}</p>
                      </td>
                      <td class="align-middle text-center text-xs">
                          <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->name }}</p>
                      </td>
                      <td class="align-middle text-center text-xs">
                          <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->jenis }}</p>
                      </td>
                      <td class="align-middle text-center text-xs">
                          <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->kelompok }}</p>
                      </td>
                      <td class="align-middle text-center text-xs">
                          <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->satuan }}</p>
                      </td>
                      <td class="align-middle text-center text-xs">
                          <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->keterangan }}</p>
                      </td>
                      <td class="align-middle text-center text-xs">
                          <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->tipe == 1 ? 'Kuantitatif' : ($item->tipe == 2 ? 'Kualitatif' : ($item->tipe == 3 ? 'Kualitatif Khusus' : '')) }}</p>
                      </td>
                      <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bolder d-flex justify-content-center align-center">
                            <form action="{{route('edit-pemeriksaan-lab', ['uuid' => $item->uuid])}}">
                              @csrf
                              <button class="btn btn-outline-success" id="button-create-user" style="margin-top:10px;margin-bottom:10px;margin-right:10px;"><i class="fa-solid fa-user-pen"></i></button>
                            </form>
                            <form action="{{ route('delete-pemeriksaan-lab', ['uuid' => $item->uuid]) }}" id="delete-form-{{$item->id}}" data-id="{{$item->id}}" method="post">
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
    <footer class="footer py-4  ">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              © <script>
                document.write(new Date().getFullYear())
              </script>,
              <a href="" class="font-weight-bold" target="_blank">Klinik Enggal Saras</a>
              All Right Reserved
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="" class="nav-link text-muted" target="_blank">Contact Us :</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link text-muted px-1" target="_blank"><i class="fa-brands fa-whatsapp text-md"></i></a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link text-muted px-1" target="_blank"><i class="fa-brands fa-instagram text-md"></i></a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link text-muted px-1" target="_blank"><i class="fa-solid fa-phone text-md"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
</main>
@endsection


