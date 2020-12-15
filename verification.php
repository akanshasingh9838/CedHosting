<?php 
require_once('header.php');
$id= $_GET['email'];
if(isset($_POST['submitEmail'])){
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'akanshasingh9838@gmail.com';                 // SMTP username
$mail->Password = '';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('akanshasingh9838@gmail.com', 'Mailer');
$mail->addAddress('$', 'Joe User');     // Add a recipient
$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
}
?>
<div class="content">
				<div class="main-1">
					<div class="container">
						<div class="login-page">
							<div class="account_grid">						
								<div class="col-md-6 login-right">
									<h3>Verify Your Account</h3>
									<p>You can verify yourself through email or otp</p>
									<form action="" method="post">
									  <div>
										<span>Email Address<label>*</label></span>
										<input type="email" name="email"> 
									  </div>
									  <input type="submit" name ="submitEmail" value="Verify through Email">
									</form>

									<form action="" method="post">
									  <div>
										<span>Password<label>*</label></span>
										<input type="text" name="otp"> 
									  </div>								
									  <input type="submit" name ="submitOtp" value="Verify through OTP">
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