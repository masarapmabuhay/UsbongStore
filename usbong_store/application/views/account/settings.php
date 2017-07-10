<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
	<h3 class="header">Account Settings</h3>
	<br>
	<br>
	<div class="Customer-information">
		<div class="Customer-information-text-in-checkout"><b>Customer Information</b></div>
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
		<div class="fields">
				<form method="post" action="<?php echo site_url('account/save')?>">
						<?php 
						//First Name--------------------------------------------------
						if (isset($data['firstNameParam'])) {
							echo '<input type="text" class="Checkout-input" placeholder="First Name" name="firstNameParam" value="'.$data['firstNameParam'].'" required>';
						}
						else { //default
							echo '<input type="text" class="Checkout-input" placeholder="First Name" name="firstNameParam" required>';
						}
						//-----------------------------------------------------------
						
						//Last Name--------------------------------------------------
						if (isset($data['lastNameParam'])) {
							echo '<input type="text" class="Checkout-input" placeholder="Last Name" name="lastNameParam" value="'.$data['lastNameParam'].'" required>';
						}
						else { //default
							echo '<input type="text" class="Checkout-input" placeholder="Last Name" name="lastNameParam" required>';
						}
						//-----------------------------------------------------------
						
						
						//Error Message
						//						echo "hello ".$validation_errors;
						if (strpos($validation_errors, "The Contact Number field must contain only numbers.") !== false) {
							echo '<div class="Register-error">Contact Number must contain only numbers.</div>';
						}
						//Email Address--------------------------------------------------
						if (isset($data['contactNumberParam'])) {
							echo '<input type="tel" class="Checkout-input" placeholder="Contact Number" name="contactNumberParam" value="'.$data['contactNumberParam'].'" required>';
						}
						else { //default
							echo '<input type="tel" class="Checkout-input" placeholder="Contact Number" name="contactNumberParam" required>';
						}
						//-----------------------------------------------------------
						/*
						 //Error Message
						 if (strpos($validation_errors, "The Confirm Email Address field does not match the Email Address field.") !== false) {
						 echo '<div class="Register-error">Confirm Email does not match Email Address.</div>';
						 }
						 */
						//Shipping Address--------------------------------------------------
						if (isset($data['shippingAddressParam'])) {
							echo '<input type="text" class="Checkout-input" placeholder="Shipping Address" name="shippingAddressParam" value="'.$data['shippingAddressParam'].'" required>';
						}
						else { //default
							echo '<input type="text" class="Checkout-input" placeholder="Shipping Address" name="shippingAddressParam" required>';
						}
						
						//City--------------------------------------------------
						if (isset($data['cityParam'])) {
							echo '<input type="text" class="Checkout-input" placeholder="City" name="cityParam" value="'.$data['cityParam'].'" required>';
						}
						else { //default
							echo '<input type="text" class="Checkout-input" placeholder="City" name="cityParam" required>';
						}
						//-----------------------------------------------------------
						/*
						 //Error Message
						 if (strpos($validation_errors, "The Password Confirmation field does not match the Password field.") !== false) {
						 echo '<div class="Register-error">Confirm Password does not match Password.</div>';
						 }
						 */
						//Country--------------------------------------------------
						if (isset($data['countryParam'])) {
							echo '<input type="text" class="Checkout-input" placeholder="Country" name="countryParam" value="'.$data['countryParam'].'" required>';
						}
						else { //default
							echo '<input type="text" class="Checkout-input" placeholder="Country" name="countryParam" required>';
						}
						
						if (strpos($validation_errors, "The Postal Code field must contain only numbers.") !== false) {
							echo '<div class="Register-error">Postal Code must contain only numbers.</div>';
						}
						//Postal Code--------------------------------------------------
						if (isset($data['postalCodeParam'])) {
							echo '<input type="text" class="Checkout-input" placeholder="Postal Code" name="postalCodeParam" value="'.$data['postalCodeParam'].'" required>';
						}
						else { //default
							echo '<input type="text" class="Checkout-input" placeholder="Postal Code" name="postalCodeParam" required>';
						}
						
						echo '<label class="Checkout-input-mode-of-payment">-Mode of Payment-</label>';
						echo '<div class="radio Checkout-input-mode-of-payment">';
						echo '<label><input type="radio" name="modeOfPaymentParam" checked>Bank Deposit</label>';
						echo '</div>';
						echo '<div class="radio Checkout-input-mode-of-payment">';
						echo '<label><input type="radio" name="modeOfPaymentParam">Paypal</label>';
						echo '</div><br>';
						
						//reset the session values to null
						$this->session->set_flashdata('errors', null);
						$this->session->set_flashdata('data', null); //added by Mike, 20170619
					?>
					<br><br>
					<button type="submit" class="Button-login">
	<!-- <img src="<?php echo base_url('assets/images/cart_icon.png'); ?>">	
	 -->					
	 				Save
					</button>
				</form>
			</div>	
		</div>
</body>
</html>