<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-light" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="" target="">
        <img src="/img/enggal.gif" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-0 font-weight-bold fs-4 align-middle text-center">Rekam Medis</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
          <li class="nav-item d-flex flex-column justify-content-center align-items-center" style="cursor: pointer">
            <button class="dropdown-btn col-lg-10 d-flex" style="">
              <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                <i class="fa-solid fa-stethoscope"></i>
              </div>
              <span class="nav-link-text ms-1">Rawat Jalan</span>
            </button>
            <div class="dropdown-container" style="display: none">
              <a href="/dashboard/rawat-jalan" class="dropdown-btn col-lg-10 d-flex mt-1 {{ ($title === "rawat-jalan") ? "active" : '' }}">
                <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-clipboard-user"></i>
                </div>
                <span class="nav-link-text ms-1">Data Pasien</span>
              </a>
              <a href="/dashboard/rawat-jalan/create-pasien" class="dropdown-btn col-lg-10 d-flex mt-1  {{ ($title === "create-pasien") ? "active" : '' }}">
                <div class="text-white text-center ms-1 me-2 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-user-plus fs-8"></i>
                </div>
                <span class="nav-link-text">Create Data Pasien</span>
              </a>
            </div>
            <script>
              /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
              var dropdown = document.getElementsByClassName("dropdown-btn");
              var i;
              
              for (i = 0; i < dropdown.length; i++) {
                dropdown[i].addEventListener("click", function() {
                  this.classList.toggle("active");
                  var dropdownContent = this.nextElementSibling;
                  if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                  } else {
                    dropdownContent.style.display = "block";
                  }
                });
              }
              </script>
          </li>
      </ul>
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