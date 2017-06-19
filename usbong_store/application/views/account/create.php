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
			if ($this->session->flashdata('errors')) {
			    echo "<div class='error'>";
			    echo $this->session->flashdata('errors');
			    echo "</div>";
		    }	
	    ?>
		<div class="fields">
			<form method="post" action="<?php echo site_url('b/literature_and_fiction')?>">
				<?php 
					echo '<input type="text" class="Register-input" placeholder="First Name" name="firstName-param" required>';
					echo '<input type="text" class="Register-input" placeholder="Last Name" name="lastName-param" required>';			
					echo '<input type="text" class="Register-input" placeholder="Email Address" name="emailAddress-param" required>';
					echo '<input type="text" class="Register-input" placeholder="Confirm Email" name="confirmEmailAddress-param" required>';
					echo '<input type="password" class="Register-input" placeholder="Password" name="password-param" required>';
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
