@extends('layouts/dashboard')
@section('dashboard')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <h1 class="ms-3 mt-2 mb-0">Enggal Saras</h1>
  <div class="container-fluid py-4">
    <div class="container-fluid py-1">
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
                      <h6>Nama Dokter</h6>
                      <input type="text" name="nama_lengkap">
                    </div>
                    
                    <div class="search col-lg-6">
                      <h6>Nik</h6>
                      <input type="text" name="nik">
                    </div>
                    <div class="submit-filter d-flex  justify-content-between mt-3">
                      <button type="submit" class="btn btn-success col-lg-1">Search</button>
                      <a href="/dashboard/perawat/data-perawat" class="btn btn-danger col-lg-1">clear</a>
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
                <h6 class="text-white text-capitalize ps-3 mb-0  d-flex align-items-center" style="margin-top:-9px;">Jadwal Dokter</h6>
                <a href="/tenaga-medis/create-jadwal-dokter" class="my-0 me-3 btn-add-data d-flex align-items-center">
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
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Layanan</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dokter</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Praktik</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Senin</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Selasa</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rabu</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kamis</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumat</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sabtu</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Minggu</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      </tr>
                  </thead>
                  <?php $num = 1 ?>
                  <tbody>
                    @foreach ($jadwalDokter as $item)
                      <tr>
                        <td class="align-middle text-center text-xs">
                            <h6 class="mb-0 text-xs">{{ $num++ }}</h6>
                        </td>
                        <td class="align-middle text-center text-xs">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ !empty($item->Layanan->nama_layanan) ? $item->Layanan->nama_layanan : '' }}</p>
                        </td>
                        <td class="align-middle text-center text-xs">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->Dokter->nama_lengkap }}</p>
                        </td>
                        <td class="align-middle text-center text-xs">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->jadwal_praktik }}</p>
                        </td>
                        <td class="align-middle text-center text-xs">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->senin == null ? '-' : $item->senin}}</p>
                        </td>
                        <td class="align-middle text-center text-xs">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->selasa == null ? '-' : $item->selasa }}</p>
                        </td>
                        <td class="align-middle text-center text-xs">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->rabu == null ? '-' : $item->rabu}}</p>
                        </td>
                        <td class="align-middle text-center text-xs">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->kamis == null ? '-' : $item->kamis}}</p>
                        </td>
                        <td class="align-middle text-center text-xs">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->jumat == null ? '-' : $item->jumat}}</p>
                        </td>
                        <td class="align-middle text-center text-xs">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->sabtu == null ? '-' : $item->sabtu}}</p>
                        </td>
                        <td class="align-middle text-center text-xs">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->minggu == null ? '-' : $item->minggu}}</p>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bolder d-flex justify-content-center align-center">
                              <form action="{{ route('edit-jadwal-dokter', ['id' => $item->id]) }}">
                                @csrf
                                <button class="btn btn-outline-success" id="button-create-user" style="margin-top:10px;margin-bottom:10px;margin-right:10px;"><i class="fa-solid fa-user-pen"></i></button>
                              </form>
                              <form action="{{ route('delete-jadwal-dokter', ['id' => $item->id]) }}" id="delete-form-{{$item->id}}" data-id="{{$item->id}}" method="post">
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


