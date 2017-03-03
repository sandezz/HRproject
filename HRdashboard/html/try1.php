<?php
session_start();
	if(!isset($_SESSION['a'])) {
	header("location:../../index.php");
	}
?>
<?php
    // Ascending Order
    if(isset($_POST['ASC']))
    {
    $asc_query = "SELECT * FROM info ORDER BY full_name ASC where status = 'active'";
    $result = executeQuery($asc_query); 
    }
    // Default Order
    else {
$default_query = "SELECT * FROM info where status = 'active'";
$result = executeQuery($default_query);
}
    function executeQuery($query)
    {
        include("connection.php");
        $connect = mysqli_connect("$host", "$username", "$password", "employee");
        $result = mysqli_query($connect, $query);
        return $result;
    }
?>
<html>
    <head>
        <title>
            Try1
        </title>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
       
        <style>
            td.details-control {
                background: url('details_open.png') no-repeat center center;
                cursor: pointer;
            }
            tr.shown td.details-control {
                background: url('details_close.png') no-repeat center center;
            }
        </style>
        
        <script>
            /* Formatting function for row details - modify as you need */
            function format ( d ) {
                // `d` is the original data object for the row
                return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                    '<tr>'+
                    '<td>Full name:</td>'+
                    '<td>'+d.name+'</td>'+
                    '</tr>'+
                    '<tr>'+
                    '<td>Extension number:</td>'+
                    '<td>'+d.extn+'</td>'+
                    '</tr>'+
                    '<tr>'+
                    '<td>Extra info:</td>'+
                    '<td>And any further details here (images etc)...</td>'+
                    '</tr>'+
                    '</table>';
            }
 
            $(document).ready(function() {
                var table = $('#example').DataTable( {
                    "ajax": "objects.txt",
                    "columns": [
                        {
                            "className":      'details-control',
                            "orderable":      false,
                            "data":           null,
                            "defaultContent": ''
                        },
                        { "data": "name" },
                        { "data": "position" },
                        { "data": "office" },
                        { "data": "salary" }
                    ],
                    "order": [[1, 'asc']]
                } );
     
    // Add event listener for opening and closing details
    $('#example tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
} );
        </script>
       
    </head>
    <body>
        <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>
    </body>
</html>