   

   <script type="text/javascript">
       $(function() {
           // User Datatable
           var userdatatable = $('.user_datatable').DataTable({
               processing: true,
               serverSide: true,
               ajax: "<?php echo e(route('admin.users.index')); ?>",
               columns: [{
                       data: 'id',
                       name: 'id',
                       orderable: false,
                   },
                   {
                       data: 'name',
                       name: 'name',
                       orderable: false,
                   },
                   {
                       data: 'email',
                       name: 'email',
                       orderable: false,
                   },
                   {
                       data: 'action',
                       name: 'action',
                       orderable: false,
                       searchable: false
                   },
               ],
               "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                   $("td:first", nRow).html(iDisplayIndex + 1);
                   return nRow;
               },
           });

           // Destinations Datatable
           var destinationdatatable = $('.destination_datatable').DataTable({
               processing: true,
               serverSide: true,
               ajax: "<?php echo e(route('admin.destinations.index')); ?>",
               columns: [{
                       data: 'id',
                       name: 'id',
                       width: '50px',
                       orderable: false,
                   },
                   {
                       data: 'name',
                       name: 'name',
                       orderable: false,
                       width: '150px'
                   },
                   {
                       data: 'description',
                       name: 'description',
                       orderable: false,
                       render: function(data, type, row) {
                           // Limit the description to 100 characters and add ellipsis
                           return data.length > 40 ?
                               data.substr(0, 40) + '...' :
                               data;
                       }
                   },
                   {
                       data: 'created_at',
                       name: 'created_at',
                       orderable: false,
                   },
                   {
                       data: 'action',
                       name: 'action',
                       orderable: false,
                       searchable: false
                   },
               ],
               "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                   $("td:first", nRow).html(iDisplayIndex + 1);
                   return nRow;
               },
           });


           // Tours Datatable
           var tourdatatable = $('.tour_datatable').DataTable({
               processing: true,
               serverSide: true,
               ajax: "<?php echo e(route('admin.tours.index')); ?>",
               columns: [{
                       data: 'id',
                       name: 'id',
                       width: '50px',
                       orderable: false,
                   },
                   {
                       data: 'name',
                       name: 'name',
                       orderable: false,
                       width: '150px'
                   },
                   {
                       data: 'price',
                       name: 'price',
                       orderable: false,
                   },

                   {
                       data: 'tour_type',
                       name: 'tour_type',
                       orderable: false,
                   },
                   {
                       data: 'duration',
                       name: 'duration',
                       orderable: false,
                   },
                   {
                       data: 'created_at',
                       name: 'created_at',
                       orderable: false,
                   },
                   {
                       data: 'action',
                       name: 'action',
                       orderable: false,
                       searchable: false
                   },
               ],
               "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                   $("td:first", nRow).html(iDisplayIndex + 1);
                   return nRow;
               },
           });
           //    Custom Tour
           var tourcustom_datatable = $('.tourcustom_datatable').DataTable({
               processing: true,
               serverSide: true,
               ajax: "<?php echo e(route('admin.customtours.index')); ?>",
               columns: [{
                       data: 'id',
                       name: 'id',
                       width: '50px',
                       orderable: false,
                   },
                   {
                       data: 'name',
                       name: 'name',
                       orderable: false,
                       width: '150px'
                   },
                   {
                       data: 'email',
                       name: 'email',
                       orderable: false,
                   },
                   {
                       data: 'phone',
                       name: 'phone',
                       orderable: false,
                   },
                   {
                       data: 'country',
                       name: 'country',
                       orderable: false,
                   },
                   {
                       data: 'duration',
                       name: 'duration',
                       orderable: false,
                   },
                   {
                       data: 'travellers',
                       name: 'travellers',
                       orderable: false,
                   },

                   {
                       data: 'arrival_date',
                       name: 'arrival_date',
                       orderable: false,
                   },
                   {
                       data: 'departure_date',
                       name: 'departure_date',
                       orderable: false,
                   },
                   {
                       data: 'action',
                       name: 'action',
                       orderable: false,
                       searchable: false
                   },
               ],
               "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                   $("td:first", nRow).html(iDisplayIndex + 1);
                   return nRow;
               },
           });

           // Contacts Request Datatable
           var userdatatable = $('.contact_request_datatable').DataTable({
               processing: true,
               serverSide: true,
               ajax: "<?php echo e(route('admin.contacts.index')); ?>",
               columns: [{
                       data: 'id',
                       name: 'id',
                       orderable: false,
                   },
                   {
                       data: 'name',
                       name: 'name',
                       orderable: false,
                   },
                   {
                       data: 'email',
                       name: 'email',
                       orderable: false,
                   },
                   {
                       data: 'subject',
                       name: 'subject',
                       orderable: false,
                   },
                   {
                       data: 'seen_status',
                       name: 'seen_status',
                       orderable: false,
                   },
                   {
                       data: 'action',
                       name: 'action',
                       orderable: false,
                       searchable: false
                   },
               ],
               "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                   $("td:first", nRow).html(iDisplayIndex + 1);
                   return nRow;
               },
           });

            // Hotal Datatable
            var hotaldatatable = $('.hotal_datatable').DataTable({
               processing: true,
               serverSide: true,
               ajax: "<?php echo e(route('admin.onedaytour.index')); ?>",
               columns: [{
                       data: 'id',
                       name: 'id',
                       orderable: false,
                   },
                   {
                       data: 'hotal_name',
                       name: 'hotal_name',
                       orderable: false,
                   },
                   {
                       data: 'phone_number',
                       name: 'phone_number',
                       orderable: false,
                   },
                   {
                       data: 'locations_name',
                       name: 'locations_name',
                       orderable: false,
                   },
                   {
                       data: 'address',
                       name: 'address',
                       orderable: false,
                   },
                   {
                       data: 'price',
                       name: 'price',
                       orderable: false,
                   },
                   {
                       data: 'available_rooms',
                       name: 'available_rooms',
                       orderable: false,
                   },
                   {
                       data: 'action',
                       name: 'action',
                       orderable: false,
                       searchable: false
                   },
               ],
               "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                   $("td:first", nRow).html(iDisplayIndex + 1);
                   return nRow;
               },
           });

              // Hotal Datatable
            var hotaldatatable = $('.multidaytour_datatable').DataTable({
               processing: true,
               serverSide: true,
               ajax: "<?php echo e(route('admin.multidaytour.index')); ?>",
               columns: [{
                       data: 'id',
                       name: 'id',
                       orderable: false,
                   },
                   {
                       data: 'hotal_name',
                       name: 'hotal_name',
                       orderable: false,
                   },
                   {
                       data: 'phone_number',
                       name: 'phone_number',
                       orderable: false,
                   },
                   {
                       data: 'locations_name',
                       name: 'locations_name',
                       orderable: false,
                   },
                   {
                       data: 'address',
                       name: 'address',
                       orderable: false,
                   },
                   {
                       data: 'price',
                       name: 'price',
                       orderable: false,
                   },
                   {
                       data: 'available_rooms',
                       name: 'available_rooms',
                       orderable: false,
                   },
                   {
                       data: 'action',
                       name: 'action',
                       orderable: false,
                       searchable: false
                   },
               ],
               "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                   $("td:first", nRow).html(iDisplayIndex + 1);
                   return nRow;
               },
           });


            // Vehicle Tour Datatable
            var hotaldatatable = $('.vehicle_tour_datatable').DataTable({
               processing: true,
               serverSide: true,
               ajax: "<?php echo e(route('admin.vehicle-tour.index')); ?>",
               columns: [{
                       data: 'id',
                       name: 'id',
                       orderable: false,
                   },
                   {
                       data: 'first_name',
                       name: 'first_name',
                       orderable: false,
                   },
                   {
                       data: 'phone',
                       name: 'phone',
                       orderable: false,
                   },
                   {
                       data: 'email',
                       name: 'email',
                       orderable: false,
                   },
                   {
                       data: 'booking_reference',
                       name: 'booking_reference',
                       orderable: false,
                   },
                   {
                       data: 'service_type',
                       name: 'service_type',
                       orderable: false,
                   },
                   {
                       data: 'type',
                       name: 'type',
                       orderable: false,
                   },
                   {
                       data: 'action',
                       name: 'action',
                       orderable: false,
                       searchable: false
                   },
               ],
               "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                   $("td:first", nRow).html(iDisplayIndex + 1);
                   return nRow;
               },
           });

             // Vehicle Datatable
            var hotaldatatable = $('.vehicle_datatable').DataTable({
               processing: true,
               serverSide: true,
               ajax: "<?php echo e(route('admin.vehicles.index')); ?>",
               columns: [{
                       data: 'id',
                       name: 'id',
                       orderable: false,
                   },
                   {
                       data: 'name',
                       name: 'name',
                       orderable: false,
                   },
                   {
                       data: 'type',
                       name: 'type',
                       orderable: false,
                   },
                   {
                       data: 'model',
                       name: 'model',
                       orderable: false,
                   },
                   {
                       data: 'price',
                       name: 'price',
                       orderable: false,
                   },
                   {
                       data: 'action',
                       name: 'action',
                       orderable: false,
                       searchable: false
                   },
               ],
               "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                   $("td:first", nRow).html(iDisplayIndex + 1);
                   return nRow;
               },
           });

       });
   </script>
<?php /**PATH /var/www/html/tour/resources/views/admin/datatable/datatable-script.blade.php ENDPATH**/ ?>