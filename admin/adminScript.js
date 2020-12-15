$(document).ready(function() {
    $('#tableData').DataTable( {
        "ajax": 'adminRequest.php?fetchCategory=1'
    } );

    $("#error_msg").hide();
    $("#urlerror_msg").hide();

    var error_pname=false;
    var error_uname=false;

    $("#productName").focusout(function(){
        check_pname();
    });

    $("#pageUrl").focusout(function(){
        check_urlname();
    });
    
    function check_pname(){
        var pattern= /^[a-zA-Z]*$/;
        var pname =$("#productName").val();
        if(pattern.test(pname) && pname !== '') {
            $("#error_msg").hide();
            $("#productName").css("border-bottom","2px solid green");
         
        }
        else{
            $("#error_msg").html("should contain only characters");
            $("#error_msg").show();
            $("#productName").css("border-bottom","2px solid red");
            error_pname=true;
            
        }
    }
    function check_urlname(){
        var pattern= /^[a-zA-Z]*$/;
        var pageUrl =$("#pageUrl").val();
        if(pattern.test(pageUrl) && pageUrl !== '') {
            $("#urlerror_msg").hide();
            $("#pageUrl").css("border-bottom","2px solid green");
         
        }
        else{
            $("#urlerror_msg").html("should contain only characters");
            $("#urlerror_msg").show();
            $("#pageUrl").css("border-bottom","2px solid red");
            error_uname=true;
            
        }
    }
    $('#createNow').click(function(){
        error_pname=false;
        check_pname();
        check_urlname();
        if(error_pname == false &&  error_uname == false){
            alert("successfull");
            return true;
        }
        else{
            alert("Please fill the form correctly");
            return false;
        }
    });
});