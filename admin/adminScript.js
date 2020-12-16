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
    $('#createNow').click(function(e){
        e.preventDefault();
        error_pname=false;
        check_pname();
        check_urlname();
        if(error_pname == true &&  error_uname == true){
            alert("Please fill the form correctly");
            return false;
           
        }
        else {
            alert("successfull");
            var productCategory = $('#productCategory').val();
            var productName = $('#productName').val();
            var pageUrl = $('#pageUrl').val();
            var monthlyPrice = $('#monthlyPrice').val();
            var annualPrice = $('#annualPrice').val();
            var sku = $('#sku').val();
            var webSpace = $('#webSpace').val();
            var freeDomain = $('#freeDomain').val();
            var bandwidth = $('#bandwidth').val();
            var LTSupport = $('#LTSupport').val();
            var mailbox = $('#mailbox').val();
            // console.log( productCategory , productName , pageUrl , monthlyPrice , annualPrice , sku , webSpace , freeDomain , bandwidth , LTSupport , mailbox);
            $.ajax({
                url : 'adminRequest.php',
                type: 'POST',
                data : {
                    productCategory:productCategory,
                    productName : productName,
                    pageUrl :  pageUrl,
                    monthlyPrice:monthlyPrice,
                    annualPrice : annualPrice,
                    sku:sku,
                    webSpace : webSpace,
                    freeDomain : freeDomain,
                    bandwidth : bandwidth,
                    LTSupport : LTSupport,
                    mailbox : mailbox,
                    action : 'addProductDetails'
                },
                success : function (msg)
                {
                    alert(msg);
                    window.location.reload();
                },
                error : function ()
                {
                    alert('error');
                }
            });
        }
    });
});