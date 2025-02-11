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
                      <h6>No.Rekam Medis</h6>
                      <input type="text" value="{{ old('no_rekam_medis') }}" name="no_rekam_medis">
                    </div>
                    <div class="search col-lg-6">
                      <h6>Nama Lengkap</h6>
                      <input type="text" {{ old('nama_lengkap') }} name="nama_lengkap">
                    </div>
                    <div class="search col-lg-6">
                      <h6>No. BPJS</h6>
                      <input type="text" {{ old('no_bpjs') }} name="no_bpjs">
                    </div>
                    <div class="search col-lg-6">
                      <h6>Nik</h6>
                      <input type="text" {{ old('nik') }} name="nik">
                    </div>
                    <div class="submit-filter d-flex  justify-content-between mt-3">
                      <button type="submit" class="btn btn-success col-lg-1">Search</button>
                      <a href="/dashboard/pendaftaran" class="btn btn-danger col-lg-1">clear</a>
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
                <h6 class="text-white text-capitalize ps-3 mb-0  d-flex align-items-center" style="margin-top:-9px;">Data Pasien</h6>
                <a href="/pasien/create-pasien" class="my-0 me-3 btn-add-data d-flex align-items-center">
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
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.Rekam-Medis</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Lengkap</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Panggilan</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Kelamin</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Umur</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Lahir</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIK</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Pernikahan</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pekerjaan</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Metode Pembayaran</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. BPJS / Asuransi</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Upload Foto</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Catatan Alergi Obat</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. Handphone</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Provinsi</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kota</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kecamatan</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kelurahan</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat Lengkap</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Agama</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pendidikan</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Ayah</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Ibu</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kondisi Khusus</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      </tr>
                  </thead>
                  <?php $num = 1 ?>
                  <tbody>
                    @foreach ($rawatJalan as $item)
                      <tr>
                          <td class="align-middle text-center text-xs">
                              <h6 class="mb-0 text-xs">{{ $num++ }}</h6>
                          </td>
                          <td class="align-middle text-center text-xs">
                              <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->no_rekam_medis }}</p>
                          </td>
                          <td class="align-middle text-center text-xs">
                              <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->nama_lengkap }}</p>
                          </td>
                          <td class="align-middle text-center text-xs">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->nama_panggilan }}</p>
                          </td>
                          <td class="align-middle text-center">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->jenis_kelamin }}</p>
                          </td>
                          <td class="align-middle text-center">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->umur }}</p>
                          </td>
                          <td class="align-middle text-center">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->birth_date }}</p>
                          </td>
                          <td class="align-middle text-center">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->nik }}</p>
                          </td>
                          <td class="align-middle text-center">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->status_pernikahan }}</p>
                          </td>
                          <td class="align-middle text-center">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->pekerjaan }}</p>
                          </td>
                          <td class="align-middle text-center">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->payment_method->name }}</p>
                          </td>
                          <td class="align-middle text-center">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->no_bpjs_asuransi }}</p>
                          </td>
                          <td class="align-middle text-center">
                            @if ($item->upload_foto)
                                <button class="btn btn-success" id="show-image-{{ $item->id }}"><i class="fa-solid fa-eye"></i></button>
                                <img id="img-show-{{ $item->id }}" src="{{ asset('storage/' . $item->upload_foto) }}" width="100" alt="{{ $item->upload_foto }}" style="display:none;">
                            @endif   
                        </td>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>   
                        <script>
                            $(document).ready(function(){
                                $("#show-image-{{ $item->id }}").click(function(){
                                    $("#img-show-{{ $item->id }}").toggle();
                                    $("#show-image-{{ $item->id }}").toggle();
                                });
                            });
                            $(document).ready(function(){
                                $("#img-show-{{ $item->id }}").click(function(){
                                    $("#show-image-{{ $item->id }}").toggle();
                                    $("#img-show-{{ $item->id }}").toggle();
                                });
                            });
                        </script>                              
                          <td class="align-middle text-center">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->note }}</p>
                          </td>
                          <td class="align-middle text-center">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->phone_number }}</p>
                          </td>
                          <td class="align-middle text-center">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->province->name }}</p>
                          </td>
                          <td class="align-middle text-center">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->city->name }}</p>
                          </td>
                          <td class="align-middle text-center">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->kecamatan->name }}</p>
                          </td>
                          <td class="align-middle text-center">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->kelurahan->name }}</p>
                          </td>
                          <td class="align-middle text-center">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->address }}</p>
                          </td>
                          <td class="align-middle text-center">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->agama }}</p>
                          </td>
                          <td class="align-middle text-center">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->pendidikan }}</p>
                          </td>
                          <td class="align-middle text-center">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->nama_ayah }}</p>
                          </td>
                          <td class="align-middle text-center">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->nama_ibu }}</p>
                          </td>
                          <td class="align-middle text-center">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->kondisi_khusus }}</p>
                          </td>
                          <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bolder d-flex justify-content-center align-center">
                              <form action="/pasien/edit-pasien/{{ $item->id }}">
                                @csrf
                                <button class="btn btn-outline-success" id="button-create-user" style="margin-top:10px;margin-bottom:10px;margin-right:10px;"><i class="fa-solid fa-user-pen"></i></button>
                              </form>
                              
                                <form action="/pasien/delete-pasien/{{ $item->id }}" method="post">
                                  @method('delete')
                                  @csrf
                                  <button class="btn btn-outline-danger" onclick="return confirm('You Sure?')" style="margin-top:10px; margin-bottom:10px;">
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


