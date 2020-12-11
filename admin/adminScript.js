$(document).ready(function() {
    $('#tableData').DataTable( {
        "ajax": 'adminRequest.php?fetchCategory=1'
    } );
});