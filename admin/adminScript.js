$(document).ready(function() {
    $('#tableData').DataTable( {
        "ajax": 'adminRequest.php?fetchCategory=1'
    } );
    
    $('#productTableData').DataTable( {
        "ajax": 'adminRequest.php?showProductTable=1'
    } );

    $("#error_msg").hide();
    $("#urlerror_msg").hide();
    $("#price_error_msg").hide();
    $("#annualPrice_error_msg").hide();
    $("#sku_error_msg").hide();
    $("#bandwidth_error_msg").hide();
    $("#webspace_error_msg").hide();
    $("#freedomain_error_msg").hide();
    $("#ltsupport_error_msg").hide();
    $("#mailbox_error_msg").hide();

    var error_pname=false;
    var error_uname=false;
    var error_price=false;
    var error_annualprice=false;
    var error_sku=false;
    var error_bandwidth=false;
    var error_webspace=false;
    var error_freedomain=false;
    var error_ltsupport=false;
    var error_mailbox=false;        
    
    
    $("#productName").focusout(function(){
        check_pname();
    });

    $("#pageUrl").focusout(function(){
        check_urlname();
    });

    $("#monthlyPrice").focusout(function(){
        check_monthlyPrice();
    });
    
    $("#annualPrice").focusout(function(){
        check_annualPrice();
    });
    
    $("#sku").focusout(function(){
            check_sku();
        });
    $("#webSpace").focusout(function(){
            check_webSpace();
        });
    $("#bandwidth").focusout(function(){
            check_bandwidth();
        });
    $("#freeDomain").focusout(function(){
            check_freeDomain();
        });
    $("#LTSupport").focusout(function(){
            check_ltsupport();
        });
    $("#mailbox").focusout(function(){
            check_mailbox();
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

    function check_monthlyPrice(){
        var pattern= /^[a-zA-Z]*$/;
        var monthlyPrice =$("#monthlyprice").val();
        if(pattern.test(monthlyPrice) && monthlyPrice !== '') {
            $("#price_error_msg").hide();
            $("#monthlyPrice").css("border-bottom","2px solid green");
         
        }
        else{
            $("#price_error_msg").html("should contain only characters");
            $("#price_error_msg").show();
            $("#monthlyPrice").css("border-bottom","2px solid red");
            error_price=true;
            
        }
    }
    function check_annualPrice(){
        var pattern= /^[a-zA-Z]*$/;
        var annualPrice =$("#annualPrice").val();
        if(pattern.test(annualPrice) && annualPrice !== '') {
            $("#annualPrice_error_msg").hide();
            $("#annualPrice").css("border-bottom","2px solid green");
         
        }
        else{
            $("#annualPrice_error_msg").html("should contain only characters");
            $("#annualPrice_error_msg").show();
            $("#annualPrice").css("border-bottom","2px solid red");
            error_annualprice=true;
            
        }
    }

    function check_sku(){
        var pattern= /^[a-zA-Z]*$/;
        var sku =$("#sku").val();
        if(pattern.test(sku) && sku !== '') {
            $("#sku_error_msg").hide();
            $("#sku").css("border-bottom","2px solid green");
         
        }
        else{
            $("#sku_error_msg").html("should contain only characters");
            $("#sku_error_msg").show();
            $("#sku").css("border-bottom","2px solid red");
            error_sku=true;
            
        }
    }

    function check_webSpace(){
        var pattern= /^[a-zA-Z]*$/;
        var webSpace =$("#webSpace").val();
        if(pattern.test(webSpace) && webSpace !== '') {
            $("#webspace_error_msg").hide();
            $("#webSpace").css("border-bottom","2px solid green");
         
        }
        else{
            $("#webspace_error_msg").html("should contain only characters");
            $("#webspace_error_msg").show();
            $("#webSpace").css("border-bottom","2px solid red");
            error_webspace=true;           
        }
    }
   
    function check_bandwidth(){
        var pattern= /^[a-zA-Z]*$/;
        var bandwidth =$("#bandwidth").val();
        if(pattern.test(bandwidth) && bandwidth !== '') {
            $("#bandwidth_error_msg").hide();
            $("#bandwidth").css("border-bottom","2px solid green");
         
        }
        else{
            $("#bandwidth_error_msg").html("should contain only characters");
            $("#bandwidth_error_msg").show();
            $("#bandwidth").css("border-bottom","2px solid red");
            error_bandwidth=true;           
        }
    }
 
    function check_freeDomain(){
        var pattern= /^[a-zA-Z]*$/;
        var freeDomain =$("#freeDomain").val();
        if(pattern.test(freeDomain) && freeDomain !== '') {
            $("#freedomain_error_msg").hide();
            $("#freedomain").css("border-bottom","2px solid green");
         
        }
        else{
            $("#freedomain_error_msg").html("should contain only characters");
            $("#freedomain_error_msg").show();
            $("#freedomain").css("border-bottom","2px solid red");
            error_freedomain=true;           
        }
    }

    function check_mailbox(){
        var pattern= /^[a-zA-Z]*$/;
        var mailbox =$("#mailbox").val();
        if(pattern.test(mailbox) && mailbox !== '') {
            $("#mailbox_error_msg").hide();
            $("#mailbox").css("border-bottom","2px solid green");
         
        }
        else{
            $("#mailbox_error_msg").html("should contain only characters");
            $("#mailbox_error_msg").show();
            $("#mailbox").css("border-bottom","2px solid red");
            error_mailbox=true;           
        }
    }
    function check_ltsupport(){
        var pattern= /^[a-zA-Z]*$/;
        var ltsupport =$("#LTSupport").val();
        if(pattern.test(ltsupport) && ltsupport !== '') {
            $("#ltsupport_error_msg").hide();
            $("#LTSupport").css("border-bottom","2px solid green");
         
        }
        else{
            $("#ltsupport_error_msg").html("should contain only characters");
            $("#ltsupport_error_msg").show();
            $("#ltsupport").css("border-bottom","2px solid red");
            error_ltsupport=true;           
        }
    }
    $('#createNow').click(function(e){
        e.preventDefault();
        error_pname=false;
        error_uname=false;
        error_price=false;
        error_sku=false;
        error_freedomain=false;
        error_ltsupport=false;

        check_pname();
        check_urlname();
        check_monthlyPrice();
        check_annualPrice();
        check_sku();
        check_webSpace();
        check_bandwidth();
        check_freeDomain();
        check_ltsupport();

        if(error_pname == true &&  error_uname == true &&  error_price == true  &&  error_sku == true  && error_webspace == true && error_freedomain == true  && error_mailbox == true ){
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