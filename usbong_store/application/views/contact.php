<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!-- 
<html lang="en">
<head>
</head>
<body>
-->
	<h2 class="header">Contact Usbong Store</h2>
	<div>
	<br><br>
		<div class="row">
			<div class="col-sm-12">
			<?php
				$validation_errors="";
				if ($this->session->flashdata('errors')) {
					$validation_errors = $this->session->flashdata('errors');
				}	
				
				$data=[];
				if ($this->session->flashdata('data')) {
					$data = $this->session->flashdata('data');
				}
		    ?>
		    <div class="request-contact">
			<div class="request-text"><b>Help & Feedback</b></div>
		    
			<div class="Contact">For questions, concerns, suggestions, feature requests, and/or details about our software development service offerings, please fill out the form below.<br><br>Our team will reply by email within two business days.<br><br>
			<div class="fields">
				<form method="post" action="<?php echo site_url('b/literature_and_fiction')?>">
				<?php 
					//First Name--------------------------------------------------
					if (isset($data['firstNameParam'])) {
						echo '<input type="text" class="Register-input" placeholder="First Name" name="firstNameParam" value="'.$data['firstNameParam'].'" required>';
					}
					else { //default
						echo '<input type="text" class="Register-input" placeholder="First Name" name="firstNameParam" required>';
					}
					//-----------------------------------------------------------

					//Last Name--------------------------------------------------
					if (isset($data['lastNameParam'])) {
						echo '<input type="text" class="Register-input" placeholder="Last Name" name="lastNameParam" value="'.$data['lastNameParam'].'" required>';
					}
					else { //default
						echo '<input type="text" class="Register-input" placeholder="Last Name" name="lastNameParam" required>';
					}
					//-----------------------------------------------------------

					
					//Error Message
					if (strpos($validation_errors, "The Email Address field must contain a valid email address.") !== false) {
						echo '<div class="Register-error">Email Address is not a valid email.</div>';					
					}					
					
					//Email Address--------------------------------------------------					
					if (isset($data['emailAddressParam'])) {
						echo '<input type="text" class="Register-input" placeholder="Email Address" name="emailAddressParam" value="'.$data['emailAddressParam'].'" required>';
					}
					else { //default
						echo '<input type="text" class="Register-input" placeholder="Email Address" name="emailAddressParam" required>';
					}
					//-----------------------------------------------------------
					
					//Error Message					
					if (strpos($validation_errors, "The Confirm Email Address field does not match the Email Address field.") !== false) {
						echo '<div class="Register-error">Confirm Email does not match Email Address.</div>';
					}				
															
//					echo '<label class="Checkout-input-product-type">-Product Type-</label>';					
					echo '<div class="radio Request-input-product-type">';
					echo '<label><input type="radio" name="productTypeParam" value="0" checked>General feedback, no need to reply</label>';
					echo '</div>';
					echo '<div class="radio Request-input-product-type">';
					echo '<label><input type="radio" name="productTypeParam" value="1">Need help with an issue</label>';
					echo '</div>';
					echo '<div class="radio Request-input-product-type">';
					echo '<label><input type="radio" name="productTypeParam" value="2">Need help with software development</label>';
					echo '</div>';
					echo '<br>';
					
					//Description--------------------------------------------------
					if (isset($data['descriptionParam'])) {
						echo '<input type="text" class="Register-input" placeholder="Description" name="descriptionParam" value="'.$data['descriptionParam'].'" required>';
					}
					else { //default
						echo '<input type="text" class="Register-input" placeholder="Description" name="descriptionParam" required>';
					}
					//-----------------------------------------------------------
					
					//reset the session values to null
					$this->session->set_flashdata('errors', null);
					$this->session->set_flashdata('data', null); //added by Mike, 20170619
				?>
				<br><br>
				<button type="submit" class="Button-login">
 				Send
				</button>
			</form>
		</div>		
		</div>	
		</div>
		</div>
	</div>	
<!-- 
</body>
</html>
-->