<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?= $_SESSION['csrf_token']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anjungan Pendaftaran Mandiri - Klinik Enggal Saras MHCC</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-blue: #1f4e79;
            --btn-blue: #3b65a5;
            --btn-green: #41ad5c;
            --btn-orange: #f28f00;
            --card-outer: #aae063;
            --footer-bg: #48699b;
            --bg-color: #e5f0d8; /* Warna dasar background */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Nunito', sans-serif;
        }

        body {
            /* Background gradien untuk meniru efek cahaya. 
               Untuk menambahkan gambar peta Indonesia, Anda bisa menambahkan background-image di sini */
            background: radial-gradient(circle at center, #f2f7ec 0%, var(--bg-color) 100%);
            color: #333;
            height: 100vh;
            display: flex;
            flex-direction: column;
            overflow: hidden; /* Mencegah scroll pada layar kiosk */
        }

        /* --- Header --- */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #ffffff;
            padding: 15px 40px;
            border-bottom: 4px solid var(--primary-blue);
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            z-index: 10;
        }

        .header-title {
            font-size: 32px;
            font-weight: 800;
            color: var(--primary-blue);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Placeholder untuk Logo */
        .logo-placeholder {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
            color: var(--btn-green);
        }
        .logo-placeholder i { font-size: 30px; color: #cf2027; }

        .logo-bpjs {
            font-weight: 800;
            color: #008751; /* Warna hijau BPJS */
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .logo-bpjs i { color: #008751; font-size: 28px; }

        /* --- Main Content --- */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
        }

        .welcome-text {
            text-align: center;
            color: var(--primary-blue);
            margin-bottom: 50px;
        }

        .welcome-text h2 { font-size: 28px; font-weight: 600; margin-bottom: 5px; }
        .welcome-text h3 { font-size: 36px; font-weight: 800; margin-bottom: 10px; }
        .welcome-text p { font-size: 18px; font-weight: 600; opacity: 0.8; }

        /* --- Buttons/Cards Container --- */
        .cards-container {
            display: flex;
            gap: 40px;
            justify-content: center;
            z-index: 2;
        }

        .kiosk-card {
            background-color: var(--card-outer);
            padding: 15px;
            border-radius: 25px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.15), inset 0 0 0 4px rgba(255,255,255,0.4);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
            transition: transform 0.2s;
            cursor: pointer;
            width: 320px;
        }

        .kiosk-card:active {
            transform: scale(0.97);
        }

        .kiosk-btn {
            width: 100%;
            height: 130px;
            border-radius: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 55px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .bg-blue { background-color: var(--btn-blue); }
        .bg-green { background-color: var(--btn-green); }
        .bg-orange { background-color: var(--btn-orange); }

        .kiosk-label {
            font-size: 18px;
            font-weight: 800;
            color: var(--primary-blue);
            text-transform: uppercase;
            text-align: center;
        }

        .sponsor-text {
            margin-top: 60px;
            color: var(--primary-blue);
            font-weight: 700;
            font-size: 18px;
            z-index: 2;
        }

        /* --- Footer --- */
        .footer {
            background-color: var(--footer-bg);
            color: white;
            height: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 30px;
            position: relative;
            z-index: 10;
        }

        .footer-time {
            font-size: 16px;
            font-weight: 700;
            width: 30%;
        }

        /* Bentuk Tab Hijau di Tengah Footer */
        .footer-center-tab {
            background-color: var(--btn-green);
            padding: 10px 40px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            font-size: 16px;
            font-weight: 800;
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            height: 50px; /* Lebih tinggi dari footer agar menonjol ke atas */
            display: flex;
            align-items: center;
            box-shadow: 0 -3px 10px rgba(0,0,0,0.1);
        }

        .footer-logo {
            font-size: 18px;
            font-style: italic;
            font-weight: 800;
            width: 30%;
            text-align: right;
        }
        .key {
            border:solid 1px rgb(192, 192, 192);
            border-radius : 10px;
            padding: 10px 15px 10px 15px;
            background-color: rgb(255, 255, 255)
        }
    </style>
</head>
<body>

    <header class="header">
        <div class="logo-placeholder">
             <img src="/public/img/enggal.gif" class="" style="width:2cm" alt="main_logo">
        </div>
        <h1 class="header-title">KLINIK ENGGAL SARAS MHCC</h1>
        <div class="logo-bpjs">
           <img src="/public/img/bpjs.png" class="" style="width:7cm" alt="main_logo">
        </div>
    </header>

    <main class="main-content" id="panelHome">
            <div class="welcome-text">
                <h2>Selamat Datang</h2>
                <h3>ANJUNGAN PENDAFTARAN MANDIRI</h3>
                <p>Silakan menekan tombol untuk Daftar</p>
            </div>

            <div class="cards-container">
                <button type="button" class="kiosk-card btnPendaftaran">
                    <div class="kiosk-btn bg-blue">
                        <i class="fa-solid fa-user-check"></i>
                    </div>
                    <div class="kiosk-label">PASIEN BPJS</div>
                </button>

                <button type="button" class="kiosk-card btnPendaftaran">
                    <div class="kiosk-btn bg-green">
                        <i class="fa-solid fa-user-plus"></i>
                    </div>
                    <div class="kiosk-label">PASIEN NON BPJS</div>
                </button>

                <button type="button" class="kiosk-card btnPendaftaran">
                    <div class="kiosk-btn bg-orange">
                        <i class="fa-solid fa-user-clock"></i>
                    </div>
                    <div class="kiosk-label">AMBIL ANTRIAN PENDAFTARAN</div>
                </button>
            </div>

            <div class="sponsor-text">Didukung oleh MyKlinik</div>
    </main>
    <div id="panelPasien" style="display:none; margin-top:20px;">
        <div style="background: #eef7df;padding: 30px;text-align:center">
            <h2 id="judulJenis">Silakan masukan Nama Pasien</h2>

            <div style="
                background:#fff;
                width: 650px;
                margin: 20px auto;
                border-radius: 40px;
                padding: 20px 30px;
                display:flex;
                align-items:center;
                justify-content:space-between;
                gap:10px;
            ">
                <div style="text-align:left; flex:1;">
                    <label>Silakan masukan Nama Anda</label><br>
                    <input type="text" id="namaPasien" placeholder="Ketik Nama Anda" style="
                        border:none;
                        border-bottom:2px solid #000;
                        outline:none;
                        width:100%;
                        font-size:22px;
                        padding:8px;
                    ">
                    <input type="hidden" id="jenisPendaftaran">
                </div>

                <button id="btnSimpan" style="
                    background:green;
                    color:#fff;
                    border:none;
                    padding:18px 25px;
                    border-radius:30px;
                    cursor:pointer;
                ">SIMPAN/AMBIL ANTRIAN</button>

                <button id="btnKembali" style="
                    background:red;
                    color:#fff;
                    border:none;
                    padding:18px 25px;
                    border-radius:30px;
                    cursor:pointer;
                ">KEMBALI</button>
            </div>
        </div>

        <!-- Keyboard -->
        <div style="
            background:#ffffff;
            padding:30px;
            text-align:center;
        ">
            <div id="keyboard" style="
                display:grid;
                grid-template-columns: repeat(9, 70px) repeat(3, 70px);
                gap:18px;
                justify-content:center;
                align-items:center;
                font-size:24px;
            ">
                <!-- Huruf -->
                <button class="key">A</button>
                <button class="key">B</button>
                <button class="key">C</button>
                <button class="key">D</button>
                <button class="key">E</button>
                <button class="key">F</button>
                <button class="key">G</button>
                <button class="key">H</button>
                <button class="key">I</button>

                <button class="key">1</button>
                <button class="key">2</button>
                <button class="key">3</button>

                <button class="key">J</button>
                <button class="key">K</button>
                <button class="key">L</button>
                <button class="key">M</button>
                <button class="key">N</button>
                <button class="key">O</button>
                <button class="key">P</button>
                <button class="key">Q</button>
                <button class="key">R</button>

                <button class="key">4</button>
                <button class="key">5</button>
                <button class="key">6</button>

                <button class="key">S</button>
                <button class="key">T</button>
                <button class="key">U</button>
                <button class="key">V</button>
                <button class="key">W</button>
                <button class="key">X</button>
                <button class="key">Y</button>
                <button class="key">Z</button>
                <div></div>

                <button class="key">7</button>
                <button class="key">8</button>
                <button class="key">9</button>

                <button class="key" data-action="space" style="grid-column: span 3;">Spasi</button>
                <button class="key" data-action="clear" style="grid-column: span 3;">Bersihkan</button>
                <button class="key" data-action="backspace" style="grid-column: span 3;">Hapus</button>
                <div></div>
                <button class="key">0</button>
                <div></div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-time" id="datetime">Memuat waktu...</div>
        <div class="footer-center-tab">Anjungan Pendaftaran Mandiri</div>
        <div class="footer-logo">MyKlinik</div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.btnPendaftaran').on('click', function () {
            Swal.fire({
                title: 'Pilih Jenis Pendaftaran',
                icon: 'question',
                html: `
                    <div style="display:flex; gap:15px; justify-content:center; margin-top:20px;">
                        <button id="pilihBpjs" class="swal2-confirm swal2-styled" style="background-color:#28a745;">BPJS</button>
                        <button id="pilihNonBpjs" class="swal2-cancel swal2-styled" style="background-color:#007bff;">Non BPJS</button>
                    </div>
                `,
                showConfirmButton: false,
                showCancelButton: false,
                didOpen: () => {
                    document.getElementById('pilihBpjs').addEventListener('click', function () {
                        Swal.close();
                        tampilkanPanel('BPJS');
                    });

                    document.getElementById('pilihNonBpjs').addEventListener('click', function () {
                        Swal.close();
                        tampilkanPanel('Non BPJS');
                    });
                }
            });
        });

        function tampilkanPanel(jenis) {
            $('#panelPasien').show();
            $('#panelHome').hide();
            $('#jenisPendaftaran').val(jenis);
            $('#judulJenis').text('Silakan masukan Nama Pasien - ' + jenis);
            $('#namaPasien').val('').focus();
        }

        $(document).on('click', '.key', function () {
            let input = $('#namaPasien');
            let nilai = input.val();
            let tombol = $(this).text();
            let action = $(this).data('action');

            if (action === 'space') {
                input.val(nilai + ' ');
            } else if (action === 'clear') {
                input.val('');
            } else if (action === 'backspace') {
                input.val(nilai.slice(0, -1));
            } else {
                input.val(nilai + tombol);
            }

            input.focus();
        });

        $('#btnKembali').on('click', function () {
            $('#panelPasien').hide();
        });
        $('#btnSimpan').on('click', function () {
            let nama = $('#namaPasien').val();
            let jenis = $('#jenisPendaftaran').val();

            if (nama.trim() === '') {
                Swal.fire('Peringatan', 'Nama pasien harus diisi', 'warning');
                return;
            }
            Swal.fire({
                title: 'Loading!',
                html: '<p>Proses Sedang Berlangsung</p>',
                allowOutsideClick: false,
                showConfirmButton: false,
            });
            $.ajax({
                url: "{{ route('store.anjungan') }}",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    'Accept': 'application/json'
                },
                data: {
                    nama: nama,
                    jenis: jenis
                },
                success: function (res) {
                    Swal.close();
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data berhasil disimpan',
                        timer: 1200,
                        showConfirmButton: false
                    });

                    // buka halaman print
                    window.open(res.print_url, '_blank', 'width=800,height=600');

                    // reset input
                    $('#namaPasien').val('');

                    // TUTUP panel pasien
                    $('#panelPasien').hide();

                    // BUKA panel home
                    $('#panelHome').show();
                },
                error: function (xhr) {
                    Swal.close();
                    console.log(xhr.status);
                    console.log(xhr.responseText);

                    Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                }
            });

        });

    </script>
    <script>
        function updateClock() {
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const now = new Date();
            
            const dayName = days[now.getDay()];
            const day = String(now.getDate()).padStart(2, '0');
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const year = now.getFullYear();
            
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');

            // Format: Minggu, 15-03-2026 / 14:55:56
            const timeString = `${dayName}, ${day}-${month}-${year} / ${hours}:${minutes}:${seconds}`;
            document.getElementById('datetime').textContent = timeString;
        }

        setInterval(updateClock, 1000);
        updateClock(); // Jalankan langsung saat halaman dimuat
    </script>

</body>
</html>