@extends('layouts/dashboard')
@section('dashboard')
<!-- Page Content  -->
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

  <h1 class="ms-3 mt-2 mb-0">Enggal Saras</h1>
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="card my-3">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-success shadow-success d-flex align-items-center justify-content-between border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 mb-0  d-flex align-items-center" style="margin-top:-9px;">Antrian Pasien</h6>
              </div>
            </div>
            <div class="card-body px-5 pb-2">
              <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="myTables">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pasien</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jam</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipe</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Antrian</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Paggil</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Durasi</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                            </tr>
                        </thead>
                        <?php $num = 1 ?>
                        @foreach ($antrian as $item)
                            <tbody>
                                <tr data-row-id="{{ $item->id }}">
                                    <td class="align-middle text-center text-xs">
                                        <h6 class="mb-0 text-xs">{{ $num++ }}</h6>
                                    </td>
                                    <td class="align-middle text-center text-xs">
                                        <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->patient_name }}</p>
                                    </td>
                                    <td class="align-middle text-center text-xs">
                                        <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->date }}</p>
                                    </td>
                                    <td class="align-middle text-center text-xs">
                                        <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->time }}</p>
                                    </td>
                                    <td class="align-middle text-center text-xs">
                                        <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->type }}</p>
                                    </td>
                                    <td class="align-middle text-center text-xs">
                                        <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->queue }}</p>
                                    </td>
                                    <td class="align-middle text-center text-xs">
                                        <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->call_time }}</p>
                                    </td>
                                    <td class="align-middle text-center text-xs">
                                        <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->duration }}</p>
                                    </td>
                                    <td class="align-middle text-center text-xs">
                                        <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->status }}</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bolder d-flex justify-content-center align-center">
                                            <button 
                                                class="btn btn-outline-success btnCallQueue"
                                                style="margin-top:10px;margin-bottom:10px;margin-right:10px;"
                                                data-id="{{ $item->id }}"
                                                data-queue="{{ $item->queue }}"
                                                data-name="{{ $item->patient_name }}">
                                                Panggil
                                            </button>                                 
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
<audio id="bellSound" src="{{ asset('audio/tingtung.mp3') }}"></audio>
<script>
    function speakQueue(queue, patientName) {
        const bell = document.getElementById('bellSound');

        const text = `Nomor antrian ${queue}, atas nama ${patientName}, harap menuju ke loket pendaftaran`;

        const utterance = new SpeechSynthesisUtterance(text);
        utterance.lang = 'id-ID';
        utterance.rate = 0.9;
        utterance.pitch = 1;
        utterance.volume = 1;

        // hentikan suara sebelumnya kalau ada
        window.speechSynthesis.cancel();

        // putar tingtung dulu, lalu lanjut suara panggilan
        if (bell) {
            bell.pause();
            bell.currentTime = 0;

            bell.play()
                .then(() => {
                    bell.onended = function () {
                        window.speechSynthesis.speak(utterance);
                    };
                })
                .catch(() => {
                    // kalau audio gagal diputar, langsung bacakan
                    window.speechSynthesis.speak(utterance);
                });
        } else {
            window.speechSynthesis.speak(utterance);
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        const csrfMeta = document.querySelector('meta[name="csrf-token"]');
        const csrfToken = csrfMeta ? csrfMeta.getAttribute('content') : '';

        document.querySelectorAll('.btnCallQueue').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                const btn = this;

                btn.disabled = true;
                btn.innerText = 'Memanggil...';

                fetch(`/queue/call/${id}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // bunyi tingtung + suara panggilan
                        speakQueue(data.queue, data.patient_name);

                        // update tampilan tabel
                        const row = document.querySelector(`tr[data-row-id="${data.id}"]`);
                        if (row) {
                            const callTimeEl = row.querySelector('.call-time-col p');
                            const statusEl = row.querySelector('.status-col p');

                            if (callTimeEl) callTimeEl.innerText = data.call_time;
                            if (statusEl) statusEl.innerText = data.status;
                        }

                        btn.innerText = 'Dipanggil';
                    } else {
                        alert(data.message || 'Gagal memanggil antrian');
                        btn.disabled = false;
                        btn.innerText = 'Panggil';
                    }
                })
                .catch(error => {
                    console.error(error);
                    alert('Terjadi kesalahan saat memanggil antrian');
                    btn.disabled = false;
                    btn.innerText = 'Panggil';
                });
            });
        });
    });
</script>
@endsection


