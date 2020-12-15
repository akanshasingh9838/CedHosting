

<?php include('header.php'); 
require_once('User.php');
require_once('Dbcon.php');
$dbcon = new Dbcon();
$details= new User();

if(isset($_POST['submit'])){
	$fname = trim(isset($_POST['fname'])? $_POST['fname'] : '');
	$lname = trim(isset($_POST['lname'])? $_POST['lname'] : '');
	$name = $fname." ".$lname;
	$email = trim(isset($_POST['email'])? $_POST['email'] : '');
	$mobile = trim(isset($_POST['mobile'])? $_POST['mobile'] : '');
	$password = trim(isset($_POST['password'])? $_POST['password'] : '');
	$sques = trim(isset($_POST['sques'])? $_POST['sques'] : '');
	$sans = trim(isset($_POST['sans'])? $_POST['sans'] : '');
	// echo $name , $email , $mobile , $password , $sques , $sans;
	$msg = $details -> signup($email,$name,$mobile,$password,$sques,$sans,$dbcon -> conn);
	if($msg == true){
		echo ("<script>window.location.href='verification1.php?email=".$email."&name=".$name."&mobile=".$mobile."';</script>");		
	}
	
}
?>
	<div class="content">				
	<div class="main-1">
		<div class="container">
			<div class="register">
		  	  <form action="" method="post"> 
				 <div class="register-top-grid">
					<h3>personal information</h3>
					 <div>
						<span>First Name<label>*</label></span>
						<input type="text" name="fname" id="fname"> 
					 </div>
					 <div>
						<span>Last Name<label>*</label></span>
						<input type="text" name="lname" id="lname"> 
					 </div>
					 <div>
						 <span>Email Address<label>*</label></span>
						 <input type="email" name="email" id="email"> 
					 </div>
					 <div>
						 <span>Mobile<label>*</label></span>
						 <input type="text" name="mobile" id="mobile"> 
					 </div>
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
					   </a>
					 </div>
				     <div class="register-bottom-grid">
						    <h3>login information</h3>
							 <div>
								<span>Password<label>*</label></span>
								<input type="password" name="password" id="password">
							 </div>
							 <div>
								<span>Confirm Password<label>*</label></span>
								<input type="password" name="cpassword" id="cpassword">
							 </div>
					 </div>
					 <div class="register-top-grid">
						    <h3>Security information</h3>
							 <div>
								<span>Security Question<label>*</label></span>
								<!-- <input type="text" name="sques" id="sques">  -->
								<select name ="sques" id="sques">
									<option value="1">What was your childhood nickname?</option>
									<option value="2">What is the name of your favourite childhood friend?</option>
									<option value="3">WWhat was your favourite place to visit as a child?</option>
									<option value="4">What was your dream job as a child?</option>
									<option value="5">What is your favourite teacher's nickname?</option>
								</select>
							 </div>
							 <div>
								<span>Security Answer<label>*</label></span>
								<input type="text" name="sans" id="sans"> 
							 </div>
					 </div>
					 <div class="register-but">
					 	<input type="submit" value="submit" name="submit" id="signup">
					 </div>
				</form>
				<div class="clearfix"> </div>
				<div class="register-but">
				   <form>
					   <!-- <input type="submit" value="submit" name="submit"> -->
					   <div class="clearfix"> </div>
				   </form>
				</div>
		   </div>
		 </div>
	</div>
<!-- registration -->

			</div>
<!-- login -->
				<!---footer--->
	<?php include('footer.php'); ?>