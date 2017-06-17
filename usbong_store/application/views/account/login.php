<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
	<div class="login">
		<div class="sign-in-text">Sign In</div>
		<div class="register-text">Create New Account</div>
		<div class="fields">
			<form method="get" action="<?php echo site_url('account/login')?>">
				<?php 
					echo '<input type="text" class="Email-input" placeholder="Email Address" name="email-param" required>';
					echo '<input type="text" class="Password-input" placeholder="Password" name="password-param" required>';			
				?>
				<button type="submit" class="Button-login">
<!-- <img src="<?php echo base_url('assets/images/cart_icon.png'); ?>">	
 -->					
 				Sign in
				</button>
				<div class="forgotPassword-text">Forgot password</div>
			</form>
		</div>		
	</div>
</body>
</html>
