<?php 

session_start();
require_once('User.php');
require_once('Dbcon.php');
require_once('Product.php');
$user = new User();
$dbcon=new Dbcon();
$product = new Product();
if ($_POST['action'] == 'verify_email_otp') {
    $email_otp = $_POST['email_otp'];
    $email = $_POST['email'];
    // $id=$_SESSION['userdata']['id'];
    // echo "print otp :".     $email_otp;
    // echo "<pre>";
    // print_r($_SESSION);

    // echo $email_otp;
    // echo "<br>";
    // echo $email;
    // echo "<br>";
    // echo $_SESSION['userdata']['otp'];
    if($email_otp == $_SESSION['userdata']['otp']){
        $user -> status_email_approved($dbcon -> conn,$email);
    }
}

if($_POST['action'] == 'verify_phone_otp'){
    $phone_otp = $_POST['phone_otp'];
    $mobile=$_POST['mobile'];
    if($phone_otp == $_SESSION['userdata']['otp']){
        $user -> status_phone_approved($dbcon -> conn,$mobile);
    }
}
if($_POST['action'] == 'addcart'){
    $pack=$_POST['pack'];
    $prodid=$_POST['prodid'];
    $pro = $product -> fetchBuyData($pack,$prodid,$dbcon -> conn);
    echo $pro;
}
?>