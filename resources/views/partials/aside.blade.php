<style>
  ::-webkit-scrollbar {
  display: none !important;  /* Chrome, Safari, and Opera */
}
.navbar-vertical.navbar-expand-xs {
  /* display: block; */
  position: fixed;
  top: 0;
  bottom: 0;
  width: 100%;
  max-width: 15.625rem !important;
  padding: 0;
}
.sub-tarif, .sub-jaminan, .sub-tenaga-medis, .sub-farmasi, .sub-lab {
  display: none;
}

/* Tampilkan sub-tenaga-medis saat menu-tenaga-medis di-hover */
.menu-tenaga-medis:hover + .sub-tenaga-medis {
  display: block;
}

/* Tambahan untuk menjaga submenu tetap terbuka saat di-hover */
.sub-tenaga-medis:hover {
  display: block;
}
.nav-item{
  position: relative;
}
.sub-menu{
  position: absolute;top: 0;left:6cm;transform: translateY(0);z-index: 999;
}
.sub-tenaga-medis , .sub-jaminan, .sub-tarif, .sub-farmasi, .sub-lab{
  position: absolute;top: 0;left:13cm;transform: translateY(0);z-index: 999;
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
          <li class="nav-item d-flex ms-3 align-items-baseline" style="cursor: pointer">
            {{-- <div class="sub-menu" style="display: unset">
              <a href="/" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'dashboard') ? 'active' : '' }} text-decoration-none">
                <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-clipboard-user me-2"></i>
                  <span class="nav-link-text ms-2">Dashboard</span>
                </div>
              </a>
            </div> --}}
            <div class="sub-menu d-block m-0" style="position:unset">
              <div class="d-flex flex-column">
                <a href="{{route('dashboard')}}" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'dashboard') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Dashboard</span>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item d-flex ms-3 align-items-baseline" style="cursor: pointer;">
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
            <div class="sub-menu" style="">
              <div class="d-flex flex-column rounded p-2 ms-3"  style="background-color:#FFFFFF;">
                <a href="/pasien/data-pasien" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-pasien') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Pasien</span>
                  </div>
                </a>
                <a href="/pasien/data-reservasi-pasien" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-reservasi-pasien') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Reservasi Pasien</span>
                  </div>
                </a>
                <a href="/pasien/data-regist-pasien" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-regist-pasien') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Regist Pasien</span>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item d-flex ms-3 align-items-baseline" style="cursor: pointer;">
            <div class="dropdown-btn col-lg-10 d-flex justify-content-between align-items-center">
              <div class="item">
                <a class="text-decoration-none text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-stethoscope me-2"></i>
                  <span class="nav-link-text ms-1">Rawat Inap</span>
                </a>
              </div>
              <div class="item">
                <i class="fas fa-angle-right dropdown"></i>
              </div>
            </div>

            <div class="sub-menu">
              <div class="d-flex flex-column rounded p-2 ms-3" style="background-color:#FFFFFF;">
                <a href="/pasien/data-rawat-inap" class="dropdown-menu col-lg-10 d-flex {{ ($title === 'data-rawat-inap') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Tindakan</span>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item d-flex ms-3 align-items-baseline" style="cursor: pointer">
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
              <div class="d-flex flex-column rounded p-2 ms-3"  style="background-color:#FFFFFF;">
                <div class="dropdown-btn menu-tenaga-medis col-lg-10 d-flex justify-content-between align-items-center" style="margin:2.5px;">
                  <div class="item">
                    <a class="text-decoration-none text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-stethoscope me-2"></i>
                      <span class="nav-link-text ms-1">Tenaga Medis</span>
                    </a>
                  </div>
                  <div class="item">
                    <i class="fas fa-angle-right dropdown"></i>
                  </div>
                </div>
                <div class="dropdown-btn menu-jaminan col-lg-10 d-flex justify-content-between align-items-center" style="margin:2.5px;">
                  <div class="item">
                    <a class="text-decoration-none text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-stethoscope me-2"></i>
                      <span class="nav-link-text ms-1">Jaminan</span>
                    </a>
                  </div>
                  <div class="item">
                    <i class="fas fa-angle-right dropdown"></i>
                  </div>
                </div>
                <div class="dropdown-btn menu-farmasi col-lg-10 d-flex justify-content-between align-items-center" style="margin:2.5px;">
                  <div class="item">
                    <a class="text-decoration-none text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-stethoscope me-2"></i>
                      <span class="nav-link-text ms-1">Farmasi</span>
                    </a>
                  </div>
                  <div class="item">
                    <i class="fas fa-angle-right dropdown"></i>
                  </div>
                </div>
                <div class="dropdown-btn menu-lab col-lg-10 d-flex justify-content-between align-items-center" style="margin:2.5px;">
                  <div class="item">
                    <a class="text-decoration-none text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-stethoscope me-2"></i>
                      <span class="nav-link-text ms-1">Laboratorium</span>
                    </a>
                  </div>
                  <div class="item">
                    <i class="fas fa-angle-right dropdown"></i>
                  </div>
                </div>
                <a href="/layanan/data-layanan" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-pasien') ? 'active' : '' }} text-decoration-none" style="margin:2.5px;">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Layanan</span>
                  </div>
                </a>
                <a href="/kamar/data-kamar" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-pasien') ? 'active' : '' }} text-decoration-none" style="margin:2.5px;">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Kamar</span>
                  </div>
                </a>
                <a href="/bed/data-bed" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-pasien') ? 'active' : '' }} text-decoration-none" style="margin:2.5px;">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Bed</span>
                  </div>
                </a>
                <div class="dropdown-btn menu-tarif col-lg-10 d-flex justify-content-between align-items-center" style="margin:2.5px;">
                  <div class="item">
                    <a class="text-decoration-none text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-stethoscope me-2"></i>
                      <span class="nav-link-text ms-1">Tarif</span>
                    </a>
                  </div>
                  <div class="item">
                    <i class="fas fa-angle-right dropdown"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="sub-tenaga-medis">
              <div class="d-flex flex-column rounded p-2 ms-3 mt-2" style="background-color:#FFFFFF;">
                <a href="/tenaga-medis/data-tenaga-medis" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-pasien') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Tenaga Medis</span>
                  </div>
                </a>
                <a href="/perawat/data-perawat" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-reservasi-pasien') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Perawat</span>
                  </div>
                </a>
                <a href="/tenaga-medis/jadwal-dokter" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-regist-pasien') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Jadwal Dokter</span>
                  </div>
                </a>
              </div>
            </div>
            <div class="sub-tarif">
              <div class="d-flex flex-column rounded p-2 ms-3 mt-2"  style="background-color:#FFFFFF;">
                <a href="/tarif/data-tarif-kamar" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-pasien') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Tarif Kamar</span>
                  </div>
                </a>
                <a href="/tarif/group-tarif" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-reservasi-pasien') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Group Tarif</span>
                  </div>
                </a>
                <a href="/tarif/group-tarif-tindakan" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-regist-pasien') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Group Tarif Tindakan</span>
                  </div>
                </a>
                <a href="/tarif/data-tarif-pendaftaran" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-regist-pasien') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Tarif Pendaftaran</span>
                  </div>
                </a>
                <a href="/tarif/data-tarif-tindakan" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-regist-pasien') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Tarif Tindakan</span>
                  </div>
                </a>
                <a href="/tarif/data-tarif-radiologi" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-regist-pasien') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Tarif Radiologi</span>
                  </div>
                </a>
                <a href="/tarif/data-tarif-lab" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-regist-pasien') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Tarif Laboratorium</span>
                  </div>
                </a>
              </div>
            </div>
            <div class="sub-jaminan">
              <div class="d-flex flex-column rounded p-2 ms-3 mt-2"  style="background-color:#FFFFFF;">
                <a href="/jaminan/data-jaminan" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-pasien') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Jaminan</span>
                  </div>
                </a>
                <a href="/tipe-jaminan/data-tipe-jaminan" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-reservasi-pasien') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Tipe Jaminan</span>
                  </div>
                </a>
              </div>
            </div>
            <div class="sub-lab">
              <div class="d-flex flex-column rounded p-2 ms-3 mt-2"  style="background-color:#FFFFFF;">
                <a href="{{ route('data-rentang-umur') }}" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-rentang-umur') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Rentang Umur</span>
                  </div>
                </a>
                <a href="{{ route('data-satuan-lab') }}" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-satuan-lab') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">satuan</span>
                  </div>
                </a>
                <a href="{{ route('data-rentang-normal') }}" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-rentang-normal') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Rentang Normal</span>
                  </div>
                </a>
                <a href="{{ route('data-kelompok-lab') }}" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-kelompok-lab') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Kelompok</span>
                  </div>
                </a>
                <a href="{{ route('data-pemeriksaan-lab') }}" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-pemeriksaan-lab') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Pemeriksaan Lab</span>
                  </div>
                </a>
              </div>
            </div>
            <div class="sub-farmasi">
              <div class="d-flex flex-column rounded p-2 ms-3 mt-2"  style="background-color:#FFFFFF;">
                <a href="{{ route('data-satuan-barang') }}" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-satuan-barang') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Satuan Barang</span>
                  </div>
                </a>
                <a href="{{ route('data-farmakologi') }}" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-farmakologi') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Farmakologi</span>
                  </div>
                </a>
                <a href="{{ route('data-pabrik') }}" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-pabrik') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Pabrik & Principal</span>
                  </div>
                </a>
                <a href="{{ route('data-golongan-obat') }}" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-golongan-obat') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Golongan Obat</span>
                  </div>
                </a>
                <a href="{{ route('data-aturan-pakai') }}" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-aturan-pakai') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Aturan Pakai</span>
                  </div>
                </a>
                <a href="{{ route('data-template-po') }}" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-template-po') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Template PO</span>
                  </div>
                </a>
                <a href="{{ route('data-tipe-harga-jual') }}" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-tipe-harga-jual') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Tipe Harga Jual</span>
                  </div>
                </a>
                <a href="{{ route('data-distributor') }}" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-distributor') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Distributor</span>
                  </div>
                </a>
                <a href="{{ route('data-obat') }}" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-obat') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Obat & Alkes</span>
                  </div>
                </a>
                <a href="{{ route('data-cara-pakai') }}" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-cara-pakai') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Cara Pakai</span>
                  </div>
                </a>
                <a href="{{ route('data-bentuk-sediaan') }}" class="dropdown-menu col-lg-10 d-flex mt-1 {{ ($title === 'data-bentuk-sediaan') ? 'active' : '' }} text-decoration-none">
                  <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-clipboard-user me-2"></i>
                    <span class="nav-link-text ms-2">Bentuk Sediaan Oabt</span>
                  </div>
                </a>
              </div>
            </div>
          </li>
      </ul>


      <script>
       // Ambil elemen menu-tenaga-medis dan sub-tenaga-medis
        function handleSubMenu(menuSelector, subMenuSelector) {
          const menu = document.querySelector(menuSelector);
          const subMenu = document.querySelector(subMenuSelector);
          let timeout;

          // Fungsi untuk menyembunyikan semua submenu
          function hideAllSubMenus() {
            document.querySelectorAll('.sub-tenaga-medis, .sub-jaminan, .sub-tarif, .sub-farmasi, .sub-lab').forEach(sub => {
              sub.style.display = 'none';
            });
          }

          // Tambahkan event listener untuk hover (mouseenter dan mouseleave)
          menu.addEventListener('mouseenter', function() {
            clearTimeout(timeout);
            hideAllSubMenus(); // Sembunyikan semua submenu saat menu di-hover
            subMenu.style.display = 'block'; // Tampilkan submenu saat di-hover
          });

          menu.addEventListener('mouseleave', function() {
            timeout = setTimeout(function() {
              subMenu.style.display = 'none'; // Sembunyikan submenu setelah delay 2 detik
            }, 700);
          });

          // Tambahkan juga listener untuk submenu agar tidak hilang saat dihover submenu
          subMenu.addEventListener('mouseenter', function() {
            clearTimeout(timeout);
            subMenu.style.display = 'block'; // Tetap tampil saat submenu dihover
          });

          subMenu.addEventListener('mouseleave', function() {
            timeout = setTimeout(function() {
              subMenu.style.display = 'none'; // Sembunyikan submenu setelah delay 2 detik
            }, 700);
          });
        }

        handleSubMenu('.menu-tenaga-medis', '.sub-tenaga-medis');
        handleSubMenu('.menu-jaminan', '.sub-jaminan');
        handleSubMenu('.menu-tarif', '.sub-tarif');
        handleSubMenu('.menu-farmasi', '.sub-farmasi');
        handleSubMenu('.menu-lab', '.sub-lab');

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