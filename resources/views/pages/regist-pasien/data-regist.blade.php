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
                      <h6>No Reservasi</h6>
                      <select id="mySelect" class="form-select" name="no_reservasi">
                        <option value="">Please Select</option>
                        @foreach ($registPasien as $item)
                            <option value="{{$item->no_reservasi}}">{{$item->no_reservasi}}</option>
                        @endforeach
                      </select>      
                    </div>
                   
                    <div class="search col-lg-6">
                      <h6>No Rekam Medis</h6>
                      <select id="mySelect2" class="form-select" name="no_rm">
                        <option value="">Please Select</option>
                        @foreach ($pasien as $item)
                            <option value="{{$item->no_rekam_medis}}">{{$item->no_rekam_medis}} &nbsp;  | &nbsp; {{$item->nama_lengkap}}   </option>
                        @endforeach
                      </select>
                    </div>
                   
                    <div class="search col-lg-6">
                      <h6>Tanggal Reservasi</h6>
                      <input type="date" class="" name="reservasi_date">
                    </div>
                    
                    <div class="search col-lg-6">
                      <h6>Layanan</h6>
                       <select id="" class="form-select" style="border:#AAAAAA solid 1px; padding:2.5px 0;border-radius:5px;" name="layanan_id">
                        <option value="">Please Select</option>
                        @foreach ($layanan as $item)
                            <option value="{{$item->id}}">{{$item->nama_layanan}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="search col-lg-6">
                      <h6>Jadwal Praktik</h6>
                      <select id="" class="form-select"  style="border:#AAAAAA solid 1px; padding:2.5px 0;border-radius:5px;" name="jadwal_praktik">
                        <option value="">&nbsp; Please Select</option>
                        <option value="PAGI">PAGI</option>
                        <option value="SORE-MALAM">SORE-MALAM</option>
                      </select>
                    </div>
                    
                    <div class="search col-lg-6">
                      <h6>Status</h6>
                      <select id="" class="form-select"  style="border:#AAAAAA solid 1px; padding:2.5px 0;border-radius:5px;" name="status">
                        <option value="">Please Select</option>
                        <option value="1" style="padding: 10px">BOOKING</option>
                        <option value="2">REGISTER</option>
                        <option value="3">SKIP</option>
                      </select>
                    </div>

                    <div class="submit-filter d-flex  justify-content-between mt-3">
                      <button type="submit" class="btn btn-success col-lg-1">Search</button>
                      <a href="/pasien/data-reservasi-pasien" class="btn btn-danger col-lg-1">clear</a>
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
                <h6 class="text-white text-capitalize ps-3 mb-0  d-flex align-items-center" style="margin-top:-9px;">Data Reservasi Pasien</h6>
              </div>
            </div>
            <div class="card-body px-5 pb-2">
              <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0" id="myTables">
                      <thead>
                          <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kasir</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Regist Code</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Date</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">RM Code</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pasien Name</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keluhan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Poli Klinik</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Praktek</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Antrian</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dokter</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jaminan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pcare BPJS</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                          </tr>
                      </thead>
                      <?php $num = 1 ?>
                      @foreach ($registPasien as $item)
                        <tbody>
                            <tr>
                                <td class="align-middle text-center text-xs">
                                    <h6 class="mb-0 text-xs">{{ $num++ }}</h6>
                                </td>
                                <td class="align-middle text-center text-xs">
                                    <p class="text-xs font-weight-bold mb-0 text-center"></p>
                                </td>
                                <td class="align-middle text-center text-xs">
                                    <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->regist_code }}</p>
                                </td>
                                <td class="align-middle text-center text-xs">
                                    <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->created_at }}</p>
                                </td>
                                <td class="align-middle text-center text-xs">
                                    <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->no_rm }}</p>
                                </td>
                                <td class="align-middle text-center text-xs">
                                    <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->pasien_name }}</p>
                                </td>
                                <td class="align-middle text-center text-xs">
                                    <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->keluhan }}</p>
                                </td>
                                <td class="align-middle text-center text-xs">
                                    <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->layanan }}</p>
                                </td>
                                <td class="align-middle text-center text-xs">
                                    <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->jam_praktek }}</p>
                                </td>
                                <td class="align-middle text-center text-xs">
                                    <p class="text-xs font-weight-bold mb-0 text-center">{{$item->no_antrian}}</p>
                                </td>
                                <td class="align-middle text-center text-xs">
                                    <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->dokter }}</p>
                                </td>
                                <td class="align-middle text-center text-xs">
                                    <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->jaminan }}</p>
                                </td>
                                <td class="align-middle text-center text-xs">
                                  @if($item->status == 1)
                                    <span class="btn btn-sm btn-info mt-3">Booking</span>
                                  @elseif ($item->status == 2)
                                    <span class="btn btn-sm btn-success mt-3">Confirm</span>
                                  @elseif ($item->status == 3)
                                    <span class="btn btn-sm btn-danger mt-3">Skip</span>
                                  @endif
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bolder d-flex justify-content-center align-center">
                                      <button type="button" class="btn btn-info mt-3" style="margin-right:10px;">
                                        <i class="fa-solid fa-print"></i>
                                    </button>
                                  
                                      <form action="/pasien/edit-reservasi-pasien/{{ $item->id }}">
                                        @csrf
                                        <button class="btn btn-outline-success mt-3" style="margin-right:10px;"><i class="fa-solid fa-user-pen"></i></button>
                                      </form>
                                    
                                      <form action="/pasien/delete-reservasi-pasien/{{ $item->id }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-outline-danger mt-3" onclick="return confirm('You Sure?')" style=" ">
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
{{-- SWEET ALERT --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<script src="js/material-dashboard.min.js"></script>
<script>
  $(document).ready(function () {
      $('#myTables').DataTable();
  });
</script>

<script>
  $(document).ready(function() {
    $('#mySelect').select2({
      placeholder: "Please Select",
    });
  });
  $(document).ready(function() {
    $('#mySelect2').select2({
      placeholder: "Please Select",
    });
  });

  document.querySelectorAll('.button-create-user').forEach(function(button) {
    button.addEventListener('click', function() {
        let formId = button.getAttribute('data-id');
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to update the reservation status?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Kirim form yang sesuai dengan data-id
                document.querySelector(`form.update-form[data-id="${formId}"]`).submit();
            }
        });
    });
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


