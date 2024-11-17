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