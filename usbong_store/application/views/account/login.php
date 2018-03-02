<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!-- 
<html lang="en">
<head>
</head>
<body>
-->

<script type="text/javascript">

	$(document).ready(function() {

		//------------------//
		// Layout Functions
		//------------------//

		function forgot_password(event) {
			// prevent redirect
			event.preventDefault();
			$('#sign-in-form').attr('action', '<?php echo site_url('account/forgotpassword')?>');
			$('#sign-in-form').submit();
		}

		//------------------//
		// Bind Events
		//------------------//

		$(document).on('click', '[class="forgotPassword-text"]', forgot_password);

	});
</script>
	<!-- Success Div for Falsh Data: forgot_password -->
	<?php if ($this->session->flashdata('forgot_password_success')) { ?>
		<div class="alert alert-success">
			<span><?php echo $this->session->flashdata('forgot_password_success'); ?></span>
		</div>
	<?php } ?>
	<!-- Warning Div for Flash Data: forgot_password -->
	<?php if ($this->session->flashdata('forgot_password_error')) { ?>
		<div class="alert alert-warning">
			<span><?php echo $this->session->flashdata('forgot_password_error'); ?></span>
		</div>
	<?php } ?>
	<div class="login-and-create">
		<div class="login-text"><b>Sign In</b></div>
		<div class="register-text"><a href = "<?php echo site_url('account/create/')?>"><b>Create New Account</b></a></div>
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
			<form id="sign-in-form" method="post" action="<?php echo site_url('')?>">
				<?php 
					// Error Message
					if (isset($data['does_email_exist'])) {
						echo '<div class="Register-error">Please check to make sure that your email address is correct or sign up for a new account with the "Create New Account" link above.</div>';
						echo '<input type="text" class="Login-input" placeholder="Email Address" name="emailAddressParam" value="'.$data['emailAddressParam'].'"required>';
					}								
					else {
						echo '<input type="text" class="Login-input" placeholder="Email Address" name="emailAddressParam" required>';
					}

					echo '<input type="password" class="Login-input" placeholder="Password" name="passwordParam" required>';												
					//reset the session values to null
					$this->session->set_flashdata('errors', null);
					$this->session->set_flashdata('data', null); //added by Mike, 20170619
				?>				
				<button type="submit" class="Button-login">
<!-- <img src="<?php echo base_url('assets/images/cart_icon.png'); ?>">	
 -->					
 				Sign in
				</button>
				<div class="forgotPassword-div"><a class="forgotPassword-text" href = "<?php echo site_url('contact/')?>"><b>Forgot password</b></a></div>
			</form>
		</div>		
	</div>
<!-- 
</body>
</html>
 -->