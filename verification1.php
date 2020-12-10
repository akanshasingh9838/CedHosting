<?php 
include('header.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '/home/cedcoss/vendor/autoload.php';
$email= $_GET['email'];
$mobile = $_GET['mobile'];
$name= $_GET['name'];
$otp = rand(1000,9999);
if(isset($_POST['verifyEmail'])){
    // $otp = rand(1000,9999);
    $_SESSION['userdata']['otp']=$otp;
    echo $_SESSION['userdata']['otp'];
    $mail = new PHPMailer();
    try {
    $mail->isSMTP(true);
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'akanshasingh9838@gmail.com';
    $mail->Password = 'varnikasingh0808';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setfrom('akanshasingh9838@gmail.com', 'CedHosting');
    $mail->addAddress($email);
    $mail->addAddress($email, $name);

    $mail->isHTML(true);
    $mail->Subject = 'Account Verification';
    $mail->Body = 'Hi User,Here is your otp for account verification'.$otp;
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->send();
    // echo ("<script>window.location.href='verification1.php?email=".$email." & mobile=".$mobile."';</script>");
    } catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    }
}
//pHONE vERIFICATION
if(isset($_POST['verifyPhone'])){
    $fields = array(
        "sender_id" => "FSTSMS",
        "message" => "Verify Your Account , Please enter this otp ..  ".$otp,
        "language" => "english",
        "route" => "p",
        "numbers" => $mobile,
    );

    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($fields),
    CURLOPT_HTTPHEADER => array(
        "authorization: 4uVUqkgFBTAb8OSeEdrnQp6zm0XiGso3NyYf9Khxa1jDMClZHWWGdf9tLaxFT4RnCvJujepXkzQhZmA3",
        "accept: */*",
        "cache-control: no-cache",
        "content-type: application/json"
    ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
    echo "cURL Error #:" . $err;
    } else {
    echo $response;
    }
}
?>
<div class="content">
				<div class="main-1">
					<div class="container">
						<div class="login-page">
							<div class="account_grid">	
                                <div class="col-md-6 login-right">
                                <h3>Verify Your Account Through Email</h3>
									<p>You can verify yourself through email</p>
									<form action="" method="post" >
									  <div>
										<span>Email Address<label>*</label></span>
										<input type="text" name="email" value = "<?php echo $email; ?>" disabled> 
									  </div>
									  <input type="submit" name ="verifyEmail" id ="verifyEmail" value="Verify through Email">
									</form>

									<form action="" method="post"  id="form_email">  <!--style="display:none;"-->
									  <div>
										<span>Enter Otp Recieved<label>*</label></span>
										<input type="text" name="email_otp" id="email_otp"> 
									  </div>								
									  <input type="submit" name ="submit_email_otp" id="submit_email_otp" value="Verify through OTP">
									</form>
								</div>					
								<div class="col-md-6 login-right">
									<h3>Verify Your Account Through Phone</h3>
									<p>You can verify yourself through otp</p>
									<form action="" method="post">
									  <div>
										<span>Phone Number<label>*</label></span>
										<input type="text" name="mobile" value = "<?php echo $mobile; ?>" disabled> 
									  </div>
									  <input type="submit" name ="verifyPhone" value="Verify through Phone">
									</form>

									<form action="" method="post">
									  <div>
										<span>Enter Your Otp here<label>*</label></span>
										<input type="text" name="phone_otp"  id="phone_otp"> 
									  </div>								
									  <input type="submit" name ="submit_phone_otp" id="submit_phone_otp" value="Verify through OTP">
									</form>
								</div>	
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- login -->
<?php include('footer.php'); ?>