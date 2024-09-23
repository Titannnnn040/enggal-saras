@extends('layouts/form_layouts')
@section('form_layouts')
<!-- Page Content  -->
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden" >
    <div class="container-fluid py-1">
        <h1 class="fw-bolder m-1 " style="font-family: 'Roboto', 'Helvetica', 'Arial', 'sans-serif'; font-size:48px; color:#344767;">Enggal Saras</h1>
        <div class="row">
            <div class="mt-4"> 
                <form action="/pasien/update-tindakan-rawat-inap/{{$tindakanRawatInap->tindakan_code}}" method="post">
                    @csrf
                    @method('put')
                    <div class="card my-3  border border-0">
                        <div class="card-header p-0 position-relative border border-0 mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">EDIT TINDAKAN</h6>
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
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <input type="text" class="form-control" id="code" name="code" value="{{$tindakanRawatInap->tindakan_code}}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="no_rm" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">Tanggal dan Jam :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <div class="d-flex">
                                                                <input type="date" class="form-control @error('tindakan_date') is-invalid @enderror me-1" id="tindakan_date" name="tindakan_date" value="{{$tindakanRawatInap->tindakan_date}}" style="flex: 8;">
                                                                <input type="time" class="form-control @error('tindakan_time') is-invalid @enderror ms-1" id="tindakan_time" name="tindakan_time" value="{{$tindakanRawatInap->tindakan_time}}" style="flex: 4;">
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
                                                                    <option value="{{$item->no_dokter}}" {{$tindakanRawatInap->dokter_code == $item->no_dokter ? 'selected' : ''}}>{{$item->nama_lengkap}}</option>
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
                                                            <input type="text" class="form-control" id="regist_code" name="regist_code" value="{{$tindakanRawatInap->regist_code}}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-3">
                                                    <div class="d-flex">
                                                        <label for="no_rm" class="form-label col-lg-2 col-xl-3 col-xxl-2 me-2 ">No Med Record :</label>
                                                        <div class="d-flex flex-column col-md-7 col-lg-9 col-xl-8 col-xxl-9">
                                                            <div class="d-flex">
                                                                <input type="text" class="form-control @error('no_rm') is-invalid @enderror me-1" id="no_rm" name="no_rm" value="{{$tindakanRawatInap->no_rm}}" style="flex: 8;" readonly>
                                                                <input type="text" class="form-control @error('pasien_name') is-invalid @enderror ms-1" id="pasien_name" name="pasien_name" value="{{$tindakanRawatInap->pasien_name}}" style="flex: 4;" readonly   >
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
                                                            <input type="text" class="form-control @error('layanan_id') is-invalid @enderror me-1" id="layanan_id" name="layanan_id" value="{{$tindakanRawatInap->layanan_id }}" style="flex: 8;" readonly>
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
                                                        <input type="text" class="form-control @error('total_tarif') is-invalid @enderror" id="total_tarif" name="total_tarif" value="" readonly>
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
                                            <table class="table align-items-center mb-0" id="tindakanTable">
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
                                                    @foreach ($detailTindakanRawatInap as $item)
                                                        @if ($item->tindakan_rawat_inap_code == $tindakanRawatInap->tindakan_code)
                                                            <tr class="rowTindakan">
                                                                <td class="d-none">
                                                                    <input type="text" style="border:none;" class="form-control text-center" name="tindakan_code[]" value="{{$item->tindakan_code}}" readonly>
                                                                </td>
                                                                <td>
                                                                    <input type="text" style="border:none;" class="form-control text-center" name="tindakan_name[]" value="{{$item->tindakan_name}}" readonly>
                                                                </td>
                                                                <td>
                                                                    <input type="text" style="border:none;" class="form-control text-center" name="tarif_tindakan[]" value="{{'Rp ' . number_format($item->tarif_tindakan)}}" readonly>
                                                                </td>
                                                                <td>
                                                                    <input type="text" style="border:none;" class="form-control text-center" name="qty[]" value="{{$item->qty}}" readonly>
                                                                </td>
                                                                <td>
                                                                    <input type="text" style="border:none;" class="form-control text-center" name="discount[]" value="{{'Rp ' . number_format($item->discount)}}" readonly>
                                                                </td>
                                                                <td>
                                                                    <input type="text" style="border:none;" class="form-control text-center" name="total_tarif_table[]" value="{{'Rp ' . number_format($item->total_tarif)}}" readonly>
                                                                </td>
                                                                <td>
                                                                    <span class="text-secondary text-xs font-weight-bolder d-flex justify-content-center align-center mt-3">
                                                                        <button type="button" class="btn btn-warning btn-md me-2 editRowBtn" onclick="editRow"><i class="fa-solid fa-edit"></i></button>
                                                                        <button type="button" class="btn btn-danger btn-md deleteRowBtn"><i class="fa-solid fa-trash"></i></button>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                            <div class="col-lg-12 d-flex mb-1 d-none">
                                                <div class="d-flex col-lg-3 mb-4 me-3">
                                                    <div class="col-lg-12 me-0 d-flex mb-3">
                                                        <label for="all_tarif" class="form-label col-lg-2 me-2">Total Tarif :</label>
                                                        <div class="d-flex flex-column flex-fill">
                                                            <input type="text" class="form-control" id="all_tarif" name="all_tarif" value="{{ number_format($tindakanRawatInap->all_tarif) }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex col-lg-3 mb-4 me-3">
                                                    <div class="col-lg-12 me-0 d-flex mb-3">
                                                        <label for="all_discount" class="form-label col-lg-3 me-2">Total Diskon :</label>
                                                        <div class="d-flex flex-column flex-fill">
                                                            <input type="text" class="form-control" id="all_discount" name="all_discount" value="{{ number_format($tindakanRawatInap->all_discount)}}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex col-lg-5 mb-4 me-3">
                                                    <div class="col-lg-12 me-0 d-flex mb-3">
                                                        <label for="final_tarif" class="form-label col-lg-2 me-2">Final Tarif :</label>
                                                        <div class="d-flex flex-column flex-fill">
                                                            <input type="text" class="form-control" id="final_tarif" name="final_tarif" value="{{ number_format($tindakanRawatInap->final_tarif)}}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 d-flex mb-1">
                                                <div class="d-flex col-lg-3 mb-4 me-3">
                                                    <div class="col-lg-12 me-0 d-flex mb-3">
                                                        <label for="new_all_tarif" class="form-label col-lg-2 me-2">Total Tarif :</label>
                                                        <div class="d-flex flex-column flex-fill">
                                                            <input type="text" class="form-control" id="new_all_tarif" name="new_all_tarif" value="" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex col-lg-3 mb-4 me-3">
                                                    <div class="col-lg-12 me-0 d-flex mb-3">
                                                        <label for="new_all_discount" class="form-label col-lg-3 me-2">Total Diskon :</label>
                                                        <div class="d-flex flex-column flex-fill">
                                                            <input type="text" class="form-control" id="new_all_discount" name="new_all_discount" value="" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex col-lg-5 mb-4 me-3">
                                                    <div class="col-lg-12 me-0 d-flex mb-3">
                                                        <label for="new_final_tarif" class="form-label col-lg-2 me-2">Final Tarif :</label>
                                                        <div class="d-flex flex-column flex-fill">
                                                            <input type="text" class="form-control" id="new_final_tarif" name="new_final_tarif" value="" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <div class="col-lg-12">
                                            <a href="/pasien/data-rawat-inap" class="btn btn-danger col-lg-1 ms-1">Cancel</a>
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
    function parseNumber(str) {
        // Hapus semua karakter non-digit (kecuali koma untuk desimal)
        var cleanStr = str.replace(/[^0-9,-]+/g, '').replace(',', '.');
        return parseFloat(cleanStr) || 0; // Mengonversi ke float, atau 0 jika tidak valid
    }

    function formatNumber(num) {
        return num.toLocaleString('id-ID', { style: 'decimal', minimumFractionDigits: 0, maximumFractionDigits: 0 });
    }

    $('#tindakan_select').on('change', function() {
        var tindakan = $(this).val(); 
        
        if (tindakan) {
            $.ajax({
                url: '/getTindakanData/' + tindakan, 
                method: 'GET',
                success: function(data) {
                    var tarif = parseNumber(data.total_tarif); // Parsing nilai tarif
                    $('#tarif_tindakan').val(formatNumber(tarif)); // Format tarif tindakan ke format mata uang
                    $('#qty').val(1);
                    $('#discount').val(formatNumber(0)); // Set discount ke Rp 0
                    calculateTotal(); // Hitung total setelah perubahan
                },
                error: function(err) {
                    console.error('Error fetching data:', err);
                }
            });
        } else {
            $('#tarif_tindakan').val('');
            $('#qty').val('');
            $('#discount').val('');
            $('#total_tarif').val('');
        }
    });

    function calculateTotal() {
        let tarifTindakan = parseNumber($('#tarif_tindakan').val());
        let qty = parseNumber($('#qty').val()) || 1;
        let discount = parseNumber($('#discount').val()) || 0;
        let totalFee = (tarifTindakan * qty) - discount;

        $('#total_tarif').val(formatNumber(totalFee));
    }

    $('#discount').on('input', function() {
        let discountValue = parseNumber($(this).val());
        $(this).val(formatNumber(discountValue));
        calculateTotal();
    });

    $('#qty').on('input', calculateTotal); // Hitung ulang jika qty diubah

    document.getElementById('addRowBtn').addEventListener('click', function() {
        // Ambil nilai dari input fields
        const tindakanSelect = document.getElementById('tindakan_select');
        const tindakanName = tindakanSelect.options[tindakanSelect.selectedIndex].text;
        const tindakanCode = tindakanSelect.value;
        const tarifTindakan = parseNumber(document.getElementById('tarif_tindakan').value);
        const qty = parseNumber(document.getElementById('qty').value);
        const discount = parseNumber(document.getElementById('discount').value);
        const totalTarif = parseNumber(document.getElementById('total_tarif').value);

        // Pastikan input tidak kosong
        if (!tindakanCode || isNaN(tarifTindakan) || isNaN(qty) || isNaN(totalTarif)) {
            alert('Mohon lengkapi semua input.');
            return;
        }

        // Buat elemen tr (baris baru)
        const newRow = `
            <tr class="newRowTindakan">
                <td style="display:none;">
                    <input type="text" name="new_tindakan_code[]" value="${tindakanCode}">
                </td>
                <td>
                    <input type="text" style="border:none;" class="form-control text-center" name="new_tindakan_name[]" value="${tindakanName}" readonly>
                </td>
                <td><input type="text" style="border:none;" class="form-control text-center" name="new_tarif_tindakan[]" value="Rp ${tarifTindakan.toLocaleString('id-ID')}" readonly></td>
                <td><input type="text" style="border:none;" class="form-control text-center" name="new_qty[]" value="${qty}" readonly></td>
                <td><input type="text" style="border:none;" class="form-control text-center" name="new_discount[]" value="Rp ${discount.toLocaleString('id-ID')}" readonly></td>
                <td><input type="text" style="border:none;" class="form-control text-center" name="new_total_tarif_table[]" value="Rp ${totalTarif.toLocaleString('id-ID')}" readonly></td>
                <td>
                    <span class="text-secondary text-xs font-weight-bolder d-flex justify-content-center align-center mt-3">
                        <button type="button" class="btn btn-warning btn-md me-2 editNewRowBtn"><i class="fa-solid fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-md deleteNewRowBtn"><i class="fa-solid fa-trash"></i></button>
                    </span>
                </td>  
            </tr>
        `;

        // Tambahkan baris baru ke tbody
        document.querySelector('#tindakanTable tbody').insertAdjacentHTML('beforeend', newRow);

        // Reset input fields setelah baris baru ditambahkan
        tindakanSelect.value = ''; 
        document.getElementById('tarif_tindakan').value = ''; 
        document.getElementById('qty').value = ''; 
        document.getElementById('discount').value = ''; 
        document.getElementById('total_tarif').value = '';

        // Hitung ulang total tarif setelah baris baru ditambahkan
        calculateNewTotalTarif();

        // Tambahkan event listener untuk semua tombol deleteRowBtn
        attachDeleteListeners();
    });
    document.getElementById('tindakanTable').addEventListener('click', function(event) {
        // Tombol delete
        if (event.target.classList.contains('deleteRowBtn') || event.target.closest('.deleteRowBtn')) {
            const button = event.target.closest('.deleteRowBtn');
            button.closest('tr.rowTindakan').remove();
            calculateNewTotalTarif();
        }
        if (event.target.classList.contains('deleteNewRowBtn') || event.target.closest('.deleteNewRowBtn')) {
            const button = event.target.closest('.deleteNewRowBtn');
            button.closest('tr.newRowTindakan').remove();
            calculateNewTotalTarif();
        }

        // Tombol edit
        if (event.target.classList.contains('editNewRowBtn') || event.target.closest('.editNewRowBtn')) {
            const button = event.target.closest('.editNewRowBtn');
            const row = button.closest('tr.newRowTindakan');
            editRow(row);  // Fungsi editRow bisa Anda buat untuk memproses data yang akan diedit
        }
        if (event.target.classList.contains('editRowBtn') || event.target.closest('.editRowBtn')) {
            const button = event.target.closest('.editRowBtn');
            const row = button.closest('tr.rowTindakan  ');
            editRow(row);  // Fungsi editRow bisa Anda buat untuk memproses data yang akan diedit
        }
    });
    // Fungsi untuk memasang event listener pada semua tombol delete
    function editRow(row) {
        if (event.target.classList.contains('editNewRowBtn') || event.target.closest('.editNewRowBtn')) {
            const tindakanName = row.querySelector('input[name="new_tindakan_code[]"]').value;
            const tarifTindakan = row.querySelector('input[name="new_tarif_tindakan[]"]').value;
            const qty = row.querySelector('input[name="new_qty[]"]').value;
            const discount = row.querySelector('input[name="new_discount[]"]').value;
            const tarif = row.querySelector('input[name="new_total_tarif_table[]"]').value;
    
            // Misalnya: Isi kembali form input dengan nilai yang diedit
            document.getElementById('tindakan_select').value = tindakanName;
            document.getElementById('tarif_tindakan').value = tarifTindakan;
            document.getElementById('qty').value = qty;
            document.getElementById('discount').value = discount;
            document.getElementById('total_tarif').value = tarif;
        }
        if(event.target.classList.contains('editRowBtn') || event.target.closest('.editRowBtn')){
            const tindakanName = row.querySelector('input[name="tindakan_code[]"]').value;
            const tarifTindakan = row.querySelector('input[name="tarif_tindakan[]"]').value;
            const qty = row.querySelector('input[name="qty[]"]').value;
            const discount = row.querySelector('input[name="discount[]"]').value;
            const tarif = row.querySelector('input[name="total_tarif_table[]"]').value;
    
            // Misalnya: Isi kembali form input dengan nilai yang diedit
            document.getElementById('tindakan_select').value = tindakanName;
            document.getElementById('tarif_tindakan').value = tarifTindakan;
            document.getElementById('qty').value = qty;
            document.getElementById('discount').value = discount;
            document.getElementById('total_tarif').value = tarif;
        }

        row.parentNode.removeChild(row);
        // Anda juga bisa menambahkan logika lain seperti mode pengeditan
    }
    // Fungsi untuk menghitung total tarif dan total diskon
    function calculateNewTotalTarif() {
        let totalTarif = 0;
        let totalDiscount = 0;

        // Ambil semua elemen total_tarif_table[] dan tambahkan ke totalTarif
        const totalTarifFields = document.querySelectorAll('input[name="total_tarif_table[]"]');
        totalTarifFields.forEach(function(field) {
            let value = parseNumber(field.value);
            if (!isNaN(value)) {
                totalTarif += value;
            }
        });

        // Ambil semua elemen new_total_tarif_table[] dan tambahkan ke totalTarif
        const newTotalTarifFields = document.querySelectorAll('input[name="new_total_tarif_table[]"]');
        newTotalTarifFields.forEach(function(field) {
            let value = parseNumber(field.value);
            if (!isNaN(value)) {
                totalTarif += value;
            }
        });

        // Ambil semua elemen discount[] dan tambahkan ke totalDiscount
        const discountFields = document.querySelectorAll('input[name="discount[]"]');
        discountFields.forEach(function(field) {
            let value = parseNumber(field.value);
            if (!isNaN(value)) {
                totalDiscount += value;
            }
        });

        // Ambil semua elemen new_discount[] dan tambahkan ke totalDiscount
        const newDiscountFields = document.querySelectorAll('input[name="new_discount[]"]');
        newDiscountFields.forEach(function(field) {
            let value = parseNumber(field.value);
            if (!isNaN(value)) {
                totalDiscount += value;
            }
        });

        // Update nilai new_all_tarif dan new_all_discount
        document.getElementById('new_all_tarif').value = 'Rp ' + totalTarif.toLocaleString('id-ID');
        document.getElementById('new_all_discount').value = 'Rp ' + totalDiscount.toLocaleString('id-ID');

        // Hitung final tarif (total tarif dikurangi total diskon)
        const finalTarif = totalTarif;
        document.getElementById('new_final_tarif').value = 'Rp ' + finalTarif.toLocaleString('id-ID');

        // Simpan hasil akhir di result_final_tarif
        document.getElementById('result_final_tarif').value = finalTarif;
    }

    // Helper function untuk parsing nilai string ke angka
    function parseNumber(value) {
        return parseInt(value.replace(/[^0-9]/g, ''), 10) || 0;
    }

    // Panggil fungsi ini setiap kali ada perubahan pada tabel
    calculateNewTotalTarif();



</script>
@endsection