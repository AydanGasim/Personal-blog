$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [
            { extend: 'copy', text: 'Copy',className: 'btn btn-primary btn-sm mt-2 m-1' },
            { extend: 'excel',className: 'btn btn-primary btn-sm mt-2  m-1' },
            { extend: 'pdf',className: 'btn btn-primary btn-sm mt-2  m-1' },
            { extend: 'colvis', text: 'Column view',className: 'btn btn-primary btn-sm mt-2  m-1' },
        ]
    } );

    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
