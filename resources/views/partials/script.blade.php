<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
<script src="https:////cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css"></script> --}}
<script>
    $(document).ready(function () {
        $('#myTables').DataTable();
    });

    document.querySelectorAll('.button-delete').forEach(function(button) {
        button.addEventListener('click', function() {
            let formId = button.getAttribute('data-id');
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you really want to delete this record?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form dengan ID dinamis yang sesuai
                    document.getElementById(`delete-form-${formId}`).submit();
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        const forms = {
            'btn-spesifikasi': '#form-spesifikasi-dasar',
            'btn-setting-harga': '#form-setting-harga',
            'btn-satuan': '#form-satuan',
            'btn-stock': '#form-stock',
            'btn-spek': '#form-spek',
            'btn-distributor': '#form-distributor',
            'btn-satu-sehat': '#form-satu-sehat',
            'btn-bpjs': '#form-bpjs',
        };

        $.each(forms, function(buttonId, formId) {
            $(`#${buttonId}`).on('click', function() {
                $.each(forms, function(_, hideFormId) {
                    $(hideFormId).css('display', 'none');
                });
                $(formId).css('display', 'flex');
            });
        });
    });
</script> 
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const satuanUmur = document.getElementById("satuan_umur");
        const batasBawah = document.getElementById("batas_bawah");
        const batasBawahHari = document.getElementById("batas_bawah_hari");
        const batasAtas = document.getElementById("batas_atas");
        const batasAtasHari = document.getElementById("batas_atas_hari");

        // Mapping satuan umur ke jumlah hari
        const satuanKeHari = {
            "JAM": 0.0417,
            "HARI": 1,
            "MINGGU": 7,
            "BULAN": 30,
            "TAHUN": 365
        };

        // Fungsi untuk menghitung hari
        function hitungHari(input, output) {
            const satuan = satuanKeHari[satuanUmur.value] || 1; // Default ke 1 hari jika tidak ada value
            const nilai = parseInt(input.value) || 0;
            output.value = nilai * satuan;
        }

        // Tambahkan event listener
        satuanUmur.addEventListener("change", function () {
            hitungHari(batasBawah, batasBawahHari);
            hitungHari(batasAtas, batasAtasHari);
        });

        batasBawah.addEventListener("input", function () {
            hitungHari(batasBawah, batasBawahHari);
        });

        batasAtas.addEventListener("input", function () {
            hitungHari(batasAtas, batasAtasHari);
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.btn-regist').on('click', function(){
            $('input[name="is_regist"]').val(1);
            $('#form-create-pasien').submit();
        })
    });
</script>

{{-- KUOTA RESERVASI START --}}
<script>
    $(document).ready(function() {
    function loadDataTable(layanan = '', dokter = '') {
        $('#table-kuota-reservasi').DataTable().destroy();

        $('#table-kuota-reservasi').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ route('getData.kuotaReservasi') }}",
                "type": "GET",
                "data": function(d) {
                    d.layanan = layanan;
                    d.dokter = dokter;
                }
            },
            "columns": [
                { "data": "nama_layanan" },
                { "data": "nama_lengkap" },
                { "data": "day" },
                { "data": "praktek" },
                { "data": "type" },
                { "data": "max_reservasi" },
                { "data": null, "render": function(data, type, row) {
                    return `
                        <div class="d-flex justify-content-center align-center">
                            <form class="delete-form" method="post">
                                <button type="button" class="btn btn-primary btn-edit mb-0" data-bs-toggle="modal" data-bs-target="#editModal" data-id="${data.id}">
                                    <i class="fa fa-edit"></i>
                                </button>
                                @csrf
                                @method('delete')
                                <button type="button" class="btn btn-danger button-delete" data-id="${data.id}" style="margin-top:10px;margin-bottom:10px;margin-right:10px;">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    `;
                }}
            ]
        });

        
    }
    $(document).on("click", ".button-delete", function() {
        let id = $(this).data("id"); // Ambil ID dari tombol
        let form = $(this).closest(".delete-form"); // Ambil form terdekat

        form.attr("action", "{{ route('delete-kuota-reservasi', ['id' => '__ID__']) }}".replace('__ID__', id));
        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Data akan dihapus secara permanen!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // Kirim form jika dikonfirmasi
            }
        });
    });

    $(document).on('click', '.btn-edit', function() {
        let id = $(this).data('id');
        $.ajax({
            url: "{{ route('getData.kuotaReservasi') }}",
            type: "GET",
            data: { id: id },
            success: function(data) {
                $('#editModal').modal('show');
                
                console.log(data); // Debugging: Log the response to check its structure
                if (data) {
                    $('input[name="id"]').val(parseInt(data.id) || '');
                    $('input[name="max_reservasi"]').val(parseInt(data.max_reservasi) || '');
                    $('select[name="layanan"]').find(`option[value="${data.layanan}"]`).prop('selected', true);
                    $('select[name="dokter"]').find(`option[value="${data.dokter}"]`).prop('selected', true);
                    $('select[name="day"]').find(`option[value="${data.day}"]`).prop('selected', true);
                    $('select[name="praktek"]').find(`option[value="${data.praktek}"]`).prop('selected', true);
                    $('select[name="type"]').find(`option[value="${data.type}"]`).prop('selected', true);
                } else {
                    console.error('Response data is missing or invalid');
                }
            }
        });
    });

    loadDataTable();

    $('.btn-search').on('click', function() {
        let layanan = $('#layanan_id').val();
        let dokter = $('#dokter_id').val();
        loadDataTable(layanan, dokter);
    });
    $('.btn-clear').on('click', function() {
        loadDataTable();
    });
    $('.option-layanan').on('change', function(){
        var id = $(this).val();
        $.ajax({
            url: "{{ route('getDataDoctor') }}",
            type: "GET",
            data: { layanan_id: $(this).val() },
            success: function(response) {
                $('.option-dokter').empty(); // Clear existing options
                $('.option-dokter').append('<option value="">-- Please Select--</option>'); // Add default option
                $.each(response, function(index, dokter) {
                    $('.option-dokter').append(
                        `<option value="${dokter.id}">${dokter.nama_lengkap}</option>`
                    );
                });
            },
        });
    });
    $('.select2').select2();
    $('.option-patient').on('change', function(){
        var id = $(this).val();
        $.ajax({
            url: "{{ route('getDataPatient') }}",
            type: "GET",
            data: { id: $(this).val() },
            success: function(response) {
                $('input[name="address"]').val(response[0].address)
                $('input[name="dob"]').val(response[0].birth_date)
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Sorry,',
                    text:  'Data Not Found',
                    timer: 5000,
                    showConfirmButton: false
                });
            }
        });
    })
    
   
});
</script>