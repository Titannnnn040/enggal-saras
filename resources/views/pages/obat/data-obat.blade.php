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
                      <h6>Kode Obat & Alkes</h6>
                      <input type="text" name="obat_code">
                    </div>
                    <div class="search col-lg-6">
                      <h6>Nama Obat & Alkes</h6>
                      <input type="text" name="obat_name">
                    </div>
                    <div class="submit-filter d-flex  justify-content-between mt-3">
                      <button type="submit" class="btn btn-success col-lg-1">Search</button>
                      <a href="{{route('data-obat')}}" class="btn btn-danger col-lg-1">clear</a>
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
                <h6 class="text-white text-capitalize ps-3 mb-0  d-flex align-items-center" style="margin-top:-9px;">Data Obat & Alkes</h6>
                <a href="{{route('create-obat')}}" class="my-0 me-3 btn-add-data d-flex align-items-center">
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
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode Obat & Alkes</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Obat & Alkes</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Satuan</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pabrik / Principle</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated At</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated By</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">KFA</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">BPJS</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      </tr>
                  </thead>
                  <?php $num = 1 ?>
                  <tbody>
                    @foreach ($dataObat as $item)
                      <tr>
                        <td class="align-middle text-center text-xs">
                            <h6 class="mb-0 text-xs">{{ $num++ }}</h6>
                        </td>
                        <td class="align-middle text-center text-xs">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->code_obat }}</p>
                        </td>
                        <td class="align-middle text-center text-xs">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->name_obat }}</p>
                        </td>
                        <td class="align-middle text-center text-xs">
                            <p class="text-xs font-weight-bold mb-0 text-center"></p>
                        </td>
                        <td class="align-middle text-center text-xs">
                            @php
                              $pabrikName = optional($pabrik->firstWhere('pabrik_code', $spekObat->firstWhere('code_obat', $item->code_obat)->pabrik_principal ?? null))->pabrik_name;
                            @endphp
                          <p class="text-xs font-weight-bold mb-0 text-center">{{ $pabrikName }}</p>
                        </td>
                        <td class="align-middle text-center text-xs">
                          @php
                            $status = optional($spekObat->firstWhere('code_obat', $item->code_obat))->status;
                          @endphp
                          <p class="text-xs font-weight-bold mb-0 text-center">{{ $status == 1 ? 'Aktif' : '' }}</p>
                        </td>
                        <td class="align-middle text-center text-xs">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{$item->updated_at}}</p>
                        </td>
                        <td class="align-middle text-center text-xs">
                            <p class="text-xs font-weight-bold mb-0 text-center">{{$item->updated_by}}</p>
                        </td>
                        <td class="align-middle text-center text-xs">
                            <p class="text-xs font-weight-bold mb-0 text-center"></p>
                        </td>
                        <td class="align-middle text-center text-xs">
                            <p class="text-xs font-weight-bold mb-0 text-center"></p>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bolder d-flex justify-content-center align-center">
                              <form action="{{ route('edit-obat', ['code' => $item->code_obat]) }}" method="get">
                                @csrf
                                <button class="btn btn-outline-success" id="button-create-user" style="margin-top:10px;margin-bottom:10px;margin-right:10px;">
                                    <i class="fa-solid fa-user-pen"></i>
                                </button>
                              </form>
                            
                              <form action="{{ route('delete-obat', ['code' => $item->code_obat]) }}" id="delete-form-{{$item->id}}" data-id="{{$item->id}}" method="post">
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
<script>
  document.addEventListener("DOMContentLoaded", function () {
      // Get the modal
      var modal = document.getElementById("createUserModal");

      // Get the button that opens the modal
      var btn = document.getElementById("button-create-user");

      // Get the <span> element that closes the modal
      var closeBtn = document.querySelector(".close");

      // When the user clicks the button, open the modal
      btn.onclick = function () {
          modal.style.display = "block"; // Ensure the modal is displayed
          setTimeout(function () {
              modal.classList.add("show"); // Add the transition class after a slight delay
          }, 10);
      }

      // When the user clicks on <span> (x), close the modal
      closeBtn.onclick = function () {
          modal.classList.remove("show"); // Remove the transition class
          setTimeout(function () {
              modal.style.display = "none"; // Hide the modal after the transition
          }, 400); // Match this duration with the CSS transition duration
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function (event) {
          if (event.target == modal) {
              modal.classList.remove("show"); // Remove the transition class
              setTimeout(function () {
                  modal.style.display = "none"; // Hide the modal after the transition
              }, 400); // Match this duration with the CSS transition duration
          }
      }
  });
</script>
@endsection


