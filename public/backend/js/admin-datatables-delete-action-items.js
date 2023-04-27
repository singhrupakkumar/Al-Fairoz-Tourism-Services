function callDeleteAjaxFunction(id,url,reloadId,message) {
  var csrf_token = $('meta[name="csrf-token"]').attr('content');
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
        $.ajax({
          "url": url,
          "type": "POST",
          "data": {
            id: id,
            _token: csrf_token
          },
            success: function(result) {
                toastr.success(message);
                if(reloadId != ''){
                    $(reloadId).DataTable().ajax.reload(null, false); 
                }else{
                    location.reload();
                }
            }, 
            error: function (xhr, status, error) {
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

function deleteHotalItems(e) {
    var id = e.getAttribute('data-id');
    var url = e.getAttribute('data-url');
    var reloadId = ".hotal_datatable";
    var message = "Hotal deleted successfully.";
    callDeleteAjaxFunction(id,url,reloadId,message);
}
function deleteVehicleItems(e) {
    var id = e.getAttribute('data-id');
    var url = e.getAttribute('data-url');
    var reloadId = ".vehicle_datatable";
    var message = "Vehicle deleted successfully.";
    callDeleteAjaxFunction(id,url,reloadId,message);
}
function deleteDestinationItems(e) {
    var id = e.getAttribute('data-id');
    var url = e.getAttribute('data-url');
    var reloadId = ".destination_datatable";
    var message = "Destination deleted successfully.";
    callDeleteAjaxFunction(id,url,reloadId,message);
}


$("#trip_date").flatpickr({
    format: 'MM/DD/YYYY',
});
$("#trip_time").flatpickr({
    enableTime: true,
    noCalendar: true,
    format: 'h:mm a',
});



