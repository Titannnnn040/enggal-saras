@extends('layouts/form_layouts')
@section('form_layouts')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden" >
    <div class="container-fluid py-1">
        <h1 class="fw-bolder m-1 " style="font-family: 'Roboto', 'Helvetica', 'Arial', 'sans-serif'; font-size:48px; color:#344767;">Enggal Saras</h1>
        <div class="row">
            <div class="mt-4"> 
                <div class="card my-3  border border-0">
                    <div class="card-header p-0 position-relative border border-0 mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">EDIT RESERVASI PASIEN</h6>
                        </div>
                    </div>
                    <div class="card-body px-5 pb-2">
                        <div class="form"  style="background-color:#FDFEFD;">
                            <div class="content">
                                <form action="/pasien/update-reservasi-pasien/{{$reservasi->id}}" method="post" class="d-flex col-lg-12"> 
                                    @csrf     
                                    @method('put')
                                    <div class="d-flex flex-column">

                                        <div class="d-flex col-lg-12 mb-4">
                                            <div class="col-lg-12 col-xl-12 col-xxl-12 me-0 row">

                                                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                    <div class="d-flex">
                                                        <label for="date_now" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">Tanggal & Jam :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <div class="d-flex">
                                                                <div class="col-md-7 col-lg-9">
                                                                    <input type="date_now" class="form-control @error('date_now') is-invalid @enderror" id="date_now" name="date_now" value="" readonly>      
                                                                </div>
                                                                <div class="col-lg-3 ms-3">
                                                                    <input type="time_now" class="form-control @error('time_now') is-invalid @enderror" id="time_now" name="time_now" value="" readonly>      
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 mb-3">
                                                    <div class="d-flex">
                                                        <label for="no_antrian" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">No Antrian :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <input type="text" class="form-control @error('no_antrian') is-invalid @enderror" id="no_antrian" name="no_antrian" value="{{$reservasi->no_antrian}}" readonly>
                                                            @error('no_antrian')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                        
                                            </div>

                                        </div>  

                                        <div class="d-flex col-lg-6 mb-4">
                                            <div class="col-lg-12 col-xl-12 col-xxl-12 me-0 row">

                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="code" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Kode Reservasi :</label>
                                                        <label>autogenerate</label>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="no_rm" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">Nomor Med. Record :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <select id="mySelect" class="form-select @error('no_rm') is-invalid @enderror" name="no_rm"  id="no_rm">
                                                                <option value="">Please Select</option>
                                                                @foreach ($rawatJalan as $item)
                                                                    <option value="{{$item->no_rekam_medis}}" {{$reservasi->no_rm == $item->no_rekam_medis ? 'selected' : ''}}>{{$item->no_rekam_medis}}  &nbsp; | &nbsp; {{$item->nama_lengkap}}</option>
                                                                @endforeach

                                                            </select>          
                                                            @error('no_rm')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Tambahkan CSS Select2 -->
                                            

                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="pasien_name" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Nama Pasien :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <input type="text" class="form-control @error('pasien_name') is-invalid @enderror" id="pasien_name" name="pasien_name" value="{{$reservasi->pasien_name}}" readonly>
                                                            @error('pasien_name')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxl-6 mb-3">
                                                    <div class="d-flex">
                                                        <label for="address" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Alamat :</label>
                                                        <div class="d-flex flex-column  col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ $reservasi->address }}" readonly>
                                                            @error('address')
                                                                <div class="invalid-feedback d-block">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxl-6 mb-3">
                                                    <div class="d-flex">
                                                        <label for="phone_no" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">No. Telp :</label>
                                                        <div class="d-flex flex-column  col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <input type="text" class="form-control @error('phone_no') is-invalid @enderror" id="phone_no" name="phone_no" value="{{ $reservasi->phone_no }}" readonly>
                                                            @error('phone_no')
                                                                <div class="invalid-feedback d-block">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="gender" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">Jenis Kelamin :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <input type="text" class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" value="{{ $reservasi->gender }}" readonly>   
                                                            @error('gender')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                            <button type="button" class="btn btn-success col-lg-5 mt-3" onclick="openPopup()">
                                                                <i class="fa-regular fa-calendar-days"></i> Jadwal Dokter
                                                            </button>      
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-lg-12 col-xl-12 col-xxl-12 me-0 row">

                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                    <div class="d-flex">
                                                        <label for="reservasi_date" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">Tanggal Reservasi :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <div class="d-flex">
                                                                <div class="col-md-7 col-lg-9">
                                                                    <input type="date" class="form-control @error('reservasi_date') is-invalid @enderror" id="reservasi_date" name="reservasi_date" value="{{ $reservasi->reservasi_date }}">      
                                                                </div>
                                                                <div class="col-lg-3 ms-1">
                                                                    <input type="time" class="form-control @error('time') is-invalid @enderror" id="time" name="time" value="{{ $reservasi->time }}" >      
                                                                </div>
                                                            </div>
                                                            @error('reservasi_date')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                        
                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                    <div class="d-flex">
                                                        <label for="layanan_id" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">Layanan :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <select class="form-select @error('layanan_id') is-invalid @enderror" name="layanan_id" id="layananSelect">
                                                                <option value="">Please Select</option>
                                                                @foreach ($layanan as $item)
                                                                    <option value="{{ $item->id }}" {{$item->id == $reservasi->layanan_id ? 'selected' : ''}}>{{ $item->nama_layanan }}</option>
                                                                @endforeach
                                                            </select>          
                                                            @error('layanan_id')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                    <div class="d-flex">
                                                        <label for="dokter_code" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">Dokter :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <select id="dokterSelect" class="form-select @error('dokter_code') is-invalid @enderror" name="dokter_code">
                                                                @foreach ($dokterAll as $itemDokter)
                                                                    @if ( $itemDokter->layanan_id == $reservasi->layanan_id )
                                                                        <option value="{{$itemDokter->no_dokter}}" {{$itemDokter->no_dokter == $reservasi->dokter_code ? 'selected' : ''}}>{{ $itemDokter->nama_lengkap }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>          
                                                            @error('dokter_code')   
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                    <div class="d-flex">
                                                        <label for="jadwal_praktik" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Jadwal Praktik :</label>
                                                        
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <select class="form-select @error('jadwal_praktik') is-invalid @enderror" name="jadwal_praktik"  id="jadwal_praktik">
                                                                <option value="">please select</option>
                                                                <option value="PAGI" {{$reservasi->jadwal_praktik == 'PAGI' ? 'selected' : ''}}>PAGI</option>
                                                                <option value="SORE-MALAM"{{$reservasi->jadwal_praktik == 'SORE-MALAM' ? 'selected' : ''}}>SORE MALAM</option>
                                                            </select> 
                                                            @error('jadwal_praktik')
                                                                <div class="invalid-feedback d-block">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                    <div class="d-flex">
                                                        <label for="jaminan_id" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">Jaminan :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <select class="form-select @error('jaminan_id') is-invalid @enderror" name="jaminan_id"  id="jaminan_id">
                                                                <option value="">Please Select</option>
                                                                @foreach ($jaminan as $item)
                                                                    <option value="{{$item->id}}" {{$item->id == $reservasi->jaminan_id ? 'selected' : ''}}>{{$item->nama_jaminan}}</option>
                                                                @endforeach
                                                            </select>          
                                                            @error('jaminan_id')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   

                                        <div class="col-lg-12">
                                            <a href="/pasien/data-reservasi-pasien" class="btn btn-danger col-lg-2 ms-1">Cancel</a>
                                            <button type="submit" class="btn btn-success col-lg-1" style="position:absolute; right:2%">Save</button>
                                        </div> 

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay" id="overlay" onclick="closePopup()"></div>

    <!-- Popup -->
    <div class="popup" id="popup">
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <div class="container-fluid py-4">
                <div class="container-fluid py-1">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card my-3">
                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                    <div class="bg-gradient-success shadow-success d-flex align-items-center justify-content-between border-radius-lg pt-4 pb-3">
                                        <h6 class="text-white text-capitalize ps-3 mb-0  d-flex align-items-center" style="margin-top:-9px;">Jadwal Dokter</h6>
                                    </div>
                                </div>
                                <div class="card-body px-5 pb-2">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0" id="myTables">
                                            <thead>
                                                <tr>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Layanan</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dokter</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Praktik</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Senin</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Selasa</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rabu</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kamis</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumat</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sabtu</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Minggu</th>
                                                </tr>
                                            </thead>
                                            <?php $num = 1 ?>
                                            <tbody>
                                                @foreach ($jadwalDokter as $item)
                                                    <tr>
                                                        <td class="align-middle text-center text-xs">
                                                            <h6 class="mb-0 text-xs">{{ $num++ }}</h6>
                                                        </td>
                                                        <td class="align-middle text-center text-xs">
                                                            @foreach ($layanan as $itemLayanan)
                                                                <p class="text-xs font-weight-bold mb-0 text-center">{{ $itemLayanan->nama_layanan }}</p>
                                                            @endforeach
                                                        </td>
                                                        <td class="align-middle text-center text-xs">
                                                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->Dokter->nama_lengkap }}</p>
                                                        </td>
                                                        <td class="align-middle text-center text-xs">
                                                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->jadwal_praktik }}</p>
                                                        </td>
                                                        <td class="align-middle text-center text-xs">
                                                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->senin }}</p>
                                                        </td>
                                                        <td class="align-middle text-center text-xs">
                                                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->selasa }}</p>
                                                        </td>
                                                        <td class="align-middle text-center text-xs">
                                                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->rabu }}</p>
                                                        </td>
                                                        <td class="align-middle text-center text-xs">
                                                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->kamis }}</p>
                                                        </td>
                                                        <td class="align-middle text-center text-xs">
                                                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->jumat }}</p>
                                                        </td>
                                                        <td class="align-middle text-center text-xs">
                                                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->sabtu }}</p>
                                                        </td>
                                                        <td class="align-middle text-center text-xs">
                                                            <p class="text-xs font-weight-bold mb-0 text-center">{{ $item->minggu }}</p>
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
            </div>
        </main>
    </div>
