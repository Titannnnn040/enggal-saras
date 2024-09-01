<style>
  ::-webkit-scrollbar {
  display: none !important;  /* Chrome, Safari, and Opera */
}

</style>

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-light hide-scrollbar" id="sidenav-main">
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
          <li class="nav-item d-flex flex-column justify-content-center align-items-center" style="cursor: pointer">
            <div class="sub-menu" style="display: unset">
              <a href="/" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'dashboard') ? 'active' : '' }} text-decoration-none">
                <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-clipboard-user me-2"></i>
                  <span class="nav-link-text ms-2">Dashboard</span>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item d-flex flex-column justify-content-center align-items-center" style="cursor: pointer">
            <div class="dropdown-btn col-lg-10 d-flex justify-content-between align-items-center">
              <div class="item">
                <a class="text-decoration-none text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-stethoscope me-2"></i>
                  <span class="nav-link-text ms-1">Pendaftaran</span>
                </a>
              </div>
              <div class="item">
                <i class="fas fa-angle-right dropdown"></i>
              </div>
            </div>

            <div class="sub-menu">
              {{-- <a class="dropdown-menu justify-content-between col-lg-10 d-flex mt-1 text-decoration-none">
                <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-clipboard-user me-2"></i>
                  <span class="nav-link-text ms-2">Pendaftaran</span>
                </div>
                <div class="item">
                  <i class="fas fa-angle-right dropdown"></i>
                </div>
              </a>
              <div class="super-sub-menu"> --}}
                <a href="/pasien/data-pasien" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-pasien') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Pasien</span>
                  </div>
                </a>
              </div>
            {{-- </div> --}}
          </li>

          <li class="nav-item d-flex flex-column justify-content-center align-items-center" style="cursor: pointer">
            <div class="dropdown-btn col-lg-10 d-flex justify-content-between align-items-center">
              <div class="item">
                <a class="text-decoration-none text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-stethoscope me-2"></i>
                  <span class="nav-link-text ms-1">Master</span>
                </a>
              </div>
              <div class="item">
                <i class="fas fa-angle-right dropdown"></i>
              </div>
            </div>
          
            <div class="sub-menu">
              <a class="dropdown-menu justify-content-between col-lg-10 d-flex mt-1 text-decoration-none">
                <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-clipboard-user me-2"></i>
                  <span class="nav-link-text ms-2">Master Tenaga Medis</span>
                </div>
                <div class="item">
                  <i class="fas fa-angle-right dropdown"></i>
                </div>
              </a>
              <div class="super-sub-menu">
                <a href="/tenaga-medis/data-tenaga-medis" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-dokter') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Tenaga Medis</span>
                  </div>
                </a>
              </div>
              <div class="super-sub-menu">
                <a href="/tenaga-medis/jadwal-dokter" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'jadwal-dokter') ? 'active' : '' }}  text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Jadwal Dokter</span>
                  </div>
                </a>
              </div>
            </div>

            <div class="sub-menu">
              <a class="dropdown-menu justify-content-between col-lg-10 d-flex mt-1 text-decoration-none">
                <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-clipboard-user me-2"></i>
                  <span class="nav-link-text ms-2">Master Layanan</span>
                </div>
                <div class="item">
                  <i class="fas fa-angle-right dropdown"></i>
                </div>
              </a>
              <div class="super-sub-menu">
                <a href="/layanan/data-layanan" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-layanan') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Layanan</span>
                  </div>
                </a>
              </div>
            </div>

            <div class="sub-menu">
              <a class="dropdown-menu justify-content-between col-lg-10 d-flex mt-1 text-decoration-none">
                <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-clipboard-user me-2"></i>
                  <span class="nav-link-text ms-2">Master Kamar</span>
                </div>
                <div class="item">
                  <i class="fas fa-angle-right dropdown"></i>
                </div>
              </a>
              <div class="super-sub-menu">
                <a href="/kamar/data-kamar" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-kamar') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Kamar</span>
                  </div>
                </a>
              </div>
            </div>

            <div class="sub-menu">
              <a class="dropdown-menu justify-content-between col-lg-10 d-flex mt-1 text-decoration-none">
                <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-clipboard-user me-2"></i>
                  <span class="nav-link-text ms-2">Master Bed</span>
                </div>
                <div class="item">
                  <i class="fas fa-angle-right dropdown"></i>
                </div>
              </a>
              <div class="super-sub-menu">
                <a href="/bed/data-bed" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-bed') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Bed</span>
                  </div>
                </a>
              </div>
            </div>

            <div class="sub-menu">
              <a class="dropdown-menu justify-content-between col-lg-10 d-flex mt-1 text-decoration-none">
                <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-clipboard-user me-2"></i>
                  <span class="nav-link-text ms-2">Data Tarif</span>
                </div>
                <div class="item">
                  <i class="fas fa-angle-right dropdown"></i>
                </div>
              </a>
              <div class="super-sub-menu">
                <a href="/tarif/data-tarif-kamar" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-tarif-kamar') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Tarif Kamar</span>
                  </div>
                </a>
              </div>
              <div class="super-sub-menu">
                <a href="/tarif/group-tarif" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'group-tarif') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Group Tarif</span>
                  </div>
                </a>
              </div>
              <div class="super-sub-menu">
                <a href="/tarif/group-tarif-tindakan" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'group-tarif-tindakan') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Group Tarif Tindakan</span>
                  </div>
                </a>
              </div>
              <div class="super-sub-menu">
                <a href="/tarif/data-tarif-pendaftaran" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-tarif-pendaftaran') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Tarif Pendaftaran</span>
                  </div>
                </a>
              </div>
              <div class="super-sub-menu">
                <a href="/tarif/data-tarif-tindakan" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-tarif-tindakan') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Tarif Tindakan</span>
                  </div>
                </a>
              </div>
              <div class="super-sub-menu">
                <a href="/tarif/data-tarif-radiologi" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-tarif-radiologi') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Tarif Radiologi</span>
                  </div>
                </a>
              </div>
              <div class="super-sub-menu">
                <a href="/tarif/data-tarif-lab" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-tarif-lab') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Tarif Laboratorium</span>
                  </div>
                </a>
              </div>
            </div>

            <div class="sub-menu">
              <a href="/jaminan/data-jaminan" class="dropdown-menu justify-content-between col-lg-10 d-flex mt-1 {{ ($title === 'data-jaminan') ? 'active' : '' }} text-decoration-none">
                <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-clipboard-user me-2"></i>
                  <span class="nav-link-text ms-2">Jaminan</span>
                </div>
              </a>
            </div>

            <div class="sub-menu">
              <a href="/tipe-jaminan/data-tipe-jaminan" class="dropdown-menu justify-content-between col-lg-10 d-flex mt-1 {{ ($title === 'data-tipe-jaminan') ? 'active' : '' }} text-decoration-none">
                <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-clipboard-user me-2"></i>
                  <span class="nav-link-text ms-2">Tipe Jaminan</span>
                </div>
              </a>
            </div>

          </li>
          
      </ul>


      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <script>
       $(document).ready(function() {
        $('.dropdown-btn').click(function() {
          $(this).find('.dropdown').toggleClass('rotate'); 
          $(this).nextAll('.sub-menu').slideToggle(); 
          
          $(this).nextAll('.sub-menu').find('.super-sub-menu').slideUp();
          $(this).nextAll('.sub-menu').find('.dropdown').removeClass('rotate'); 
        });

        $('.sub-menu').click(function(event) {
          event.stopPropagation();
          $(this).find('.super-sub-menu').slideToggle(); 
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