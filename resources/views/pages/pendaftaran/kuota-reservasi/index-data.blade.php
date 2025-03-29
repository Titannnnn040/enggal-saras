@extends('layouts/form_layouts')
@section('form_layouts')
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
                      <h6>Dokter</h6>
                      <select class="form-control" id="dokter_id" name="dokter_id" required>
                        <option value="">Please Select</option>
                        @foreach ($dokter as $item)
                          <option value="{{$item->id}}">{{$item->nama_lengkap}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="search col-lg-6">
                      <h6>Layanan</h6>
                      <select class="form-control" id="layanan_id" name="layanan_id" required>
                        <option value="">Please Select</option>
                        @foreach ($layanan as $item)
                          <option value="{{$item->id}}">{{$item->nama_layanan}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="d-flex mt-3">
                      <button type="button" class="btn btn-success col-lg-1 btn-search me-1">Search</button>
                      <button type="button" class="btn btn-primary col-lg-1 btn-clear">Clear</button>
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
                <h6 class="text-white text-capitalize ps-3 mb-0  d-flex align-items-center" style="margin-top:-9px;">Data Kuota Reservasi</h6>
                <button type="button" class="my-0 me-3 border-0 btn-add-data d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#createModal">
                  <i class="fa-solid fa-plus me-1"></i>
                  tambah data
                </button>
              </div>
            </div>
            <div class="card-body px-5 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0 table-kuota-reservasi" id="table-kuota-reservasi">
                  <thead>
                      <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Layanan</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dokter</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hari</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Praktek</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Maksimal</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      </tr>
                  </thead>
                  <tbody>
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
<!-- Modal -->
<style>
  .modal{
    --bs-modal-width:80vw;
  }
</style>
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
  aria-hidden="true">
  <div class="modal-dialog rounded" style="position: absolute;left:50%;top:50%;transform:translate(-50%, -50%)" role="document">
      <form action="{{ route('store-kuota-reservasi')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-content" >
          <div class="modal-header">
              <h5 class="modal-title" id="createModalLabel">Create Kuota Reservasi</h5>
              <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body row d-flex">
            <div class="form-group col-lg-6">
                <label for="layanan" class="mt-3">Layanan</label>
                <select class="form-control" id="layanan" name="layanan" required>
                    <option value="">Please Select</option>
                    @foreach ($layanan as $item)
                      <option value="{{$item->id}}">{{$item->nama_layanan}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-lg-6">
                <label for="dokter" class="mt-3">Dokter</label>
                <select class="form-control" id="dokter" name="dokter" required>
                    <option value="">Please Select</option>
                    @foreach ($dokter as $item)
                      <option value="{{$item->id}}">{{$item->nama_lengkap}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-lg-6">
                <label for="day" class="mt-3">Hari</label>
                <select class="form-control" id="day" name="day" required>
                    <option value="">Please Select</option>
                    <option value="SENIN">SENIN</option>
                    <option value="SELASA">SELASA</option>
                    <option value="RABU">RABU</option>
                    <option value="KAMIS">KAMIS</option>
                    <option value="JUMAT">JUMAT</option>
                    <option value="SABTU">SABTU</option>
                    <option value="MINGGU">MINGGU</option>
                </select>
            </div>
            <div class="form-group col-lg-6">
                <label for="praktek" class="mt-3">Praktek</label>
                <select class="form-control" id="praktek" name="praktek" required>
                    <option value="">Please Select</option>
                    <option value="PAGI">PAGI</option>
                    <option value="SORE MALAM">SORE MALAM</option>
                </select>
            </div>
            <div class="form-group col-lg-6">
                <label for="type" class="mt-3">Jenis</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="">Please Select</option>
                    <option value="BPJS">BPJS</option>
                    <option value="NON BPJS">NON BPJS</option>
                </select>
            </div>
            <div class="form-group col-lg-6">
                <label for="max_reservasi" class="mt-3">Maksimal Reservasi</label>
                <input type="number" class="form-control" id="max_reservasi" name="max_reservasi" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success"><i class="bx bx-upload"></i> Submit</button>
          </div>
        </div>
      </form>
  </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
  aria-hidden="true">
  <div class="modal-dialog rounded" style="position: absolute;left:50%;top:50%;transform:translate(-50%, -50%)" role="document">
      <form action="{{ route('update-kuota-reservasi')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-content" >
          <div class="modal-header">
              <h5 class="modal-title" id="createModalLabel">Edit Kuota Reservasi</h5>
              <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body row d-flex">
            <div class="form-group col-lg-6">
                <label for="layanan" class="mt-3">Layanan</label>
                <input type="hidden" class="form-control" id="id" name="id" value="">
                <select class="form-control" id="layanan" name="layanan" required>
                    <option value="">Please Select</option>
                    @foreach ($layanan as $item)
                      <option value="{{$item->id}}">{{$item->nama_layanan}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-lg-6">
                <label for="dokter" class="mt-3">Dokter</label>
                <select class="form-control" id="dokter" name="dokter" required>
                    <option value="">Please Select</option>
                    @foreach ($dokter as $item)
                      <option value="{{$item->id}}">{{$item->nama_lengkap}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-lg-6">
                <label for="day" class="mt-3">Hari</label>
                <select class="form-control" id="day" name="day" required>
                    <option value="">Please Select</option>
                    <option value="SENIN">SENIN</option>
                    <option value="SELASA">SELASA</option>
                    <option value="RABU">RABU</option>
                    <option value="KAMIS">KAMIS</option>
                    <option value="JUMAT">JUMAT</option>
                    <option value="SABTU">SABTU</option>
                    <option value="MINGGU">MINGGU</option>
                </select>
            </div>
            <div class="form-group col-lg-6">
                <label for="praktek" class="mt-3">Praktek</label>
                <select class="form-control" id="praktek" name="praktek" required>
                    <option value="">Please Select</option>
                    <option value="PAGI">PAGI</option>
                    <option value="SORE MALAM">SORE MALAM</option>
                </select>
            </div>
            <div class="form-group col-lg-6">
                <label for="type" class="mt-3">Jenis</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="">Please Select</option>
                    <option value="BPJS">BPJS</option>
                    <option value="NON BPJS">NON BPJS</option>
                </select>
            </div>
            <div class="form-group col-lg-6">
                <label for="max_reservasi" class="mt-3">Maksimal Reservasi</label>
                <input type="number" class="form-control" id="max_reservasi" name="max_reservasi" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success"><i class="bx bx-upload"></i> Submit</button>
          </div>
        </div>
      </form>
  </div>
</div>
@endsection


