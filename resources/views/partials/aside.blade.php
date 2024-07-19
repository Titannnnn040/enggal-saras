<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-light" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0 " href="" target="">
        <img src="/img/enggal.gif" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-0 font-weight-bold fs-4 align-middle text-center"  style="font-family: 'Roboto', 'Helvetica', 'Arial', 'sans-serif'; color:#344767;">Rekam Medis</span>
      </a>
    </div>
    <br>
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
          {{-- <li class="nav-item d-flex flex-column justify-content-center align-items-center" style="cursor: pointer">

            <div  class="dropdown-btn col-lg-10 d-flex" style="">
              <div class="item ">
                <a href="" class="text-decoration-none text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-stethoscope"></i>
                  <span class="nav-link-text ms-1">Rawat Jalan</span>
                  <i class="fas fa-angle-right dropdown position-absolute end-0 me-4 mt-1"></i>
                </a>
              </div>
            </div>

            <div class="sub-menu">
              <a href="/dashboard/rawat-jalan" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === "rawat-jalan") ? "active" : '' }} text-decoration-none">
                <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-clipboard-user"></i>
                  <span class="nav-link-text ms-1">Data Pasien</span>
                </div>
              </a>
            </div>

            <div class="sub-menu">
              <a href="/dashboard/rawat-jalan/create-pasien" class="dropdown-menu col-lg-10 d-flex mt-1  {{ ($title === "create-pasien") ? "active" : '' }} text-decoration-none">
                <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-user-plus"></i>
                  <span class="nav-link-text">Create Data Pasien</span>
                </div>
              </a>
            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

            <script>
              $(document).ready(function){
                $('dropdown-btn').click(function(){
                  $('this').next('dropdown-menu').slideToggle();
                  $(this).find('.dropdown')toggleClass('rotate');
                })
              }
            </script>

          </li> --}}
          <li class="nav-item d-flex flex-column justify-content-center align-items-center" style="cursor: pointer">
            <div class="dropdown-btn col-lg-10 d-flex  {{ ($title === 'pendaftaran') ? 'active' : '' }}" style="">
              <div class="item">
                <a class="text-decoration-none text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-stethoscope me-2"></i>
                  <span class="nav-link-text ms-1">Pendaftaran</span>
                  <i class="fas fa-angle-right dropdown position-absolute end-0 me-4"></i>
                </a>
              </div>
            </div>
          
            <div class="sub-menu">

              <a href="/dashboard/pendaftaran" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'pendaftaran') ? 'active' : '' }} text-decoration-none">
                <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-clipboard-user me-2"></i>
                  <span class="nav-link-text ms-2">Data Pasien</span>
                </div>
              </a>

              <a href="/dashboard/pendaftaran/create-pasien" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'create-pasien') ? 'active' : '' }} text-decoration-none">
                <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-user-plus me-2" style="font-size: 12px"></i>
                  <span class="nav-link-text ms-1">Create Data Pasien</span>
                </div>
              </a>

            </div>
          </li>
          <li class="nav-item d-flex flex-column justify-content-center align-items-center" style="cursor: pointer">
            <div class="dropdown-btn col-lg-10 d-flex" style="">
              <div class="item">
                <a class="text-decoration-none text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-stethoscope me-2"></i>
                  <span class="nav-link-text ms-1">Master Perawat</span>
                  <i class="fas fa-angle-right dropdown position-absolute end-0 me-4"></i>
                </a>
              </div>
            </div>
          
            <div class="sub-menu">

              <a href="/dashboard/perawat/data-perawat" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-perawat') ? 'active' : '' }} text-decoration-none">
                <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-clipboard-user me-2"></i>
                  <span class="nav-link-text ms-2">Data Perawat</span>
                </div>
              </a>

              <a href="/dashboard/perawat/create-perawat" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'create-perawat') ? 'active' : '' }} text-decoration-none">
                <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-user-plus me-2" style="font-size: 12px"></i>
                  <span class="nav-link-text ms-1">Create Data Perawat</span>
                </div>
              </a>

            </div>
          </li>

          <li class="nav-item d-flex flex-column justify-content-center align-items-center" style="cursor: pointer">
            <div class="dropdown-btn col-lg-10 d-flex" style="">
              <div class="item">
                <a class="text-decoration-none text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-stethoscope me-2"></i>
                  <span class="nav-link-text ms-1">Master Tenaga Medis</span>
                  <i class="fas fa-angle-right dropdown position-absolute end-0 me-4"></i>
                </a>
              </div>
            </div>
          
            <div class="sub-menu">

              <a href="/tenaga-medis/data-tenaga-medis" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-dokter') ? 'active' : '' }} text-decoration-none">
                <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-clipboard-user me-2"></i>
                  <span class="nav-link-text ms-2">Data Tenaga Medis</span>
                </div>
              </a>

              <a href="/tenaga-medis/create-tenaga-medis" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'create-dokter') ? 'active' : '' }} text-decoration-none">
                <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-user-plus me-2" style="font-size: 12px"></i>
                  <span class="nav-link-text ms-1">Create Data Dokter</span>
                </div>
              </a>

            </div>
          </li>
      </ul>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
          <script>
            $(document).ready(function() {
              $('.dropdown-btn').click(function() {
                $(this).next('.sub-menu').slideToggle();
                $(this).find('.dropdown').toggleClass('rotate');
              });
            });
          </script>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <form action="/logout" method="POST">
         @csrf
          {{-- <button type="submit" class="btn btn-outline-success mt-4 w-100"><i class="bi bi-box-arrow-right"> Logout</i></button> --}}
          <button type="submit" class="btn bg-gradient-success w-100"><i class="bi bi-box-arrow-right"> Logout</i></button>
        </form>  
      </div>
    </div>
  </aside>