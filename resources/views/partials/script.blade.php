<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script>
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