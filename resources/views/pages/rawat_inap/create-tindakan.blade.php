@extends('layouts/form_layouts')
@section('form_layouts')
<!-- Page Content  -->
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden" >
    <div class="container-fluid py-1">
        <h1 class="fw-bolder m-1 " style="font-family: 'Roboto', 'Helvetica', 'Arial', 'sans-serif'; font-size:48px; color:#344767;">Enggal Saras</h1>
        <div class="row">
            <div class="mt-4"> 
                <form action="" method="post">
                    @csrf
                    <div class="card my-3  border border-0">
                        <div class="card-header p-0 position-relative border border-0 mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">CREATE TINDAKAN</h6>
                            </div>
                        </div>
                        <div class="card-body px-5 pb-2">
                            <div class="form"  style="background-color:#FDFEFD;">
                                <div class="content">                                 
                                    <div class="d-flex flex-column">
                                        <div class="d-flex col-lg-6 mb-4">
                                            <div class="col-lg-12 col-xl-12 col-xxl-12 me-0 row">

                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="code" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">No Tindakan :</label>
                                                        <label>autogenerate</label>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="no_rm" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">Tanggal dan Jam :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <div class="d-flex">
                                                                <input type="date" class="form-control @error('tindakan_date') is-invalid @enderror me-1" id="tindakan_date" name="tindakan_date" value="" style="flex: 8;">
                                                                <input type="time" class="form-control @error('tindakan_time') is-invalid @enderror ms-1" id="tindakan_time" name="tindakan_time" value="" style="flex: 4;">
                                                            </div>
                                                            @error('no_rm')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="dokter_code" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">Dokter :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <select class="form-select @error('dokter_code') is-invalid @enderror" name="dokter_code">
                                                                <option value="">Please Select</option>
                                                                @foreach ($dokter as $item)
                                                                    <option value="{{$item->no_dokter}}" {{$rawatInap->dokter_code == $item->no_dokter ? 'selected' : ''}}>{{$item->nama_lengkap}}</option>
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
                                            </div>

                                            <div class="col-lg-12 col-xl-12 col-xxl-12 me-0 row">

                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="regost_code" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">No Register :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <input type="text" class="form-control" id="regist_code" name="regist_code" value="{{$rawatInap->regist_code}}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="no_rm" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">No Med Record :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <div class="d-flex">
                                                                <input type="text" class="form-control @error('no_rm') is-invalid @enderror me-1" id="no_rm" name="no_rm" value="{{$rawatInap->no_rm}}" style="flex: 8;" readonly>
                                                                <input type="text" class="form-control @error('pasien_name') is-invalid @enderror ms-1" id="pasien_name" name="pasien_name" value="{{$rawatInap->pasien_name}}" style="flex: 4;" readonly   >
                                                            </div>
                                                            @error('no_rm')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="layanan" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2">Layanan :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <input type="text" class="form-control @error('layanan_id') is-invalid @enderror me-1" id="layanan_id" name="layanan_id" value="{{$rawatInap->layanan_id == '3' ? 'RAWAT INAP' : ''}}" style="flex: 8;" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card my-3  border border-0">
                        <div class="card-body px-5 pb-2">
                            <div class="form"  style="background-color:#FDFEFD;">
                                <div class="content">
                                    <div class="d-flex flex-column">
                                        <div class="col-lg-12 d-flex">
                                            <div class="d-flex col-lg-4 mb-4 me-3">
                                                <div class="col-lg-12 me-0 d-flex mb-3">
                                                    <label for="tindakan_code" class="form-label col-lg-2 me-2">Tindakan :</label>
                                                    <div class="d-flex flex-column flex-fill">
                                                        <select id="tindakan_select" class="form-select @error('tindakan_code') is-invalid @enderror" name="tindakan_code" style="border:solid 1px rgba(179, 23, 23, 0.055);">
                                                            <option value="">Please Select</option>
                                                            @foreach ($tindakan as $item)
                                                            <option value="{{$item->code_tarif_tindakan}}">{{$item->nama_tarif_tindakan}}</option>
                                                            @endforeach
                                                        </select>  
                                                        @error('tindakan_code')
                                                        <div class="invalid-feedback d-block">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex col-lg-2 mb-4 me-3">
                                                <div class="col-lg-12 me-0 d-flex mb-3">
                                                    <label for="tarif_tindakan" class="form-label col-lg-2 me-2">Tarif :</label>
                                                    <div class="d-flex flex-column flex-fill">
                                                        <input type="text" class="form-control @error('tarif_tindakan') is-invalid @enderror" id="tarif_tindakan" name="tarif_tindakan" value="" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                    
                                            <div class="d-flex col-lg-1 mb-4 me-3">
                                                <div class="col-lg-12 me-0 d-flex mb-3">
                                                    <label for="qty" class="form-label col-lg-3 me-2">Qty :</label>
                                                    <div class="d-flex flex-column flex-fill">
                                                        <input type="number" class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty" value="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex col-lg-2 mb-4 me-3">
                                                <div class="col-lg-12 me-0 d-flex mb-3">
                                                    <label for="discount" class="form-label col-lg-3 me-2">Diskon :</label>
                                                    <div class="d-flex flex-column flex-fill">
                                                        <input type="text" class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount" value="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex col-lg-2 mb-4 me-3">
                                                <div class="col-lg-12 me-0 d-flex mb-3">
                                                    <label for="total_tarif" class="form-label col-lg-2 me-2">Total :</label>
                                                    <div class="d-flex flex-column flex-fill">
                                                        <input type="text" class="form-control @error('discount') is-invalid @enderror" id="total_tarif" name="total_tarif" value="" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex col-lg-2 mb-4 me-3">
                                                <button type="button" class="btn btn-success" id="addRowBtn">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 d-flex mb-5">
                                            <table class="table align-items-center mb-0" id="myTables">
                                                <thead style="background-color:#25b82c;">
                                                    <tr>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tindakan</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tarif</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Qty</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Diskon</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-lg-12 d-flex mb-1">
                                            <div class="d-flex col-lg-3 mb-4 me-3">
                                                <div class="col-lg-12 me-0 d-flex mb-3">
                                                    <label for="all_tarif" class="form-label col-lg-2 me-2">Total Tarif :</label>
                                                    <div class="d-flex flex-column flex-fill">
                                                        <input type="text" class="form-control" id="all_tarif" name="all_tarif" value="" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex col-lg-3 mb-4 me-3">
                                                <div class="col-lg-12 me-0 d-flex mb-3">
                                                    <label for="all_discount" class="form-label col-lg-3 me-2">Total Diskon :</label>
                                                    <div class="d-flex flex-column flex-fill">
                                                        <input type="text" class="form-control" id="all_discount" name="all_discount" value="" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex col-lg-5 mb-4 me-3">
                                                <div class="col-lg-12 me-0 d-flex mb-3">
                                                    <label for="final_tarif" class="form-label col-lg-2 me-2">Final Tarif :</label>
                                                    <div class="d-flex flex-column flex-fill">
                                                        <input type="text" class="form-control" id="final_tarif" name="final_tarif" value="" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <a href="/pasien/data-regist-pasien" class="btn btn-danger col-lg-1 ms-1">Cancel</a>
                                            <button type="submit" class="btn btn-success col-lg-1" style="position:absolute; right:2%">Save</button>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
    .select2-container .select2-selection--single{
        height: unset !important;
    }
    .select2-container--default .select2-selection--single{
        border:1px solid #DEE2E6 !important;
        padding: 4px 0 4px 0 ;
    }
