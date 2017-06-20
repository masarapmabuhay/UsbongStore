<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
	<div class="login-and-create">
		<div class="login-text">Sign In</div>
		<div class="register-text">Create New Account</div>
		<?php
			$validation_errors="";
			if ($this->session->flashdata('errors')) {
				$validation_errors = $this->session->flashdata('errors');
			}	
			
			$data=[];
			if ($this->session->flashdata('data')) {
				$data = $this->session->flashdata('data');
			}
/*			
			if (isset($data['is_login_success'])) {
				echo "login success? ".$data['is_login_success'];
			}
*/			
	    ?>
		<div class="fields">
			<form method="post" action="<?php echo site_url('')?>">
				<?php 
					echo '<input type="text" class="Email-input" placeholder="Email Address" name="emailAddressParam" required>';
					echo '<input type="password" class="Password-input" placeholder="Password" name="passwordParam" required>';												
					//reset the session values to null
					$this->session->set_flashdata('errors', null);
					$this->session->set_flashdata('data', null); //added by Mike, 20170619
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
