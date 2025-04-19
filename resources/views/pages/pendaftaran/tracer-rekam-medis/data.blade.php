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
              <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Filter</h6>
              </div>
            </div>
            <div class="card-body px-5 pb-2">
              <div class="filter-data mb-3">
                <form action="" class="d-flex col-lg-12">
                  <div class="row col-lg-12">
                    <div class="search col-lg-6">
                      <h6>Created</h6>
                      <input type="date" class="" name="created_date">
                    </div>
                    <div class="search col-lg-6">
                      <h6 style="color: rgba(240, 248, 255, 0)">End Date Reservasi</h6>
                      <input type="date" class="" name="end_date">
                    </div>
                    <div class="submit-filter d-flex  justify-content-between mt-3">
                      <button type="submit" class="btn btn-success col-lg-1">Search</button>
                      <a href="{{route('data-registrasi-pasien-luar')}}" class="btn btn-danger col-lg-1">clear</a>
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
                <h6 class="text-white text-capitalize ps-3 mb-0  d-flex align-items-center" style="margin-top:-9px;">Data Tracer Rekam Medis</h6>
                <a href="{{route('create-tracer-rekam-medis')}}" class="my-0 me-3 btn-add-data d-flex align-items-center">
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
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Tracer</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">RM Code</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pasien</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Di Pinjam Ke</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dokter</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Penanggung Jawab</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kembali</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                          </tr>
                      </thead>
                      <?php $num = 1 ?>
                      @foreach ($data['dataTracer'] as $item)
                        <tbody>
                            <tr>
                                <td>{{$num++}}</td>
                                <td>{{$item->tracer_code}}</td>
                                <td>{{$item->date}}</td>
                                <td>{{$item->patient}}</td>
                                <td>
                                  @foreach ($data['dataPasien'] as $dataPatient)
                                    {{$item->patient == $dataPatient->no_rekam_medis ? $dataPatient->nama_lengkap : '' }}
                                  @endforeach
                                </td>
                                <td>
                                  @foreach ($data['dataLayanan'] as $dataLayanan)
                                    {{$item->pinjam == $dataLayanan->id ? $dataLayanan->nama_layanan : '' }}
                                  @endforeach
                                </td>
                                <td>
                                  @foreach ($data['dataDokter'] as $dataDokter)
                                    {{$item->dokter == $dataDokter->id ? $dataDokter->nama_lengkap : '' }}
                                  @endforeach
                                </td>
                                <td>
                                    {{$item->penanggung_jawab}}
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bolder d-flex justify-content-center align-center">
                                      @if($item->status == 1)
                                        <form action="{{ route('update-status-tracer', ['code' => $item->tracer_code]) }}" method="POST">
                                          @csrf
                                          @method('PUT')
                                          <button class="btn btn-outline-info mt-3" style="margin-right:10px;">Update Status</button>
                                        </form>
                                      @else
                                        <span>{{$item->update_status}}</span>
                                      @endif
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bolder d-flex justify-content-center align-center">
                                      <form action="{{ route('edit-registrasi-pasien-luar', ['id' => $item->id]) }}">
                                        @csrf
                                        <button class="btn btn-outline-info mt-3" style="margin-right:10px;"><i class="fa-solid fa-print"></i></button>
                                      </form>
                                      @if($item->status == 1)
                                        <form action="{{ route('edit-tracer-rekam-medis', ['code' => $item->tracer_code]) }}">
                                          @csrf
                                          <button class="btn btn-outline-success mt-3" style="margin-right:10px;"><i class="fa-solid fa-user-pen"></i></button>
                                        </form>
                                        <form action="{{ route('delete-tracer-rekam-medis', ['code' => $item->tracer_code]) }}" data-id="{{'delete-form-'.$item->tracer_code}}" method="post">
                                          @method('delete')
                                          @csrf
                                          <button type="button" class="btn btn-outline-danger mt-3 button-delete-regist" data-id="{{$item->tracer_code}}" style="margin-top:10px;margin-bottom:10px;margin-right:10px;">
                                              <i class="fa-solid fa-trash"></i>
                                          </button>
                                        </form>  
                                      @endif
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                      @endforeach
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
<script>
  document.querySelectorAll('.button-delete-regist').forEach(function(button) {
    button.addEventListener('click', function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you really want to delete this record?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                button.closest('form').submit();
            }
        });
    });
});

</script>
@endsection


