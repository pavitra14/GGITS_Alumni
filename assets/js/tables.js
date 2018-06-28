$(document).ready(function() {
    var date = new Date();
    // Setup - add a text input to each footer cell
    $('#filterAlumni tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );

    // DataTable
    var table = $('#filterAlumni').DataTable({
        // responsive: true
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf'
        ],
        "columnDefs": [
            { "width": "20%", "targets": 0 }
        ]
    });
    yadcf.init(table, [
        {column_number: 2},
        {column_number: 3, filter_type: "range_number"},
        {column_number: 4, filter_type: "range_number"},
        {column_number: 5},
        {column_number: 6},
        {column_number: 7},
        {column_number: 8},
        {column_number: 9},
    ]);

    // Apply the search
    table.columns().every( function () {
        var that = this;

        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );