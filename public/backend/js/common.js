$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
function deleteTourRecord(data) {
    // Show SweetAlert confirmation dialog
    var id = data.getAttribute('data-id');
    var url = data.getAttribute('data-url');
    Swal.fire({
        title: 'Are you sure?',
        text: 'This action cannot be undone.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // User confirmed, send Ajax request to delete item
            $.ajax({
                url: url,
                type: 'POST',
                data: { 'id': id },
                success: function (response) {
                    // Handle success response from server
                    toastr.success('Deleted!');
                    $('.tour_datatable').DataTable().ajax.reload();
                },
                error: function (xhr, status, error) {
                    // Handle error response from server
                    Swal.fire(
                        'Error!',
                        'Failed to delete the item.',
                        'error'
                    );
                }
            });
        }
    });
}





