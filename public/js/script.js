
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