</style>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#mySelect').select2({
            placeholder: "Please Select",
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
    $('#tindakan_select').on('change', function() {
        var tindakan = $(this).val(); // Mendapatkan nilai yang dipilih
        
        if (tindakan) {
            // AJAX untuk mengambil data tindakan
            $.ajax({
                url: '/getTindakanData/' + tindakan, // Ganti dengan URL endpoint Laravel Anda
                method: 'GET',
                success: function(data) {
                    // Mengisi input fields dengan data yang diterima dari server
                    var formattedTarif = formatNumber(data.total_tarif);
                    $('#tarif_tindakan').val(formattedTarif);
                    $('#qty').val(1);
                    $('#discount').val(formatNumber(0));
                    calculateTotal();
                },
                error: function(err) {
                    console.error('Error fetching data:', err);
                }
            });
        } else {
            // Kosongkan input fields jika tidak ada pilihan
            $('#tarif_tindakan').val('');
            $('#qty').val('');
            $('#discount').val('');
            $('#total_tarif').val('');
        }
    });

    function calculateTotal() {
        let tarifTindakan = parseNumber($('#tarif_tindakan').val());
        let qty = parseNumber($('#qty').val());
        let discount = parseNumber($('#discount').val());
        let totalFee = (tarifTindakan * qty) - discount;
        $('#total_tarif').val(formatNumber(totalFee));
    }

    function parseNumber(value) {
        return parseFloat(value.replace(/[^0-9,-]+/g, "").replace(',', '.')) || 0;
    }

    function formatNumber(value) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(value);
    }

    // Event listener to format discount input on change
    $('#discount').on('input', function() {
        let discountValue = parseNumber($(this).val());
        $(this).val(formatNumber(discountValue));
        calculateTotal();
    });

    // Event listeners to recalculate total when inputs change
    $('#tarif_tindakan, #qty, #discount').on('input', calculateTotal);

    $(document).ready(function() {
        $('#dokter').select2({
            placeholder: "Pleas Select",
        });
    });
    
    $(document).ready(function() {
        // Mendapatkan ID layanan yang dipilih saat halaman dimuat
        var layananId = $('#layananSelect').val(); 

        // Jika layanan sudah dipilih (tidak kosong), panggil fungsi untuk mendapatkan dokter
        if (layananId) {
            getDoctorsByLayanan(layananId);
        }

        // Event listener untuk perubahan pada dropdown layanan
        $('#layananSelect').change(function() {
            layananId = $(this).val(); // Dapatkan ID layanan yang dipilih
            getDoctorsByLayanan(layananId); // Panggil fungsi untuk mendapatkan dokter
        });

        // Fungsi untuk mengambil dan menampilkan dokter berdasarkan layanan
        function getDoctorsByLayanan(layananId) {
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
        }
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

    $(document).ready(function() {
        // Fungsi untuk memformat angka menjadi format mata uang
        function formatRupiah(angka) {
            return 'Rp. ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        }

        // Saat pilihan pada dropdown tarif_pendaftaran berubah
        $('#tarif_pendaftaran').change(function() {
            // Ambil harga dari option yang dipilih
            var selectedOption = $(this).find('option:selected');
            var harga = selectedOption.data('harga'); // Menggunakan data-harga
            
            // Format harga ke format rupiah dan set nilai input biaya
            $('#biaya').val(formatRupiah(harga));
        });
    });

    function hitungIMT() {
        var beratBadan = parseFloat(document.getElementById('berat_badan').value);
        var tinggiBadan = parseFloat(document.getElementById('tinggi_badan').value);

        if (isNaN(beratBadan) || isNaN(tinggiBadan) || tinggiBadan <= 0) {
            // Jika input tidak valid, kosongkan nilai IMT
            document.getElementById('imt').value = '';
            return;
        }

        tinggiBadan = tinggiBadan / 100;
        var imt = beratBadan / (tinggiBadan * tinggiBadan);
        document.getElementById('imt').value = imt.toFixed(2);
    }

    $(document).ready(function() {
        function toggleJamPraktek(layananName) {
            if (layananName === 'RAWAT INAP') {
                $('#jam_praktek').prop('disabled', true);  // Nonaktifkan dropdown jam_praktek
            } else {
                $('#jam_praktek').prop('disabled', false); // Aktifkan dropdown jam_praktek
            }
        }

        // Pada saat halaman dimuat, cek apakah layanan yang dipilih adalah 'LM-00003'
        var selectedLayanan = $('#layananSelect option:selected').text(); 
        toggleJamPraktek(selectedLayanan.trim());

        // Event listener untuk perubahan pada dropdown layanan
        $('#layananSelect').change(function() {
            var layananName = $(this).find('option:selected').text().trim(); // Dapatkan kode layanan yang dipilih
            toggleJamPraktek(layananName); // Panggil fungsi untuk menonaktifkan/aktifkan jam_praktek
        });
    });
    document.getElementById('addRowBtn').disabled = true; // Disable the button initially

    document.getElementById('tindakan_select').addEventListener('change', function() {
        var tindakanSelect = document.getElementById('tindakan_select');
        document.getElementById('addRowBtn').disabled = tindakanSelect.value === '';
    });

    document.getElementById('addRowBtn').addEventListener('click', function() {
        var tindakanSelect = document.getElementById('tindakan_select');
        var tindakanText = tindakanSelect.options[tindakanSelect.selectedIndex].text;
        var tindakanValue = tindakanSelect.value;
        var tarifTindakan = parseNumber(document.getElementById('tarif_tindakan').value);
        var qty = parseNumber(document.getElementById('qty').value);
        var discount = parseNumber(document.getElementById('discount').value);
        var totalTarif = parseNumber(document.getElementById('total_tarif').value);

        var table = document.getElementById('myTables').getElementsByTagName('tbody')[0];
        var newRow = table.insertRow();
        var cell7 = newRow.insertCell(0); // New column for tindakan value
        var cell1 = newRow.insertCell(1);
        var cell2 = newRow.insertCell(2);
        var cell3 = newRow.insertCell(3);
        var cell4 = newRow.insertCell(4);
        var cell5 = newRow.insertCell(5);
        var cell6 = newRow.insertCell(6);

        cell1.innerHTML = '<input type="text" style="border:none;" class="form-control text-center" name="tindakan_name[]" value="' + tindakanText + '" readonly>';
        cell2.innerHTML = '<input type="text" style="border:none;" class="form-control text-center" name="tarif_tindakan[]" value="' + formatNumber(tarifTindakan) + '" readonly>';
        cell3.innerHTML = '<input type="text" style="border:none;" class="form-control text-center" name="qty[]" value="' + qty + '" readonly>';
        cell4.innerHTML = '<input type="text" style="border:none;" class="form-control text-center" name="discount[]" value="' + formatNumber(discount) + '" readonly>';
        cell5.innerHTML = '<input type="text" style="border:none;" class="form-control text-center" name="total_tarif[]" value="' + formatNumber(totalTarif) + '" readonly>';
        cell6.innerHTML = '<span class="text-secondary text-xs font-weight-bolder d-flex justify-content-center align-center mt-3"><button type="button" class="btn btn-warning btn-md me-2" onclick="editRow(this)"><i class="fa-solid fa-edit"></i></button><button type="button" class="btn btn-danger btn-md" onclick="deleteRow(this)"><i class="fa-solid fa-trash"></i></button></span>';
        cell7.innerHTML = '<input type="hidden" name="tindakan_code[]" value="' + tindakanValue + '">'; // Hidden input for tindakan value
        cell7.classList.add('d-none'); // Add d-none class to cell7

        // Clear the input fields after adding the row
        tindakanSelect.value = '';
        document.getElementById('tarif_tindakan').value = '';
        document.getElementById('qty').value = '';
        document.getElementById('discount').value = '';
        document.getElementById('total_tarif').value = '';

        // Update all_tarif, all_discount, and final_tarif
        updateTotals();
    });

    function parseNumber(value) {
        return parseFloat(value.replace(/[^0-9,-]+/g, "").replace(',', '.')) || 0;
    }

    function formatNumber(value) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(value);
    }

    function deleteRow(button) {
        var row = button.parentNode.parentNode.parentNode;
        row.parentNode.removeChild(row);
        updateTotals(); // Call updateTotals after deleting a row
    }

    function editRow(button) {
        var row = button.parentNode.parentNode.parentNode;
        var tindakanText = row.cells[1].innerText;
        var tarifTindakan = row.cells[2].innerText;
        var qty = row.cells[3].innerText;
        var discount = row.cells[4].innerText;
        var totalTarif = row.cells[5].innerText;

        // Set the input fields with the row data
        var tindakanSelect = document.getElementById('tindakan_select');
        for (var i = 0; i < tindakanSelect.options.length; i++) {
            if (tindakanSelect.options[i].text === tindakanText) {
                tindakanSelect.selectedIndex = i;
                break;
            }
        }
        document.getElementById('tarif_tindakan').value = tarifTindakan;
        document.getElementById('qty').value = qty;
        document.getElementById('discount').value = discount;
        document.getElementById('total_tarif').value = totalTarif;

        // Remove the row after setting the input fields
        row.parentNode.removeChild(row);
        updateTotals(); // Call updateTotals after editing a row
    }

    function updateTotals() {
        var allTarif = 0;
        var allDiscount = 0;
        var finalTarif = 0;

        var table = document.getElementById('myTables').getElementsByTagName('tbody')[0];
        var rows = table.getElementsByTagName('tr');

        for (var i = 0; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName('td');
            
            // Parsing nilai dari kolom tarif_tindakan[] menggunakan parseNumber
            var tarifValue = parseNumber(cells[5].getElementsByTagName('input')[0].value);
            allTarif += tarifValue;

            // Parsing nilai dari kolom discount[] menggunakan parseNumber
            var discountValue = parseNumber(cells[4].getElementsByTagName('input')[0].value);
            allDiscount += discountValue;
        }

        // Menghitung final tarif
        finalTarif = allTarif;

        // Update input all_tarif, all_discount, dan final_tarif dengan hasil perhitungan
        document.getElementById('all_tarif').value = formatNumber(allTarif);
        document.getElementById('all_discount').value = formatNumber(allDiscount);
        document.getElementById('final_tarif').value = formatNumber(finalTarif);
    }

    function parseNumber(value) {
        // Menghilangkan simbol mata uang dan pemisah ribuan lalu mengkonversi ke float
        return parseFloat(value.replace(/[^0-9,-]+/g, "").replace(',', '.')) || 0;
    }

</script>
@endsection