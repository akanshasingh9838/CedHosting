var prodid=0;
$(document).ready(function() {
    // console.log('hii');
    $('#security').hide();
    $('#squestion').change(function(){
        $('#security').show();
        // $('#form_email').show();
    });

    $('#signup').click(function(){
        var letter = /^([a-zA-Z]+\s?)*$/;
        var pattern = /^(0|[+91]{3})?[7-9][0-9]{9}$/;
        // var regidentical=/(\d)\1{9}/g;
        // var pattemail = /^\w+@[a-zA-Z_]+?\.[a-zA-Z0-9]{2,3}$/;
        var pattemail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,4}$/;    
        var pattpass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*?[#?!@$%^&*-])\S{8,16}$/;
        var pattanswer = /^(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/;

        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var email = $('#email').val();
        var mobile = $('#mobile').val();
        var sques = $('#sques').val();
        var sans = $('#sans').val();
        var password = $('#password').val();
        var cpassword = $('#cpassword').val();

        console.log(name, email, mobile, sques, sans, password);
        if (fname == "") {
            alert('First Name Is Required !');
            $('#fname').focus();
            return false;
        } else if (lname == "") {
            alert('Last Name Is Required !');
            $('#lname').focus();
            return false;
        } else if (email == "") {
            alert('Email Is Required !');
            $('#email').focus();
            return false;
        } else if (mobile == "") {
            alert('Mobile Is Required !');
            $('#mobile').focus();
            return false;
        } else if (sques == "") {
            alert('Security Question Is Required !');
            $('#sques').focus();
            return false;
        } else if (sans == "") {
            alert('Security Answer Is Required !');
            $('#sans').focus();
            return false;
        } else if (password == "") {
            alert('Password Is Required !');
            $('#password').focus();
            return false;
        } else if (cpassword == "") {
            alert('Confirm Password Is Required !');
            $('#cpassword').focus();
            return false;
        } else if (password != cpassword) {
            alert('Confirm Password and password should be same !');
            $('#cpassword').focus();
            return false;
        } else if (isNaN(mobile)){ 
            alert("You can enter only numeric value in mobile number field !");
            $('#mobile').focus();
            return false; 
        } else if (!(mobile.match(pattern))) {
            alert("Invalid Mobile Number !");
            $('#mobile').focus();
            return false;
        } else if (!isNaN(fname)) {    
            alert("Name field can not contain numeric values !");
            $('#name').focus();
            return false;  
        } else if (!(fname.match(letter))) {
            alert("Only Alphabet are allowed !");
            $('#name').focus();
            return false;
        } else if (!(password.match(pattpass))) {
            alert(" Password should be of 8-16 characters,with Combination of UPPERCASE, lowercase, special character and numeric value.!");
            $('#password').focus();
            return false;
        } else if (!(email.match(pattemail))) {
            alert('Invalid Email Address !');
            return false;
        // } else if (!(sans.match(pattanswer))) {
        } else if (!(sans.match(letter))) {
            alert('Invalid Answer !');
            $('#sanswer').focus();
            return false;
        } else {
            // alert('You have successfully signed up!!!');
            // $.ajax({
            //     url: 'ajaxRequest.php',
            //     type: 'POST',
            //     data: {
            //         name : name,
            //         email : email,
            //         mobile : mobile,
            //         squestion : squestion,
            //         sanswer : sanswer,
            //         password : password,
            //         action : 'signup' 
            //     }, 
            //     success: function(msg) 
            //     {
            //         alert(msg);
                    
            //     }
            // });
        }
    });

    $('#verifyEmail').click(function(){
        $('#form_email').show();
        var email = $('#email').val();
        alert("OTP has been sent to your email "+email);
    });

    $('#verifyPhone').click(function(){
        $('#form_email').show();
        var mobile = $('#mobile').val();
        alert("OTP has been sent to your phone "+mobile);
    });

    $('#submit_email_otp').click(function(){
        event.preventDefault();
        var email_otp = $('#email_otp').val();
        var email = $('#email').val();
       if(email_otp == ""){
           alert("Firstly Enter OTP , received in your email");
       }
       else{
        $.ajax({
            url:'userRequest.php',
            type:'POST',
            data:{
                email_otp:email_otp, 
                email:email,
                action : 'verify_email_otp'
            },
            success:function(result){
                // console.log(result);
                if(result == 1){
                    alert('Email approved !');
                    window.location.href= 'login.php';
                }
                else{
                   alert('Request Failed !!');
                }
            },
            error: function(){
                alert('Request Failed !');
            }
        });
       }
    });

    $('#submit_phone_otp').click(function(){
        event.preventDefault();
        var phone_otp = $('#phone_otp').val();
        var mobile = $('#mobile').val();
       if(phone_otp == ""){
           alert("Firstly Enter OTP , received in your email");
       }
       else{
        $.ajax({
            url:'userRequest.php',
            type:'POST',
            data:{
                phone_otp:phone_otp, 
                mobile : mobile,
                action : 'verify_phone_otp'
            },
            success:function(result){
                // console.log(result);
                if(result == 1){
                    alert('Phone approved !');
                    window.location.href= 'login.php';
                }
                else{
                   alert('Request Failed !!');
                }
            },
            error: function(){
                alert("error");
            }
        });
    }
    });

    $('#buynow').click(function(){
       prodid = $(this).data('prodid');
       alert(prodid);
    //    alert(p);


    });
   
  
});

function pack(id){
    var pack = id;
    console.log(prodid);
    $.ajax({
        url:'userRequest.php',
        type:'POST',
        data:{
            prodid:prodid, 
            pack:pack,
            action : 'addcart'
        },
        success:function(result){
            alert(result);
           
        },
        error: function(){
            alert("error");
        }
    });
}
