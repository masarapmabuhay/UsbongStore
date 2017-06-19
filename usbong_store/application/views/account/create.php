<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
	<div class="login-and-create">
		<div class="register-text-in-create">Create New Account</div>
		<div class="login-text-in-create">Sign In</div>
		<?php
			$validation_errors="";
			if ($this->session->flashdata('errors')) {
				$validation_errors = $this->session->flashdata('errors');
			}	
	    ?>
		<div class="fields">
			<form method="post" action="<?php echo site_url('b/literature_and_fiction')?>">
				<?php 
					echo '<input type="text" class="Register-input" placeholder="First Name" name="firstName-param" required>';
					echo '<input type="text" class="Register-input" placeholder="Last Name" name="lastName-param" required>';			
					
					if (strpos($validation_errors, "The Email Address field must contain a valid email address.") !== false) {
						echo '<div class="Register-error">Email Address is not a valid email.</div>';					
					}					
					echo '<input type="text" class="Register-input" placeholder="Email Address" name="emailAddress-param" required>';

					$confirmEmail = '<div class="Register-error">Confirm Email does not match Email Address.</div>';
					
					echo '<div class="form-group">';
						if (strpos($validation_errors, "The Confirm Email Address field does not match the Email Address field.") !== false) {
							echo '<div class="Register-error">Confirm Email does not match Email Address.</div>';
						}					
						echo '<input type="text" class="Register-input" placeholder="Confirm Email" name="confirmEmailAddress-param" required>';
					echo '</div>';					
					echo '<input type="password" class="Register-input" placeholder="Password" name="password-param" required>';

					if (strpos($validation_errors, "The Password Confirmation field does not match the Password field.") !== false) {
						echo '<div class="Register-error">Confirm Password does not match Password.</div>';
					}
					echo '<input type="password" class="Register-input" placeholder="Confirm Password" name="confirmPassword-param" required>';					
				?>
				<button type="submit" class="Button-login">
<!-- <img src="<?php echo base_url('assets/images/cart_icon.png'); ?>">	
 -->					
 				Register
				</button>
			</form>
		</div>		
	</div>
</body>
</html>
