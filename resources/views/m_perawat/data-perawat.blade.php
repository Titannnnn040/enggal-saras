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
                      <h6>Nama Lengkap</h6>
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
                <h6 class="text-white text-capitalize ps-3 mb-0  d-flex align-items-center" style="margin-top:-9px;">Data Perawat</h6>
                <a href="/perawat/create-perawat" class="my-0 me-3 btn-add-data d-flex align-items-center">
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
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Lengkap</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIK</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                          </tr>
                      </thead>
                      <?php $num = 1 ?>
                      @foreach ($perawat as $item)
                        <tbody>
                            <tr>
                                <td class="align-middle text-center text-xs">
                                    <h6 class="mb-0 text-xs">{{ $num++ }}</h6>
                                </td>

                                <td class="align-middle text-center text-xs">
                                    <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->nama_lengkap }}</p>
                                </td>
                                <td class="align-middle text-center text-xs">
                                    <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->nik }}</p>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bolder d-flex justify-content-center align-center">
                                    <form action="/perawat/edit/{{ $item->id }}">
                                      @csrf
                                      <button class="btn btn-outline-success" id="button-create-user" style="margin-top:10px;margin-bottom:10px;margin-right:10px;"><i class="fa-solid fa-user-pen"></i></button>
                                    </form>
                                    
                                      <form action="/perawat/{{ $item->id }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-outline-danger" onclick="return confirm('You Sure?')" style="margin-top:10px; margin-bottom:10px;">
                                          <i class="fa-solid fa-trash"></i>
                                        </button>                                      
                                      </form>

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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<!--   Core JS Files   -->
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/perfect-scrollbar.min.js"></script>
<script src="/js/smooth-scrollbar.min.js"></script>
<script src="/js/chartjs.min.js"></script>
<script>
  var ctx = document.getElementById("chart-bars").getContext("2d");

  new Chart(ctx, {
    type: "bar",
    data: {
      labels: ["M", "T", "W", "T", "F", "S", "S"],
      datasets: [{
        label: "Sales",
        tension: 0.4,
        borderWidth: 0,
        borderRadius: 4,
        borderSkipped: false,
        backgroundColor: "rgba(255, 255, 255, .8)",
        data: [50, 20, 10, 22, 50, 10, 40],
        maxBarThickness: 6
      }, ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5],
            color: 'rgba(255, 255, 255, .2)'
          },
          ticks: {
            suggestedMin: 0,
            suggestedMax: 500,
            beginAtZero: true,
            padding: 10,
            font: {
              size: 14,
              weight: 300,
              family: "Roboto",
              style: 'normal',
              lineHeight: 2
            },
            color: "#fff"
          },
        },
        x: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5],
            color: 'rgba(255, 255, 255, .2)'
          },
          ticks: {
            display: true,
            color: '#f8f9fa',
            padding: 10,
            font: {
              size: 14,
              weight: 300,
              family: "Roboto",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
      },
    },
  });


  var ctx2 = document.getElementById("chart-line").getContext("2d");

  new Chart(ctx2, {
    type: "line",
    data: {
      labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [{
        label: "Mobile apps",
        tension: 0,
        borderWidth: 0,
        pointRadius: 5,
        pointBackgroundColor: "rgba(255, 255, 255, .8)",
        pointBorderColor: "transparent",
        borderColor: "rgba(255, 255, 255, .8)",
        borderColor: "rgba(255, 255, 255, .8)",
        borderWidth: 4,
        backgroundColor: "transparent",
        fill: true,
        data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
        maxBarThickness: 6

      }],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5],
            color: 'rgba(255, 255, 255, .2)'
          },
          ticks: {
            display: true,
            color: '#f8f9fa',
            padding: 10,
            font: {
              size: 14,
              weight: 300,
              family: "Roboto",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            color: '#f8f9fa',
            padding: 10,
            font: {
              size: 14,
              weight: 300,
              family: "Roboto",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
      },
    },
  });

  var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

  new Chart(ctx3, {
    type: "line",
    data: {
      labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [{
        label: "Mobile apps",
        tension: 0,
        borderWidth: 0,
        pointRadius: 5,
        pointBackgroundColor: "rgba(255, 255, 255, .8)",
        pointBorderColor: "transparent",
        borderColor: "rgba(255, 255, 255, .8)",
        borderWidth: 4,
        backgroundColor: "transparent",
        fill: true,
        data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
        maxBarThickness: 6

      }],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5],
            color: 'rgba(255, 255, 255, .2)'
          },
          ticks: {
            display: true,
            padding: 10,
            color: '#f8f9fa',
            font: {
              size: 14,
              weight: 300,
              family: "Roboto",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            color: '#f8f9fa',
            padding: 10,
            font: {
              size: 14,
              weight: 300,
              family: "Roboto",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
      },
    },
  });
</script>
<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>
<!-- Github buttons -->
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="js/material-dashboard.min.js"></script>
<script>
  $(document).ready(function () {
      $('#myTables').DataTable();
  });
</script>

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
{{-- Notification --}}
<script>
  document.addEventListener('DOMContentLoaded', (event) => {
      const alert = document.getElementById('success-alert');
      if (alert) {
          setTimeout(() => {
              alert.style.display = 'none';
          }, 5000); // 5000 ms = 5 detik
      }
  });
</script>
@endsection


