

<?php include('header.php'); 
require('User.php');
require('Dbcon.php');
$dbcon = new Dbcon();
$details= new User();

if(isset($_POST['submit'])){
	$fname = isset($_POST['fname'])? $_POST['fname'] : '';
	$lname = isset($_POST['lname'])? $_POST['lname'] : '';
	echo $fname;

}

?>

	<div class="content">
				<!-- registration -->
	<div class="main-1">
		<div class="container">
			<div class="register">
		  	  <form action="" method="post"> 
				 <div class="register-top-grid">
					<h3>personal information</h3>
					 <div>
						<span>First Name<label>*</label></span>
						<input type="text" name="fname"> 
					 </div>
					 <div>
						<span>Last Name<label>*</label></span>
						<input type="text" name="lname"> 
					 </div>
					 <div>
						 <span>Email Address<label>*</label></span>
						 <input type="text" name="email"> 
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
								<input type="password" name="password">
							 </div>
							 <div>
								<span>Confirm Password<label>*</label></span>
								<input type="password" name="cpassword">
							 </div>
					 </div>
					 <div class="register-top-grid">
						    <h3>Security information</h3>
							 <div>
								<span>Security Question<label>*</label></span>
								<input type="text" name="sques"> 
							 </div>
							 <div>
								<span>Security Answer<label>*</label></span>
								<input type="text" name="sans"> 
							 </div>
					 </div>
					 <input type="submit" value="submit" name="submit">
				</form>
				<div class="clearfix"> </div>
				<div class="register-but">
				   <!-- <form>
					   <input type="submit" value="submit" name="submit">
					   <div class="clearfix"> </div>
				   </form> -->
				</div>
		   </div>
		 </div>
	</div>
<!-- registration -->

			</div>
<!-- login -->
				<!---footer--->
	<?php include('footer.php'); ?>