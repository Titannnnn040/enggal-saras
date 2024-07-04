@extends('layouts/dashboard')
@section('dashboard')
<!-- Page Content  -->
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

  <h1 class="ms-3 mt-2 mb-0">Enggal Saras</h1>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
              <i class="fa-solid fa-calendar-days"></i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Total Employess</p>
              <h4 class="mb-0"></h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55 </span>than last week</p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-warning shadow-warning text-center border-radius-xl mt-n4 position-absolute">
              <i class="fa-solid fa-plus"></i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Today's Visitors</p>
              <h4 class="mb-0"></h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3 </span>than last month</p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-danger shadow-danger text-center border-radius-xl mt-n4 position-absolute">
              <i class="fa-solid fa-exclamation"></i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Failed Notif</p>
              <h4 class="mb-0">3,462</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2</span> than yesterday</p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="fa-solid fa-check"></i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Success Notif</p>
              <h4 class="mb-0">103,430</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5 </span>than yesterday</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-6 col-md-6 mt-4 mb-4">
        <div class="card z-index-2 ">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
            <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
              <div class="chart">
                <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
              </div>
            </div>
          </div>
          <div class="card-body">
            <h6 class="mb-0 ">Success Notification</h6>
            <p class="text-sm ">Last Campaign Performance</p>
            <hr class="dark horizontal">
            <div class="d-flex ">
              <i class="material-icons text-sm my-auto me-1">schedule</i>
              <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 mt-4 mb-4">
        <div class="card z-index-2  ">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
            <div class="bg-gradient-danger shadow-danger border-radius-lg py-3 pe-1">
              <div class="chart">
                <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
              </div>
            </div>
          </div>
          <div class="card-body">
            <h6 class="mb-0 "> Failed Notification </h6>
            <p class="text-sm "> (<span class="font-weight-bolder">-15</span>) increase in today sales. </p>
            <hr class="dark horizontal">
            <div class="d-flex ">
              <i class="material-icons text-sm my-auto me-1">schedule</i>
              <p class="mb-0 text-sm"> updated 4 min ago </p>
            </div>
          </div>
        </div>
      </div>
   
    <div class="container-fluid py-1">
      <div class="row">
        <div class="col-lg-12">
          <div class="card my-3">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Notifications Table</h6>
              </div>
            </div>
            <div class="card-body px-5 pb-2">
              <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0" id="myTables">
                      <thead>
                          <tr>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
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
                      @foreach ($rawatJalan as $item)
                        <tbody>
                            <tr>
                                <td class="align-middle text-center text-xs">
                                    <h6 class="mb-0 text-xs">{{ $num++ }}</h6>
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
                                  <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->upload_foto }}</p>
                                </td>
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
                                    <form action="/dashboard/rawat-jalan/edit/{{ $item->id }}">
                                      @csrf
                                      <button class="btn btn-outline-success" id="button-create-user" style="margin-top:10px;margin-bottom:10px;margin-right:10px;"><i class="fa-solid fa-user-pen"></i></button>
                                    </form>
                                    
                                      <form action="/dashboard/rawat-jalan/{{ $item->id }}" method="post">
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
              <a href="" class="font-weight-bold" target="_blank">KalGen-Innolab</a>
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


