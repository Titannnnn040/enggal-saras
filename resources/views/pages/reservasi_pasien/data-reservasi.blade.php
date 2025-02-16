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
                      <h6>No Reservasi</h6>
                      <select id="mySelect" class="form-select" name="no_reservasi">
                        <option value="">Please Select</option>
                        @foreach ($reservasiPasien as $item)
                            <option value="{{$item->no_reservasi}}">{{$item->no_reservasi}}</option>
                        @endforeach
                      </select>      
                    </div>
                    <div class="search col-lg-6">
                      <h6>No Rekam Medis</h6>
                      <select id="mySelect2" class="form-select" name="no_rm">
                        <option value="">Please Select</option>
                        @foreach ($reservasiPasien as $item)
                            <option value="{{$item->no_rekam_medis}}">{{$item->no_rekam_medis}} &nbsp;  | &nbsp; {{$item->nama_lengkap}}   </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="search col-lg-6">
                      <h6>Start Date Reservasi</h6>
                      <input type="date" class="" name="reservasi_start_date">
                    </div>
                    <div class="search col-lg-6">
                      <h6>End Date Reservasi</h6>
                      <input type="date" class="" name="reservasi_end_date">
                    </div>
                    <div class="search col-lg-6">
                      <h6>Layanan</h6>
                      <select id="" class="form-select" style="border:#AAAAAA solid 1px; padding:2.5px 0;border-radius:5px;" name="layanan_id">
                        <option value="">Please Select</option>
                        @foreach ($layanan as $item)
                            <option value="{{$item->id}}">{{$item->id}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="search col-lg-6">
                      <h6>Jadwal Praktik</h6>
                      <select id="" class="form-select"  style="border:#AAAAAA solid 1px; padding:2.5px 0;border-radius:5px;" name="jadwal_praktik">
                        <option value="">&nbsp; Please Select</option>
                        <option value="PAGI">PAGI</option>
                        <option value="SORE-MALAM">SORE-MALAM</option>
                      </select>
                    </div>
                    <div class="search col-lg-6">
                      <h6>Status</h6>
                      <select id="" class="form-select"  style="border:#AAAAAA solid 1px; padding:2.5px 0;border-radius:5px;" name="status">
                        <option value="">Please Select</option>
                        <option value="1" style="padding: 10px">BOOKING</option>
                        <option value="2">REGISTER</option>
                        <option value="3">SKIP</option>
                      </select>
                    </div>
                    <div class="submit-filter d-flex  justify-content-between mt-3">
                      <button type="submit" class="btn btn-success col-lg-1">Search</button>
                      <a href="/pasien/data-reservasi-pasien" class="btn btn-danger col-lg-1">clear</a>
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
                <h6 class="text-white text-capitalize ps-3 mb-0  d-flex align-items-center" style="margin-top:-9px;">Data Reservasi Pasien</h6>
                <a href="/pasien/create-reservasi-pasien" class="my-0 me-3 btn-add-data d-flex align-items-center">
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
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Reservasi</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Reservasi</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jam Reservasi</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Layanan</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dokter</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Praktek</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Medical Record</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pasien</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nomor HP</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Antrian</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      </tr>
                  </thead>
                  <?php $num = 1 ?>
                  <tbody>
                    @foreach ($reservasi as $item)
                      <tr>
                        <td class="align-middle text-center text-xs">
                            <h6 class="mb-0 text-xs">{{ $num++ }}</h6>
                        </td>
                        <td class="align-middle text-center text-xs">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->no_reservasi }}</p>
                        </td>
                        <td class="align-middle text-center text-xs">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->reservasi_date }}</p>
                        </td>
                        <td class="align-middle text-center text-xs">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->time }}</p>
                        </td>
                        <td class="align-middle text-center text-xs">
                          @foreach ($layanan as $itemLayanan)
                            @if ($item->layanan_id == $itemLayanan->id)
                              <p class="text-xs font-weight-bold mb-0 text-center">{{  $itemLayanan->nama_layanan }}</p>
                            @endif
                          @endforeach
                        </td>
                        <td class="align-middle text-center text-xs">
                          @foreach ($dokter as $itemDokter)
                            @if ($item->dokter_code == $itemDokter->no_dokter)
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $itemDokter->nama_lengkap }}</p>
                            @endif
                          @endforeach
                        </td>
                        <td class="align-middle text-center text-xs">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->jadwal_praktik }}</p>
                        </td>
                        <td class="align-middle text-center text-xs">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->no_rm }}</p>
                        </td>
                        <td class="align-middle text-center text-xs">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->pasien_name }}</p>
                        </td>
                        <td class="align-middle text-center text-xs">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->phone_no }}</p>
                        </td>
                        <td class="align-middle text-center text-xs">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->no_antrian }}</p>
                        </td>
                        <td class="align-middle text-center text-xs">
                          @if($item->status == 1)
                            <span class="btn btn-sm btn-info mt-3">Booking</span>
                          @elseif ($item->status == 2)
                            <span class="btn btn-sm btn-warning mt-3">Confirm</span>
                          @elseif ($item->status == 3)
                            <span class="btn btn-sm btn-danger mt-3">Skip</span>
                          @elseif ($item->status == 4)
                            <span class="btn btn-sm btn-success mt-3">Terdaftar</span>
                          @endif
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bolder d-flex justify-content-center align-center">
                              @if ($item->status == 1 || $item->status == 2 || $item->status == 3) 
                                <form class="update-form" data-id="{{ $item->id }}" action="{{ route('update-status-reservasi' , ['id' => $item->id])}}" method="post">
                                  @csrf
                                  @method('put')
                                  <button type="button" class="btn btn-success mt-3 button-create-user" data-id="{{ $item->id }}" style="margin-right:10px;">
                                      <i class="fa-solid fa-check"></i>
                                  </button>
                                </form>
                                <form action="{{ route('regist-pasien', ['id' => $item->id])}}">
                                  @csrf
                                  <button class="btn btn-facebook mt-3" style="margin-right:10px;">
                                    <i class="fa-solid fa-address-card"></i>
                                  </button>
                                </form>
                                <form action="{{ route('edit-reservasi', ['id' => $item->id])}}">
                                  @csrf
                                  <button class="btn btn-outline-success mt-3" style="margin-right:10px;"><i class="fa-solid fa-user-pen"></i></button>
                                </form>
                                <form action="{{ route('delete-reservasi', ['id' => $item->id])}}"  method="post" class="delete-form" data-id="{{$item->id}}">
                                  @method('delete')
                                  @csrf
                                  <button type="button" class="btn btn-outline-danger mt-3 button-delete" data-id="{{$item->id}}" style=" ">
                                      <i class="fa-solid fa-trash"></i>
                                  </button>
                                </form>
                              @endif
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