</main>

<style>
    .popup {
        display: none; /* Tersembunyi secara default */
        position: fixed;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 1300px;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0);
        border-radius: 8px;
        z-index: 1000;
        opacity: 0; /* Tambahkan opacity untuk transisi smooth */
        transition: opacity 0.5s ease; /* Transisi smooth selama 0.5 detik */
    }

    /* Background untuk overlay */
    .overlay {
        display: none; /* Tersembunyi secara default */
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 999;
        opacity: 0; /* Tambahkan opacity untuk transisi smooth */
        transition: opacity 0.5s ease; /* Transisi smooth selama 0.5 detik */
    }

    /* Tombol untuk menutup popup */
    .close-btn {
        background-color: red;
        color: white;
        padding: 5px 10px;
        border: none;
        cursor: pointer;
        float: right;
    }
</style>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#mySelect').select2({
            placeholder: "Pleas Select",
            });
    });

    function openPopup() {
        var popup = document.getElementById('popup');
        var overlay = document.getElementById('overlay');
        
        popup.style.display = 'block'; // Tampilkan popup
        overlay.style.display = 'block'; // Tampilkan overlay

        // Menggunakan setTimeout untuk memberi waktu transisi opacity
        setTimeout(function() {
            popup.style.opacity = '1';
            overlay.style.opacity = '1';
        }, 10); // Sedikit penundaan untuk memicu transisi
    }

    // JavaScript untuk menutup popup
    function closePopup() {
        var popup = document.getElementById('popup');
        var overlay = document.getElementById('overlay');
        
        popup.style.opacity = '0'; // Ubah opacity menjadi 0
        overlay.style.opacity = '0';

        // Setelah transisi selesai, sembunyikan elemen
        setTimeout(function() {
            popup.style.display = 'none';
            overlay.style.display = 'none';
        }, 500); // Pastikan ini sesuai dengan durasi transisi (0.5 detik)
    }

    $(document).ready(function() {
        $('#mySelect').select2({
            placeholder: "Please Select",
        });
    });
    // // Event handler untuk ketika opsi berubah
    $('#mySelect').on('change', function() {
        var noRekamMedis = $(this).val(); // Mendapatkan nilai yang dipilih
        
        // Cek jika ada nomor rekam medis yang dipilih
        if (noRekamMedis) {
            // AJAX untuk mengambil data pasien
            $.ajax({
                url: '/getPatientData/' + noRekamMedis, // Ganti dengan URL endpoint Laravel Anda
                method: 'GET',
                success: function(data) {
                    // Mengisi input fields dengan data yang diterima dari server
                    $('#pasien_name').val(data.nama_lengkap);
                    $('#address').val(data.alamat);
                    $('#phone_no').val(data.telepon);
                    $('#gender').val(data.jenis_kelamin);
                },
                error: function(err) {
                    console.error('Error fetching data:', err);
                }
            });
        } else {
            // Kosongkan input fields jika tidak ada pilihan
            $('#pasien_name').val('');
            $('#address').val('');
            $('#phone_no').val('');
            $('#gender').val('');
        }
    });

    $(document).ready(function() {
        $('#dokter').select2({
            placeholder: "Pleas Select",
        });
    });
    
    $(document).ready(function() {
        $('#layananSelect').change(function() {
            var layananId = $(this).val(); // Dapatkan ID layanan yang dipilih

            // AJAX request untuk mendapatkan data dokter berdasarkan layanan yang dipilih
            $.ajax({
                url: '/getDoctorsByLayanan/' + layananId, // Endpoint baru
                method: 'GET',
                success: function(data) {
                    // Kosongkan dropdown dokter terlebih dahulu
                    $('#dokterSelect').empty();

                    // Tambahkan opsi default kembali
                    $('#dokterSelect').append('<option value="">Please Select</option>');

                    // Isi dropdown dokter dengan data yang diterima dari server
                    data.forEach(function(dokter) {
                        $('#dokterSelect').append('<option value="' + dokter.no_dokter + '">' + dokter.nama_lengkap + '</option>');
                    });
                },
                error: function(err) {
                    console.error('Error fetching doctors:', err);
                }
            });
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        // Dapatkan tanggal dan waktu saat ini
        var now = new Date();
        
        // Format tanggal sebagai YYYY-MM-DD
        var date = now.toISOString().split('T')[0];
        
        // Format waktu sebagai HH:MM
        var time = now.toTimeString().split(' ')[0].slice(0, 5);

        // Set nilai input date dan time
        document.getElementById('date_now').value = date;
        document.getElementById('time_now').value = time;
    });

</script>
@endsection