<?php 
include('header.php');
?>
<div class="content">
				<div class="main-1">
					<div class="container">
						<div class="login-page">
							<div class="account_grid">
								<!-- <div class="col-md-6 login-left">
									 <h3>new customers</h3>
									 <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
									 <a class="acount-btn" href="account.php">Create an Account</a>
								</div> -->
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